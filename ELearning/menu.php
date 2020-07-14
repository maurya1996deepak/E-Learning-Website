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
		<br><br>
		<a href="content.php?VLocation=<?php echo $data['VLocation'];?>" target="content">
		<table border='1'>
          <tr>
	       <td><image src="<?php echo $data['VImage'];?>" height="150" width="150"></image> </td>
          </tr>
          <tr>
	       <td><?php echo $data['VName'];?></td>
          
        </table>
		</a>
		
		<?php
	}
 }
}
?>