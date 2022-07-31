<?php session_start();
require_once("include/db_info.inc.php");
if (!isset($_SESSION[$OJ_NAME.'_'.'user_id'])){
	require_once("islogin.php");
	exit(0);
}

require_once("include/memcache.php");
require_once("include/const.inc.php");
    
	$user=$_SESSION[$OJ_NAME.'_'.'user_id'];
	 $id=intval($_GET['id']);
	 
	 $sql="select * from tblproject where user_id= ? and project_id= ?";	
	 $result=pdo_query($sql,$user,$id);
	 $flag=$result;
	 if(empty($flag))
	 {
		 $projectsub=false;
		 $sqls="select * from users where user_id= ?";
		 $results=pdo_query($sqls,$user);
	     $row=$results[0];
		 $nick=$row["nick"];
		 $school=$row["school"];

		 
	 }
	 else{
		 $projectsub=true;
	 }
	 
	if(isset($_FILES["fileup"]["name"])){ 
if($_FILES["fileup"]["name"]){
		 $OJ_Project="./project";
		 $Stu_Project="$OJ_Project/$id/$user";
		 mkdir ( $Stu_Project );
		 
$allowedExts = array("pdf", "doc","xls","docx","xlsx","zip", "jpg", "png");
$temp = explode(".", $_FILES["fileup"]["name"]);
$extension = end($temp);     // 获取文件后缀名
if ((($_FILES["fileup"]["type"] == "application/pdf"))
&& ($_FILES["fileup"]["size"] < 20971520)   // 小于 200 kb
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
        if (file_exists("$Stu_Project/" . $_FILES["fileup"]["name"]))
        {
			echo "<meta http-equiv='Content-Type'' content='text/html; charset=utf-8'>";
			echo "<script>alert('文件已经存在,请重新上传');location.href='./project.php?id=".$id."'</script>";
        }
        else
        {
			$filename=$_FILES["fileup"]["name"];
            // 如果 upload 目录不存在该文件则将文件上传到 upload 目录下
            move_uploaded_file($_FILES["fileup"]["tmp_name"], "$Stu_Project/" . $_FILES["fileup"]["name"]);
			$file="$Stu_Project/" . $_FILES["fileup"]["name"];
			$user_id=$_POST['user_id'];
			$user_name=$_POST['user_name'];
			$class=$_POST['class'];
			$school=$_POST['school'];
			$project_id=$_POST['project_id'];
        if (get_magic_quotes_gpc ()){
                $user_id = stripslashes ($user_id);
                $user_name = stripslashes ($user_name);
                $class = stripslashes ($class);
                $school = stripslashes ($school);
				$project_id = stripslashes ($project_id);
        }

	//echo $langmask;	
	
        $sql="insert INTO `tblproject`(`user_id`,`user_name`,`class`,`school`,`project_id`,`file`,`filename`)
                VALUES(?,?,?,?,?,?,?)";
	$workid=pdo_query($sql,$user_id,$user_name,$class,$school,$project_id,$file,$filename) ;
	echo "<meta http-equiv='Content-Type'' content='text/html; charset=utf-8'>";
	echo "<script language='JavaScript'>;alert('提交成功');location.href='./projectlist.php';</script>;";


}
        }
    }


else
{
	echo "<meta http-equiv='Content-Type'' content='text/html; charset=utf-8'>";
	echo "<script>alert('非法的文件格式,请重新上传');location.href='./project.php?id=".$id."';</script>";
}
}
	}
?>
