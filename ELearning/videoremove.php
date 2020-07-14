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
 if(isset($_GET['VId']))
 {
  $VId=$_GET['VId'];
  $TEmail=$_SESSION['TEmail'];
  $CId=$_GET['CId'];

  $conn=mysqli_connect('localhost','root');
  mysqli_select_db($conn,'ELearning');
  $query="DELETE FROM video WHERE VId='$VId' AND TEmail='$TEmail'";
  $run=mysqli_query($conn,$query);
  if($run == True)
	{       
		?>
		<script>
		  alert("Video remove  successefully");
		  location.href='videoupload.php'+'?CId=<?php echo $CId;?>';
		</script>
		
		<?php
	}
	
 }
 ?>