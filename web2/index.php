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

    $prs = new Person($_POST["name"], $_POST["sname"], $_POST["pkod"]);

    try {
        $conn->insert('persons', array('person_name' => $prs->getName(), 'person_surname' => $prs->getSurname(), 'person_kod' => $prs->getPKod()));
    } catch (\Doctrine\DBAL\Exception $e) {
        echo "Error!: " . $e->getMessage() . "\n";
        die();
    }

}

if (isset($_POST['delete'])) {

    try {
        $conn->delete('persons', array('idpersons' => $_POST['id']));
    } catch (\Doctrine\DBAL\Exception $e) {
        echo "Error!: " . $e->getMessage() . "\n";
        die();
    }

}

try {
    $person = $conn->fetchAllAssociative('SELECT * FROM persons');
} catch (\Doctrine\DBAL\Exception $e) {
    echo "Error!: " . $e->getMessage() . "\n";
    die();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>SIGN UP</title>
    <link href="css/style.css" rel="stylesheet" type="text/css">
</head>
<body>

<div style="width: 50%; margin: auto">
    <h4>SIGN UP</h4>
    <div>
        <form class="form" action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
            <div class="container">
                <input type="text" placeholder="Name" name="name">
                <input type="text" placeholder="Surname" name="sname">
                <input type="text" placeholder="Person kod" name="pkod">
                <button type="submit" name="submit">SIGN UP</button>
            </div>
        </form>
    </div>
    <br>
    <div class="container">
        <table class="table">
            <tr>
                <th>Nr.</th>
                <th>Name</th>
                <th>Surname</th>
                <th>Person kode</th>
                <th>...</th>
            </tr>

            <?php
                $cnt = 0;
                foreach ($person as $val) {
                    $cnt ++;
            ?>

            <tr>
                <td>
                    <?php echo $cnt; ?>
                </td>
                <td>
                    <?php echo $val['person_name']; ?>
                </td>
                <td>
                    <?php echo $val['person_surname']; ?>
                </td>
                <td>
                    <?php echo $val['person_kod']; ?>
                </td>
                <td>
                    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
                        <input type='hidden' name='id' value='<?php echo $val['idpersons']; ?>' />
                        <button type="submit" name="delete">Delete</button>
                    </form>
                </td>
            </tr>

            <?php
                }
            ?>

        </table>

    </div>
</div>

</body>
</html>
