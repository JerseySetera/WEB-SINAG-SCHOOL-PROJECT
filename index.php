<?php

include_once 'classes/class.user.php';
include_once 'classes/class.product.php';
include_once 'classes/class.receive.php';
include_once 'classes/class.release.php';
include_once 'classes/class.inventory.php';
include 'config/config.php';

$page = (isset($_GET['page']) && $_GET['page'] != '') ? $_GET['page'] : '';
$subpage = (isset($_GET['subpage']) && $_GET['subpage'] != '') ? $_GET['subpage'] : '';
$action = (isset($_GET['action']) && $_GET['action'] != '') ? $_GET['action'] : '';
$id = (isset($_GET['id']) && $_GET['id'] != '') ? $_GET['id'] : '';

$user = new User();
$product = new Product();
$receive = new Receive();
$release = new Release();
$inventory = new Inventory();
if(!$user->get_session()){
	header("location: login.php");
}
$user_id = $user->get_user_id($_SESSION['user_email']);
?>
<!DOCTYPE html>
<html>
<head>
    <title>SINAG</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@200&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="css/custom.css?<?php echo time();?>">
</head>
<body>
<div id="container">
    <div id="header">
      <h2>SINAG ADMIN PANEL</h2>
    </div>
    <div id="wrapper">
            <div id="menu">
            <a href="index.php?page=settings&amp;subpage=users"><i class="fa fa-person"></i>&nbsp; Employees</a> 
                <a href="index.php?page=receive"><i class="fa-solid fa-clipboard-user"></i>&nbsp;Attendance</a> 
                <a href="index.php?page=release"><i class="fa-solid fa-money-bill"></i>&nbsp;Payroll</a>
                <a href="index.php?page=charts"><i class="fa-solid fa-chart-simple"></i>&nbsp;Chart</a>
                <a href="logout.php" class="move-right"><i class="fa-solid fa-right-from-bracket"></i>&nbsp;Log Out</a> 
                <span class="move-right"><?php //echo $user->get_user_lastname($user_id).', '.$user->get_user_firstname($user_id);?>&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;</span> 
            </div>
            <div id="content">
                <?php
                switch($page){
                            case 'settings':
                                require_once 'settings-module/index.php';
                            break; 
                            case 'receive':
                                require_once 'receive-module/index.php';
                            break; 
                            case 'inventory':
                                require_once 'inventory-module/index.php';
                            break; 
                            case 'release':
                                require_once 'release-module/index.php';
                            break; 
                            case 'charts':
                                require_once 'charts-module/index.php';
                            break; 
                            default:
                                require_once 'main.php';
                            break; 
                        }
                ?>
            </div>
    </div>
</div>
</body>
</html>
