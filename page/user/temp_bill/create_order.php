<?php
require_once '../lib/config/const.php';
require_once '../lib/config/database.php';
require_once '../lib/base/Helper.php';
require_once '../lib/model/Medicine.php';
require_once '../lib/model/Buy_log.php';
require_once '../lib/model/User.php';

if (!isset($user)) {
	$user = new User();
}

if (!$user->isLoggedIn()) {
	Helper::redirect('404/404.php');
}

$buy_log = new Buy_log();
//$calendar = new Calendar();
$medicine = new Medicine_M();

//echo $total_price;

//$created = isset($_GET['created']) ? $_GET['created'] : null;

$code = isset($_POST['code']) ? intval($_POST['code']) : null;

if (empty($code)) {
	Helper::redirect('index.php');
}

$day = date('Y-m-d H:i:s');
$data = $user->getCart();

if (empty($data)) {
	Helper::redirect('index.php');
}

if ($_POST) {
	//if($buy_log->save($data));
}




?>

<!DOCTYPE html>
<title>Thông tin thuốc</title>
<?php include "../templates/css.php"; ?>
<?php include "../templates/js.php"; ?>

</head>

<body>
<div>
<?php include '../templates/head.php'; ?>
</div>
<div class="bodycontain">

<script type="text/javascript">
    function success()
         {
			 alert("Đặt đơn thành công!! Code: <?php echo $code; ?>");
			document.getElementById("infos").style.display="none";			
        }
</script>

<div class="heading"><i class="fa fa-font-awesome" aria-hidden="true"></i> Thông tin hóa đơn:</div>
<div class="box_list">
	<ul class="con_medi">
		<li class="box_medi">
			<div class="detail_r">
				    <?php foreach($data as $_item):
					$item = $_item['WpBuyLog']; 
					$item['code'] = $code;
					$item['created'] = $day;					
					$dataS = array(
						'WpBuyLog' => array(
							'user_id' => $user->welcomeID(),
							'number' => $item['number'],
							'medicine_id' => $item['medicine_id'],
							'tool_id' => $item['tool_id'],
							'price' => $item['price'],
							'code' => $item['code'],
							'created' => $item['created'],
							'total_price' => ($item['number'] * $item['price'])
						)
					);
					//echo json_encode($item);
					$buy_log->save($dataS);
					$user->destroyCart();
					?>

					<div class="txt" id="infos">		
						<p class="info"><span>Mã id sản phẩm:</span> <?php echo ($item['medicine_id'] == 0) ? $item['tool_id'] : $item['medicine_id']; ?></p>
						<p class="info"><span>Giá:</span> <?php echo number_format($item['price'],0,",","."); ?> Đồng</p>
						<p class="info"><span>Ngày:</span> <?php echo $day; ?></p>
						<p class="info"><span>Số lượng:</span> <?php echo $item['number']; ?></p>   
					</div>
					<a class="btn btn-green" href="/medical_1.com/medicine/list.php" style="background-color: red"> Quay lại </a>
					<?php endforeach; ?>
			</div>
		</li>
	</ul>
</div>	
	</div>
</body>
<footer>
    <?php include '../templates/footer.php'; ?>
</footer>
</html>