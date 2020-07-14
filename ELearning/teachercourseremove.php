<?php
session_start();
   if(isset($_SESSION['TEmail']))
   {
	   echo $_SESSION['TEmail'];
   }
   else
   {
	   header('location:teacherlogin.php');
   }
?>

<?php
 if(isset($_GET['CId']))
 {
  $CId=$_GET['CId'];
  $TEmail=$_SESSION['TEmail'];


  $conn=mysqli_connect('localhost','root');
  mysqli_select_db($conn,'ELearning');
  $query="DELETE FROM course WHERE TEmail='$TEmail' AND CId='$CId'";
  $run=mysqli_query($conn,$query);
  mysqli_close($conn);
  $conn=mysqli_connect('localhost','root');
  mysqli_select_db($conn,'ELearning');
  $query="DELETE FROM stc WHERE TEmail='$TEmail' AND CId='$CId'";
  $run=mysqli_query($conn,$query);
  mysqli_close($conn);
  $conn=mysqli_connect('localhost','root');
  mysqli_select_db($conn,'ELearning');
  $query="DELETE FROM video WHERE TEmail='$TEmail' AND CId='$CId'";
  $run=mysqli_query($conn,$query);
  if($run == True)
	{       
		?>
		<script>
		  alert("Course remove  sucessefully");
		  location.href='teacherpage.php';
		</script>
		
		<?php
	}
	
 }
 ?>