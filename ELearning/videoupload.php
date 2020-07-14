<?php
session_start();
   if(isset($_SESSION['TEmail']))
   {    
        $TEmail=$_SESSION['TEmail'];
		$CId=$_GET['CId'];
        $conn=mysqli_connect('localhost','root');
        mysqli_select_db($conn,'ELearning');
	    $query="SELECT * FROM course WHERE CId='$CId' AND TEmail='$TEmail'";
        $run=mysqli_query($conn,$query);
        $row=mysqli_num_rows($run);
        if($row<1)
         {
	        header('location:teacherpage.php');
         }
            else
         {}
   }
   else
   {
	   header('location:teacherlogin.php');
   }
?>



<?php
$date=date('d-M-Y');
?>

<?php $CId=$_GET['CId'];?>
<html>
 <head>
  <title>E-Learning</title>
  <link rel="stylesheet" type="text/css" href="style.css">
 </head>
 <body>
  <div id='container'>
	 <div class='navbar'>
	   <a href="addquiz.php?CId=<?php echo $CId; ?>">Add Quiz</a>
	   <a href="teacherpage.php">Home</a>
	   <div class='topnav-right'>
	   <h3><?php echo $_SESSION['TName'];?></h3>
	   <image src="<?php echo $_SESSION['TImage']; ?>" height="55" width="55" class='ri'></image>
	   </div>
	 </div>

  <div id='leftquizadd'>
     <div id="form">
	   <form action="" method="POST" enctype="multipart/form-data">
	   video name: <input type="text" name="videoname" size="50" required>
		<br><br>
		Image for video: <input type="file" name="videoimage" required>
			   <br><br>
		select video: <input type="file" name="video" required>
		<input type="submit" name="rbutton" value="Upload">
		<input type="reset" name="resetbutton">
	   </form>
     </div>
  </div>

  <div id='overflowquiz'>

		<?php
		$TEmail=$_SESSION['TEmail'];

		$conn=mysqli_connect('localhost','root');
		mysqli_select_db($conn,'ELearning');
		$query="SELECT * FROM video WHERE CourseId='$CId' AND TEmail='$TEmail'";
		$run=mysqli_query($conn,$query);
		$row=mysqli_num_rows($run);
		if($row<1)
		{
			echo "No Video Avaliable";
		}
		else
		{
			while($data=mysqli_fetch_assoc($run))
			{
				?>
			
				 <table class='table' width='98%' style='margin:5px;'>
				  <tr>
				   <td rowspan="2"><image src="<?php echo $data['VImage'];?>" height="100px" width="100px"></image> </td>
				   <td colspan='2' width='90%' height='70px'><?php echo $data['VName'];?></td>
				  </tr>
				  <tr>
				   <td><?php echo $data['date'];?></td>
				   <td class='remov'><a href="videoremove.php?VId=<?php echo $data['VId'];?>&CId=<?php echo $CId;?>">remove</a></td>
				  </tr>
				 </table>
				</a>
				
				<?php
			}
		}
		?>

   </div>
 </div>
 
</body>
</html>

<?php
if(isset($_POST['rbutton']))
{
 $TEmail=$_SESSION['TEmail'];
 $CId=$_GET['CId'];
 $VName=$_POST['videoname'];
 $imagename=$_FILES["videoimage"]["name"];
 $tempname=$_FILES["videoimage"]["tmp_name"];
 $imagefolder = "image/video/".$imagename;
 move_uploaded_file($tempname,$imagefolder);
 $videoname=$_FILES["video"]["name"];
 $tempname=$_FILES["video"]["tmp_name"];
 $videofolder = "video/".$videoname;
 
 move_uploaded_file($tempname,$videofolder);

 $conn=mysqli_connect('localhost','root');
 mysqli_select_db($conn,'ELearning');
 $query="INSERT INTO video VALUES('0','$VName','$CId','$TEmail','$videofolder','$imagefolder','$date')";
 $run=mysqli_query($conn,$query);
 if($run == True)
	{       
		?>
		<script>
		  alert("Video add sucessefully");
		  location.href='videoupload.php'+'?CId=<?php echo $CId ;?>';
		</script>
		
		<?php
		
		
	}
	else
	{       
		?>
		<script>
		  alert("Course add unsucessefully");
		  
		  location.href='videoupload.php' +'?CId=<?php echo $CId;?>';
		  
		</script>
		
		<?php
		
	}
 mysqli_close($conn);
}
?>


