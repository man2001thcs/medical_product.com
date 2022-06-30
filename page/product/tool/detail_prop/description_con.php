<?php
     require_once '../lib/model/User.php';  
	 if (!isset($user)) {
		$user = new User();
	}

$id = isset($_GET['id']) ? intval($_GET['id']) : null;

 ?>
 <?php
	if ($check == 1){
		include 'how_to_use.php'; 
	} else {
		include 'material.php';
	}
   

?>
