<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Login</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <style>
        body {
            padding-top: 95px;
        }
    </style>
</head>

<body class="bg-gradient-primary">
    <div class="container">
        <!-- Outer Row -->
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-12 col-md-9">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-md">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                    </div>
                                    <?php
                                    //Fungsi untuk mencegah inputan karakter yang tidak sesuai
                                    function input($data)
                                    {
                                        $data = trim($data);
                                        $data = stripslashes($data);
                                        $data = htmlspecialchars($data);
                                        return $data;
                                    }
                                    //Cek apakah ada kiriman form dari method post
                                    if ($_SERVER["REQUEST_METHOD"] == "POST") {

                                        include("config/connect.php");
                                        $username = input($_POST["username"]);
                                        $p = input(md5($_POST["password"]));

                                        $sql = "select * from users where username='" . $username . "' and password='" . $p . "' limit 1";
                                        $hasil = mysqli_query($koneksi, $sql);
                                        $jumlah = mysqli_num_rows($hasil);

                                        if ($jumlah > 0) {
                                            $row = mysqli_fetch_assoc($hasil);
                                            $_SESSION["id_user"] = $row["id_user"];
                                            $_SESSION["username"] = $row["username"];
                                            $_SESSION["nama"] = $row["nama"];
                                            $_SESSION["email"] = $row["email"];
                                            $_SESSION["level"] = $row["level"];

                                            if ($_SESSION["level"] = $row["level"] == 1) {
                                                header("Location: admin/index.php");
                                            } else if ($_SESSION["level"] = $row["level"] == 2) {
                                                header("Location:index.php");
                                            } else if ($_SESSION["level"] = $row["level"] == 3) {
                                                header("Location:index.php");
                                            }
                                        } else {
                                            echo "<div class='alert alert-danger'><strong>Error!</strong> Username dan password salah. </div>";
                                        }
                                    }
                                    ?>
                                    <form class="user" method="POST" action="login.php">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" id="exampleInputUsername" name="username" aria-describedby="usernameHelp" placeholder="Username" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" id="exampleInputPassword" name="password" placeholder="Password" required>
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                                <label class="custom-control-label" for="customCheck">Remember Me</label>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-user btn-block" name="submit">Login</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>