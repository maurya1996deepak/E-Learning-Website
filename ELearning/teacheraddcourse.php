<?php
session_start();
   if(isset($_SESSION['TEmail']))
   {
	 
   }
   else
   {
	   header('location:teacherlogin.php');
   }
?>

<?php
$date=date('d-M-Y');
?>

<html>
 <head>
  <title>E-Learning</title>
  <link rel="stylesheet" type="text/css" href="style.css">
 </head>
 <div class='navbar'>
   <a href="teacherpage.php">Home</a>
     <div class='topnav-right'>
	   <h3><?php echo $_SESSION['TName'];?></h3>
	   <image src="<?php echo $_SESSION['TImage']; ?>" height="55" width="55" class='ri'></image>
     </div>
   </div>
<body>
   <br><br><br><br>
  <div id='form'>
   <form action="" method="POST" enctype="multipart/form-data">
    Enter Course Name: <input type="text" name="coursename" size="50" required>
	<br><br>
	Course Details : <textarea rows="4" cols="48" name="coursedetail" ></textarea>
	<br><br>
    Image for Course: <input type="file" name="courseimage" required>
	<br><br>
	select video: <input type="file" name="video" required>
	<br><br>
    <input type="submit" name="rbutton" value="ADD">
	<input type="reset" name="resetbutton">
   </form>
  </div>



<?php
$CNumber=$_GET['CNumber'];
if(isset($_POST['rbutton']))
{
 $TEmail=$_SESSION['TEmail'];
 $CDetail=$_POST['coursedetail'];
 $CName=$_POST['coursename'];
 $imagename=$_FILES["courseimage"]["name"];
 $tempname=$_FILES["courseimage"]["tmp_name"];
 $folder = "image/course/".$imagename;
 move_uploaded_file($tempname,$folder);
 
 $videoname=$_FILES["video"]["name"];
 $tempname=$_FILES["video"]["tmp_name"];
 $videofolder = "video/".$videoname;
 move_uploaded_file($tempname,$videofolder);
 
 $conn=mysqli_connect('localhost','root');
 mysqli_select_db($conn,'ELearning');
 $query="INSERT INTO course VALUES('0','$CName','$folder','$TEmail','$CNumber','$date','$CDetail','$videofolder')";
 $run=mysqli_query($conn,$query);
 if($run == True)
	{       
		?>
		<script>
		  alert("Course added  sucessefully");
		  location.href='teacherpage.php';
		</script>
		
		<?php
		
		
	}
	else
	{       
		?>
		<script>
		  alert("Course add unsucessefully");
		  
		  window.open('teacherpage.php');
		  
		</script>
		
		<?php
		
	}
 mysqli_close($conn);
}
?>
 </body>
</html>