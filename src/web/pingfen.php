<?php
$cache_time=30;
$OJ_CACHE_SHARE=false;
        //require_once('./include/cache_start.php');
    require_once('./include/db_info.inc.php');
    require_once('./include/const.inc.php');
        require_once('./include/setlang.php');
        //require_once ('./ceinfo.php');//引用结果返回界面
        $now=strftime("%Y-%m-%d %H:%M",time());
if (isset($_GET['cid'])) $ucid="&cid=".intval($_GET['cid']);
else $ucid="";
require_once("./include/db_info.inc.php");

        if(isset($OJ_LANG)){
                require_once("./lang/$OJ_LANG.php");
        }
 if (!isset($_SESSION[$OJ_NAME.'_'.'user_id'])){

	$view_errors= "<a href=loginpage.php>$MSG_Login</a>";
	require("template/".$OJ_TEMPLATE."/error.php");
	exit(0);
//	$_SESSION[$OJ_NAME.'_'.'user_id']="Guest";
}
 
  $pingfenren=$_SESSION [ 'uid' ];
  $score = trim($_POST['score']);
  $beipingren=trim($_POST['beipingren']);

  if($score<0||$score>100)
  {
	  echo "<script>alert('成绩无效，请重新输入！');</script>";
	  echo "<script>location.href='admin.php'; </script>";
	  exit();
	  }
$mysqli  = new  mysqli ( "localhost" ,  "root" ,  "" ,  "test" );

 if ( $mysqli -> connect_errno ) {
     printf ( "Connect failed: %s\n" ,  $mysqli -> connect_error );
    exit();
}

/* create a prepared statement */
 if ( $stmt  =  $mysqli -> prepare ( "insert into tblscore(beipingren, pingfenren,score) values(?,?,?)" )) {
	 
     /* bind parameters for markers */
     $stmt -> bind_param ( "ssi" , $beipingren, $pingfenren, $score);
	

     /* execute query */
   try {
    $stmt -> execute ();
   } catch ( Exception $e ) {
    //echo  'Caught exception: ' ,   $e -> getMessage (),  "\n" ;
	echo "<script>alert('".$e -> getMessage ()."！'); </script>";
     }
     echo "<script>alert('本次提交成功！'); </script>";

     /* close statement */
     $stmt -> close ();
}
else
{
	echo "chucuo";
	}

 /* close connection */
 $mysqli -> close ();
 echo "<script>location.href='admin.php'; </script>";
?>
