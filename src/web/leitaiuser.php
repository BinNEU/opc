  <?php

 
    header('Content-type: text/html; charset=UTF8'); // UTF8不行改成GBK试试，与你保存的格式匹配
 
	require_once('./include/db_info.inc.php');
	require_once('./include/cache_start.php');
	require_once('./include/memcache.php');
	require_once('./include/setlang.php');
   $pids=$_GET['pid'];
   $user=$_GET['uid'];
   $sql="SELECT * FROM (
  SELECT COUNT(*) att, user_id, min(10000000000000000000 + time*100000000000 + memory*100000 + code_length) score
  FROM solution
  WHERE problem_id =$pids AND result =4
  GROUP BY user_id
  ORDER BY score, in_date DESC
)c
LEFT JOIN (
  SELECT solution_id, user_id, language, 10000000000000000000 + time*100000000000 + memory*100000 + code_length score, in_date
  FROM solution 
  WHERE problem_id =$pids AND result =4  
  ORDER BY score, in_date DESC
)b ON b.user_id=c.user_id AND b.score=c.score
ORDER BY c.score, in_date ASC
LIMIT 1";
$result=mysql_query_cache($sql);
$row=$result[0];
$score1=$row['score'];


$sqls="SELECT * FROM (
  SELECT COUNT(*) att, user_id, min(10000000000000000000 + time*100000000000 + memory*100000 + code_length) score
  FROM solution
  WHERE problem_id =$pids AND result =4
  and user_id='$user'
  ORDER BY score, in_date DESC
)c
LEFT JOIN (
  SELECT solution_id, user_id, language, 10000000000000000000 + time*100000000000 + memory*100000 + code_length score, in_date
  FROM solution 
  WHERE problem_id =$pids AND result =4  
  ORDER BY score, in_date DESC
)b ON b.user_id=c.user_id AND b.score=c.score
ORDER BY c.score, in_date ASC";
$results=mysql_query_cache($sqls);
$rows=$results[0];
$score2=$rows['score'];
if($score2==$score1){
$sql="UPDATE `problem` SET `source`=? ,in_date=NOW() WHERE `problem_id`=?";
pdo_query($sql,$user,$pids);
}

?>
<script language=javascript>
	history.go(-1);
</script>