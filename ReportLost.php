<?php
// Include confi.php
include_once('DB_Connection.php');
$data = file_get_contents('php://input');
$data = json_decode($data, true);

if($_SERVER['REQUEST_METHOD'] == "POST"){
	
	$currPetId = $data['idPet'];
	
 
	 //$currPetId = $_POST['idPet'];
	 
	
	

	
	$req = $db->prepare ("UPDATE pet SET isLost = 1 where id = ?");
	$res=$req->execute(array($currPetId));
	//echo $res;
	if($res){
		$json = array("status" => 1, "msg" => "Done pet added!");
	}else{
		$json = array("status" => 0, "msg" => "Error adding pet!");
	}
}


/* Output header */
	header('Content-type: application/json');
	echo json_encode($json);