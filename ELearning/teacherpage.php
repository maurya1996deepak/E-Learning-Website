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
<html>
 <head>
  <title>E-Learning</title>
  <link rel="stylesheet" type="text/css" href="style.css">
 </head>
 <body>
  <div class='navbar'>
     <a href="teacherpage.php?logout=<?php echo $_SESSION['TName']; ?>">Logout</a>
	 <div class='topnav-right'>
	 <h3><?php echo $_SESSION['TName'];?></h3>
     <image src="<?php echo $_SESSION['TImage']; ?>" height="55" width="55" class='ri'></image>
	 </div>
  </div>
  
  
  <br><br><br><br>

<a href='teacheraddcourse.php?CNumber=<?php echo '1'; ?>' style="padding: 17px 10px 0;
    box-shadow: 0 1px 7px 0 grey;
    border-left: 15px solid #fff;" >mbms</a>
<a href='teacheraddcourse.php?CNumber=<?php echo '2'; ?>'>bams</a>
<a href='teacheraddcourse.php?CNumber=<?php echo '3'; ?>' >bds</a>
<a href='teacheraddcourse.php?CNumber=<?php echo '4'; ?>' >bhms</a>

<br><br><br><br>
<?php
if(isset($_GET['logout']))
{   session_destroy();
	header('location:teacherlogin.php');
}
?>


<?php
if(isset($_SESSION['TEmail']))
{
 $Email=$_SESSION['TEmail'];
 $conn=mysqli_connect('localhost','root');
 mysqli_select_db($conn,'ELearning');
 $query="SELECT * FROM course WHERE TEmail='$Email'";
 $run=mysqli_query($conn,$query);
 $row=mysqli_num_rows($run);
 if($row<1)
 {
 	echo "Add some course";
 }
 else
 {
	while($data=mysqli_fetch_assoc($run))
	{
		?>
		<a href="videoupload.php?CId=<?php echo $data['CId'];?>&CNumber=<?php echo $data['CNumber'];?>">
		<table class='table'  width='250px'>
          <tr>
	       <td><image src="<?php echo $data['CImage'];?>" height="220px" width="220px"></image> </td>
		  </tr> 
		   <td height='80px'><?php echo $data['CName'];?></td>
         </tr>
		 <tr>
		   <td height='40px'><?php echo $data['date'];?></td>
		 </tr>
        </table>
		</a>
		
		<?php
	}
 }
}
?>


</body>
</html>



