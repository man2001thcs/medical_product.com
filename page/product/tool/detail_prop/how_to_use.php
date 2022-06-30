<?php
     require_once '../lib/model/User.php';  
	 if (!isset($user)) {
		$user = new User();
	} 
 ?>
 <?php
    $check = !empty($user->isLoggedIn()) ? $user->isAdmin() : 0;
	if ($check == 1){
		include '../templates/gnav.php'; 
	} else {
		include '../templates/f_gnav.php';
	}
   

?>
