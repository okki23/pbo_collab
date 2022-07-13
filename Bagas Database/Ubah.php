<?php 
//koneksi ke database
$conn = mysqli_connect("localhost","root","", "mahasiswa");
require 'Function.php';
//ambil data di url
$id = $_GET["id"];
$siswa = query("SELECT * FROM siswa where id = $id")[0];

if(isset( $_POST["submit"]) ){
    if(ubah($_POST) > 0) {
        echo "
        <script>
            alert('Data Berhasil Diubah');
            document.location.href = 'Home.php';
        </script>
        ";
    } else {
        echo "
        <script>
            alert('Data Gagal Diubah');
            document.location.href = 'Home.php';
        </script>
        ";
    }

}

if(isset($_POST["back"]) ){
    header("Location: Home.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Style.css">
    <title>Input Data</title>
    <style>
    .card {
        box-sizing: border-box;
        background-color: rgba(240, 248, 255, 0.76);
        width: 300px;
        height: 370px;
        margin: auto;
        margin-top: 100px;
        border-radius: 30px;
        padding: 10px;
        border: solid;
        border-color: #7628db00;
        position: relative;
    }
    section {
        height: 530px;
    }
    .td{
        background-color: yellowgreen;
        padding: 4px 8px 4px 8px;
        border-radius: 10px;
    }
    h1{
        margin: 0px 0px 0px 0px;
    }
    input{
        margin-top: 5px;
        margin-bottom: 5px;
        width: 80%;
    }
    button{
        padding: 3px 8px 3px 8px;
        margin-top: 10px;
        margin-right: 40px;
        float: right;
    }
    .back{
        margin-right: 10px;
    }
    </style>
</head>
<body>
    <section>
    <form action="" method="post">
    <fieldset class="card">
        <legend><div class="td"><h1>Update Data</h1></div></legend>
        <ul type="none">
            <input type="Hidden" name="id" value="<?= $siswa["id"]?>">
            <li>
                <label for="Nama">Nama :</label><br>
                <input type="text" name="Nama" id="Nama" maxlength="50" value="<?= $siswa["Nama"]?>">
            </li>
            <li>
                <label for="NIM">NIM :</label><br>
                <input type="number" name="NIM" id="NIM" maxlength="11" value="<?= $siswa["NIM"]?>">
            </li>
            <li>
                <label for="Jurusan">Jurusan :</label><br>
                <input type="text" name="Jurusan" id="Jurusan" maxlength="2" value="<?= $siswa["Jurusan"]?>">
            </li>
            <li>
                <label for="Semester">Semester :</label><br>
                <input type="number" name="Semester" id="Semester" maxlength="1" value="<?= $siswa["Semester"]?>">
            </li>
            <li>
                <label for="Email">Email :</label><br>
                <input type="text" name="Email" id="Email" maxlength="20" value="<?= $siswa["Email"]?>">
            </li>
            <li>
                <button type="submit" name="submit" onclick="return confirm('Yang Bener Masseh ?')">Ubah</button>
                <button class="back" type="back" name="back">Back</button>
            </li>
        </ul>
    </fieldset>
    </form>
    </section>
</body>
</html>