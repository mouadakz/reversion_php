<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = $_POST['email'];
    $pass = $_POST['password'];
    $pass1 = $_POST['password1'];

    if (!empty($email) && !empty($pass) && !empty($pass1)) {

        if (str_ends_with($email, "ofppt.ma")) {

            if (strlen($pass) >= 8) {

                if (preg_match("/^\d{8,}$/", $pass) &&
                    preg_match("/^\d{8,}$/", $pass1)) {

                    if ($pass === $pass1) {
                        $_SESSION['email'] = $email;
                        header("Location: functionn.php");
                        exit;
                    } else {
                        echo "password invalide";
                    }

                } else {
                    echo "entre a number";
                }

            } else {
                echo "entre 8 number";
            }

        } else {
            echo "email invalide";
        }

    } else {
        echo "entre les infor";
    }
}
?>

<form method="POST">
    <label>email:</label>
    <input type="email" name="email" ><br><br>

    <label>password:</label>
    <input type="password" name="password" ><br><br>

    <label>Confirpassword:</label>
    <input type="password" name="password1" ><br><br>

    <input type="submit" name="ok">
</form>
