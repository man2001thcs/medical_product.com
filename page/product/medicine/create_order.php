<?php
require_once '../../../lib/config/const.php';
require_once '../../../lib/config/database.php';
require_once '../../../lib/base/Helper.php';
require_once '../../../lib/model/Medicine.php';
require_once '../../../lib/model/Buy_log.php';
require_once '../../../lib/model/User.php';

if (!isset($user)) {
	$user = new User();
}

if (!$user->isLoggedIn()) {
	Helper::redirect('404/404.php');
}

$buy_log = new Buy_log();
//$calendar = new Calendar();
$medicine = new Medicine_M();
$number = isset($_POST['numberIn']) ? intval($_POST['numberIn']) : null;
$id = isset($_POST['id']) ? intval($_POST['id']) : null;
$price= isset($_POST['price']) ? intval($_POST['price']) : null;
$total_price = intval($price)*intval($number);
//echo $total_price;

//$created = isset($_GET['created']) ? $_GET['created'] : null;


if (empty($id)) {
	Helper::redirect('page/product/medicine/list.php');
}
$day = date('Y-m-d H:i:s');
$code = $buy_log->verifyCode();
$data = array(
	'WpBuyLog' => array(
		'user_id' => $user->welcomeID(),
		'number' => $number,
		'medicine_id' => $id,
		'tool_id' => 0,
		'price' => $price,
		'code' => $code,
		'created' => $day,
		'total_price' => $total_price
	)
);

if ($_POST) {
	//if($buy_log->save($data));
}




?>

<!DOCTYPE html>
<title>Thông tin thuốc</title>
<?php include "../../templates/css/css.php"; ?>
<?php include "../../templates/js/js.php"; ?>

</head>

<body>
<div>
<?php include '../../templates/header/head.php'; ?>
</div>
<div class="bodycontain">

<script type="text/javascript">
    function success()
         {
			 alert("Đặt đơn thành công!! Code: <?php echo $code; ?>");
            <?php $buy_log->save($data); ?>
			document.getElementById("infos").style.display="none";			
        }
</script>

<div class="heading"><i class="fa fa-font-awesome" aria-hidden="true"></i> Hóa đơn</div>
<div class="box_list">
	<ul class="con_medi">
		<li class="box_medi">
			<div class="detail_r">
					<div class="txt" id="infos">		
						<p class="info"><span>Mã id thuốc:</span> <?php echo $id; ?></p>
						<p class="info"><span>Giá:</span> <?php echo number_format($price,0,",","."); ?> Đồng</p>
						<p class="info"><span>Ngày:</span> <?php echo $day; ?></p>
						<p class="info"><span>Số lượng:</span> <?php echo $number; ?></p>   
					</div>
			</div>
		</li>
	</ul>
	<div>Bạn có đồng ý tạo đơn?</div>
	<form action="" class="form" method="post" onsubmit="success();">
	<section>
		<dl>
			<dd>
				<input type="submit" name="submit" value="Đồng ý" class="btn btn-green">
				<a name="submitC" href="list.php" class="a btn">Hủy</a>
			</dd>
		</dl>
	</section>
    </form>
</div>	
	</div>
</body>
<footer>
    <?php include '../../templates/footer/footer.php'; ?>
</footer>
</html>