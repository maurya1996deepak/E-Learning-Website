<?php
session_start();
   if(isset($_SESSION['SEmail']))
   {
	   echo $_SESSION['SEmail'];
   }
   else
   {
	   header('location:studentlogin.php');
   }
?>

<?php
 if(isset($_GET['CId']))
 {
  $CId=$_GET['CId'];
  $SEmail=$_SESSION['SEmail'];


  $conn=mysqli_connect('localhost','root');
  mysqli_select_db($conn,'ELearning');
  $query="DELETE FROM stc WHERE SEmail='$SEmail' AND CourseId='$CId'";
  $run=mysqli_query($conn,$query);
  if($run == True)
	{       
		?>
		<script>
		  alert("Course remove  sucessefully");
		  location.href='studentpage.php';
		</script>
		
		<?php
	}
	
 }
 ?>