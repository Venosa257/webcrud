<?php 
session_start();
if(!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}

include 'functions.php';

$id = $_GET['id'];
$siswa = query("SELECT * FROM siswa WHERE id = '$id' ")[0];

?>

<?php include '../layouts/header.php' ?>
<nav>
    <a href="../logout.php">Log out</a>
</nav>
<div class="center-detail">
    <img src="../img/<?= $siswa['foto'] ?>" alt="" width="250">
    <h3>NISN : <?= $siswa['NISN'] ?></h3>
    <h3>Nama : <?= $siswa['name'] ?></h3>
    <h3>Email : <?= $siswa['email'] ?></h3>
    <h3>Kelas : <?= $siswa['kelas'] . ' ' . $siswa['jurusan'] ?></h3>
</div>
<?php include '../layouts/footer.php' ?>