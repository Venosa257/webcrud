<?php 
session_start();

if(isset($_SESSION['login'])) {
    header("Location: index.php");
    exit;
}


include 'func/functions.php' ;

if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $result = mysqli_query($conn, "SELECT * FROM admin WHERE username = '$username'");

    if (mysqli_num_rows($result) === 1 ) {
        $_SESSION['login'] = true;
        
        $row = mysqli_fetch_assoc($result);
        if ($password == $row['password']) {
            header('Location: index.php');
            exit;
        }
    }
}

?>


<?php include 'layouts/header.php' ?>


<div class="login">

    <form action="" method="post">
        <h2>HALAMAN LOGIN</h2>
        <ul class="list-login">
            <li>
                <label for="username">Username : </label>
                <input type="text" name="username" placeholder="Username" class="input-login">
            </li>
            <li>
                <label for="password">Password : </label>
                <input type="password" name="password" placeholder="Password" class="input-login">
            </li>
            <li>
                <input type="submit" value="login" name="login" class="login-button">
            </li>
        </ul>

    </form>
</div>

<?php include 'layouts/footer.php' ?>