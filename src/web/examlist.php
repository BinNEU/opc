<?php 
	$OJ_CACHE_SHARE=false;
	$cache_time=60;
	require_once('./include/db_info.inc.php');
	require_once('./include/cache_start.php');
	require_once('./include/memcache.php');
	require_once('./include/setlang.php');



$view_title= "Problem Set";
$sub_arr=Array();
// submit
if (isset($_SESSION[$OJ_NAME.'_'.'user_id'])){
$sql="SELECT `problem_id` FROM `solution` WHERE `user_id`=?".
                                                                       //  " AND `problem_id`>='$pstart'".
                                                                       // " AND `problem_id`<'$pend'".
	" group by `problem_id`";
$result=pdo_query($sql,$_SESSION[$OJ_NAME.'_'.'user_id']);
foreach ($result as $row)
	$sub_arr[$row[0]]=true;
}

$acc_arr=Array();
// ac
if (isset($_SESSION[$OJ_NAME.'_'.'user_id'])){
$sql="SELECT `problem_id` FROM `solution` WHERE `user_id`=?".
                                                                       //  " AND `problem_id`>='$pstart'".
                                                                       //  " AND `problem_id`<'$pend'".
	" AND `result`=4".
	" group by `problem_id`";
$result=pdo_query($sql,$_SESSION[$OJ_NAME.'_'.'user_id']);
foreach ($result as $row)
	$acc_arr[$row[0]]=true;
}
$good=$_GET['good'];

  function formatTimeLength($length)
{
	$hour = 0;
	$minute = 0;
	$second = 0;
	$result = '';
	
	if ($length >= 60)
	{
		$second = $length % 60;
		if ($second > 0)
		{
			$result = $second . '秒';
		}
		$length = floor($length / 60);
		if ($length >= 60)
		{
			$minute = $length % 60;
			if ($minute == 0)
			{
				if ($result != '')
				{
					$result = '0分' . $result;
				}
			}
			else
			{
				$result = $minute . '分' . $result;
			}
			$length = floor($length / 60);
			if ($length >= 24)
			{
				$hour = $length % 24;
				if ($hour == 0)
				{
					if ($result != '')
					{
						$result = '0小时' . $result;
					}
				}
				else
				{
					$result = $hour . '小时' . $result;
				}
				$length = floor($length / 24);
				$result = $length . '天' . $result;
			}
			else
			{
				$result = $length . '小时' . $result;
			}
		}
		else
		{
			$result = $length . '分' . $result;
		}
	}
	else
	{
		$result = $length . '秒';
	}
	return $result;
}
$first=1000;
  //if($OJ_SAE) $first=1;
$sql="select max(`problem_id`) as upid FROM `problem` order by 'problem_id' desc";
$page_cnt=100;
$result=mysql_query_cache($sql);
$row=$result[0];
$max_p=$row['upid'];//2019.3.21 修改倒序输出
$cnt=$row['upid']-$first;
$cnt=$cnt/$page_cnt;

  //remember page
  $page="1";
if (isset($_GET['page'])){
    $page=intval($_GET['page']);
    if(isset($_SESSION[$OJ_NAME.'_'.'user_id'])){
         $sql="update users set volume=? where user_id=?";
         pdo_query($sql,$page,$_SESSION[$OJ_NAME.'_'.'user_id']);
    }
}else{
    if(isset($_SESSION[$OJ_NAME.'_'.'user_id'])){
            $sql="select volume from users where user_id=?";
            $result=pdo_query($sql,$_SESSION[$OJ_NAME.'_'.'user_id']);
            $row=$result[0];
            $page=intval($row[0]);
    }
    if(!is_numeric($page)||$page<0)
        $page='1';
}
  //end of remember page



//$pstart=$first+$page_cnt*intval($page)-$page_cnt;
//$pend=$pstart+$page_cnt;
$pstart=$max_p-$page_cnt*intval($page)+$page_cnt;
$pend=$pstart-$page_cnt;
//2019.3.21 修改倒序输出 上面两行为原语句

//school

if (isset($_SESSION[$OJ_NAME.'_'.'user_id'])){
$sql="SELECT `school` FROM `users` WHERE `user_id`=?";
$result=pdo_query($sql,$_SESSION[$OJ_NAME.'_'.'user_id']);
$row=$result[0];
$school=$row['school'];}





$sub_arr=Array();
// submit
if (isset($_SESSION[$OJ_NAME.'_'.'user_id'])){
$sql="SELECT `problem_id` FROM `solution` WHERE `user_id`=?".
                                                                       //  " AND `problem_id`>='$pstart'".
                                                                       // " AND `problem_id`<'$pend'".
	" group by `problem_id`";
$result=pdo_query($sql,$_SESSION[$OJ_NAME.'_'.'user_id']);
foreach ($result as $row)
	$sub_arr[$row[0]]=true;
}

$acc_arr=Array();
// ac
if (isset($_SESSION[$OJ_NAME.'_'.'user_id'])){
$sql="SELECT `problem_id` FROM `solution` WHERE `user_id`=?".
                                                                       //  " AND `problem_id`>='$pstart'".
                                                                       //  " AND `problem_id`<'$pend'".
	" AND `result`=4".
	" group by `problem_id`";
$result=pdo_query($sql,$_SESSION[$OJ_NAME.'_'.'user_id']);
foreach ($result as $row)
	$acc_arr[$row[0]]=true;
}


//2019.3.21 修改倒序输出 原来为>=  <



$sql="SELECT * from (select * from exam where defunct='N') a left join  (select contest_id,exam_id as pp from tblexam where user_id= ?)  b on a.exam_id=b.pp ORDER BY exam_id DESC";
//3.21 修改添加desc


	$result=pdo_query($sql,$_SESSION[$OJ_NAME.'_'.'user_id']);


$view_total_page=intval($cnt+1);

$cnt=0;
$view_projectset=Array();
$i=0;
foreach ($result as $row){
	
	
	$view_projectset[$i]=Array();

	$view_projectset[$i][0]="<div class='center'>".$row['exam_id']."</div>";;
	$view_projectset[$i][1]="<div class='left'><a>".$row['title']."</a></div>";	
	$start_time=strtotime($row['start_time']);
	$end_time=strtotime($row['end_time']);
	$now=time();
	$length=$end_time-$start_time;
    $left=$end_time-$now;
	if ($now>$end_time) {
  	$view_projectset[$i][2]= "<span class=green>$MSG_Ended@".$row['end_time']."</span>";
	
	// pending

  }else if ($now<$start_time){
  	$view_projectset[$i][2]= "<span class=blue>$MSG_Start@".$row['start_time']."</span>&nbsp;";
    $view_projectset[$i][2].= "<span class=green>$MSG_TotalTime".formatTimeLength($length)."</span>";
	// running

  }else{
  	$view_projectset[$i][2]= "<span class=red> $MSG_Running</font>&nbsp;";
    $view_projectset[$i][2].= "<span class=green> $MSG_LeftTime ".formatTimeLength($left)." </span>";
  }
  $private=intval($row['private']);
				if ($private==0)
                                        $view_projectset[$i][4]= "<span class=blue>$MSG_Public</span>";
                                else
                                        $view_projectset[$i][5]= "<span class=red>$MSG_Private</span>";
		$contest_id=$row['contest_id'];		
			if(isset($contest_id))
				$view_projectset[$i][6]= "<a href='exam.php?eid=".$row['exam_id']."' class='btn btn-primary' style='color: #fff;background-color: #5cb85c;border: 1px solid #5cb85c;border-radius: 4px;'>查看</a>";
			else
				$view_projectset[$i][6]= "<a href='exam.php?eid=".$row['exam_id']."' class='btn btn-primary' style='color: #fff;background-color: #3baeda;border: 1px solid #3baeda;border-radius: 4px;'>答题</a>";
	$i++;
}

 $result=false;	
///////////////////////////MAIN	
	

    $user_id=$_SESSION[$OJ_NAME.'_'.'user_id'];
	$sql="SELECT * FROM tblexam WHERE user_id='$user_id'" ;
	$result = mysql_query_cache($sql);
	if($result) {$rows_cnt=count($result);$numm=$rows_cnt;}
                else $rows_cnt=0;
                $view_rank=Array();
                $i=0;
                for ( $i=0;$i<$rows_cnt;$i++ ) {
					
                        $row=$result[$i];
                        
                        $rank ++;

                  
                        $view_rank[$i][0]=  "<a class='btn' href='chakan.php?eid=".$row['exam_id']."' target='_blank'>" . htmlentities ( $row['exam_id'] ,ENT_QUOTES,"UTF-8") ."</a>";

                        						
						$view_rank[$i][1]=  "<div class=center>" . htmlentities ( $row['user_id'] ,ENT_QUOTES,"UTF-8") ."</div>";
						$view_rank[$i][2]=  "<div class=center>" . htmlentities ( $row['user_name'] ,ENT_QUOTES,"UTF-8") ."</div>";
						$view_rank[$i][3]=  "<div class=center>" . htmlentities ( $row['school'] ,ENT_QUOTES,"UTF-8") ."</div>";
				//                      $i++;
				}

				
require("template/".$OJ_TEMPLATE."/examlist.php");
if(file_exists('./include/cache_end.php'))
	require_once('./include/cache_end.php');
?>
