<!DOCTYPE html>
<html lang="en">
<?php
if (isset($_POST["submit"])) {
    if ($_POST["username"] == "" || $_POST["password"] == "") {
        $Kosong = true;
    } else if ($_POST["username"] != "bagas" || $_POST["password"] != "admin") {
        $Salah = true;
    } else if ($_POST["username"] == "bagas" || $_POST["password"] == "admin") {
        header("Location: Home.php");
        exit;
    } else {
        echo "<meta http-equiv='refresh' content='0'>";
    }
}
?>

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="Login.css" />
    <title>Login</title>
    <style>
        .form {
            background: transparent;
        }

        input {
            margin-left: 20px;
            border-radius: 5px;
            border-color: #4000d6;
            height: 25px;
            margin-top: 10px;
            margin-bottom: 10px;
            width: 80%;
            background: transparent;
        }
    </style>
</head>

<body>
    <section>
        <img class="well" src="./img/Desain-tanpa-judul-unscreen.gif">
        <img class="bgp1" src="./img/bgp1.png">
        <img class="bgp2" src="./img/bgp2.png">
        <figure><img class="program" src="./img/Program.png"></figure>
        <div><img class="foot" src="./img/img2.png"></div>
        <div></div>
        <form action="" method="post" class="form">
            <fieldset class="card1">
                <legend>
                    <div class="div1">
                        <h4>LOGIN</h4>
                    </div><img class="img" src="./Image/coding.png" alt="">
                </legend>
                <label class="l1" for="username">Username</label>
                <input placeholder=" " type="text" name="username" id="username" title="Masukkan Username" maxlength="5" /><br>
                <label class="l2" for="password">Password</label>
                <input placeholder=" " type="password" name="password" id="password" title="Masukkan Password" onKeyPress="if(this.value.length==5 ) return false;" /><br>
                <?php
                if (isset($Kosong)) : ?>
                    <p class="p"> Username / Password Kosong</p>
                <?php endif; ?>
                <?php
                if (isset($Salah)) : ?>
                    <p class="p"> Username / Password Salah</p>
                <?php endif; ?>
                <button type="submit" name="submit">Login</button>

            </fieldset>
    </section>
    </form>
</body>
</hs