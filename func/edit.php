<?php
session_start();
if(!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}

    require_once 'functions.php';

if(isset($_POST['submit'])) {

    if(update($_POST) > 0) {
        echo '<script>
        alert("Data has been updated!");
        document.location.href = "../index.php";
        </script>';
        
    } else {
        echo '<script>
        alert("Data has not been updated!");
        document.location.href = "../index.php";
        </script>';
    }
    
}
    $id = $_GET['id'];
    $row = query("SELECT * FROM siswa WHERE id = '$id'")[0];
    
?>

<?php include '../layouts/header.php' ?>

<nav>
    <a href="../logout.php">Log out</a>
</nav>
<h1 style="text-align:center">UPDATE DATA</h1>
<form class="form" action="" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?= $row['id']?>">
    <input type="hidden" name="oldImage" value="<?= $row['foto'] ?>">
    <ul class="tambah-list">
        <li>
            <label class="form-label" for="name">Name : </label>
            <input class="form-control" type="text" name="name" placeholder="Nama" value="<?= $row['name']?>" required>
            <br>
        </li>
        <li>
            <label class="form-label" for="email">Email : </label>
            <input class="form-control" type="text" name="email" placeholder="Email" value="<?= $row['email']?>"
                required><br>
        </li>
        <li>
            <label class="form-label" for="nisn">NISN : </label>
            <input class="form-control" type="number" name="nisn" placeholder="NISN" value="<?= $row['NISN']?>"
                required><br>
        </li>
    </ul>
    <ul class="tambah-list">
        <li>
            <label class="form-label" for="kelas">Kelas : </label>
            <select class="form-select form-select-sm" name="kelas" required>
                <option value="" selected>Pilih kelas</option>
                <option value="X" <?php if($row['kelas'] == 'X' ) { echo 'selected'; }?>>X</option>
                <option value="XI" <?php if($row['kelas'] == 'XI' ) { echo 'selected'; }?>>XI</option>
                <option value="XII" <?php if($row['kelas'] == 'XII' ) { echo 'selected'; }?>>XII</option>
            </select>
        </li>
        <li style="margin-top:12px">
            <label class="form-label" for="jurusan">Jurusan : </label>
            <select class="form-select form-select-sm" name="jurusan" required>
                <option value="" selected>Pilih jurusan</option>
                <option value="RPL" <?php if($row['jurusan'] == 'RPL' ) { echo 'selected'; }?>>RPL</option>
                <option value="TKJ" <?php if($row['jurusan'] == 'TKJ' ) { echo 'selected'; }?>>TKJ</option>
                <option value="AKL" <?php if($row['jurusan'] == 'AKL' ) { echo 'selected'; }?>>AKL</option>
                <option value="MM" <?php if($row['jurusan'] == 'MM' ) { echo 'selected'; }?>>MM</option>
                <option value="OTKP" <?php if($row['jurusan'] == 'OTKP' ) { echo 'selected'; }?>>OTKP</option>
                <option value="PSPT" <?php if($row['jurusan'] == 'PSPT' ) { echo 'selected'; }?>>PSPT</option>
            </select>
        </li>
    </ul>

    <ul>
        <li>

            <label class="form-label" for="image">Gambar : </label>
            <input class="form-control" type="file" name="image" id="image" accept="image/*"
                onchange="previewImage()"><br>
            <img src="../img/<?= $row['foto'] ?>" alt="Empty Image" width="150" id="preview">
        </li>
        <li>
            <input class="submit" type="submit" value="Update data" name="submit">
        </li>
    </ul>
</form>

<?php include '../layouts/footer.php' ?>