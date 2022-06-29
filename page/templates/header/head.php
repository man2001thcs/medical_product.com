<?php


if (!isset($user)) {
	$user = new User();
}
?>
<header id="log">
    <div class="logo" style="height:58px;">
        <img src="../../../lib/images/medicine_logo.png" width="45" />
        <div class="title"><a href="../../../page/main_page/main/list.php" style="color:white;">Medicine</a></div>
        <div class="title" style="font-size:90%; ">Vietnam top 1 medicine website</div>
    </div>
    <nav>
        <ul style="margin-right:7%;">
            <?php if ($user->isLoggedIn()) :?>

            <li style="color: white; font-weight: bold;">
                <a href="<?php echo BASE_URL; ?>page/user/change_info/edit.php">
                    <span
                        style="font-weight: bold; font-style: italic; font-size:18px;"><?php echo($user->welcome()); ?>
                    </span>
                </a>
                <a href="<?php echo BASE_URL; ?>page/user/log/logout.php"> <i class="fa fa-sign-out" aria-hidden="true"
                        style="color: white;"></i></a>
            </li>

            <?php endif; ?>

            <?php if (!$user->isLoggedIn()) :?>
            <li><a href="<?php echo BASE_URL; ?>page/user/log/login.php"> <i class="fa fa-sign-in" aria-hidden="true"
                        style="color: white;"></i></a>
            </li>
            <?php endif; ?>
        </ul>
    </nav>
</header>

<div class="drop_menu_t">
    <?php include '../../templates/header/sum_nav.php'; ?>
</div>

<header>
    <div class="image"><img src="../../../lib/images/background_t3.png" /></div>
</header>