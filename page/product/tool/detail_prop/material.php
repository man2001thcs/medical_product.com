<link href="../css/drop_menu.css" rel="stylesheet" type="text/css" media="all">
<nav>
	<ul id="dropmenu">
		<li>
			<a href="<?php echo BASE_URL; ?>medicine/">Thuốc y tế</a>
			<ul>
				<li><a href="<?php echo BASE_URL; ?>medicine/create.php">Create</a></li>
				<li><a href="<?php echo BASE_URL; ?>medicine/">List</a></li>
			</ul>
		</li>
		<li>
			<a href="<?php echo BASE_URL; ?>tool/">Dụng cụ y tế</a>
			<ul>
				<li><a href="<?php echo BASE_URL; ?>tool/create.php">Create</a></li>
				<li><a href="<?php echo BASE_URL; ?>tool/">List</a></li>
			</ul>
		</li>
		<li>
			<a href="<?php echo BASE_URL; ?>medicine_type_s/">Loại thuốc</a>
			<ul>
				<li><a href="<?php echo BASE_URL; ?>medicine_type_s/create.php">Create</a></li>
				<li><a href="<?php echo BASE_URL; ?>medicine_type_s/">List</a></li>
			</ul>
		</li>
		<li>
			<a href="<?php echo BASE_URL; ?>manufacturer/">Nhà sản xuất</a>
			<ul>
				<li><a href="<?php echo BASE_URL; ?>manufacturer/create.php">Create</a></li>
				<li><a href="<?php echo BASE_URL; ?>manufacturer/">List</a></li>
			</ul>
		</li>
		<li>
			<a href="<?php echo BASE_URL; ?>user/">Khách hàng</a>
		</li>
		<li>
			<a href="">Hóa đơn</a>
			<ul>
				<li><a href="<?php echo BASE_URL; ?>bill_manage/listM.php">Thuốc</a></li>
				<li><a href="<?php echo BASE_URL; ?>bill_manage/listT.php">Dụng cụ y tế</a></li>
			</ul>
		</li>
	</ul>
</nav>