<?php

$search = $_GET['search'] ?? '';
$limit = 30;
$offset = $_GET['offset'] ?? '0';
//$q = json_decode(file_get_contents('https://data.gov.lv/dati/lv/api/3/action/datastore_search?resource_id=25e80bf3-f107-4ab4-89ef-251b5b9374e9&limit=10'));
$q = json_decode(file_get_contents("https://data.gov.lv/dati/lv/api/3/action/datastore_search?q={$search}&offset={$offset}&resource_id=25e80bf3-f107-4ab4-89ef-251b5b9374e9&limit=30"));

$data = $q->result->records;

?>

<form method="get" action="/">
    <input name="search" />
    <button type="submit">Submit</button>
</form>

<table style="border-style: dotted">
    <tr>
        <th>Name</th>
        <th>Address</th>
        <th>Reg.N</th>>
    </tr>

    <?php foreach ($data as $i => $v): ?>

    <tr>
        <td>
            <?php echo $v->name; ?>
        </td>
        <td>
            <?php echo $v->address; ?>
        </td>
        <td>
            <?php echo $v->regcode; ?>
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