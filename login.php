<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="css/toastr.min.css">
<style>
body {font-family: Arial, Helvetica, sans-serif;background-color: orange;}
form {border: 3px solid #f1f1f1;
background-color: lightgrey;
  width: 300px;
  /*border: 15px solid green;*/
  padding: 50px;
  margin-top: 100px;
  margin-left: 450px;
 }

input[type=text], input[type=password] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

button {
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
}

button:hover {
  opacity: 0.8;
}

.cancelbtn {
  width: auto;
  padding: 10px 18px;
  background-color: #f44336;
}



.container {
  padding: 16px;
}

span.psw {
  float: right;
  padding-top: 16px;
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
  span.psw {
     display: block;
     float: none;
  }
  .cancelbtn {
     width: 100%;
  }
}
</style>
</head>
<body>


<form action="actionpage.php" method="post">
<h2>Login Form</h2>  

  <div class="container">
    <label for="uname"><b>Email</b></label>
    <input type="text" placeholder="Enter Email" name="email" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="password" required>
        
    <button type="submit" name="login_user">Login</button>
  </div>

  <div class="container">
     <a href="index.html"><button type="button" class="cancelbtn">Cancel</button></a>
     <a href="forgot1.php"><span class="psw">Forgot password?</a></span>
  </div>
  <a href="signin.php"><span class="psw">Not yet sign in?click here</a></span>
</form>
<script src="js/toastr.min.js"></script>
</body>
</html>
