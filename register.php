<?php 

    ob_start();
    session_start();

    require "function.php";
    if (@$_SESSION['Admin']) {

?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Register</title>
        <link href="assets/css/bootstrap.css" rel="stylesheet" />
        <link href="assets/css/font-awesome.css" rel="stylesheet" />
        <link href="assets/css/custom.css" rel="stylesheet" />
        <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
        <style>
            .content{
            	background: rgb(0, 0, 0);
            	background: rgba(0, 0, 0, 0.20);
            }

            body{
            	background-image: url("assets/img/bg.jpg");
            	background-repeat: no-repeat;
            }

            .putih{
            	color: white;
            }
        </style>
    </head>
    <body >
        <div class="container">
            <div class="row text-center  ">
                <div class="col-md-12">
                    <br /><br />
                    <h3>BUAT AKUN PEMINJAMAN</h3>
                    <br />
                </div>
            </div>
            <div class="row">   
                <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1 ">
                    <div class="panel content">
                        <div>
                            <img src="assets/img/4.png" style="height: 60px; width: 240px; margin: auto; margin-top: 25px; " class="user-image img-responsive">
                        </div>
                        <div class="panel-body ">
                            <form role="form" action="" method="post" autocomplete="off">
            					<br/>
                                <div class="form-group input-group">
                                    <span class="input-group-addon"><i class="fa fa-circle-o-notch"  ></i></span>
                                    <input type="text" class="form-control content putih" placeholder="Nama Peminjam" name="nama" id="nama" />
                                </div>
                             	<div class="form-group input-group">
                                    <span class="input-group-addon"><i class="fa fa-tag"  ></i></span>
                                    <input type="text" class="form-control content putih" placeholder="Username" name="username" id="username" />
                                </div>
                              	<div class="form-group input-group">
                                    <span class="input-group-addon"><i class="fa fa-lock"  ></i></span>
                                    <input type="password" class="form-control content putih" placeholder="Enter Password" name="password" id="password" />
                                </div>
                             	<div class="form-group input-group">
                                    <span class="input-group-addon"><i class="fa fa-lock"  ></i></span>
                                    <input type="password" class="form-control content putih" placeholder="Retype Password" name="password2" id="password2" />
                                </div>
                                <div class="form-group">
                                    <select class="form-control content putih" name="level">
                                        <option value="User">User</option>
                                        <option value="Admin">Admin</option>
                                    </select>
                                </div>
                                <button type="submit" name="register" class="btn btn-primary" >Daftar</button>
                                <p>Sudah Mendaftar ?  <a href="login.php" style="text-decoration-color: transparent;">Login</a></p>
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
    if (isset($_POST['register'])) {

        $nama = $_POST['nama'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $password2 = $_POST['password2'];
        $level = $_POST['level'];
        $simpan = $_POST['register'];

        if ($password = $password2) {
                
            $sql = mysqli_query($koneksi, "INSERT INTO tb_user (nama, username, password, level) VALUES ('$nama', '$username', '$password', '$level')");
            
                if ($sql) {
                    ?>

                        <script type="text/javascript">
                            alert("Data Berhasil Disimpan");
                            window.location.href="index.php";
                        </script>

                    <?php
                }
            } else {
                ?>
                <script type="text/javascript">
                    alert("Data Tidak Berhasil Disimpan");
                    window.location.href="register.php";
                </script>
                <?php 
            }
        }
    } else {
?>
    <script type="text/javascript">
        alert("Anda harus Login Sebagai Administrator");
        window.location.href="index.php";
    </script>

<?php } ?>