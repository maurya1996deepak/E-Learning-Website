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
<?php $CId=$_GET['CId'];?>
<html>
 <head>
  <title>E-Learning</title>
  <link rel="stylesheet" type="text/css" href="style.css">
 </head>
 <body>
 <div id='cont'>
  <div class='navbar'>
    <a href="videoupload.php?CId=<?php echo $CId ; ?>">Add video</a>
    <a href="teacherpage.php">Home</a>
	<div class='topnav-right'>
    <h3><?php echo $_SESSION['TName'];?></h3>
    <image src="<?php echo $_SESSION['TImage']; ?>" height="55" width="55" class='ri'></image>
	</div>
  </div>
  <div id='leftquizadd'>
  <div id="form"> 
   <form action="" method="POST" enctype="multipart/form-data">
      Question:<br><textarea  name="Question" required ></textarea>
	  <br><br>
      Option A: <input type="text" name="OpA" required>
		   <br>
      Option B: <input type="text" name="OpB" required>
		   <br>
      Option C: <input type="text" name="OpC" required>
		   <br>
	  Option D: <input type="text" name="OpD" required>
		   <br>
	  Correct Answer : <input type="text" name="Answer" required>
		   <br>
    <input type="submit" name="rbutton" value="Upload">
	<input type="reset" name="resetbutton">
   </form>
  </div>
  </div>


<div id='overflowquiz'>
<?php
$conn=mysqli_connect('localhost','root');
mysqli_select_db($conn,'ELearning');
$query="SELECT * FROM quiz WHERE CId='$CId' AND TEmail='$TEmail'";
$run=mysqli_query($conn,$query);
$row=mysqli_num_rows($run);
if($row<1)
{
	echo "No Question Avaliable";
}
else
{
	while($data=mysqli_fetch_assoc($run))
	{
		?>
		<table class='table' width='98%'style="text-align:left; margin:5px;">
           <tr><td >    <?php echo $data['Question'];?></td></tr>
	       <tr><td>A : <?php echo $data['OpA'];?></td></tr>
	       <tr><td>B : <?php echo $data['OpB'];?></td></tr>
	       <tr><td>C : <?php echo $data['OpC'];?></td></tr>
	       <tr><td>D : <?php echo $data['OpD'];?></td></tr>	
           <tr><td>Answer : <?php echo $data['Answer'];?></td></tr>
		   <tr><td class='remov' style="text-align:center"><a href="qremove.php?QId=<?php echo $data['QId'];?>&CId=<?php echo $data['CId'];?>">remove</a></td></tr>
        </table>
		
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
 $Question=$_POST['Question'];
 $OpA=$_POST['OpA'];
 $OpB=$_POST['OpB'];
 $OpC=$_POST['OpC'];
 $OpD=$_POST['OpD'];
 $Answer=$_POST['Answer'];
 
 $conn=mysqli_connect('localhost','root');
 mysqli_select_db($conn,'ELearning');
 $query="INSERT INTO quiz VALUES('$TEmail','0','$CId','$Question','$OpA','$OpB','$OpC','$OpD','$Answer')";
 $run=mysqli_query($conn,$query);
 if($run == True)
	{       
		?>
		<script>
		  alert("Question added sucessefully");
		  location.href='addquiz.php'+'?CId=<?php echo $CId ;?>';
		</script>
		
		<?php
		
		
	}
	else
	{       
		?>
		<script>
		  alert("Question add unsucessefully");
		  
		  location.href='addquiz.php' +'?CId=<?php echo $CId;?>';
		  
		</script>
		
		<?php
		
	}
 mysqli_close($conn);
}
?>

 