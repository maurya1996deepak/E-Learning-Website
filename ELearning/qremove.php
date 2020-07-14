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
 if(isset($_GET['QId']))
 {
  $QId=$_GET['QId'];
  $CId=$_GET['CId'];
  $TEmail=$_SESSION['TEmail'];
 

  $conn=mysqli_connect('localhost','root');
  mysqli_select_db($conn,'ELearning');
  $query="DELETE FROM quiz WHERE QId='$QId' AND TEmail='$TEmail'";
  $run=mysqli_query($conn,$query);
  if($run == True)
	{       
		?>
		<script>
		  alert("Question removed  successefully");
		  location.href='addquiz.php'+'?CId=<?php echo $CId;?>';
		</script>
		
		<?php
	}
	
 }
 ?>