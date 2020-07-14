<html>
 <head>
  <title>E-Learning</title>
  <link rel="stylesheet" type="text/css" href="style.css">

 </head>
 <?php
session_start();
   if(isset($_SESSION['SEmail']))
   {
	   header('location:studentpage.php');
	   echo $_SESSION['SEmail'];
   }
   
?>
 <body>
   <div id="form" style="align :center;">
     <form action="studentlogin.php" method="POST">
	   <label for="Email">Email</label>
       <input type="text" name="studentemail" id="Email" required>
	   <label for="Password">Password</label>
       <input type="password" name="studentpassword" id="Password" required>
       <input type="submit" name="submitbutton" value="login">
       <input type="reset" name="resetbutton">
     </form>
     Have no account: <a href='studentregister.php'value="Sing up">Sign up</a>
  </div>
 </body>
</html>

<?php

if(isset($_POST['submitbutton']))
{
	$Email=$_POST['studentemail'];
	$Password=$_POST['studentpassword'];
	$conn=mysqli_connect('localhost','root');
	mysqli_select_db($conn,'ELearning');
	$query="SELECT * FROM student WHERE SEmail='$Email' and SPassword='$Password'";
	$run=mysqli_query($conn,$query);
	$row=mysqli_num_rows($run);
	if($row<1)
	{       
		?>
		<script>
		  alert("user name and password not correct");
		  window.open('studentlogin.php');
		</script>
		
		<?php
		
	}
	else
	{
	  $data=mysqli_fetch_assoc($run);
	  $SEmail=$data['SEmail'];
	  $SName=$data['SName'];
	  $SImage=$data['SImage'];
	  session_start();
	  $_SESSION['SEmail']=$SEmail;
	  $_SESSION['SName']=$SName;
	  $_SESSION['SImage']=$SImage;
	  
	  header('location:Studentpage.php');
	  
	}
	  

	mysqli_close($conn);
}
?>

