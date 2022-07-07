<?php
require_once '../../../lib/config/const.php';
require_once '../../../lib/config/database.php';
require_once '../../../lib/base/Helper.php';
require_once '../../../lib/model/Medicine.php';
require_once '../../../lib/model/User.php';

if (!isset($user)) {
	$user = new User();
}

if (!$user->isLoggedIn() || !$user->isAdmin()) {
	Helper::redirect_err();
}

$medicine = new Medicine_M();
$new_m =  $medicine->findById_New();


$target_folder = "medicine_img";

echo $new_m;
$save_name = $new_m;

$target_dir = "../../../lib/images/medicine_img/";


if ($_POST) {
	

	$data = $_POST['data'];
	//echo json_encode($data);
	$data['WpMedicine']['created'] = date('Y-m-d H:i:s');
	$data['WpMedicine']['modified'] = date('Y-m-d H:i:s');
	
	
	if ($medicine->save($data)) {
		Helper::redirect('index.php');   	
    }
}

?>
<!DOCTYPE html>
<title>Medicine Create</title>
<?php include "../../templates/css/css.php"; ?>
<?php include "../../templates/js/js.php"; ?>

</head>

<body>
<div>
<?php include '../../templates/header/head.php'; ?>
</div>

<div class="bodycontain">
<div class="heading"><i class="fa fa-font-awesome" aria-hidden="true"></i> Tạo đơn thuốc</div>
<form action="" class="form" method="post" enctype="multipart/form-data">
	<section>
		<dl>
			<dt>
				Tên thuốc
			</dt>
			<dd>
				<?php echo $medicine->form->input("name"); ?>
				<?php echo $medicine->form->error("name"); ?>
			</dd>
		</dl>
	</section>
	<section>
		<dl>
			<dt>
				Giá
			</dt>
			<dd>
				<?php echo $medicine->form->input("price"); ?>
				<?php echo $medicine->form->error("price"); ?>
			</dd>
		</dl>
	</section>
	<section>
		<dl>
			<dt>
				Số lượng hàng hiện tại
			</dt>
			<dd>
				<?php echo $medicine->form->input("remain_number"); ?>
				<?php echo $medicine->form->error("remain_number"); ?>
			</dd>
		</dl>
	</section>
	<section>
		<dl>
			<dt>
				HSD (Tháng)
			</dt>
			<dd>
				<?php echo $medicine->form->input("HSD"); ?>
				<?php echo $medicine->form->error("HSD"); ?>
			</dd>
		</dl>
	</section>
	<section>
		<dl>
			<dt>
				Nhà sản xuất
			</dt>
			<dd>
				<?php echo $medicine->form->input("manufacturer_id"); ?>
				<?php echo $medicine->form->error("manufacturer_id"); ?>
			</dd>
		</dl>
	</section>
	<section>
		<dl>
			<dt>
				Loại
			</dt>
			<dd>
				<?php echo $medicine->form->input("type"); ?>
				<?php echo $medicine->form->error("type"); ?>
			</dd>
		</dl>
	</section>
	<section>
		<dl>
			<dt>
				Thành phần
			</dt>
			<dd>
				<?php echo $medicine->form->input("description"); ?>
				<?php echo $medicine->form->error("description"); ?>
			</dd>
		</dl>
	</section>
	<section>
		<dl>
			<dt>
				Hướng dẫn sử dụng
			</dt>
			<dd>
				<?php echo $medicine->form->input("manual"); ?>
				<?php echo $medicine->form->error("manual"); ?>
			</dd>
		</dl>
	</section>
	
	<?php include '../../../lib/images/save_img.php'; ?>

	<section>
		<dl>
			<dd>
				<input type="submit" name="submit" value="Create" class="btn btn-green">
			</dd>
		</dl>
	</section>
</form>

</div>

</body>

<footer>
    <?php include '../../templates/footer/footer.php'; ?>
</footer>
</html>