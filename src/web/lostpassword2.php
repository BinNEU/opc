<?php
        require_once('./include/db_info.inc.php');
        require_once('./include/setlang.php');
        $view_title= "Welcome To Online Judge";

require_once("./include/const.inc.php");
require_once("./include/my_func.inc.php");
$lost_user_id=$_POST['user_id'];
$lost_key=$_POST['lost_key'];
$newpass=$_POST['newpass'];
  if(get_magic_quotes_gpc()){
        $lost_user_id=stripslashes($lost_user_id);
        $lost_key=stripslashes($lost_key);
        $newpass=stripslashes($newpass);
  }
  $sql=" update `users` set password=? WHERE `user_id`=?";
  if(

   $_SESSION[$OJ_NAME.'_'.'lost_user_id']==$lost_user_id &&
   $_SESSION[$OJ_NAME.'_'.'lost_key']==$lost_key
  ){
    $result=pdo_query($sql,pwGen($newpass),$lost_user_id);
    $view_errors="密码已重置。点击 <a href=loginpage.php>这里</a>登录!";
  }else{
         $view_errors="密码重置失败";
  }


  require("template/".$OJ_TEMPLATE."/error.php");
/////////////////////////Template

/////////////////////////Common foot
?>
