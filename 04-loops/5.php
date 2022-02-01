<?php
$men1 = array("name" => "Alex", "surname" => "Ulf", "age" => 50, "bday" => "15m");
$men2 = array("name" => "Oleg", "surname" => "Olg", "age" => 40, "bday" => "10a");
$men3 = array("name" => "Svet", "surname" => "Svt", "age" => 30, "bday" => "7f");
$obj = [$men1, $men2, $men3];

for ($i = 0; $i < count($obj); $i++)
{
    echo $obj[$i]['name'] . ' ' . $obj[$i]['surname'] . ' ' . $obj[$i]['bday'] . PHP_EOL;
}


//foreach ($obj as $val)
//{
//    echo $val['name'];
//}