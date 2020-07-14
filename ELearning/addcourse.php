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
     <a href="Studentpage.php">Home</a>
	 <div class='topnav-right'>
		 <h3><?php echo $_SESSION['SName'];?></h3>
		 <image src="<?php echo $_SESSION['SImage']; ?>" height="55" width="55" class='ri'></image>
	   </div>
     </div>
   <br><br><br><br>
  <div >
    <a href='addcourse.php?CNumber=<?php echo '1'; ?>'>mbms</a>
    <a href='addcourse.php?CNumber=<?php echo '2'; ?>'>bams</a>
    <a href='addcourse.php?CNumber=<?php echo '3'; ?>' >bds</a>
    <a href='addcourse.php?CNumber=<?php echo '4'; ?>' >bms</a>
  </div>
  
  <div>
    <?php
	if(isset($_GET['CNumber']))
	{
	 $CNumber=$_GET['CNumber'];

	 $conn=mysqli_connect('localhost','root');
	 mysqli_select_db($conn,'ELearning');
	 $query="SELECT * FROM course c , teacher t
			WHERE CNumber='$CNumber'
			AND
			TName in (SELECT TName from teacher 
			WHERE c.TEmail=t.TEmail )";
	 $run=mysqli_query($conn,$query);
	 $row=mysqli_num_rows($run);
	 if($row<1)
	 {
		echo "Not Avaliable";
	 }
	 else
	 {
		while($data=mysqli_fetch_assoc($run))
		{
			?>
			<a href="teacherdetail.php?TEmail=<?php echo $data['TEmail'];?>&CId=<?php echo $data['CId'];?>">
			<table class='table' width='250px'>
			 <tr>
			   <td colspan='2'><image src="<?php echo $data['CImage'];?>" height="220px" width="220px"></image> </td>
             </tr>
             <tr>
			   <td colspan='2' height='60px'><?php echo $data['CName'];?></td>
             </tr>	
            
			 <tr>
			   <td width='60px'><image src="<?php echo $data['TImage'];?>" height="55" width="55" style='border-radius: 50%'></image> </td>
			   <td><?php echo $data['TName'];?></td>
			 </tr>
			 <tr>			 
			  <td colspan='2' height='40px'> <?php echo $data['date'];?></td>
			 </tr>
			
			</table>
			</a>
			
			<?php
		}
	 }
	} 
	?>
  </div>
</body>

</html>