<?php
require_once '../../../lib/config/const.php';
require_once '../../../lib/config/database.php';
require_once '../../../lib/controller/Helper.php';
require_once '../../../lib/model/Medicine.php';
require_once '../../../lib/model/User.php';

if (!isset($user)) {
	$user = new User();
}

if (!$user->isLoggedIn() || !$user->isAdmin()) {
	Helper::redirect_err();
}

$medicine = new Medicine_M();



$id = isset($_GET['id']) ? intval($_GET['id']) : null;

if (empty($id)) {
	Helper::redirect('page/product/medicine');
}

$this_data = $medicine->findById($id);

$target_folder = "medicine_img";
$save_name = $id;

if (isset($_POST['submit'])) {

	$data = $_POST['data'];
	$data['WpMedicine']['created'] = date('Y-m-d H:i:s');
	$data['WpMedicine']['modified'] = date('Y-m-d H:i:s');

	if ($medicine->save($data)) {
		header('Location: index.php');
	}
}





?>
<!DOCTYPE html>
<title>Chỉnh sửa thông tin thuốc</title>
<?php include "../../templates/css/css.php"; ?>
<?php include "../../templates/js/js.php"; ?>
<style>

</style>
</head>

<body>
	<div>
		<?php include '../../templates/header/head.php'; ?>
	</div>
	<div class="bodycontain">
		<div class="heading"><i class="fa fa-medkit" aria-hidden="true"></i> Chỉnh sửa thông tin thuốc</div>
		<form action="" class="form" method="post" enctype="multipart/form-data">
			<?php echo $medicine->form->input('id'); ?>
			<div class="left-column">
				<div class="row">
					<section>
						<dl>
							<dt class="col-25">
								Tên thuốc
							</dt>
							<dd class="col-75">
								<?php echo $medicine->form->input('name'); ?>
								<?php echo $medicine->form->error('name'); ?>
							</dd>
						</dl>
					</section>
				</div>
				<div class="row">
					<section>
						<dl>
							<dt class="col-25">
								Hạn sử dụng (Tháng)
							</dt>
							<dd class="col-75">
								<?php echo $medicine->form->input('HSD'); ?>
								<?php echo $medicine->form->error('HSD'); ?>
							</dd>
						</dl>
					</section>
				</div>
				<div class="row">
					<section>
						<dl>
							<dt class="col-25">
								Giá cả
							</dt>
							<dd class="col-75">
								<?php echo $medicine->form->input('price'); ?>
								<?php echo $medicine->form->error('price'); ?>
							</dd>
						</dl>
					</section>
				</div>
				<div class="row">
					<section>
						<dl>
							<dt class="col-25">
								Số lượng hàng hiện tại
							</dt>
							<dd class="col-75">
								<?php echo $medicine->form->input("remain_number"); ?>
								<?php echo $medicine->form->error("remain_number"); ?>
							</dd>
						</dl>
					</section>
				</div>
				<div class="row">
					<section>
						<dl>
							<dt class="col-25">
								Số lượng hàng đã bán
							</dt>
							<dd class="col-75">
								<?php echo $medicine->form->input("bought_number"); ?>
								<?php echo $medicine->form->error("bought_number"); ?>
							</dd>
						</dl>
					</section>
				</div>
				<div class="row">
					<section>
						<dl>
							<dt class="col-25">
								Nhà sản xuất
							</dt>
							<dd class="col-75">
								<?php echo $medicine->form->input('manufacturer_id'); ?>
								<?php echo $medicine->form->error('manufacturer_id'); ?>
							</dd>
						</dl>
					</section>
				</div>
				<div class="row">
					<section>
						<dl>
							<dt class="col-25">
								Loại
							</dt>
							<dd class="col-75">
								<?php echo $medicine->form->input('type'); ?>
								<?php echo $medicine->form->error('type'); ?>
							</dd>
						</dl>
					</section>
					<br>
				</div>
			</div>
			<div class="right-column">
				<section>
					<dl>
						<dt>
							Mô tả thành phần
						</dt>
						<dd>
							<?php echo $medicine->form->input('description'); ?>
							<?php echo $medicine->form->error('description'); ?>
						</dd>
					</dl>
				</section>
				<section>
					<dl>
						<dt>
							Hướng dẫn sử dụng
						</dt>
						<dd>
							<?php echo $medicine->form->input('manual'); ?>
							<?php echo $medicine->form->error('manual'); ?>
						</dd>
					</dl>
				</section>

				<?php include '../../../lib/images/save_img.php'; ?>
				<br>
				<br>
			</div>

			<section>
				<dl>
					<dd>
						<input type="submit" name="submit" value="Save" class="btn btn-green">
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