<link href="../../../css/drop_menu.css" rel="stylesheet" type="text/css" media="all">
<nav>
	<ul id="dropmenu">
		<li>
			<a href="<?php echo BASE_URL; ?>page/product/medicine/">Thuốc y tế</a>
			<ul>
				<li><a href="<?php echo BASE_URL; ?>page/product/medicine/create.php">Create</a></li>
				<li><a href="<?php echo BASE_URL; ?>page/product/medicine/">List</a></li>
			</ul>
		</li>
		<li>
			<a href="<?php echo BASE_URL; ?>medicine_type_s/">Loại thuốc</a>
			<ul>
				<li><a href="<?php echo BASE_URL; ?>page/product/medicine_type_s/create.php">Create</a></li>
				<li><a href="<?php echo BASE_URL; ?>page/product/medicine_type_s/">List</a></li>
			</ul>
		</li>
		<li>
			<a href="<?php echo BASE_URL; ?>manufacturer/">Nhà sản xuất</a>
			<ul>
				<li><a href="<?php echo BASE_URL; ?>page/manufacturer/file/create.php">Create</a></li>
				<li><a href="<?php echo BASE_URL; ?>page/manufacturer/file/">List</a></li>
			</ul>
		</li>
		<li>
			<a href="<?php echo BASE_URL; ?>page/manage/user/">Khách hàng</a>
		</li>
		<li>
			<a href="">Hóa đơn</a>
			<ul>
				<li><a href="<?php echo BASE_URL; ?>page/admin/bill_manage/listM.php">Thuốc</a></li>
				<li><a href="<?php echo BASE_URL; ?>page/admin/bill_manage/listT.php">Dụng cụ y tế</a></li>
			</ul>
		</li>
	</ul>
</nav>