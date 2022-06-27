<?php
require_once '../../../lib/config/const.php';
require_once '../../../lib/config/database.php';
require_once '../../../lib/model/User.php';
if (!isset($user)) {
	$user = new User();
}

?>
<!DOCTYPE html>
<title>404</title>
<?php include "../../templates/css/css.php"; ?>
<?php include "../../templates/js/js.php"; ?>

</head>

<body>
    <div>
        <?php include '../../templates/header/head.php'; ?>
    </div>
    <div class="bodycontain">
        <div class="heading"><i class="fa fa-font-awesome" aria-hidden="true"></i> 404: Lỗi không thể truy cập
        </div>

        <div class="img404">
            <img src="../../../lib/images/404.png">
        </div>
    </div>
    </div>
</body>
<footer>
    <?php include '../../templates/footer/footer.php'; ?>
</footer>

</html>