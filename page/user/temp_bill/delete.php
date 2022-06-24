<?php
require_once '../lib/config/const.php';
require_once '../lib/config/database.php';
require_once '../lib/base/Helper.php';
require_once '../lib/model/Medicine.php';
require_once '../lib/model/Buy_Log.php';
require_once '../lib/model/User.php';

if (!isset($user)) {
	$user = new User();
}

if (!$user->isLoggedIn()) {
	Helper::redirect('404/404.php');
}

$buylog = new Buy_Log();

$id = isset($_GET['stt']) ? intval($_GET['stt']) : null;

if (empty($id)) {
	Helper::redirect('temp_bill/listM.php');
}
$user->deleteCart($id);
    Helper::redirect('temp_bill/listM.php');

?>