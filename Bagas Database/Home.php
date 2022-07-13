<?php
// require memanggil file php lain
require 'Function.php';
// menjadi array assoc yang mengarah pada table database
$siswa = query("SELECT * FROM siswa");
//tombol cari
if (isset($_POST["mencari"])) {
    $siswa = Search($_POST["keyword"]);
}

if (isset($_POST["sortsms"])) {
    $siswa = smstr($_POST["smstr"]);
}
// melakukan reset tabel
if (isset($_POST["reset"])){
    $siswa = query("SELECT * FROM siswa");
}
// melakukan query descending dengan tombol
if (isset($_POST["desc"])){
    $siswa = query("SELECT * FROM siswa ORDER BY Semester DESC");
}
// melakukan query ascending dengan tombol
if (isset($_POST["asc"])){
    $siswa = query("SELECT * FROM siswa ORDER BY Semester ASC");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Style.css">
    <style>
        .sort {
            float: right;
            margin-bottom: 10px;
            margin-right: 55px;
            clear: both;
        }

        button {
            padding: 3px 8px 3px 8px;
            margin-left: 10px;
        }

        .s {
            margin-left: 55px;
        }

        .srch {
            margin-left: 10px;
            height: 17px;
            width: 130px;
        }

        .srch1 {
            margin-left: 20px;
            width: 30px;
            height: 17px;
        }

        input:focus {
            background-color: rgba(127, 255, 212, 0.445);
        }
    </style>

    <title>Data Base</title>
</head>

<body>
    <section>
        <fieldset class="form">
            <legend>
                <h1 class="h1">Data Mahasiswa</h1>
            </legend>
            <form action="" method="post">
                <button class="s" type="submit" name="mencari">Cari</button>
                <input class="srch" type="text" name="keyword" autofocus placeholder="Cari Apasih bang ??" autocomplete="off">
                <button type="submit" name="sortsms">Semester</button>
                <input class="srch1" type="number" name="smstr" size="10" autocomplete="off">
                <button type="submit" name="desc" title="Descending">^</button>
                <button type="submit" name="asc" title="Ascending">v</button>              
                <div class="sort">
                    <button type="Tambah" name="Tambah" title="Tambah Data Mahasiswa"><a href="insert.php">Tambah</a></button>
                    <button type="submit" name="reset" title="Kembalikan Table Kesemula">Reset</button>
                    <button title="Tidur bang Besok Gawe" onclick="return confirm('CIEE CAPE YA BANG')"><a href="index.php">Logout</a></button>
                </div>
            </form>
            <form action="" method="$_POST" enctype="multipart/form-data">
                <table border="1" cellpadding="10">
                    <tr>
                        <th>No</th>
                        <th>Foto</th>
                        <th>Nama</th>
                        <th>NIM</th>
                        <th>Jurusan</th>
                        <th>Semester</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                    <?php $no = 1; ?>
                    <!-- $siswa adalah nama table pada database -->
                    <!-- $row adalah filed didalam tablenya lihat ke function.php -->
                    <?php foreach ($siswa as $row) : ?>
                        <tr>
                            <td><?= $no ?></td>
                            <td><img src="./img/<?= $row["Foto"] ?>" alt=""></td>
                            <td><?= $row["Nama"] ?></td>
                            <td><?= $row["NIM"] ?></td>
                            <td><?= $row["Jurusan"] ?></td>
                            <td><?= $row["Semester"] ?></td>
                            <td><?= $row["Email"] ?></td>
                            <td>
                                <a href="Ubah.php?id=<?= $row["id"] ?>">Ubah</a> |
                                <a href="Hapus.php?id=<?= $row["id"]; ?>" onclick="return confirm('Ah yang bener ?')">Hapus</a>
                            </td>
                        </tr>
                        <?php $no++; ?>
                    <?php endforeach; ?>
                </table>
            </form>
        </fieldset>
    </section>
</body>

</html>