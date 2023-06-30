<?php 
session_start();
require_once 'app/functions/main-function.php';
require_once 'app/functions/alert.php';

if ($_SESSION['login'] == true) {
  header("Location: app/views/dashboard/");
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Pendataan Warga | Login</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<body>

<section class="vh-100 gradient-custom">
<?php 

// ALERT


// var_dump($_SESSION);

if (isset($_POST['login'])) {
	$username = $_POST['username'];
	$password = $_POST['password'];

	$user = query("SELECT * FROM users WHERE username='$username'");
	//cek usernmae
	if (!empty($user)) {
		//cek pass
		if (strcmp($user[0]['password'], $password) === 0) {
      $_SESSION['login'] = true;
			$_SESSION['id-user'] = $user[0]['id_user'];
			$_SESSION['nama'] = $user[0]['nama_lengkap'];
			$_SESSION['berhasil'] = true;
			$_SESSION['level'] = $user[0]['level_user'];
			header("Location: app/views/dashboard/");
		}else{
      $_SESSION['gagal_login'] = true;
      $_SESSION['kesalahan'] = 'Password Salah';
    }
	}else{
    $_SESSION['gagal_login'] = true;
    $_SESSION['kesalahan'] = 'Username Tidak Terdaftar';
  }

} 

// alert 


?>
  <div class="container py-5 h-100">
    <?php 
        if (isset($_SESSION['gagal_login'])) {
          alertFailedLogin($_SESSION['kesalahan']);
          unset($_SESSION['gagal_login']);
          unset($_SESSION['kesalahan']);
        }

     ?>
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card bg-dark text-white" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">
           
            <div class="mb-md-5 mt-md-4 pb-5">

              <h2 class="fw-bold mb-2 text-uppercase">Login</h2>
              <p class="text-white-50 mb-5">Please enter your login and password!</p>

              <form action="" method="POST">
              <div class="form-outline form-white mb-4">
                <label class="form-label" for="text">Username</label>
                <input type="text" id="text" class="form-control form-control-lg" name="username" required />
              </div>

              <div class="form-outline form-white mb-4">
                <label class="form-label" for="typePasswordX">Password</label>
                <input type="password" id="typePasswordX" class="form-control form-control-lg" name="password" required/>
              </div>

              <p class="small mb-5 pb-lg-2"><a class="text-white-50" href="#!">Forgot password?</a></p>

              <button class="btn btn-outline-light btn-lg px-5" type="submit" name="login">Login</button>
              </form>
              
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
</body>
</html>