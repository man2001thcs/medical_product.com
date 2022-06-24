<?php
require_once '../lib/config/const.php';
require_once '../lib/config/database.php';
require_once '../lib/model/Medicine.php';
require_once '../lib/base/Session.php';
require_once '../lib/model/User.php';

?>
<!DOCTYPE html>
<title>Về chúng tôi</title>
<?php include "../templates/css.php"; ?>
<?php include "../templates/js.php"; ?>
</head>
<body>

<?php include '../templates/head.php'; ?>
<?php include '../templates/f_gnav.php'; ?>

<div class="heading">Về chúng tôi</div>
<div class="box_list">
	<ul class="con_medi">
		
		<li class="box_medi">
			<div class="detail_l">
			
				</div>
				<div class="detail_r" >
					
					<div class="txt">						
						<p class="info" style="font-size: 20px;"><span style="font-size: 20px;">Số điện thoại:</span> 0354324599</p>
						<p class="info" style="font-size: 20px;"><span style="font-size: 20px;">Email:</span> dochu8@gmail.com</p>
						<p class="info" style="font-size: 20px;"><span style="font-size: 20px;">Địa chỉ:</span> Long Biên, Hà Nội, Việt Nam</p>                  
					</div>
				</div>
		</li>
	</ul>
</div>

<?php include '../templates/footer.php'; ?>
</body>
</html>