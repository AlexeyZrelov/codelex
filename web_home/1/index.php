<?php

//$search = $_GET['search'] ?? '';
$search = $_GET['from'] ?? '';
$limit = 20;
$offset = $_GET['offset'] ?? '0';

//$dat = $_GET['from'] . 'T00:00:00';
//$dat = "2020-02-29T00:00:00";
//$dat = date("Y-m-d H:i:s", strtotime($_GET['from']));

$from = $_GET['from'] ?? '';
$to = $_GET['to'] ?? '';
//var_dump($dat);
//$from = date("Y-m-d H:i:s", strtotime($_GET['from'])) ?? '';
//$to =  date("Y-m-d H:i:s", strtotime($_GET['to'])) ?? '';

//$q = json_decode(file_get_contents("https://data.gov.lv/dati/lv/api/3/action/datastore_search?resource_id=d499d2f0-b1ea-4ba2-9600-2c701b03bd4a&q={'Datums':'{$dat}'}&limit=30"));
$q = json_decode(file_get_contents("https://data.gov.lv/dati/lv/api/3/action/datastore_search?q={$search}&offset={$offset}&resource_id=d499d2f0-b1ea-4ba2-9600-2c701b03bd4a&limit=20"));
//$q = json_decode(file_get_contents("https://data.gov.lv/dati/lv/api/3/action/datastore_search?plain=false&filters={$dat}&offset={$offset}&resource_id=d499d2f0-b1ea-4ba2-9600-2c701b03bd4a&limit=20"));

//https://data.gov.lv/dati/lv/api/3/action/datastore_search?resource_id=d499d2f0-b1ea-4ba2-9600-2c701b03bd4a&plain=false&filters={'Datums':'{$dat}'}

//print_r($q);
//$s = $q->result->q;

$data = $q->result->records;
//var_dump($data);
//var_dump($from);
//var_dump($to);

$period = [];
foreach ($data as $v) {

    [$t] = explode('T', $v->Datums);
//    $t = strtotime($t);
//    var_dump($t);
//    $t = date("Y-m-d H:i:s", strtotime($t));
//    $t = date("Y-m-d H:i:s", strtotime($v->Datums));

    if ($t >= $from && $t <= $to) {
        $period[] = [$v->Datums, $v->TestuSkaits, $v->ApstiprinataCOVID19InfekcijaSkaits];
    }
}

//unset($_GET['from']);
//unset($_GET['to']);
//if (isset($_GET['from'])) {
//    unset($_GET['from']);
//    unset($_GET['to']);
//}

?>

<html>
<head>
    <meta charset="utf-8">
    <title>COVID-19</title>
    <style>
        .table {
            width: 50%;
            margin-bottom: 20px;
            border: 1px solid #dddddd;
            border-collapse: collapse;
        }
        .table th {
            font-weight: bold;
            padding: 5px;
            background: #efefef;
            border: 1px solid #dddddd;
        }
        .table td {
            border: 1px solid #dddddd;
            padding: 5px;
        }
    </style>
</head>
<body>

<form method="get" action="/">
    <input type="date" name="from">
    <input type="date" name="to">
<!--    <input name="search" />-->
    <button type="submit" name="submit_search">Search</button>
</form>

<pre>
    <?php print_r($period); ?>
</pre>


<table class="table">
    <tr>
        <th>Datums</th>
        <th>TestuSkaits</th>
        <th>ApstiprinataCOVID19InfekcijaSkaits</th>
    </tr>

    <?php foreach ($data as $v): ?>

        <tr>
            <td>
                <?php echo $v->Datums; ?>
            </td>
            <td>
                <?php echo $v->TestuSkaits; ?>
            </td>
            <td>
                <?php echo $v->ApstiprinataCOVID19InfekcijaSkaits; ?>
            </td>
        </tr>

    <?php endforeach; ?>

</table>
<br>
<form method="get" action="/">
    <?php if ($offset > 0): ?>
        <button type="submit" name="offset" value="<?php echo $offset - $limit; ?>"> << </button>
    <?php endif; ?>

    <?php if (count($data) >= $limit): ?>
        <button type="submit" name="offset" value="<?php echo $offset + $limit; ?>"> >> </button>
    <?php endif; ?>
</form>
</body>
</html>