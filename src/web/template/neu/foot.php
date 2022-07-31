<?php
$cur_path = "template/$OJ_TEMPLATE/";
?>
<style>
.footer2 {
	background: #363636;
	padding: 15px 0;
	color: #aaa;
	font-size: 12px;

}
.footer2 a {
	color: #aaa;
}
.footer2 a:hover {
	color: #fff;
}
.footer2 p {
	margin: 0;
}
.panel-simplenav {
	margin-left: -5px;
}
.panel-simplenav a {
	margin: 0 5px;
}
.panel {
	margin-bottom: 0px;
	background-color: transparent;
	border: 1px solid transparent;
	border-radius: 0px;
	-webkit-box-shadow: none;
	box-shadow: none;
}
.panel-body {
	padding: 0px;
}

</style>
<footer class="footer2">

				<div class="row">

					<div class="col-md-6 panel">
						<div class="panel-body">
							<p class="simplenav">
							<a href="<?php echo $path_fix?>userinfo.php?user=<?php echo $sid ?>">Home</a>
							<a href="<?php echo $path_fix?>problemset.php">练习</a>
							<a href="<?php echo $path_fix?>problemlist.php">题库</a>
							<a href="<?php echo $path_fix?>category.php">分类</a>
							<a href="<?php echo $path_fix?>status.php">状态</a>
							<a href="<?php echo $path_fix?>ranklist.php">排名</a>
							<a href="<?php echo $path_fix?>bbs.php">社区</a>
							<a href="<?php echo $path_fix?>faqs.php">问答</a>
							</p>
						</div>
					</div>

					<div class="col-md-6 panel">
						<div class="panel-body">
						<p class="text-right">
								This <a href=http://cm.baylor.edu/welcome.icpc>ACM/ICPC</a> OnlineJudge is a GPL product from <a href=https://github.com/zhblue/hustoj>hustoj</a>
							</p>
						</div>
					</div>

				</div>
				<!-- /row of panels -->

	</footer>