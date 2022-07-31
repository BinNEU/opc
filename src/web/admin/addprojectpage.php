<?php require_once ("admin-header.php");
if (!(isset($_SESSION[$OJ_NAME.'_'.'administrator'])||isset($_SESSION[$OJ_NAME.'_'.'problem_editor']))){
	echo "<a href='../loginpage.php'>Please Login First!</a>";
	exit(1);
}
?>
<?php require_once ("../include/db_info.inc.php");
?>

<?php
$OJ_Project="../project";
$description="";
if($_FILES["fileup"]["name"]){
$allowedExts = array("pdf", "doc","xls","docx","xlsx","zip", "jpg", "png");
$temp = explode(".", $_FILES["fileup"]["name"]);
echo $_FILES["fileup"]["type"];
$extension = end($temp);     // 获取文件后缀名
if ((($_FILES["fileup"]["type"] == "image/x-png")
|| ($_FILES["fileup"]["type"] == "application/msword")
|| ($_FILES["fileup"]["type"] == "application/pdf")
|| ($_FILES["fileup"]["type"] == "application/vnd.openxmlformats-officedocument.wordprocessingml.document")
|| ($_FILES["fileup"]["type"] == "application/vnd.ms-excel")
|| ($_FILES["fileup"]["type"] == "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet")
|| ($_FILES["fileup"]["type"] == "application/x-zip-compressed")
|| ($_FILES["fileup"]["type"] == "image/jpeg")
|| ($_FILES["fileup"]["type"] == "image/png"))
&& ($_FILES["fileup"]["size"] < 52428800)   // 小于 50Mb
&& in_array($extension, $allowedExts))
{
    if ($_FILES["fileup"]["error"] > 0)
    {
        echo "错误：: " . $_FILES["fileup"]["error"] . "<br>";
    }
    else
    {
        
        
        // 判断当前目录下的 upload 目录是否存在该文件
        // 如果没有 upload 目录，你需要创建它，upload 目录权限为 777
        if (file_exists("$OJ_Project/" . $_FILES["fileup"]["name"]))
        {
            echo $_FILES["fileup"]["name"] . " 文件已经存在。 ";
        }
        else
        {
			$filename=$_FILES["fileup"]["name"];
            // 如果 upload 目录不存在该文件则将文件上传到 upload 目录下
            move_uploaded_file($_FILES["fileup"]["tmp_name"], "$OJ_Project/" . $_FILES["fileup"]["name"]);
            echo "文件存储在: " . "$OJ_Project/" . $_FILES["fileup"]["name"];
			$file="$OJ_Project/" . $_FILES["fileup"]["name"];
			 if (isset($_POST['startdate']))
{
	
	require_once("../include/check_post_key.php");
	
	$starttime=$_POST['startdate']." ".intval($_POST['shour']).":".intval($_POST['sminute']).":00";
	$endtime=$_POST['enddate']." ".intval($_POST['ehour']).":".intval($_POST['eminute']).":00";
	//	echo $starttime;
	//	echo $endtime;
  
        $title=$_POST['title'];
        $private=$_POST['private'];
        $password=$_POST['password'];
        $description=$_POST['description'];
        if (get_magic_quotes_gpc ()){
                $title = stripslashes ($title);
                $private = stripslashes ($private);
                $password = stripslashes ($password);
                $description = stripslashes ($description);
        }

	//echo $langmask;	
	
        $sql="insert INTO `project`(`title`,`start_time`,`end_time`,`private`,`description`,`password`,`user_id`,`filename`,`file`)
                VALUES(?,?,?,?,?,?,?,?,?)";
	$proid=pdo_query($sql,$title,$starttime,$endtime,$private,$description,$password,$_SESSION[$OJ_NAME.'_'.'user_id'],$filename,$file) ;
	echo "Add project ".$proid;
	$basedir = "$OJ_Project/$proid";
	mkdir ( $basedir );
}
        }
    }


}
else
{
    echo "非法的文件格式,请重新上传";
}
}
 
  include_once("kindeditor.php") ;
?>
	
<div class="container">
<br>
	<form method=POST enctype="multipart/form-data">
	<p align=left><?php echo $MSG_TITLE?><input class=input-xxlarge  type=text name=title size=71 value="<?php echo isset($title)?$title:""?>"></p>
	<p align=left><?php echo $MSG_Start?>:
	<input  class=input-large type=date name='startdate' value='<?php echo date('Y').'-'. date('m').'-'.date('d')?>' size=4 >
	Hour:<input class=input-mini    type=text name=shour size=2 value=<?php echo date('H')?>>&nbsp;
	Minute:<input class=input-mini    type=text name=sminute value=00 size=2 ></p>
	<p align=left>截止日期：
	<input  class=input-large type=date name='enddate' value='<?php echo date('Y').'-'. date('m').'-'.date('d')?>' size=4 >
	Hour:<input class=input-mini  type=text name=ehour size=2 value=<?php echo (date('H')+4)%24?>>&nbsp;
	Minute:<input class=input-mini  type=text name=eminute value=00 size=2 ></p>
	状态:<select name=private><option value=0><?php echo $MSG_Public?></option>
				    <option value=1><?php echo $MSG_Private?></option>
               </select>
	<?php echo $MSG_PASSWORD?>:<input type=text name=password value="">
	<?php require_once("../include/set_post_key.php");?>
	<br>
	<p align=left>说明:<br><textarea class=kindeditor rows=13 name=description cols=80></textarea>
	<p align=left>上传附件：(允许上传的格式 "pdf", "doc","xls","docx","xlsx","zip", "jpg", "png"，大小应小于50M)<input type=file value=fileup name=fileup>
	<br>
	<input type=submit value=Submit name=submit>   <input type=reset value=Reset name=reset>
	</form>
</div>
<?php 
require_once("../oj-footer.php");

?>

