<?php 

  //Importing our db connection script
$con = new mysqli('', '', '', 'u759287128_user');
 
  if ($con->connect_error) {
        die("Connection failed: " . $conn->connect_error);

}else{
 if(isset($_POST['id'])){
     $id = $_POST['id'];


$sql = "SELECT * FROM tap_user WHERE id =".$id;
    $result = mysqli_query($con, $sql) or die("Error in Selecting " . mysqli_error($con));

    //create an array
    $emparray = array();
    while($row =mysqli_fetch_assoc($result))
    {
        $emparray[] = $row;
    }
    echo json_encode($emparray);

    //close the db connection
 }
 else{
    echo "no id given";
 }

     mysqli_close($con);



}
?>
	
  