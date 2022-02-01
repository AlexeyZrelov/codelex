<?php
/*
    Name
    Price
    Category
    Description
    Expiry date
    Amount

 */

[$name, $cash] = explode(',', file_get_contents("text.txt"));

$person = new stdClass();
$person->name = $name;
$person->cash = (int) $cash;

function createProduct(string $name, int $price): stdClass
{
    $product = new stdClass();
    $product->name = $name;
    $product->price = $price;
    return $product;
}

//$products = [
//    createProduct('Maizite', 1000),
//    createProduct('Kafija', 500),
//    createProduct('Piens', 100),
//    createProduct('E-talons', 250),
//    createProduct('Alus', 250),
//];

$products = [];

if (($handle = fopen("myFile0.csv", "r")) !== false) {
    while (($data = fgetcsv($handle, 1000, ",")) !== false) {
        [$name, $price] = $data;
        $products[] = createProduct($name, $price);
    }
    fclose($handle);
}

echo "{$person->name} has {$person->cash}$" . PHP_EOL . PHP_EOL;

$basket = [];

if (file_exists('basket.txt')) {
    $basket = explode(',', file_get_contents('basket.txt'));
}

while (true) {
    echo '[1] Purchase' . PHP_EOL;
    echo '[2] Checkout' . PHP_EOL;
    echo '[Any] Exit' . PHP_EOL;

    $option = (int) readline("Select an option: ");

    switch ($option) {
        case 1:
            foreach ($products as $index => $product) {
                echo "[{$index}] {$product->name} {$product->price}$" . PHP_EOL;
            }

            $selectedProductIndex = (int) readline('Select product: ');

            $product = $products[$selectedProductIndex] ?? null;

            if ($product === null) {
                echo "Product not found." . PHP_EOL;
                exit;
            }
//            $basket[] = $product;
            $basket[] = $selectedProductIndex;

            echo "Added {$product->name} to basket." . PHP_EOL;
            break;
        case 2: // Checkout
            $totalSum = 0;
            foreach ($basket as $productIndex) {
                $product = $products[$productIndex];
                $totalSum += $product->price;
                echo "{$product->name}" . PHP_EOL;
            }
            echo "===============================" . PHP_EOL;
            echo "Total: $totalSum";
            echo PHP_EOL;

            echo $person->cash >= $totalSum ? "Successful payment." : "Payment failed. Not enough cash.";
            echo PHP_EOL;

            // clear file
            if (file_exists('basket.txt')) {
                unlink('basket.txt');
            }

            exit;
        default: // exit
            $productsIndexes = implode(',', $basket);
            file_put_contents('basket.txt', $productsIndexes);
            exit;
    }
}

//======
$person->cash -= $product->price;

//echo "{$person->name} has left with {$person->cash}$" . PHP_EOL;