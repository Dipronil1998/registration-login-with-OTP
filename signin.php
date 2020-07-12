<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">

<style>
body {font-family: Arial, Helvetica, sans-serif;background-color: orange;}
form {border: 3px solid #f1f1f1;
background-color: lightgrey;
  width: 300px;
  /*border: 15px solid green;*/
  padding: 50px;
  margin-top: 50px;
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
<h2>Signup Form</h2>  

  <div class="container">
    <label for="uname"><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="username" required>

    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Enter Email" name="email" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="password" required>

    <label for="rpsw"><b>Repeat Password</b></label>
    <input type="password" placeholder="Enter Repeat Password" name="repeatpassword" required>
        
    <button type="submit" name="reg_user">Sign in</button>
  </div>

  <div class="container">
     <a href="index.html"><button type="button" class="cancelbtn">Cancel</button></a>
  </div>
  <a href="login.php"><span class="psw">Already sign up?click here</a></span>
</form>
</body>
</html>
