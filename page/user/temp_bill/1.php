<?php
require_once '../lib/config/const.php';
require_once '../lib/config/database.php';
require_once '../lib/model/Buy_Log.php';
require_once '../lib/base/Session.php';
require_once '../lib/model/User.php';
require_once '../lib/model/Medicine.php';
require_once '../lib/model/Tool.php';

if (!isset($user)) {
	$user = new User();
}

if (!$user->isLoggedIn()) {
	Helper::redirect('404/404.php');
}

$buy_log = new Buy_Log();
$code = $buy_log->verifyCode();


?>
<!DOCTYPE html>
<title>Danh sách hóa đơn đặt hàng</title>
<?php include "../templates/css.php"; ?>
<?php include "../templates/js.php"; ?>

</head>

<body>
<div>
<?php include '../templates/head.php'; ?>
</div>
<div class="bodycontain">

<div class="heading">Danh sách hóa đơn đặt hàng</div>
<div class="box_list">
	<ul class="con_medi">
		<?php 
		$data = $user->getCart();
		//echo json_encode( $result);
		foreach ($data as $_item) :?>
		
			<?php 
			$_item['stt'];
			$item = $_item['WpBuyLog']; 
			if ($item['tool_id']==0){
				$id = isset($item["medicine_id"]) ? intval($item["medicine_id"]) : null;
			    $medicine = new Medicine_M();			
			    $data1 = $medicine->findById($id);
			    $data1 = $data1["WpMedicine"] ?? NULL;
			} else {
				$id = isset($item["tool_id"]) ? intval($item["tool_id"]) : null;
			    $tool = new Tool();			
			    $data1 = $tool->findById($id);
			    $data1 = $data1["WpTool"] ?? NULL;
			}

			
			?>
				<li class="box_medi" <?php echo $_item['stt'] % 2 == 1 ? 'odd' : ''; ?>>
					<div class="detail_r">
						<p class="title">Số thứ tự: <?php echo $_item['stt'];?></p>

						<div class="txt">						
							<p class="info"><span>Tên sản phẩm:</span> <?php echo $data1['name'] ?? "NULL"; ?></p>
							<p class="info"><span>Số lượng:</span> <?php echo $item['number']; ?></p>
							<p class="info"><span>Giá đơn sản phẩm:</span> <?php echo number_format($item['price'],0,",","."); ?> đồng</p>										
						    <td class="center">
							<a href="delete.php?stt=<?php echo $_item['stt']; ?>" class="popup active delete">Xóa</a>
						</td>										                 
						</div>
					</div>			
					
				</li>
		<?php endforeach; ?>

		<form action="create_order.php?code=<?php echo $code;?>" class="form" method="post">
				<section>
		            <dl>
			            <dd>					    
						     <input type="submit" name="submit" value="Mua" class="btn btn-green" onclick="alert('Thêm thành công!!');">
						     <a class="btn btn-green" href="/medical_1.com/medicine/list.php" style="background-color: red"> Hủy bỏ </a>
			            </dd>							
		            </dl>
	            </section>

				

	        </form>
	</ul>

</div>
</div>



</body>
<footer>
    <?php include '../templates/footer.php'; ?>
</footer>
</html>