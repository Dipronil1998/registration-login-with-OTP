<?php
session_start();
$con=mysqli_connect('localhost','root','');
mysqli_select_db($con,'test');

if (isset($_POST['reg_user'])) {
	$name=$_POST['username'];
	$email=$_POST['email'];
	$pass=$_POST['password'];
	$pass1=$_POST['repeatpassword'];

	$pass=md5($pass);
	$pass1=md5($pass1);

	$_SESSION['email']=$email;
	$_SESSION['name']=$name;
	$s="select * from user1 where email='$email'";

	$result=mysqli_query($con,$s);

	$num=mysqli_num_rows($result);

	if($num==1){
		echo "<script>alert('Email already register');location.href='signin.php'</script>";
	}	
	else
	{
		if($pass==$pass1){
			$reg="insert into user1(name,email,password,confirmpassword) values('$name','$email','$pass','$pass1')";
			mysqli_query($con,$reg);
			$rand=rand(100000,999999);
			$update="update user1 set otp='$rand' where email='$email'";
			mysqli_query($con,$update);
			mail($email, "OTP",$rand);
			header("location: otp1.php");
		}else{
			echo "<script>alert('OTP is not match');location.href='signin.php'</script>";
		}
	}
}


if (isset($_POST['login_user'])) {	
	$email=$_POST['email'];
	$pass=$_POST['password'];

	$pass=md5($pass);

	$s="select * from user1 where email='$email' && password='$pass'";


	$result=mysqli_query($con,$s);

	$num=mysqli_num_rows($result);


	if($num==1){
		$_SESSION['email']=$email;
		$s="select * from user1 where email='$email'";
		$result=mysqli_query($con,$s);
		$row=mysqli_fetch_assoc($result);
		$name=$row['name'];
		$_SESSION['name']=$name;
		$image=$row['image'];
		$_SESSION['image']=$image;
		//mail($email, "Thanks for login"," log in Successfully");
		header("location: welcome.php");
	}	
	else
	{
		echo "<script>alert('Email and Password does not match');location.href='login.php'</script>";
	}


}

if (isset($_POST['otp_reg'])) {
	$otp=$_POST['otp'];
	$email=$_POST['email'];
	$s="select * from user1 where email='$email'";
	$result=mysqli_query($con,$s);
	$row=mysqli_fetch_assoc($result);
	$otp1=$row['otp'];
	if($otp==$otp1)
	{
		$s="select * from user1 where email='$email'";
		$result=mysqli_query($con,$s);
		$row=mysqli_fetch_assoc($result);
		$image=$row['image'];
		$_SESSION['image']=$image;
		echo $_SESSION['image'];
		//mail($email, "Registration Successfully", "Your registration successfully done");
		header("location: welcome.php");
	}else{
		echo "<script>alert('otp does not match');location.href='otp1.php'</script>";
	}
}

if (isset($_POST['forgot1'])) {
	$email=$_POST['email'];
	session_start();
	$_SESSION['email']=$email;
	$rand=rand(100000,999999);
	$update="update user1 set otp='$rand' where email='$email'";
	mysqli_query($con,$update);
	mail($email, "OTP",$rand);
	header("location: forgot2.php");
}

if (isset($_POST['forgot2'])) {
	$email=$_POST['email'];
	$otp=$_POST['otp'];
	$pass=$_POST['password'];
	$pass1=$_POST['repeatpassword'];
	$pass=md5($pass);
	$pass1=md5($pass1);
	$s="select * from user1 where email='$email'";
	$result=mysqli_query($con,$s);
	$row=mysqli_fetch_assoc($result);
	$otp1=$row['otp'];
	//mysqli_query($con,$otp1);
	if($otp==$otp1){
		if($pass==$pass1){
			$update="update user1 set password='$pass' , confirmpassword='$pass1' where email='$email'";
			mysqli_query($con,$update);
			mail($email, "Change password", "Password change successfully");
			header("location: login.php");
		}else{
			echo "password and confirm password are not match";
		}
	}else{
		echo "otp is not match";
	}
}


if (isset($_POST['editprofile'])) {
	$name=$_POST['username'];
	$email=$_POST['email'];
	$image=$_FILES['image']['name'];
	if(!empty($image))
	{
		$image_type=$_FILES['image']['type'];
		if($image_type=="image/jpeg" || $image_type=="image/png"){
			$img_loc=$_FILES['image']['tmp_name'];
			$image="upload/".$image;
			move_uploaded_file($img_loc,$image);
		}
		else
		{
			echo "<script>alert('Plz select a image');location.href='editprofile.php'</script>";
		}
	}
	else
	{ 
		$s="select * from user1 where email='$email'";
		$result=mysqli_query($con,$s);
		$row=mysqli_fetch_assoc($result);
		$image=$row['image'];
	}
	$s="select * from user1 where email='$email'";

	$result=mysqli_query($con,$s);

	$num=mysqli_num_rows($result);

	if($num==1){
		$update="update user1 set name='$name',image='$image' where email='$email'";
		mysqli_query($con,$update);
		//mail($email, "Change password", "Password change successfully");
		echo "<script>alert('Your profile change Successfully');location.href='logout.php'</script>";
	}
}

if (isset($_POST['ch_pass'])) {
	$email=$_POST['email'];
	$pass1=md5($_POST['oldpassword']);
	$pass2=md5($_POST['newpassword']);
	$pass3=md5($_POST['repeatpassword']);
	$s="select * from user1 where email='$email'";
	$result=mysqli_query($con,$s);
	$row=mysqli_fetch_assoc($result);
	$pass=$row['password'];
	if($pass==$pass1)
	{
		if($pass2==$pass3){
			$update="update user1 set password='$pass2',confirmpassword='$pass3' where email='$email'";
			mysqli_query($con,$update);
			echo "<script>alert('Your password change Successfully');location.href='logout.php'</script>";
		}
		else
		{
			echo "<script>alert('new password and repeat password not match');location.href='changepassword.php'</script>";
		}
	}
	else
	{
		echo "<script>alert('password does not match');location.href='changepassword.php'</script>";
	}
}
?>