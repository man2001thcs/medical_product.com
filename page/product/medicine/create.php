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
$success = false;

$target_dir = "../../../lib/images/medicine_img/";


if ($_POST) {
	$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
	$uploadOk = 1;
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

	$data = $_POST['data'];
	echo json_encode($data);
	$data['WpMedicine']['created'] = date('Y-m-d H:i:s');
	$data['WpMedicine']['modified'] = date('Y-m-d H:i:s');

// Check if image file is a actual image or fake image

	$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
	if($check !== false) {
		//echo "File is an image - " . $check["mime"] . ".";
		$uploadOk = 1;
	} else {
		//echo "File is not an image.";
		$uploadOk = 0;
	}

    // Check if file already exists
	$target_file1 = $target_dir . $data['WpMedicine']['name'] . ".png";

    if (file_exists($target_file1)) {
		//echo "Sorry, file already exists.";
		$uploadOk = 0;
    }

    // Check file size
    if ($_FILES["fileToUpload"]["size"] > 500000) {
		//echo "Sorry, your file is too large.";
		$uploadOk = 0;
    }

    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
	&& $imageFileType != "gif" ) {
		//echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
		$uploadOk = 0;
    }

// Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
		//echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
		$temp = $data['WpMedicine']['name'];
		$temp .= "_" . $data['WpMedicine']['manufacturer_id'] . "_" . $data['WpMedicine']['type'];
		$temp .= ".png";
		$target_file = $target_dir . $temp;
		if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
			if ($medicine->save($data)) {
				Helper::redirect('index.php');
			}
		} else {
			//echo "Sorry, there was an error uploading your file.";
		}
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
	
	<section>
		<dl>
			<dd>
			    <input type="file" name="fileToUpload" id="fileToUpload">
				<button name="file_cancel" id="file_cancel" class="btn btn-reds">Cancel </button>
			</dd>
		</dl>
	</section>
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