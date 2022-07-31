<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
</head>

<body>
<?php
  session_start();
  $pingfenren=$_SESSION [ 'uid' ];
  $score = trim($_POST['score']);
  $beipingren=trim($_POST['beipingren']);
  if($pingfenren==null)
  {
	  echo "<script>alert('请先登录系统！');</script>";
	  exit();
	  }
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
</body>
</html>