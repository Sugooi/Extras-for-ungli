<?php 

  //Importing our db connection script
$con = new mysqli('', '', '', 'u759287128_user');

  
  if ($con->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}else {
  # code...
  $id = $_POST['id'];
  $hs = $_POST['highscore'];

  $sql = "UPDATE tap_user SET highscore='$hs' where id='$id' ";

  if(mysqli_query($con,$sql)){
	  
    echo 'success';
  }
  else{
    echo 'failure';
  }
  mysqli_close($con);

}
?>