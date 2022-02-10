<?php
/*
4 bloki ar stock informāciju - Nosaukums, cena, bija kāpums vai
kritums kopš vakardienas (krāsa zaļa vai sarkana)
Meklētāja iespēja sameklēt JEBKĀDU stock simbolu.
Имя, цена были на подъеме или
падение со вчерашнего дня (цвет зеленый или красный)
Опция поисковой системы для поиска ЛЮБОГО биржевого символа.
*/

require_once 'vendor/autoload.php';

$config = Finnhub\Configuration::getDefaultConfiguration()->setApiKey('token', 'c82g36aad3ia12591srg');
$client = new Finnhub\Api\DefaultApi(
    new GuzzleHttp\Client(),
    $config
);

echo "<pre>";
//print_r($client->stockSymbols("US"));

//print_r($client->companyProfile2("AAPL"));
//print_r($client->companyProfile2("IBM"));
//print_r($client->companyProfile2("EXCOF"));
//print_r($client->companyProfile2("UPOW"));

// Financials as reported
//print_r($client->financialsReported($symbol = "AAPL", $freq = "annual"));
