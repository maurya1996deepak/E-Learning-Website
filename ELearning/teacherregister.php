<html>
  <head>
   <title>E-Learning</title>
   <link rel="stylesheet" type="text/css" href="style.css">
  </head>
<body>
  <div id="form">
   <form action="" method="POST" enctype="multipart/form-data">
    Name: <input type="text" name="teachername" size="50" required>
	<br><br>
    Email:<input type="text" name="teacheremail" size="50" required>
	<br><br>
	Personal Details:<br> 
	<textarea rows="4" cols="40" name="teacherdetail" ></textarea>
	<br><br>
	
	Phone : <input type="text" name="teacherphone" size="50" required>
	<br><br>
	Gender:<input type="radio" name="teachergender" value="Male" required>Male
	       <input type="radio" name="teachergender" value="Female" required>Female
		   <br><br>
    Image: <input type="file" name="teacherimage" required><br><br>
    Password : <input type="password" name="teacherpassword"required >
	<br>
	<br>
	<input type="submit" name="rbutton" value="submit">
	<input type="reset" name="resetbutton">
   </form>
   Alredy have account: <a href='teacherlogin.php';" value="Log in">Login</a>
  </div>
</body>
</html>

<?php
if(isset($_POST['rbutton']))
{
 $TName=$_POST['teachername'];
 $TEmail=$_POST['teacheremail'];
 $TDetail=$_POST['teacherdetail'];
 $TPhone=$_POST['teacherphone'];
 $TGender=$_POST['teachergender'];
 $imagename=$_FILES["teacherimage"]["name"];
 $tempname=$_FILES["teacherimage"]["tmp_name"];
 $folder = "image/teacher/".$imagename;
 
 move_uploaded_file($tempname,$folder);
 $TPassword=$_POST['teacherpassword'];
 $conn=mysqli_connect('localhost','root');
 mysqli_select_db($conn,'ELearning');
 $query="INSERT INTO teacher VALUES('$TEmail','$TName','$folder','$TPassword','$TGender',$TPhone,'$TDetail')";
 $run=mysqli_query($conn,$query);
 if($run == True)
	{       
		?>
		<script>
		  alert("registration sucessefully");
		  window.open('teacherlogin.php');
		</script>
		
		<?php
		
		
	}
	else
	{       
		?>
		<script>
		  alert("registration unsucessefully");
		  
		  window.open('teacherregister.php');
		  
		</script>
		
		<?php
		
	}
 mysqli_close($conn);
}
?>