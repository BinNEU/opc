<?php require_once ("admin-header.php");

if (!(isset($_SESSION[$OJ_NAME.'_'.'administrator']))){
	echo "<a href='../loginpage.php'>Please Login First!</a>";
	exit(1);
}
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<link rel="stylesheet" type="text/css" href="../static/admin/layui/css/layui.css"/>
		<link rel="stylesheet" type="text/css" href="../static/admin/css/admin.css"/>
<div class="container">
<?php require_once("../include/db_info.inc.php");
if (isset($_POST['news_id']))
{
	require_once("../include/check_post_key.php");
$title = $_POST ['title'];
$content = $_POST ['content'];
$user_id=$_SESSION[$OJ_NAME.'_'.'user_id'];
$news_id=intval($_POST['news_id']);
if (get_magic_quotes_gpc ()) {
	$title = stripslashes ( $title);
	$content = stripslashes ( $content );
}


	$sql="UPDATE `news` set `title`=?,`time`=now(),`content`=?,user_id=? WHERE `news_id`=?";
	//echo $sql;
	pdo_query($sql,$title,$content,$user_id,$news_id) ;
	
	
	

	header("location:news_list.php");
	exit();
}else{
	$news_id=intval($_GET['id']);
	$sql="SELECT * FROM `news` WHERE `news_id`=?";
	$result=pdo_query($sql,$news_id);
	if (count($result)!=1){
		echo "No such Contest!";
		exit(0);
	}
	$row=$result[0];
	
	$title=htmlentities($row['title'],ENT_QUOTES,"UTF-8");
	$content=$row['content'];
	
		
}
?>
<?php include("kindeditor.php")?>
<form class="layui-form" style="width: 90%;padding-top: 20px;" method=POST action=news_edit.php>
<p align=center><font size=4 color=#333399>Edit a Contest</font></p>
<input type=hidden name='news_id' value=<?php echo $news_id?>>
						<div class="layui-form-item">
							<label class="layui-form-label"><?php echo $MSG_TITLE?>：</label>
							<div class="layui-input-block">
								<input type="text" name="title" autocomplete="off" class="layui-input" value="<?php echo $title?>" style='size=5'>
							</div>
						</div>
						<div class="layui-form-item">
							<label class="layui-form-label">内容：</label>
							<div class="layui-input-block">
								<textarea class=kindeditor name=content ><?php echo htmlentities($content,ENT_QUOTES,"UTF-8")?></textarea>
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

