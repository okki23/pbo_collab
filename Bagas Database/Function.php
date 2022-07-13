<?php 
// ambil data (fetch) siswa dari object result dengan 4 cara
// mysqli_fetch_row() // mengembalikan array numeric
// mysqli_fetch_assoc() // mengembalikan array associative
// mysqli_fetch_array() // mengembalikan keduanya mines menampilkan secara double
// mysqli_fetch_object() // menggunakan ->

// connect Database
// variabel $conn = connection
$conn = mysqli_connect("localhost","root","","mahasiswa");
function query($query){
    global $conn;
    // parameter pertama adalah koneksi, kedua adalah syntax query nya
    $result = mysqli_query($conn, $query);
    $rows = [];
    while($row = mysqli_fetch_assoc($result)){
        $rows [] = $row;
    }
    return $rows;
}

// Fungsi Untuk menambahkan data
function InsertData($data){
    // ambil data dari tiap element dalam form
    // $nama - $email adalah scope variabel local
    $gambar = upload();
    if( !$gambar){
        return false;
    };
    $nama = htmlspecialchars($data["Nama"]);
    $nim = htmlspecialchars($data["NIM"]);
    $jurusan = htmlspecialchars($data["Jurusan"]);
    $semester = htmlspecialchars($data["Semester"]);
    $email = htmlspecialchars($data["Email"]);
    //memasukan query
    // global conn adalah scope variabel global
    global $conn;
    // harus berurutan sesuai field pada table
    $query = "INSERT INTO siswa VALUES('','','$nama','$nim','$jurusan','$semester','$email')";
    mysqli_query($conn,$query);
    return mysqli_affected_rows($conn);
}

// Fungsi untuk menghapus Data
function hapus($id){
    global $conn;
    mysqli_query($conn, "DELETE FROM siswa WHERE id = $id");

    return mysqli_affected_rows($conn);
}

// Fungsi untuk mengubah Data
function ubah($data){
    global $conn;
    $id = $data["id"];

    // Upload gambar
    $nama = htmlspecialchars($data["Nama"]);
    $nim = htmlspecialchars($data["NIM"]);
    $jurusan = htmlspecialchars($data["Jurusan"]);
    $semester = htmlspecialchars($data["Semester"]);
    $email = htmlspecialchars($data["Email"]);

    // harus berurutan sesuai field pada table
    $query = "UPDATE siswa SET 
            Nama = '$nama', 
            NIM = '$nim', 
            Jurusan = '$jurusan', 
            Semester = '$semester', 
            Email = '$email' 
            WHERE id = $id ";
    mysqli_query($conn,$query);
    return mysqli_affected_rows($conn);
}

function Search($keyword){
    $query = "SELECT * FROM siswa 
    WHERE Nama LIKE '%$keyword%' OR
    NIM LIKE '%$keyword%' OR
    Jurusan LIKE '%$keyword%' OR
    Email Like '%$keyword%' ";
    //mengambil funciton query yang diatas
    return query($query);
}

function smstr($sms){
    $query = "SELECT * FROM siswa WHERE Semester LIKE '%$sms%'";

    return query($query);
}

function upload(){
    $namaFile = $_FILES['Foto']['name'];
    $ukuranfiles = $_FILES['Foto']['size'];
    $error = $_FILES['Foto']['error'];
    $tmpName = $_FILES['Foto']['tmp_name'];
    // cek apakah tidak ada gambar yang diupload
    if($error === 4){
        echo "<script>
                alert('Pilih Gambar Terlebih Dahulu')
            </script>
        ";
        return false;
    }

    // cek apakah file yang diupload adalah gambar
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if( !in_array($ekstensiGambar,$ekstensiGambarValid)){
        echo "<script>
                alert('yang anda upload bukan gambar')
            </script>
        ";
        }
    // cek jika ukuran files terlalu besar
    if($ukuranfiles > 2000000){
        echo "<script>
        alert('Ukuran gambar terlalu besar')
    </script>
    ";
    return false;
    }

    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;
    move_uploaded_file($tmpName, 'img/'. $namaFileBaru);

    return $namaFile;
}
?>

