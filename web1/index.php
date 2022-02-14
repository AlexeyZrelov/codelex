<?php

session_start();

?>

<!DOCTYPE html>
<html>
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
  .cancelbtn {
            width: 100%;
        }
}
</style>
</head>
<body>

<h2>Login Form</h2>

<div style="display: flex;">
    <div>
        <form action="app/views/signup.php" method="post">
            <div class="container">
                <input type="text" placeholder="Username" name="uid" required>
                <input type="password" placeholder="Password" name="pwd" required>
                <input type="password" placeholder="Repeat password" name="pwdrepeat" required>
                <input type="text" placeholder="E-mail" name="email" required>
                <button type="submit" name="submit">SIGN UP</button>
            </div>
        </form>
    </div>
    <div>
        <form action="app/views/login.php" method="post">
            <div class="container">
                <input type="text" placeholder="Username" name="uid" required>
                <input type="password" placeholder="Password" name="pwd" required>
                <button type="submit" name="submit">LOGIN</button>
            </div>
        </form>
    </div>
</div>

</body>
</html>
