<?php
require_once '../../../lib/config/const.php';
require_once '../../../lib/config/database.php';
require_once '../../../lib/model/User.php';

$user = new User();

$data = $user->findAll();
?>
<!DOCTYPE html>
<title>User Management</title>
<?php include "../../templates/css/css.php"; ?>
<?php include "../../templates/js/js.php"; ?>

</head>

<body>
    <div>
        <?php include '../../templates/header/head.php'; ?>
    </div>
    <div class="bodycontain">
        <div class="heading">User Management</div>
        <div class="box_table">
            <table>
                <colgroup>
                    <col width="25%">
                    <col width="20%">
                    <col width="20%">
                    <col width="35%">
                </colgroup>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Email</th>
                        <th>Tên</th>
                        <th>Địa chỉ</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($data)) : ?>
                    <?php foreach ($data as $item) : 
				    $item = $item['User'];
					if($item['is_admin']==1){continue;};
					 ?>
                    <tr>
                        <td class="center">
                            <?php echo date('Y/m/d H:i:s', strtotime($item['created'])); ?>
                        </td>
                        <td>
                            <?php echo $item['email']; ?>
                        </td>
                        <td>
                            <?php echo $item['fullname']; ?>
                        </td>
                        <td>
                            <?php echo $item['address']; ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

<footer>
    <?php include '../../templates/footer/footer.php'; ?>
</footer>

</html>