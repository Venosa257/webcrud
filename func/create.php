<?php
session_start();
if(!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}

    require_once 'functions.php';
if(isset($_POST['submit'])) {

    if(create($_POST) > 0) {
        echo '<script>
        alert("Data has been inserted!");
         document.location.href = "../index.php";
        </script>';
        
    } else {
        echo '<script>
        alert("failed");
        document.location.href = "../index.php";
        </script>';
    }
    
}
?>
<?php include '../layouts/header.php' ?>
<nav>
    <a href="../logout.php">Log out</a>
</nav>
<h1 style="text-align:center">TAMBAH DATA</h1>
<form class="form" action="" method="post" enctype="multipart/form-data">

    <ul class="tambah-list">
        <li>
            <label class="form-label" for="name">Name : </label>
            <input class="form-control" type="text" name="name" placeholder="Nama" required> <br>
        </li>
        <li>
            <label class="form-label" for="email">Email : </label>
            <input class="form-control" type="text" name="email" placeholder="Email" required><br>
        </li>
        <li>
            <label class="form-label" for="nisn">NISN : </label>
            <input class="form-control" type="number" name="nisn" placeholder="NISN" required><br>
        </li>
    </ul>
    <ul class="tambah-list">
        <li>
            <label class="form-label" for="kelas">Kelas : </label>
            <select class="form-select form-select-sm" name="kelas" required>
                <option value="" selected>Pilih kelas</option>
                <option value="X">X</option>
                <option value="XI">XI</option>
                <option value="XII">XII</option>
            </select>
        </li>
        <li style="margin-top:12px">
            <label class="form-label" for="jurusan">Jurusan : </label>
            <select class="form-select form-select-sm" name="jurusan" required>
                <option value="" selected>Pilih jurusan</option>
                <option value="RPL">RPL</option>
                <option value="TKJ">TKJ</option>
                <option value="AKL">AKL</option>
                <option value="MM">MM</option>
                <option value="OTKP">OTKP</option>
                <option value="PSPT">PSPT</option>
            </select>
        </li>
    </ul>

    <ul>
        <li>

            <label class="form-label" for="image">Gambar : </label>
            <input class="form-control" type="file" name="image" id="image" accept="image/*" onchange="previewImage()"
                required><br>
            <img src="../image/empty.jpg" alt="Empty Image" width="150" id="preview">
        </li>
        <li>
            <input class="submit" type="submit" value="submit" name="submit">
        </li>
    </ul>
</form>
<?php include "../layouts/footer.php" ?>