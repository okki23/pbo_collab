<?php 
//koneksi ke database
$conn = mysqli_connect("localhost","root","", "mahasiswa");
require 'Function.php';
if(isset( $_POST["submit"]) ){
    if( $_POST["Nama"] == "" ||$_POST["NIM"] == "" ||$_POST["Jurusan"] == "" ||$_POST["Semester"] == "" ||$_POST["Email"] == ""){
        echo "
        <script>
            alert('Data Tidak Boleh kosong');
        </script>
        ";
    } else if(InsertData($_POST) > 0) {
        echo "
        <script>
            alert('Data Berhasil Diinput');
            document.location.href = 'Home.php';
        </script>
        ";
    }
     else {


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
        height: max-content;
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
    <form action="" method="post" enctype="multipart/form-data">
    <fieldset class="card">
        <legend><div class="td"><h1>Tambah Data</h1></div></legend>
        <ul type="none">
            <li>
                <label for="Foto">Foto :</label><br>
                <input type="File" name="Foto" id="Foto">
            </li>
            <li>
                <label for="Nama">Nama :</label><br>
                <input type="text" name="Nama" id="Nama" maxlength="50" placeholder="Nama Lengkap Oteyy">
            </li>
            <li>
                <label for="NIM">NIM :</label><br>
                <input type="number" name="NIM" id="NIM" onKeyPress="if(this.value.length==11 ) return false;" placeholder="11 Digit Ya Banh">
            </li>
            <li>
                <label for="Jurusan">Jurusan :</label><br>
                <input type="text" name="Jurusan" id="Jurusan" maxlength="2" placeholder="TI / SI ?">
            </li>
            <li>
                <label for="Semester">Semester :</label><br>
                <input type="number" name="Semester" id="Semester" onKeyPress="if(this.value.length==1) return false;" placeholder="Lebih dari 10 fix anak setan">
            </li>
            <li>
                <label for="Email">Email :</label><br>
                <input type="text" name="Email" id="Email" maxlength="50" placeholder="Jangan Alay emailnya banh !!">
            </li>
            <li>
                <button type="submit" name="submit" onclick="return confirm('Apakah Sudah Bener Masseh ?')">Submit</button>
                <button class="back" type="back" name="back">Back</button>
            </li>
        </ul>
    </fieldset>
    </form>
    </section>
</body>
</html>