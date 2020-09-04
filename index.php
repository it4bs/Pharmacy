<?php
	//Start session
	session_start();
	
	//Unset the variables stored in session
	unset($_SESSION['SESS_MEMBER_ID']);
	unset($_SESSION['SESS_FIRST_NAME']);
	unset($_SESSION['SESS_LAST_NAME']);
?>
<html>
<head>

<<<<<<< HEAD
	<title>POS - Pharmacy</title>
	<link rel='icon' href='./main/img/pharmacy.png'/>
=======
	<title>Medical Store System</title>
>>>>>>> 232f54eab7ba80b84f16c1c6a3f830d89a7d3e1d
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
	<link href="style.css" rel="stylesheet" id="bootstrap-css">
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<<<<<<< HEAD
	<link href="stylesheet.css" media="screen" rel="stylesheet" type="text/css" />
=======
	<link href="style.css" media="screen" rel="stylesheet" type="text/css" /> 
>>>>>>> 232f54eab7ba80b84f16c1c6a3f830d89a7d3e1d
</head>
<body>
	<div class="container h-100">
		<div class="d-flex justify-content-center h-100">
			<div class="user_card">
				<div class="d-flex justify-content-center">
					<div class="brand_logo_container">
						<img src="./main/img/download.png" class="brand_logo" alt="Logo">
					</div>
				</div>
				<div class="d-flex justify-content-center form_container">

				<div>
				<?php
						if( isset($_SESSION['ERRMSG_ARR']) && is_array($_SESSION['ERRMSG_ARR']) && count($_SESSION['ERRMSG_ARR']) >0 ) {
							foreach($_SESSION['ERRMSG_ARR'] as $msg) {
<<<<<<< HEAD
								echo $msg; 
=======
								echo '<div style="color: red; text-align: center;">',$msg,'</div><br>'; 
>>>>>>> 232f54eab7ba80b84f16c1c6a3f830d89a7d3e1d
							}
							unset($_SESSION['ERRMSG_ARR']);
						}
						?>

					<form  action="login.php" method="post" autocomplete="off">
						<div class="input-group mb-3">
							<div class="input-group-append">
								<span class="input-group-text"><i class="fas fa-user"></i></span>
							</div>
							<input type="text" name="username" class="form-control input_user" value="" placeholder="username" required='required'>
						</div>
						<div class="input-group mb-2">
							<div class="input-group-append">
<<<<<<< HEAD
								<span class="input-group-text"><i class="fas fa-lock"></i></span>
							</div>
							<input type="password" name="password" class="form-control input_pass" value="" placeholder="password" required='required'>
						</div>
						<div class="qwe">
						<button class="btn btn-large btn-primary btn-block pull-right" href="dashboard.html" type="submit"><i class="icon-signin icon-large"></i> Login</button>
						</div>
				   </form>
					</div>
					
				</div>
				<footer class="page-footer font-small blue">
					<!-- Copyright -->
					<div class="footer-copyright text-center py-3">Copyright © 2020. All Right Reserved
						<a href="https://it4bs.net/">IT4BS</a>
					</div>
					<!-- Copyright -->
				</footer>	
			</div>
			</div>
		</div>
	</div>
	
=======
								<span class="input-group-text"><i class="fas fa-key"></i></span>
							</div>
							<input type="password" name="password" class="form-control input_pass" value="" placeholder="password" required='required'>
						</div>
							<div class="qwe">
		 <button class="btn btn-large btn-primary btn-block pull-right" href="dashboard.html" type="submit"><i class="icon-signin icon-large"></i> Login</button>
</div>
				   <!-- </div> -->
					</form>
					</div>
				</div>
				</div>
			</div>
		</div>
	</div>
>>>>>>> 232f54eab7ba80b84f16c1c6a3f830d89a7d3e1d
</body>
</html>
