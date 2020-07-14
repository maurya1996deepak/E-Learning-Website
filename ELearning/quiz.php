<?php
session_start();
   if(isset($_SESSION['SEmail']))
   {
	  $SEmail=$_SESSION['SEmail'];
   }
   else
   {
	   header('location:studentlogin.php');
   }
?>

<html>
 <head>
   <title>E-Learning</title>
   <link rel="stylesheet" type="text/css" href="style.css">
 </head>
 
 <body>
   <div class='navbar'>
      <a href="Studentpage.php">Home</a>
	  <div class='topnav-right'>
		  <h3><?php echo $_SESSION['SName'];?></h3>
		  <image src="<?php echo $_SESSION['SImage']; ?>" height="55" width="55" class='ri'></image>
	  </div>
   </div>
   

<?php
$CId=$_GET['CId'];
$correct=0;
$wrong=0;
$notattempt=0;
$per=0;
if(isset($_POST['submitbutton']))
{
 $conn=mysqli_connect('localhost','root');
 mysqli_select_db($conn,'ELearning');
 $query="SELECT * FROM quiz 
        WHERE CId='$CId'";
 $run=mysqli_query($conn,$query);
 $row=mysqli_num_rows($run);
 

   while($data=mysqli_fetch_assoc($run))
	{ $QId=$data['QId'];
	  $selectedOption=$_POST["$QId"];
	  $Answer=$data['Answer'];
	  if($selectedOption==$Answer)
	  {
	  $correct++;
	  }
	  else if($selectedOption=='aqs12#*&^')
	  {
	  $notattempt++;
	  }
	  else
	  {
	  $wrong++;
	  }
	  
	 }
	 
	 $total=$correct+$notattempt+$wrong;
	 $per=($correct/$total)*100;
	  $query="UPDATE stc set Q1M='$per'
		WHERE SEmail='$SEmail' AND CourseId='$CId'";
      $run=mysqli_query($conn,$query);

?>

   <table border="2"  class='table' style='background-color:white; margin: 20% 25%; width:40%; padding-left:40px;'>
     <tr>
	   <th>Correct</th><th width='25%'>Wrong</th><th width='25%'>Not Attempt</th><th width='25%'>percent</th>
	 </tr>
     <tr>
	   <td><?php echo $correct; ?></td><td><?php echo $wrong; ?></td><td><?php echo $notattempt; ?></td><td><?php echo $per; ?></td>
     </tr>
     <tr>
	    <td colspan="4" style='text-align:left;'><progress value="<?php echo $per ?>" max="100"></progress></td>
	 </tr>
   </table>   
 
<?php

}
?>


<?php
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
		$query="SELECT * FROM quiz 
				WHERE CId='$CId'";
		$run=mysqli_query($conn,$query);
		$row=mysqli_num_rows($run);
		if($row<1)
		{
			echo "no question";
		}
		else
		{ 
		 ?> <form action="" method="POST"><?php
			while($data=mysqli_fetch_assoc($run))
			{
				?>
				
				<table class='table' width='90%' style="text-align:left; margin-left:5%; margin-bottom:1px;">
				  <tr>
				   <td><?php echo $data['Question'];?></td>
				  </tr>
				  <tr>
				   <td>
					      <input type="radio" name="<?php echo $data['QId'];?>" value="<?php echo $data['OpA'];?>"><?php echo $data['OpA'];?>
					   <br><input type="radio" name="<?php echo $data['QId'];?>" value="<?php echo $data['OpB'];?>"><?php echo $data['OpB'];?>
					   <br><input type="radio" name="<?php echo $data['QId'];?>" value="<?php echo $data['OpC'];?>"><?php echo $data['OpC'];?>
					   <br><input type="radio" name="<?php echo $data['QId'];?>" value="<?php echo $data['OpD'];?>"><?php echo $data['OpD'];?>
					   <input type="radio" name="<?php echo $data['QId'];?>" value="aqs12#*&^" checked style="display : none" >
				   </td>	
				 </tr>
				</table>
				 
				
				
				<?php
			} ?>
			<input type="submit" name="submitbutton" value="Submit" style=' margin:15% 25%;'>
			</form><?php 
			
		}
	}
?>




 </body>
</html>