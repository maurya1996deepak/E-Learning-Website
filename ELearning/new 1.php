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

<?php
$CId=$_GET['CId'];
$conn=mysqli_connect('localhost','root');
mysqli_select_db($conn,'ELearning');
$query="SELECT CNumber FROM course 
        WHERE CId='$CId'";
$run=mysqli_query($conn,$query);
$dataCN=mysqli_fetch_assoc($run)
$CNumber=$dataCN['CNumber'];
?>

<?php
$conn=mysqli_connect('localhost','root');
mysqli_select_db($conn,'ELearning');
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
		
		<table height='100' width='900' style="padding: 17px 10px 0; align='center';
    box-shadow: 0 1px 7px 0 grey;
    border-left: 15px solid #fff;" >
          <tr>
	       <td><?php echo $data['Question'];?></td>
		  </tr>
		  <tr>
           <td>
		       <input type="radio" name="<?php echo $data['QId'];?>" value="<?php echo $data['OpA'];?>"><?php echo $data['OpA'];?>
	           <input type="radio" name="<?php echo $data['QId'];?>" value="<?php echo $data['OpB'];?>"><?php echo $data['OpB'];?>
	           <input type="radio" name="<?php echo $data['QId'];?>" value="<?php echo $data['OpC'];?>"><?php echo $data['OpC'];?>
	           <input type="radio" name="<?php echo $data['QId'];?>" value="<?php echo $data['OpD'];?>"><?php echo $data['OpD'];?>
	           <input type="radio" name="<?php echo $data['QId'];?>" value="aqs12#*&^" checked style="display : none" >
		   </td>	
         </tr>
        </table>
		 
		
		
		<?php
	} ?>
	<input type="submit" name="submitbutton" value="Submit">
	</form><?php 
	
}
?>


<?php
$correct=0;
$wrong=0;
$notattempt=0;
$per=0;
if(isset($_POST['submitbutton']))
{
 $conn=mysqli_connect('localhost','root');
 mysqli_select_db($conn,'ELearning');
 $query="SELECT * FROM quiz q,
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
<html>
 <title>
   E-Learning
 </title>
 <body>
   <table border="1">
     <tr>
	   <td>Correct</td><td>Wrong</td><td>Not Attempt</td><td>persent</td>
	 </tr>
     <tr>
	   <td><?php echo $correct; ?></td><td><?php echo $wrong; ?></td><td><?php echo $notattempt; ?></td><td><?php echo $per; ?></td>
     </tr>
     <tr>
	    <td colspan="4"><progress value="<?php echo $per ?>" max="100"></progress></td>
	 </tr>
   </table>   
 </body>
</html>
<?php

}
?>