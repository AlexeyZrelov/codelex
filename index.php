<?php
/*
4 bloki ar stock informāciju - Nosaukums, cena, bija kāpums vai
kritums kopš vakardienas (krāsa zaļa vai sarkana)
Meklētāja iespēja sameklēt JEBKĀDU stock simbolu.
*/

require_once 'vendor/autoload.php';

$config = Finnhub\Configuration::getDefaultConfiguration()->setApiKey('token', 'c82g36aad3ia12591srg');
$client = new Finnhub\Api\DefaultApi(
    new GuzzleHttp\Client(),
    $config
);

$search = $_GET['search'] ?? '';

$data = [];
$data[] = $client->companyBasicFinancials("AAPL", "all");
$data[] = $client->companyBasicFinancials("TSLA", "all");
$data[] = $client->companyBasicFinancials("EXCOF", "all");
$data[] = $client->companyBasicFinancials("CHMG", "all");

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title></title>
    <style>
        table {
            font-size: 14px;
            border-collapse: collapse;
            text-align: center;
        }
        th, td:first-child {
            background: #AFCDE7;
            color: white;
            padding: 10px 20px;
        }
        th, td {
            border-style: solid;
            border-width: 0 1px 1px 0;
            border-color: white;
        }
        td {
            background: #D8E6F3;
        }
        th:first-child, td:first-child {
            text-align: left;
        }
    </style>
</head>
<body>

<form method="get" action="/">
        <input name="search" />
    <button type="submit">Search</button>
</form>
<br>
<table>
    <tr>
        <th>Company</th>
        <th>Symbol</th>
        <th>Day Price</th>
        <th>Indicator</th>
    </tr>

    <?php
        if ($search == '') {
            foreach ($data as $i => $v) {
            $name = $client->companyProfile2("{$v['symbol']}");
        ?>

    <tr>
        <td><?php echo $name->getName(); ?></td>
        <td><?php echo $v['symbol']; ?></td>
        <td><?php echo $v['metric']['5DayPriceReturnDaily']; ?></td>
        <td>
            <?php

            if ($v['metric']['5DayPriceReturnDaily'] > 0) {

                echo '<span style="color: green">&#9650;</span>';

            } elseif ($v['metric']['5DayPriceReturnDaily'] === 0 ||
                $v['metric']['5DayPriceReturnDaily'] === null) {

                echo '';

            } else {

                echo '<span style="color: red">&#9660</span>';

            }

            ?>
        </td>
    </tr>

    <?php   }
        } else {

            $data1 = $client->symbolSearch($search);
            foreach ($data1['result'] as $i => $v) {
            $name = $client->companyBasicFinancials($v['symbol'], "all");

            ?>

    <tr>
        <td><?php echo $v['description']; ?></td>
        <td><?php echo $v['symbol']; ?></td>
        <td><?php echo $name['metric']['5DayPriceReturnDaily']; ?></td>
        <td>
            <?php

            if ($name['metric']['5DayPriceReturnDaily'] > 0) {

                echo '<span style="color: green">&#9650;</span>';

            } elseif ($name['metric']['5DayPriceReturnDaily'] === 0 ||
                $name['metric']['5DayPriceReturnDaily'] === null) {

                echo '';

            } else {

                echo '<span style="color: red">&#9660</span>';

            }

            ?>
        </td>
    </tr>

    <?php
            }
        }
        ?>

</table>
</body>
</html>

