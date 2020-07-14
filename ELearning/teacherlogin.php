<?php
session_start();
   if(isset($_SESSION['TEmail']))
   {
	   header('location:teacherlogin.php');
	   echo $_SESSION['TEmail'];
   }
?>
<html>
 <head>
  <title>E-Learning</title>
  <link rel="stylesheet" type="text/css" href="style.css">
 </head>
 
 <body>
 <div id="form">
	  <form action="teacherlogin.php" method="POST">
	   Email:<input type="text" name="teacheremail" size="40" required>
	   <br><br>
	   Password:<input type="password" name="teacherpassword" size="40" required>
	   <br><br>
	   <input type="submit" name="submitbutton" value="login">
	   <input type="reset" name="resetbutton">
	  </form>
      Have no account: <a href='teacherregister.php'value="Sing up">Sign up</a>
  </div>
 </body>
</html>

<?php

if(isset($_POST['submitbutton']))
{
	$Email=$_POST['teacheremail'];
	$Password=$_POST['teacherpassword'];
	$conn=mysqli_connect('localhost','root');
	mysqli_select_db($conn,'ELearning');
	$query="SELECT * FROM teacher WHERE TEmail='$Email' and TPassword='$Password'";
	$run=mysqli_query($conn,$query);
	$row=mysqli_num_rows($run);
	if($row<1)
	{       
		?>
		<script>
		  alert("user name and password not correct");
		  window.open('teacherlogin.php');
		</script>
		
		<?php
		
	}
	else
	{
	  $data=mysqli_fetch_assoc($run);
	  $TEmail=$data['TEmail'];
	  $TName=$data['TName'];
	  $TImage=$data['TImage'];
	  session_start();
	  $_SESSION['TEmail']=$TEmail;
	  $_SESSION['TName']=$TName;
	  $_SESSION['TImage']=$TImage;
	  header('location:teacherpage.php');
	  
	}
	  

	mysqli_close($conn);
}
?>

