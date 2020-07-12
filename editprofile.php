<?php 
session_start();

if (!isset($_SESSION['email'])) {
    header('location:login.php');
}
?>

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


<form action="actionpage.php" method="post" enctype="multipart/form-data">
    <h2>Edit Profile</h2>  

  <div class="container">
    <label for="uname"><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="username" value="<?php echo $_SESSION['name'];?>">

    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Enter Email" name="email" value="<?php echo $_SESSION['email'];?>" readonly>

     
    <input type="file" name="image" id="image">

    <button type="submit" name="editprofile">Update</button>
  </div>

  <div class="container">
     <a href="welcome.php"><button type="button" class="cancelbtn">Cancel</button></a>
  </div>

</form>
</body>
</html>
