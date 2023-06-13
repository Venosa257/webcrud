<?php 


session_start();
if(!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}

include 'func/functions.php';

$siswa = query("SELECT * FROM siswa");

if(isset($_POST["cari"])){
    $siswa = cari($_POST["keyword"]);
}
?>

<?php include 'layouts/header.php' ?>
<nav>
    <a href="logout.php">Log out</a>
</nav>
<div class="center">
    <h1>DAFTAR SISWA</h1>
    <a href="func/create.php">
        <div class='tambah'>Tambah Data</div>
    </a>
    <form action="" method="post">
        <input style="width:240px; display: inline; margin-right:10px;" class="form-control" type="text" name="keyword"
            autofocus placeholder="masukkan keyword pencari.." autocomplete="off" id="keyword">
        <button class="submit" type="submit" name="cari" id="tombol-cari">Cari!</button>
    </form>
    <br><br>
    <table>
        <tr>
            <th>No.</th>
            <th>Foto</th>
            <th>Nama</th>
            <th>Kelas</th>
            <th>Jurusan</th>
            <th>Aksi</th>
        </tr>
        <?php $i = 1; ?>
        <?php foreach($siswa as $row) : ?>
        <tr>
            <td><?= $i ?></td>
            <td><img src="img/<?= $row['foto'] ?>" alt="<?= $row['foto'] ?>" width="120"></td>
            <td><?= $row['name'] ?></td>
            <td><?= $row['kelas'] ?></td>
            <td><?= $row['jurusan'] ?></td>
            <td>
                <a href="func/detail.php?id=<?= $row['id'] ?>"> <i class="icons view" data-feather="eye"></i></a>
                <a href="func/edit.php?id=<?= $row['id'] ?>"> <i class="icons edit" data-feather="edit"></i></a>
                <a href="func/delete.php?id=<?= $row['id'] ?>" onclick="return confirm('Hapus?')"> <i
                        class="icons delete" data-feather="x"></i></a>
            </td>
        </tr>
        <?php $i += 1 ?>
        <?php endforeach; ?>
    </table>
</div>
<?php include 'layouts/footer.php' ?>