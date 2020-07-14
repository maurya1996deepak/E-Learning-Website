<?php
session_start();
   if(isset($_SESSION['SEmail']))
   {
	
   }
   else
   {
	   header('location:studentlogin.php');
   }
?>
<?php 
$TEmail=$_GET['TEmail'];
$CId=$_GET['CId'];
$conn=mysqli_connect('localhost','root');
mysqli_select_db($conn,'ELearning');
$query="SELECT * FROM teacher WHERE TEmail='$TEmail'";
$run=mysqli_query($conn,$query);
$dataT=mysqli_fetch_assoc($run);
$query="SELECT * FROM course WHERE TEmail='$TEmail' AND CId='$CId'";
$run=mysqli_query($conn,$query);
$dataCD=mysqli_fetch_assoc($run);

?>




<html>
 <head>
   <title>E-Learning</title>
   <link rel="stylesheet" type="text/css" href="style.css">
 </head>
 <body>
  <div id='container'>
   <div class='navbar'> 
     <a href="Studentpage.php">Home</a>
	 <div class='topnav-right'>
		 <h3><?php echo $_SESSION['SName'];?></h3>
		 <image src="<?php echo $_SESSION['SImage']; ?>" height="55" width="55" class='ri'></image>
	 </div>
   </div>	 
   <div id='leftpaneltd'>
	 <div class='topd'>
      <image src="<?php echo $dataT['TImage']; ?>" height="70" width="70" class='ri'></image>
      <h1><?php echo $dataT['TName'];?></h1>
	 </div>
	  <h2>Personal Details<h2>	
     <div class='details'>	  
	  <Pre><?php echo $dataT['TDetail'];?></pre>
	 </div>
	  <h2>Course Details<h2>
	 <div class='details'>
	  <pre><?php echo $dataCD['CDetail'];?></pre>
	 </div>
	  <h2>Course Demo Lecture</h2>
	 <div class='details'>
	   <video controls width='100%' >
	   <source src="<?php echo $dataCD['DVLocation'];?>" type="video/mp4" >
	  </video>
	 </div>
	  <a href="teacherdetail.php?CId=<?php echo $CId;?>&CIdA=<?php echo $CId;?>&TEmail=<?php echo $TEmail;?>">
	  <div id='addbutton'>
	   <h1>ADD</h1>
	  </div>
     </a>
	</div>
	
	
 
	<div id='rightpaneltd'>
	
      <h2>Other Courses</h2>
	
	<?php

	 $conn=mysqli_connect('localhost','root');
	 mysqli_select_db($conn,'ELearning');
	 $query="SELECT * FROM course WHERE TEmail='$TEmail'";
	 $run=mysqli_query($conn,$query);
	 $row=mysqli_num_rows($run);
	 if($row<1)
	 {
		echo "No Course Avaliable";
	 }
	 else
	 {
		while($dataC=mysqli_fetch_assoc($run))
		{
			?>
			<a href="teacherdetail.php?TEmail=<?php echo $dataC['TEmail'];?>&CId=<?php echo $dataC['CId'];?>">
			<table class='table' width='250px'>
			 <tr>
			   <td><image src="<?php echo $dataC['CImage'];?>"width='220px' height='220px'></image> </td>
			 </tr>
             <tr>			 
			   <td height='60px'> <?php echo $dataC['CName'];?></td>
			 </tr>
			 <tr>
			   <td height='40px'><?php echo $dataC['date'];?></td>
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
$date=date('d-M-Y');

?>

 <?php
 if(isset($_GET['CIdA']))
 {
  $TEmail=$_GET['TEmail'];
  $CId=$_GET['CIdA'];
  $SEmail=$_SESSION['SEmail'];


  $conn=mysqli_connect('localhost','root');
  mysqli_select_db($conn,'ELearning');
  $query="SELECT * FROM stc WHERE SEmail='$SEmail' AND TEmail='$TEmail' AND CourseId='$CId'";
  $run=mysqli_query($conn,$query);
  $row=mysqli_num_rows($run);
  if($row>0)
	{       
		?>
		<script>
		
		  alert("already added");
		  location.href='addcourse.php';
		</script>
		
		<?php
		
	}
	else
	{
	  $query="INSERT INTO stc VALUES('$SEmail','$TEmail','$CId','0','$date')";
	  $run=mysqli_query($conn,$query);
	  if($run == True)
		{       
			?>
			<script>
			  alert("Course added  sucessefully");
			  location.href='studentpage.php';
			
			</script>
			
			<?php
		}
	}
	
 }
 ?>
