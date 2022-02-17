<?php

require_once 'vendor/autoload.php';

use App\Person;
use Doctrine\DBAL\DriverManager;

$connectionParams = array(
    'dbname' => 'ooplogin',
    'user' => 'root',
    'password' => 'root1234',
    'host' => 'localhost',
    'driver' => 'pdo_mysql',
);

try {
    $conn = DriverManager::getConnection($connectionParams);
} catch (\Doctrine\DBAL\Exception $e) {
    echo "Error!: " . $e->getMessage() . "\n";
    die();
}

if (isset($_POST["submit"])) {

    $name = $_POST["name"];
    $sName= $_POST["sname"];
    $pKod = $_POST["pkod"];

    $prs = new Person($name, $sName, $pKod);

    try {
        $conn->insert('persons', array('person_name' => $prs->getName(), 'person_surname' => $prs->getSurname(), 'person_kod' => $prs->getPKod()));
    } catch (\Doctrine\DBAL\Exception $e) {
        echo "Error!: " . $e->getMessage() . "\n";
        die();
    }

}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body {font-family: Arial, Helvetica, sans-serif;}
        form {border: 3px solid #f1f1f1;}

        input[type=text], input[type=password] {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }

        button {
            background-color: #04AA6D;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
            width: 100%;
        }

        button:hover {
            opacity: 0.8;
        }

        .container {
            padding: 16px;
        }

        span.psw {
            float: right;
            padding-top: 16px;
        }

        /* Change styles for span and cancel button on extra small screens */
        @media screen and (max-width: 300px) {
            span.psw {
                display: block;
                float: none;
            }
        }
    </style>
</head>
<body>

<div style="display: flex;">
    <div>
        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
            <div class="container">
                <input type="text" placeholder="Name" name="name">
                <input type="text" placeholder="Surname" name="sname">
                <input type="text" placeholder="Person kod" name="pkod">
                <button type="submit" name="submit">SIGN UP</button>
            </div>
        </form>
    </div>
    <div>
<!--        <form action="app/login.php" method="post">-->
<!--            <div class="container">-->
<!--                <input type="text" placeholder="Username" name="uid" required>-->
<!--                <input type="password" placeholder="Password" name="pwd" required>-->
<!--                <button type="submit" name="submit">LOGIN</button>-->
<!--            </div>-->
<!--        </form>-->
    </div>
</div>

</body>
</html>
