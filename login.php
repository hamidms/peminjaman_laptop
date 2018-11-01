<?php 

    ob_start();
    session_start();

    require "function.php";
    if (@$_SESSION['Admin'] || @$_SESSION['User']) {
        header("location:index.php");
    } else {

?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Halaman Login</title>
        <link href="assets/css/bootstrap.css" rel="stylesheet" />
        <link href="assets/css/font-awesome.css" rel="stylesheet" />
        <link href="assets/css/custom.css" rel="stylesheet" />
        <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
        <style>
        
            .content{
                background-image: url("assets/img/4.png");
                background: rgb(0, 0, 0);
                background: rgba(0, 0, 0, 0.20);
            }

            body{
                background-image: url("assets/img/bg.jpg");
                background-repeat: no-repeat;
            }

            .putih{color: white;}

        </style>

    </head>
    <body>
        <div class="container">
            <div class="row" style="margin-top: 200px;"">
                <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
                   <div class="panel content">
                        <div>
                        <img src="assets/img/4.png" style="height: 60px; width: 240px; margin: auto; margin-top: 25px; " class="user-image img-responsive">
                        </div>
                        <div class="panel-body">
                            <form role="form" method="post" autocomplete="off">
                                <br />
                                 <div class="form-group input-group">
                                    <span class="input-group-addon"><i class="fa fa-tag"  ></i></span>
                                    <input type="text" class="form-control content putih" placeholder="Your Username " name="username" />
                                </div>
                                <div class="form-group input-group">
                                    <span class="input-group-addon"><i class="fa fa-lock"  ></i></span>
                                    <input type="password" class="form-control content putih"  placeholder="Your Password" name="password" />
                                </div>
                                <input type="submit" name="login" value="Login" class="btn btn-success">
                                <a href="index.php" class="btn btn-primary">Skip</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="assets/js/jquery-1.10.2.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/jquery.metisMenu.js"></script>
        <script src="assets/js/custom.js"></script>
    </body>
</html>

<?php 

    if (isset($_POST['login'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $sql = mysqli_query($koneksi, "SELECT * FROM tb_user WHERE username='$username' AND password='$password'");
        $data = mysqli_fetch_assoc($sql);
        $find = $sql->num_rows;

        if ($find >= 1) {
            if ($data['level'] == "Admin") {
                $_SESSION['Admin'] = $data['id'];
                header("location:index.php");
            } elseif ($data['level'] == "User") {
                $_SESSION['User'] = $data['id'];
                header("location:index.php");
            }
        } else {
            ?>
            <script type="text/javascript">
                alert("Login Gagal, Username atau password salah")
            </script>
            <?php
        }
    }
}

?>