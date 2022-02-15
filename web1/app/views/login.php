<?php
//namespace App\Views;

if (isset($_POST["submit"])) {

    $uid = $_POST["uid"];
    $pwd= $_POST["pwd"];

    // Instantiate SignupCContr class
    include "../models/Dbh.php";
    include "../models/LoginModel.php";
    include "../controllers/LoginContr.php";
    $login = new LoginContr($uid, $pwd);

    // Running error handlers and user signup
    $login->loginUser();

    // Going back to front page
    header("location: ../../index.php?error=none");


}
