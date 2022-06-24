<?php
require_once '../../../lib/config/const.php';
require_once '../../../lib/config/database.php';
require_once '../../../lib/model/Medicine.php';
require_once '../../../lib/base/Session.php';
require_once '../../../lib/model/User.php';


$links = ( isset( $_GET['links'] ) ) ? $_GET['links'] : 7;
$limit      = ( isset( $_GET['limit'] ) ) ? $_GET['limit'] : 6;
$page       = ( isset( $_GET['page'] ) ) ? $_GET['page'] : 1;

if (!isset($user)) {
	$user = new User();
}

if (!$user->isLoggedIn()) {
	Helper::redirect('404/404.php');
}

$medicine = new Medicine_M();

/*$data = $medicine->find(array(
	'joins' => array(
		'movie_category' => array(
			'type' => 'INNER',
			'main_key' => 'category_id',
			'join_key' => 'id'
		)
	)
), 'all');
*/
//$data = $medicine->findAll();
?>
<!DOCTYPE html>
<title>Danh sách thuốc</title>
<?php
include "../../templates/css/css.php";
include "../../templates/js/js.php";
?>
</head>

<body>
	
<div>
<?php include '../../templates/header/head.php'; ?>
</div>
<div class="bodycontain">

<div class="heading"><i class="fa fa-font-awesome" aria-hidden="true"></i> 
    Danh sách thuốc

    <a href="<?php echo BASE_URL; ?>temp_bill/listM.php">
		     <img src="../../../lib/images/buy_con.png" width="55" 
		         style="float:right; margin-left: auto ; margin-bottom: 0px; padding: 0px; border: 2px gray solid;
		             border-radius: 8px;"><a style="color: white;"></a>
</div>

<div class="box_list">
	<ul class="con_medi">
		<?php 
		    $medicine->number_All();
			$result = $medicine->getData( $limit, $page);
			//echo json_encode( $result);
			$data = $result->data; 
		    if (!empty($data)) :
			//$country = unserialize(M_COUNTRY);
		?>
			<?php foreach ($data as $index => $_item) : $item = $_item['WpMedicine']; 
			$id = isset($item["manufacturer_id"]) ? intval($item["manufacturer_id"]) : null;
			$manufacturer = new Manufacturer();
			$data1 = $manufacturer->findById($id);
			$data1 = $data1["WpManufacturer"] ?? NULL;

			$id = isset($item["type"]) ? intval($item["type"]) : null;
			$medicine_type_s = new Medicine_type_s();
			$data2 = $medicine_type_s->findById($id);
			$data2 = $data2["WpMedicineTypeS"] ?? NULL;
			?>
				<li class="box_medi" <?php echo $index % 2 == 1 ? 'odd' : ''; ?>>
					<div class="detail_l">
						<p>
							<a href="detail.php?id=<?php echo $item['id']; ?>">
								<img alt="" src=<?php echo Helper::return_img($item['id']);?>>
							</a>
		                    
						</p>
					</div>
					<div class="detail_r">
						<p class="title"><a href="detail.php?id=<?php echo $item['id']; ?>"><?php echo $item['name']; ?></a></p>
						<div class="txt">						
							<p class="info"><span>Tên thuốc:</span> <?php echo $item['name']; ?></p>
							<p class="info"><span>Giá:</span> <?php echo number_format($item['price'],0,",","."); ?> Đồng</p>
							<p class="info"><span>Nhà sản xuất:</span> <?php echo $data1['name'] ?? "NULL"; ?></p>
							<p class="info"><span>Loại thuốc:</span> <?php echo $data2['name'] ?? "NULL"; ?></p>                  
						</div>
					</div>
				</li>
			<?php endforeach; ?>
		<?php else: ?>
			Chưa nhập liệu. <a href="create.php">Nhập thuốc mới</a> ngay !
		<?php endif; ?>
	</ul>
</div>
<?php echo $medicine->createLinks( $links, 'pagination'); ?> 
</div>

</body>
<footer>
    <?php include '../../templates/footer/footer.php'; ?>
</footer>
</html>