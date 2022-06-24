<?php
/**
 * Helper utility
 */
class Helper {
	
	public static function hash($string) {
		return sha1($string);
	}
	
	public static function verifyHash($password, $hash) {
		return $hash == Helper::hash($password);
	}
	
	public static function redirect($url) {
		header('Location: ' . BASE_URL . $url);
	}

	public static function return_img($id) {
		$temp = '../../../lib/images/medicine_img/';
		$temp .= $id;
		$temp .= ".png";
		return $temp;
	}

	public static function redirect1($url) {
		echo('<script type="text/javascript">
        alert("Order success!!");
        </script>');
		header('Location: ' . BASE_URL . $url);
	}
	
}