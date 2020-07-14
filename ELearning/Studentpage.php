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

<html>
 <head>
  <title>E-Learning</title>
  <link rel="stylesheet" type="text/css" href="style.css">
 </head>
 <body>
    <div class='navbar'>
       <a class="active" href="Studentpage.php">Home</a>
	   <a href="addcourse.php">add more course</a>
	   <a href="Studentpage.php?logout=<?php echo $_SESSION['SName']; ?>">Logout</a>
	   <div class='topnav-right'>
		   <h3><?php echo $_SESSION['SName'];?></h3>
		   <image src="<?php echo $_SESSION['SImage']; ?>" height='55' width='55' class='ri'></image>
	   </div>
	</div>
 

<?php
if(isset($_GET['logout']))
{   session_destroy();
	header('location:studentlogin.php');
}
?>
<div class='menu'>
<?php
$Email=$_SESSION['SEmail'];
$conn=mysqli_connect('localhost','root');
mysqli_select_db($conn,'ELearning');
$query="SELECT * FROM stc s,teacher t,course c 
        WHERE SEmail='$Email' 
		AND 
		TName in (SELECT TName from teacher 
		WHERE s.TEmail=t.TEmail ) 
		AND 
		CName in (SELECT CName FROM course 
		WHERE s.CourseId=c.CId)";
$run=mysqli_query($conn,$query);
$row=mysqli_num_rows($run);
if($row<1)
{
	echo "choose some course";
}
else
{ 
  
	while($data=mysqli_fetch_assoc($run))
	{
		?>
		<a href="videoportal.php?CId=<?php echo $data['CId'];?>">
		<table  class='table' width='250px'>
         <tr>
	       <td colspan='2'><image src="<?php echo $data['CImage'];?>" height="220px" width="220px"></image> </td>
		 </tr>
		 <tr>
		   <td height='60px' colspan='2'><?php echo $data['CName'];?></td>
         </tr>
         <tr>		 
		  <td width='60px'><image src="<?php echo $data['TImage'];?>" height="55" width="55" class='ri'></image> </td>
		  <td ><?php echo $data['TName'];?></td>
		 </tr>
		   <td colspan='2' height='40px'><?php echo $data['Sdate'];?></td>
		 </tr>
		 <tr>
		   <td colspan='2'class='remov'><a href="studentcourseremove.php?CId=<?php echo $data['CId'];?>">remove</a></td>
		 </tr>
		
        </table>
		</a>
		
		
		<?php
	}
	
}
?>
</div>
</body>
</html>