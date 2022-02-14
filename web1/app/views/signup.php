<?php
//namespace App\Views;

if (isset($_POST["submit"])) {

    $uid = $_POST["uid"];
    $pwd= $_POST["pwd"];
    $pwdRepeat = $_POST["pwdrepeat"];
    $email = $_POST["email"];

    // Instantiate SignupCContr class
    include "../models/Dbh.php";
    include "../models/SignupModel.php";
    include "../controllers/SignupContr.php";
    $signup = new SignupContr($uid, $pwd, $pwdRepeat, $email);

    // Running error handlers and user signup
    $signup->signupUser();

    // Going back to front page
    header("location: ../../index.php?error=none");

}