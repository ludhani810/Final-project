<?php


include 'insert.php' ;


$email=$_POST['email'];
$password=$_POST['password'];


$con=new mysqli("localhost","root","","project");

if($con->connect_error){
	die("Failed to connect : ".$con->connect_error);
}
else{
	$stmt= $con->prepare("select * from register where email = ?");
	$stmt->bind_param("s",$email);
	$stmt->execute();
	$stmt_result = $stmt->get_result();
	if($stmt_result->num_rows > 0){

     $data = $stmt_result->fetch_assoc();

     $pass_check=password_verify($password, $pass);
		
		if($pass_check)
        { 
        	
          header('location: regis.html');
      }
      else{
      	echo "invalid password or Mail";
      }
	

}
}

?>