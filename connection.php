<?php
//$conn=mysqli_connect("localhost","id14066933_dipro21","Dip@12345678");
//mysqli_select_db($conn,"id14066933_dipro");
$name=$_POST['name'];
$email=$_POST['email'];
$message=$_POST['message'];
//echo($name.$email);

$to=$email;
$from="dipronildas8961228208@gmail.com";
$sub=$name."  Thanks for visiting............";
$body=$message;

//$reg="insert into user(name,email,password,confirmpassword) values('$name','$email','$pass','$pass1')";
//mysqli_query($con,$reg);

mail($to,$from, $sub, $body);
header("location:contact.html")
?>