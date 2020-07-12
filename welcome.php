<?php 
session_start();

if (!isset($_SESSION['email'])) {
	header('location:login.php');
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>welcome</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	<style type="text/css">
    	.bs-example{
        	margin: 20px;
    }
</style>
</head>
<body>
	 <div class="bs-example">
    	<nav class="navbar navbar-expand-md navbar-light bg-light">
            	<img src="<?php echo $_SESSION['image']; ?>" height="60" alt="CoolBrand">
        	<button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
            	<span class="navbar-toggler-icon"></span>
        	</button>

        	<div class="collapse navbar-collapse" id="navbarCollapse">
            	<div class="navbar-nav">
	                <a href="editprofile.php" class="nav-item nav-link">Edit Profile</a>
	                <a href="changepassword.php" class="nav-item nav-link">Change Password</a>
	            </div>
	            <div style="margin-left: 200px;">
	            	Welcome <?php echo $_SESSION['name']; ?>
	            </div>
            	<div class="navbar-nav ml-auto">
                	<form class="form-inline d-flex justify-content-center md-form form-sm active-cyan-2 mt-2">
 						 <input class="form-control form-control-sm mr-3 w-75" type="text" placeholder="Search"
    					aria-label="Search">
  						<i class="fa fa-search" aria-hidden="true"></i>
					</form>
       				<a href = "logout.php" class="nav-item nav-link">Sign Out</a>
            	</div>
        	</div>
    	</nav>
	</div>
</body>
</html>
