﻿<?php include_once "base.php";

// 後臺保護(一般使用者無法進入)
if(!isset($_SESSION['user']) or $_SESSION['user']!=='admin'){
to("index.php");
exit();
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0039) -->
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

	<title>健康促進網-後台</title>
	<link href="./css/css.css" rel="stylesheet" type="text/css">
	<script src="./js/jquery-3.4.1.min.js"></script>
	<script src="./js/js.js"></script>
</head>

<body>
	<div id="alerr" style="background:rgba(51,51,51,0.8); color:#FFF; min-height:100px; width:300px; position:fixed; display:none; z-index:9999; overflow:auto;">
		<pre id="ssaa"></pre>
	</div>

	<div id="all">
		<div id="title">
			<?= date("m月 d 號 l"); ?>| 今日瀏覽: <?= $Total->find(['date' => date("Y-m-d")])['total']; ?> | 累積瀏覽:<?= $Total->math('sum', 'total'); ?>
			<!--  找出是今天的資料 -->
			<a href="index.php" style='float:right'>回首頁</a>
		</div>


		<div id="title2" title="健康促進網-回首頁" onclick="location.href='index.php'">
			<img src="./icon/02B01.jpg" alt="">

		</div>
		<div id="mm">
			<div class="hal" id="lef">
				<a class="blo" href="?do=user">帳號管理</a>
				<a class="blo" href="?do=po">分類網誌</a>
				<a class="blo" href="?do=news">最新文章管理</a>
				<a class="blo" href="?do=know">講座訊息管理</a>
				<a class="blo" href="?do=que">問卷調查管理</a>
			</div>
			<div class="hal" id="main">
				<div>

					<marquee style="width:80%; display:inline-block;">

						請民眾踴躍投稿電子報，讓電子報成為大家相互交流、分享的園地！詳見最新文章
					</marquee>


					<span style="width:18%; display:inline-block;">
					<?php
							if(isset($_SESSION['user'])){
								if($_SESSION['user']==='admin'){
								?>
								歡迎，<?=$_SESSION['user'];?>
								<button onclick="location.href='back.php'">管理</button>
								|<button onclick='logout()'>登出</button>
								<?php
								}else{
							?>
							歡迎，<?=$_SESSION['user'];?>
							<button onclick='logout()'>登出</button>
							<?php
							}
							}else{
							?>
						<a href="?do=login">會員登入</a>
						<?php	
							}
							?>
					</span>
					<div class="content">
						<?php

						// 第一種方式
						// if (isset($_GET['do'])) {
						// 	$do = $_GET['do'];
						// } else {
						// 	$do = 'main';
						// }

						// 第二種方式
						// $do=$_GET['do']?$_GET['do']:'main';

						// 第三種方式
						$do = $_GET['do'] ?? 'main';
						// 有兩個條件以上就不能用

						$file = './back/' . $do . ".php";
						if (file_exists($file)) {
							include $file;
						} else {
							include "./back/main.php";
						}

						?>
					</div>
				</div>
			</div>
		</div>
		<div id="bottom">
			本網站建議使用：IE9.0以上版本，1024 x 768 pixels 以上觀賞瀏覽 ， Copyright © 2022健康促進網社群平台 All Right Reserved
			<br>
			服務信箱：health@test.labor.gov.tw<img src="./icon/02B02.jpg" width="45">
		</div>
	</div>

</body>

</html>