<?php 
    require_once("./include/db_info.inc.php");
    $vcode="";
    if(isset($_POST['vcode']))	$vcode=trim($_POST['vcode']);
    if($OJ_VCODE&&($vcode!= $_SESSION[$OJ_NAME.'_'."vcode"]||$vcode==""||$vcode==null) ){
		echo "<script language='javascript'>\n";
		echo "alert('Verify Code Wrong!');\n";
		echo "history.go(-1);\n";
		echo "</script>";
		exit(0);
    }
	require_once("./include/login-".$OJ_LOGIN_MOD.".php");
    $user_id=$_POST['user_id'];
	$password=$_POST['password'];
   if (get_magic_quotes_gpc ()) {
        $user_id= stripslashes ( $user_id);
        $password= stripslashes ( $password);
   }
    $sql="SELECT `rightstr` FROM `privilege` WHERE `user_id`=?";
    $login=check_login($user_id,$password);
	
	if ($login)
    {
		$_SESSION[$OJ_NAME.'_'.'user_id']=$login;
		$result=pdo_query($sql,$login);

		foreach ($result as $row)
			$_SESSION[$OJ_NAME.'_'.$row['rightstr']]=true;
		echo "<script language='javascript'>\n";
		echo "window.location.href='appproblemlist.php';\n";

		echo "</script>";
	}else{
		
		echo "<script language='javascript'>\n";
		echo "alert('UserName or Password Wrong!');\n";
		echo "history.go(-1);\n";
		echo "</script>";
	}
?>
