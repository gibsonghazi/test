<?php
	// Include confi.php
	include_once('DB_Connection.php');
	$data = file_get_contents('php://input');
	$data = json_decode($data, true);
if($_SERVER['REQUEST_METHOD'] == "POST"){

	
	$email = $data['email'];
	$password = $data['password'];
	/*$email = $_POST['email'];
	$password = $_POST['password'];*/
	$req = $db->prepare('SELECT * FROM user where email= ? and password= ?');
	$res=$req->execute(array($email,$password));
	$nb= $req->rowcount();
	$result="";
	if($nb!=0){
		while ($donnees = $req->fetch()){
			$result = array("firstname" => $donnees["firstname"], "lastname" => $donnees["lastname"], "email" => $donnees["email"], 'password' => $donnees["password"],"id" => $donnees["id"]); 
		}

		
	}
	

}
	

	/* Output header */
	header('Content-type: application/json');
	echo json_encode($result);

	
