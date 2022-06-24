<?php
require_once '../../lib/config/const.php';
require_once '../../lib/config/database.php';
require_once '../../lib/model/Medicine.php';
require_once '../../lib/base/Session.php';
require_once '../../lib/model/User.php';
require_once '../../lib/model/Tool.php';

//$links = ( isset( $_GET['links'] ) ) ? $_GET['links'] : 7;
//$limit = ( isset( $_GET['limit'] ) ) ? $_GET['limit'] : 6;
//$page  = ( isset( $_GET['page'] ) ) ? $_GET['page'] : 1;

if (!isset($user)) {
	$user = new User();
}


$medicine = new Medicine_M();
$tool = new Tool();
$data = $_POST['search_content'];
/*
if (isset($_POST['search'])){
    $data = $_POST['search_content'];
    $result = $medicine->findByNamePart($data);

    foreach($result as $index => $item){
        $item = $item["WpMedicine"]["name"];
        echo $item;
    }

}
*/

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
//$dataM = $medicine->findAll();
//$dataT = $tool->findAll();
?>
<!DOCTYPE html>
<title>Danh sách</title>
<?php include "../templates/css.php"; ?>
<?php include "../templates/js.php"; ?>
<link href="../../css/product/product_card.css" rel="stylesheet" type="text/css" media="all">

</head>

<body>
    <div>
        <?php include '../templates/head.php'; ?>
    </div>

    <div class="bodycontain">

        <div class="search_bar">
            <div id="input">
                <form method="POST">
                    <input type="text" name="search_content" value=<?php echo $data?>>
                    <button type="submit" name="search" id="search">
                        <i class="fa fa-search" aria-hidden="true"></i>
                    </button>
                </form>
            </div>
            <div id="cart_icon">
                <a href="<?php echo BASE_URL; ?>temp_bill/listM.php">Giỏ hàng<img src="../images/buy_icon.png"
                        width="55"></a>
            </div>
        </div>

        <script type="text/javascript">
        function confirmLogIn() {
            var flag = window.alert("Bạn cần đăng nhập!!");
            window.open("../user/login.php");
        }
        </script>

        <div class="heading">
            <span><i class="fa fa-font-awesome" aria-hidden="true"></i> Thuốc y tế </span>
            <div class="see_all"><a href="../medicine/list.php">Xem tất cả<a></div>
        </div>

        <div class="product_con">
            <div class="row_con">
                <?php 
                		//$medicine->number_All();
                		$dataM = $medicine->findByNamePart($data);
	                	if (!empty($dataM)) :?>
                <?php foreach ($dataM as $index => $_item) : $item = $_item['WpMedicine']; 
			                $id = isset($item["manufacturer_id"]) ? intval($item["manufacturer_id"]) : null;
			                $manufacturer = new Manufacturer();
			                $data1 = $manufacturer->findById($id);
			                $data1 = $data1["WpManufacturer"] ?? NULL;

			                $id = isset($item["type"]) ? intval($item["type"]) : null;
			                $medicine_type_s = new Medicine_type_s();
			                $data2 = $medicine_type_s->findById($id);
			                $data2 = $data2["WpMedicineTypeS"] ?? NULL;
			                ?>
                <div class="column_con">
                    <div class="outer">
                        <div class="content">
                            <div class="img_card">
                                <a href="../medicine/detail.php?id=<?php echo $item['id']; ?>">
                                    <img src=<?php echo Helper::return_img($item['id']);?> width="60%">
                                </a>
                            </div>
                            <span class="bg animated fadeInDown">Thuốc y tế</span>
                            <span class="type animated fadeInDown"><?php echo $data2['name']; ?></span>
                            <h2>Tên thuốc: <?php echo $item['name']; ?></h2>
                            <h3>NSX: <?php echo $data1['name']; ?></h3>
                            <div class="button">
                                <a href="#"><?php echo number_format($item['price'],0,",","."); ?> đồng</a>
                                <a class="cart-btn" href="../medicine/detail.php?id=<?php echo $item['id']; ?>"><i
                                        class="cart-icon ion-bag">
                                    </i>Chi tiết
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
                <?php else: ?>
                <h2 style="font-weight: bold;">Không có dữ liệu khớp.</h2>
                <br />
                <?php endif; ?>
            </div>

        </div>
    </div>
    <?php //echo $tool->createLinks( $links, 'pagination'); ?>
</body>

<footer>
    <?php include '../templates/footer.php'; ?>
</footer>

</html>