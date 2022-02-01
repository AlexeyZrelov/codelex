<?php
class Geometry
{

   static function areaCircle(int $r): float
   {
       return round((pi() * $r * 2), 2);
   }

    static function areaRect(int $l, int $w): float
    {
        return round($l * $w, 2);
    }

    static function areaTriangle(int $b, int $h): float
    {
        return round($b * $h * 0.5, 2);
    }
}

echo "Geometry Calculator\n";
echo "1. Calculate the Area of a Circle" . PHP_EOL;
echo "2. Calculate the Area of a Rectangle" . PHP_EOL;
echo "3. Calculate the Area of a Triangle" . PHP_EOL;
echo "4. Quit\n";
//echo "Enter your choice (1-4) : ";
$ind = (int) readline("Enter your choice (1-4) : ");

if ($ind == 1 || $ind == 2 || $ind == 3 || $ind == 4) {
    echo "A good choice " . PHP_EOL;
} else {
    echo "A number outside the range of 1 through 4 " . PHP_EOL;
}
//var_dump($ind);
$ind = $ind ?? null;
switch ($ind) {
    case 1:
        $r = readline("Enter radius: ");
        if (isset($r) && $r > 0) {
            echo Geometry::areaCircle($r) . PHP_EOL;
        } else {
            echo "Negative values are used !" . PHP_EOL;
        }
        break;
    case 2:
        $l = readline("Enter length: ");
        $w = readline("Enter width: ");
        if (isset($l, $w) && $l > 0 && $w >0) {
            echo Geometry::areaRect($l, $w) . PHP_EOL;
        } else {
            echo "Negative values are used !" . PHP_EOL;
        }
        break;
    case 3:
        $b = readline("Enter base: ");
        $h = readline("Enter height: ");
        if (isset($b, $h) && $b > 0 && $h >0) {
            echo Geometry::areaTriangle($b, $h). PHP_EOL;
        } else {
            echo "Negative values are used !" . PHP_EOL;
        }
        break;
    case 4:
        echo "Bay !" . PHP_EOL;
        break;
}