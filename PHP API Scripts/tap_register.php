<?php 


$con = new mysqli('', '', '', 'u759287128_user');

if ($con->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
else{}
	
	//an array to display response
	$response = array();
	
	//if it is an api call 
	//that means a get parameter named api call is set in the URL 
	//and with this parameter we are concluding that it is an api call

	if(isset($_GET['apicall'])){
		
		switch($_GET['apicall']){
			
			case 'signup':
				//checking the parameters required are available or not 
				if(isTheseParametersAvailable(array('username'))){
					
					//getting the values 				
					$username = $_POST['username']; 
					$password = md5($_POST['password']);
					$pass=$password;
					$email = $_POST['email'];
					
					
					//checking if the user is already exist with this username or email
					//as the email and username should be unique for every user 
					$stmt = $con->prepare("SELECT id FROM tap_user WHERE email = ?");
					$stmt->bind_param("s", $email);
					$stmt->execute();
					$stmt->store_result();

					//if the user already exist in the database 
					if($stmt->num_rows > 0){
						$response['error'] = true;
						$response['message'] = 'Account Already Exsists';
						$stmt->close();
					}else{

					
						
						//if user is new creating an insert query 
						$stmt = $con->prepare("INSERT INTO tap_user (name, password, email) VALUES ('$username', '$pass', '$email')");
					
						//if the user is successfully added to the database 
						if($stmt->execute()){
							
							//fetching the user back 
							$stmt = $con->prepare("SELECT id, name, password FROM tap_user WHERE email = ?"); 
							$stmt->bind_param("s",$email);
							$stmt->execute();
							$stmt->bind_result($id,$username,$password);
							$stmt->fetch();
							
							$user = array(
								'id'=>$id,
								'username'=>$username, 
								'pass'=>$password
							);
							
							$stmt->close();
							
							//adding the user data in response 
							$response['error'] = false; 
							$response['message'] = 'Login After 2min'; 
							$response['user'] = $user; 
						}else{
						}
					}
					
				}else{
					$response['error'] = true; 
					$response['message'] = 'required parameters are not available'; 
				}
				
			break; 
			
			case 'login':
				//for login we need the username and password 
				if(isTheseParametersAvailable(array('email', 'password'))){
					//getting values 
					$password = md5($_POST['password']); 
					$email = $_POST['email'];
					
					//creating the query 
					$stmt = $con->prepare("SELECT id, name, email, highscore  FROM tap_user WHERE email = ? AND password = ?");
					$stmt->bind_param("ss", $email, $password);
					
					$stmt->execute();
					
					$stmt->store_result();
					
					//if the user exist with given credentials 
					if($stmt->num_rows > 0){
						
						$stmt->bind_result($id, $username, $email, $highscore);
						$stmt->fetch();
						$user = array(
							'id'=>$id, 
							'username'=>$username, 
							'email'=>$email,
							'highscore' =>$highscore
							
						);
						
						$response['error'] = false; 
						$response['message'] = 'Login successfull'; 
						$response['user'] = $user; 
					}else{
						//if the user not found 
						$response['error'] = false; 
						$response['message'] = 'Invalid username or password';
					}
				}
			break; 
			
			default: 
				$response['error'] = true; 
				$response['message'] = 'Invalid Operation Called';
		}
		
	}else{
		//if it is not api call 
		//pushing appropriate values to response array 
		$response['error'] = true; 
		$response['message'] = 'Invalid API Call';
	}
	
	//displaying the response in json structure 
	echo json_encode($response);
	
	//function validating all the paramters are available
	//we will pass the required parameters to this function 
	function isTheseParametersAvailable($params){
		
		//traversing through all the parameters 
		foreach($params as $param){
			//if the paramter is not available
			if(!isset($_POST[$param])){
				//return false 
				return false; 
			}
		}
		//return true if every param is available 
		return true; 
	}

	function randomPassword() {
    $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
    $pass = array(); //remember to declare $pass as an array
    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
    for ($i = 0; $i < 6; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
    return implode($pass); //turn the array into a string
}