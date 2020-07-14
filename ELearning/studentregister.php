<html>
<head>
  <title>E-Learning</title>
  <link rel="stylesheet" type="text/css" href="style.css">

 </head>
<body>
  <div id="form">
    <form action="" method="POST" enctype="multipart/form-data">
      Name: <input type="text" name="studentname" size="50" required>
      Email:<input type="text" name="studentemail" size="50" required>
	  Phone : <input type="text" name="studentphone" size="50" required><br><br><br>
	  Gender:<input type="radio" name="studentgender" value="Male" required>Male
	       <input type="radio" name="studentgender" value="Female" required>Female<br><br><br>
      Image: <input type="file" name="studentimage" required><br><br><br>
      Password : <input type="password" name="studentpassword"required ><br><br><br>
	  <input type="submit" name="rbutton" value="submit">
	  <input type="reset" name="resetbutton">
    </form>
     Alredy have account: <a href='studentlogin.php';" value="Log in">Login</a>
  </div>
</body>
</html>

<?php
if(isset($_POST['rbutton']))
{
 $SName=$_POST['studentname'];
 $SEmail=$_POST['studentemail'];
 $SPhone=$_POST['studentphone'];
 $SGender=$_POST['studentgender'];
 $imagename=$_FILES["studentimage"]["name"];
 $tempname=$_FILES["studentimage"]["tmp_name"];
 $folder = "image/student/".$imagename;
 
 move_uploaded_file($tempname,$folder);
 $Spassword=$_POST['studentpassword'];
 $conn=mysqli_connect('localhost','root');
 mysqli_select_db($conn,'ELearning');
 $query="INSERT INTO student VALUES('$SEmail','$SName',$SPhone,'$SGender','$Spassword','$folder')";
 $run=mysqli_query($conn,$query);
 if($run == True)
	{       
		?>
		<script>
		  alert("registration sucessefully");
		  window.open('studentlogin.php');
		</script>
		
		<?php
		
		
	}
	else
	{       
		?>
		<script>
		  alert("registration unsucessefully");
		  
		  window.open('studentregister.php');
		  
		</script>
		
		<?php
		
	}
 mysqli_close($conn);
}
?>