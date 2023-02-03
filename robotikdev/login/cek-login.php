<?php
session_start();
$error = false;
include('function.php');
$username = $_POST['username'];
$password = md5($_POST['password']);
echo $username;


$foto = query("SELECT foto FROM tb_admin WHERE username = '$username'");          

$query_login = mysqli_query($conn, "SELECT * FROM tb_admin WHERE username='$username' AND password ='$password'");
    if (mysqli_num_rows($query_login) > 0) {
        $data = mysqli_fetch_array($query_login);
            $_SESSION['username'] = $data['username'];
            $_SESSION['password'] = $data['password'];
            $_SESSION['foto'] = $foto;
            header("Location: ../admin/adm-home.php");
    }  else {
        echo "
                <script>
                alert('Login gagal! Username atau Password salah.');
                document.location.href = '../index.php';
                </script>
            ";
    }
 
?>