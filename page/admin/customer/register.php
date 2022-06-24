<?php
require_once '../lib/config/const.php';
require_once '../lib/config/database.php';
require_once '../lib/model/User.php';

$user = new User();

if ($_POST) {

	$data['User']['email'] = $_POST['email'];
	$data['User']['password'] = $_POST['password'];
	$data['User']['fullname'] = $_POST['fullname'];
	$data['User']['address'] = $_POST['address'];
	$data['User']['created'] = date('Y-m-d H:i:s');
	$data['User']['modified'] = date('Y-m-d H:i:s');

	if ($user->checkUser($data)){
		echo ("<script>alert('Tai khoan da ton tai');</script>");
		
	} else{
		if ($data['User']['password'] != $_POST['re-password']){
			echo ("<script>alert('Mật khẩu không khớp!');</script>");
		} else{
			if ($user->saveLogin($data)) {
				Helper::redirect('user/login.php');
			}
		}		
	}	
}

?>


<!DOCTYPE html>
<title>Register</title>

<link rel="stylesheet" href="../css/fontawesome-free-6.1.1-web/fontawesome-free-6.1.1-web/css/all.css">
<link rel="stylesheet" href="../css/user/register/register.css">

<?php include "../templates/css.php"; ?>
<?php include "../templates/js.php"; ?>


</head>

<body>
<div>
<?php include '../templates/head.php'; ?>
</div>

<div class="bodycontain_login">
	<div class="heading"><i class="fa fa-font-awesome" aria-hidden="true"></i> Đăng kí</div>
    <div class="row">
		<div class="column_img">
			<img src="../images/login_img.png" style="width:100%">
		</div>
        <div class="column_log">
             <div class="login">
                 <div class="form">
                     <form action="" method="post">
                         <h2>Đăng nhập</h2>
				         <?php echo $user->form->error('email'); ?>
                         <input name = "email" type="email" placeholder="Tài khoản">
						 <input name = "password" type="password" placeholder="Mật khẩu">
						 <input name = "re-password" type="password" placeholder="Nhập lại mật khẩu">
						 <input name = "fullname" type="text" placeholder="Họ và tên">
						 <input name = "address" type="text" placeholder="Địa chỉ">
						 <input type="submit" value="Sign Up" class="login">                       
                    </form>
                 </div>
             </div>
	    </div>
    </div>
</div>
</body>

<footer>
    <?php include '../templates/footer.php'; ?>
</footer>
</html>