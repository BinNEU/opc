<?php 
	$OJ_CACHE_SHARE=false;
	$cache_time=60;
	require_once('./include/db_info.inc.php');
	require_once('./include/cache_start.php');
	require_once('./include/memcache.php');
	require_once('./include/setlang.php');
	 if (!isset($_SESSION[$OJ_NAME.'_'.'user_id'])){

	$view_errors= "<a href=loginpage.php>$MSG_Login</a>";
	require("template/".$OJ_TEMPLATE."/error.php");
	exit(0);
//	$_SESSION[$OJ_NAME.'_'.'user_id']="Guest";
}
$fengjin=True;
$sql="select * from leitaifengjin where user_id=?";
$result=pdo_query($sql,$_SESSION[$OJ_NAME.'_'.'user_id']);
$row=$result[0];
if($row==Null) $fengjin=false;
if ($fengjin){
        $view_errors= "您的账号被限制使用该功能，请联系管理员！";
        require("template/".$OJ_TEMPLATE."/error.php");
        exit(0);
}

$view_title= "Problem Set";
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



$now=strftime("%Y-%m-%d %H:%M",time());
$sql="select * from (SELECT `problem_id`,`title`,`source`,`submit`,`accepted`,`school`,`point` ,TIMESTAMPDIFF(HOUR   ,in_date,Now())as shijian,user_id as yuan FROM `problem`,operationlog
WHERE `defunct`='N' and `leitai`=1  AND `problem_id` NOT IN(
		SELECT  `problem_id` 
		FROM contest c
		INNER JOIN  `contest_problem` cp ON c.contest_id = cp.contest_id
		AND (
			c.`end_time` >  Now()
			OR c.private =1
		)
			AND c.`defunct` =  'N'
	)
	and problem_id=operationlog.ip and operation='添加问题'
	 Group BY `problem_id` DESC) a ,(SELECT
problem.problem_id as id, IFNULL(count(problem.problem_id)-1,0) as count
FROM
problem ,
solution
WHERE
problem.problem_id = solution.problem_id AND
problem.defunct = 'N' AND
problem.leitai = 1 AND
solution.result = 4 
Group by problem.problem_id)  b where a.problem_id=b.id
order by problem_id DESC	 
	 ";
//3.21 修改添加desc


	$result=mysql_query_cache($sql);


$view_total_page=intval($cnt+1);

$cnt=0;
$view_problemset=Array();
$i=0;
foreach ($result as $row){
	
	
	$view_problemset[$i]=Array();

	$view_problemset[$i][0]="<div class='center'>".$row['problem_id']."</div>";;
	$view_problemset[$i][1]="<div class='left'><a href='leitaiproblem.php?id=".$row['problem_id']."'>".$row['title']."</a></div>";	
	if($row['source']==$row['yuan']&&$row['shijian']>24)
		$view_problemset[$i][2]="<div class='center'><nobr>".$row['source']."</nobr><span class='label label-success'>一站到底</span></div >";
		else if ($row['source']==$row['yuan'] &&$row['shijian']>10)
			$view_problemset[$i][2]="<div class='center'><nobr>".$row['source']."</nobr><span class='label label-danger'>久攻不下</span></div >";
		else if ($row['source']==$row['yuan'])
		$view_problemset[$i][2]="<div class='center'><nobr>".$row['source']."</nobr><span class='label label-default'>发起擂台</span></div >";
		else{
	if($row['shijian']<=24)
	$view_problemset[$i][2]="<div class='center'><nobr>".$row['source']."</nobr><span class='label label-warning'>新擂主</span></div >";
    else if($row['shijian']>24)
		$view_problemset[$i][2]="<div class='center'><nobr>".$row['source']."</nobr><span class='label label-info'>守擂之星</span></div >";
	else
		$view_problemset[$i][2]="<div class='center'><nobr>".$row['source']."</nobr></div >";
		}
	if($_SESSION[$OJ_NAME.'_'.'user_id']==$row['source'])
		$view_problemset[$i][3]="<div class='center'><div class=center><a class='btn btn-primary' data-toggle='modal' data-sign='signin' data-next='/courses/1'style='color: #fff;background-color: #5cb85c;border: 1px solid #5cb85c;border-radius: 4px;'>擂主</a></div>";
	else
	    $view_problemset[$i][3]="<div class='center'><div class=center><a class='btn btn-primary' href='leitaiuser.php?pid=".$row['problem_id']."&uid=".$_SESSION[$OJ_NAME.'_'.'user_id']."' data-toggle='modal' data-sign='signin' data-next='/courses/1'style='color: #fff;background-color: #FF4040;border: 1px solid #FF4040;border-radius: 4px;'>攻擂</a></div>";
        if($row['shijian']>999)
	$view_problemset[$i][4]="<div class='center'>999+小时</div>";
	else
		$view_problemset[$i][4]="<div class='center'>".$row['shijian']."小时</div>";
	if($row['count']>=20)
	$view_problemset[$i][5]="<div class='center'>".$row['count']."<span class='glyphicon glyphicon-fire' style='color: rgb(255, 0, 0);'></span></div>";
    else
		$view_problemset[$i][5]="<div class='center'>".$row['count']."</div>";
	
	
	$i++;
}

 $result=false;	
///////////////////////////MAIN	
	

    $sql=	"SELECT * FROM problem WHERE problem.leitai = 1" ;
	$resultproblem=mysql_query_cache($sql);				
         foreach ($resultproblem as $row){
			$problemresult.= "<div class='lab-item'>";
			$problemresult.=  "<div class='lab-item-title' data-toggle='tooltip' data-placement='bottom' title='知识点：".$row['point']."；来源：".$row['source']."'>".$row['title']."</div>";
			$problemresult.=  "<div class='pull-right lab-item-ctrl'>";
			$problemresult.=  "<a class='btn btn-primary' href='problem.php?id=".$row['problem_id']."' data-toggle='modal' data-sign='signin' data-next='/courses/1'style='color: #fff;background-color: #3baeda;border: 1px solid #3baeda;border-radius: 4px;'>查看题目</a></div></div>";
		}
    $user_id=$_SESSION[$OJ_NAME.'_'.'user_id'];
	$sql="SELECT * FROM problem WHERE problem.leitai = 1 and problem.source='$user_id'" ;
	$result = mysql_query_cache($sql);
	if($result) $rows_cnt=count($result);
                else $rows_cnt=0;
                $view_rank=Array();
                $i=0;
                for ( $i=0;$i<$rows_cnt;$i++ ) {
					
                        $row=$result[$i];
                        
                        $rank ++;

                  
                        $view_rank[$i][0]=  "<div class=center>" . htmlentities ( $row['problem_id'] ,ENT_QUOTES,"UTF-8") ."</div>";
					    $view_rank[$i][1]=  "<div class=center><a class='btn btn-primary' href='leitaiproblem.php?id=".$row['problem_id']."' data-toggle='modal' data-sign='signin' data-next='/courses/1'style='color: #fff;background-color: #3baeda;border: 1px solid #3baeda;border-radius: 4px;'>查看题目</a></div>";
						if($row['defunct']=='Y')
                        $view_rank[$i][2]=  "<div class=center><a class='btn btn-primary' href='leitai_df_change.php?cid=".$row['problem_id']."' data-toggle='modal' data-sign='signin' data-next='/courses/1'style='color: #fff;background-color: #FF4040;border: 1px solid #FF4040;border-radius: 4px;'>解禁</a></div>";
					    else
							$view_rank[$i][2]=  "<div class=center><a class='btn btn-primary' data-toggle='modal' data-sign='signin' data-next='/courses/1'style='color: #fff;background-color: #3baeda;border: 1px solid #3baeda;border-radius: 4px;'>正常</a></div>";
//                      $i++;
                }
require("template/".$OJ_TEMPLATE."/arena.php");
if(file_exists('./include/cache_end.php'))
	require_once('./include/cache_end.php');
?>
