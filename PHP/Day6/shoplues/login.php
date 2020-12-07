<?php
	require 'frontendheader.php';
?>


	<!-- Subcategory Title -->
	<div class="jumbotron jumbotron-fluid subtitle">
  		<div class="container">
    		<h1 class="text-center text-white"> Login </h1>
  		</div>
	</div>
	
	<!-- Content -->
	<div class="container my-5">

		<div class="row justify-content-center">
			<div class="col-5">
				<!-- if login success -->
				<?php
					if(isset($_SESSION['regsuccess'])){
				?>
				<!-- alert message -->
				<div class="alert alert-success alert-dismissible fade show" role="alert">
					<h2>Congratulation</h2>
					<h5>You have successfully <span calsss="">Sign Up</span></h5>
				</div>
				
				<?php } unset($_SESSION['regsuccess']); ?>

				<!-- end login success -->

				<!-- if login fail -->
				<?php
					if(isset($_SESSION['login_fail'])){
				?>
				<!-- alert message -->
				<div class="alert alert-danger alert-dismissible fade show" role="alert">
					<h2>Oops!</h2>
					<h5>Your current email and password is invalid. <span calsss="">Tray Again</span></h5>
				</div>
				
				<?php } unset($_SESSION['login_fail']); ?>

				<!-- end login success -->

				<form action="signin.php" method="POST">
		      		<div class="form-group">
		      			<label class="small mb-1" for="inputEmailAddress">Email</label>
		      			<input class="form-control py-4" id="inputEmailAddress" type="email" placeholder="Enter email address" name="email" />
		      		</div>
		      		
		      		<div class="form-group">
		      			<label class="small mb-1" for="inputPassword">Password</label>
		      			<input class="form-control py-4" id="inputPassword" type="password" placeholder="Enter password" name="password" />
		      		</div>
		      
		      		<div class="form-group">
		          		<div class="custom-control custom-checkbox">
		          			<input class="custom-control-input" id="rememberPasswordCheck" type="checkbox" />
		          			<label class="custom-control-label" for="rememberPasswordCheck">Remember password</label>


		          		</div>

		          		<a class="small" href="#">Forgot Password?</a>

		      		</div>
		      		
		      		<div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
		        		
		        		<button type="submit" class="btn btn-secondary mainfullbtncolor btn-block">Login</button>
		      		</div>


		  		</form>

		  		<div class=" mt-3 text-center ">
		  			<a href="register.php" class="loginLink text-decoration-none">Need an account? Sign Up!</a>
		  		</div>
			</div>
		</div>
	</div>
	

<?php
	require 'frontendfooter.php';
?>
	





	