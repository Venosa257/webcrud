<?php

$conn = mysqli_connect('localhost','root','','phpcrud');

function query($query){
    global $conn;
    $result = mysqli_query($conn,$query);
    $rows = [];
    while( $row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
    }
    return $rows;
};
function create($data) {
    
    global $conn;

    $name = $data['name'];
    $email = $data['email'];
    $jurusan = $data['jurusan'];
    $kelas = $data['kelas'];
    $gambar = upload();
    $nisn = $data['nisn'];

    $query = "INSERT INTO siswa
    VALUES ('', '$gambar', '$name', '$email','$kelas', '$jurusan', '$nisn')";

    mysqli_query($conn,$query);

    return mysqli_affected_rows($conn);

}

function update($data) {
    global $conn;

    $id = $data['id'];
    $name = $data['name'];
    $email = $data['email'];
    $jurusan = $data['jurusan'];
    $kelas = $data['kelas'];
    $nisn = $data['nisn'];
    $gambarLama = $data['oldImage'];
    
    if ($_FILES['image']['error'] === 4) {
        $gambar = $gambarLama;
    } else {
        $gambar = upload();
        unlink('../img/'. $gambarLama);
    }


    $query = "UPDATE siswa SET
                                name ='$name',
                                email ='$email',
                                jurusan = '$jurusan',
                                kelas = '$kelas',
                                nisn = '$nisn',
                                foto = '$gambar'
                                WHERE id = '$id'";
                            
    mysqli_query($conn,$query);

    return mysqli_affected_rows($conn);
}

function drop($id){
    global $conn;
    $data = query("SELECT * FROM siswa WHERE id = '$id'")[0];
    $gambar = $data['foto'];
    
    unlink('../img/'.$gambar);

    mysqli_query($conn,"DELETE FROM siswa WHERE id = '$id' ");

    return mysqli_affected_rows($conn);
}

function upload(){
    $namaFile = $_FILES['image']['name'];
    $ukuranFile = $_FILES['image']['size'];
    $error = $_FILES['image']['error'];
    $tmpName = $_FILES['image']['tmp_name'];
    
    if($error === 4){
        echo "<script>
        alert('pilih gambar terlebih dahulu!');
        </script>";
        return false;
    }

    
    $ekstensiGambar = explode('.',$namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));


    if($ukuranFile > 3000000){
        echo "<script>
                    alert('ukuran gambar terlalu besar!');
                </script>";
        return false;
    }

    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;
    move_uploaded_file($tmpName,'../img/'. $namaFileBaru);
    
     return $namaFileBaru;
}

function cari($keyword){
    $query = "SELECT * FROM siswa
                WHERE 
                name LIKE '%$keyword%' OR
                kelas LIKE '%$keyword%' OR
                jurusan LIKE '%$keyword%'";

    return query($query);
}