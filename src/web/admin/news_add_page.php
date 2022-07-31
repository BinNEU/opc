<html class="iframe-h">
<head >
<meta name="renderer" content="webkit">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
<meta http-equiv="Pragma" content="no-cache">
<meta http-equiv="Cache-Control" content="no-cache">
<meta http-equiv="Content-Language" content="zh-cn">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>New Problem</title>
		<link rel="stylesheet" type="text/css" href="../static/admin/layui/css/layui.css"/>
		<link rel="stylesheet" type="text/css" href="../static/admin/css/admin.css"/>
</head>
<body leftmargin="30" class="iframe-h" >
<div class="page-content-wrap">

<?php require_once("../include/db_info.inc.php");?>
<?php require_once("admin-header.php");
if (!(isset($_SESSION[$OJ_NAME.'_'.'administrator']))){
	echo "<a href='../loginpage.php'>Please Login First!</a>";
	exit(1);
}
?>
<?php
include_once("kindeditor.php") ;
?>
<form class="layui-form" style="width: 90%;padding-top: 20px;" method=POST action=news_add.php>
						<div class="layui-form-item">
							<label class="layui-form-label"><?php echo $MSG_TITLE?>：</label>
							<div class="layui-input-block">
								<input type="text" name="title" autocomplete="off" class="layui-input" value="" size=71>
							</div>
						</div>
						<div class="layui-form-item">
							<label class="layui-form-label">内容：</label>
							<div class="layui-input-block">
								<textarea class=kindeditor name=content ></textarea>
							</div>
						</div>
					
						<div class="layui-form-item">
							<div class="layui-input-block">
							<input class="layui-btn layui-btn-normal" type=submit value=立即提交 name=submit>
							</div>
						</div>
						<?php require_once("../include/set_post_key.php");?>
					</form>
</div>
		<script src="../static/admin/layui/layui.js" type="text/javascript" charset="utf-8"></script>
</body></html>

