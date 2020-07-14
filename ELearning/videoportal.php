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
       $CId=$_GET['CId'];
?>


<html>

 <head>
   <title>E-Learning</title>
   <link rel="stylesheet" type="text/css" href="style.css">
 </head>
 <body>
    <div class='navbar'>
       <a href="Studentpage.php">Home</a>
	   <a href="quiz.php?CId=<?php echo $CId ?>">QUIZ</a>
	   <div class='topnav-right'>
		   <h3><?php echo $_SESSION['SName'];?></h3>
		   <image src="<?php echo $_SESSION['SImage']; ?>" height="55" width="55" class='ri'></image>
	   </div>
	</div>
   
   
  <div id='container'>
   <div id='videopanel'>
     <?php
      if(isset($_GET['VId']))
      { $VId=$_GET['VId'];
	    $SEmail=$_SESSION['SEmail'];
		$CId=$_GET['CId'];
		$conn=mysqli_connect('localhost','root');
		mysqli_select_db($conn,'ELearning');
		$query="SELECT * FROM stc WHERE CourseId='$CId' AND SEmail='$SEmail'";
        $run=mysqli_query($conn,$query);
        $row=mysqli_num_rows($run);
        if($row<1)
         {
	        echo "can't accesses";
         }
            else
         {
			$query="SELECT * FROM video WHERE VId='$VId' AND CourseId='$CId'";
			$run=mysqli_query($conn,$query);
			$data=mysqli_fetch_assoc($run)
			 ?>
			  <table>
				<tr>
				 <td>
				  <video controls autoplay >
				  <source src="<?php echo $data['VLocation'];?>" type="video/mp4" >
				  </video>
				 </td>
				<tr> 
				  <td>
				  <?php echo $data['VName'];?>
				  </td>
				</tr>
				</table>
			 <?php
		}
     }
     else
     {
     ?>
     <video controls autoplay>
     <source src="video/123.mp4" type="video/mp4">
     </video>
     <?php
	
     }
     ?>
	</div>
   
   
   
<div id='overflow'>
<?php
$SEmail=$_SESSION['SEmail'];
$CId=$_GET['CId'];
$conn=mysqli_connect('localhost','root');
mysqli_select_db($conn,'ELearning');
$query="SELECT * FROM stc WHERE CourseId='$CId' AND SEmail='$SEmail'";
$run=mysqli_query($conn,$query);
$row=mysqli_num_rows($run);
if($row<1)
{
	echo "can't accesses";
}
else
{
 $query="SELECT * FROM video WHERE CourseId='$CId'";
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
		
		<a href="videoportal.php?VId=<?php echo $data['VId'];?>&CId=<?php echo $data['CourseId']; ?> ">
		<table class='table' width='98%' style='margin:5px;'>
          <tr>
	       <td rowspan='2'><image src="<?php echo $data['VImage'];?>" height="80px" width="80px"></image> </td>
		   <td height='60px'><?php echo $data['VName'];?></td>
         </tr>
         <tr>		 
		  
		  <td><?php echo $data['date'];?></td>
		 </tr>
          
        </table>
		</a>
		
		<?php
	}
 }
}

?>
    </div>
</div>

</body>
</html>
