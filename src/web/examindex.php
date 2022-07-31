<?php
////////////////////////////Common head
	$cache_time=30;
	$OJ_CACHE_SHARE=true;
	require_once('./include/cache_start.php');
        require_once('./include/db_info.inc.php');
        require_once('./include/memcache.php');
	require_once('./include/setlang.php');
	$view_title= "Welcome To Online Judge";
 $result=false;	
///////////////////////////MAIN	
	
	


    $monday=mktime(0, 0, 0, date("m"),date("d")-(date("w")+7)%8, date("Y"))                                                            ;
                                        //$monday->subDays(date('w'));
    $s=strftime("%Y-%m-%d",$monday);
	$sql="SELECT users.`user_id`,`nick`,s.`solved`,t.`submit`,school FROM `users`
                                        inner join
                                        (select count(distinct problem_id) solved ,user_id from solution 
						where in_date>str_to_date('$s','%Y-%m-%d') and result=4 
						group by user_id order by solved desc limit 0,50 ) s 
					on users.user_id=s.user_id
                                        inner join
                                        (select count( problem_id) submit ,user_id from solution 
						where in_date>str_to_date('$s','%Y-%m-%d') 
						group by user_id order by submit desc ) t 
					on users.user_id=t.user_id
                                ORDER BY s.`solved` DESC,t.submit,reg_time  LIMIT  0,15
                         ";
	$result = mysql_query_cache($sql) ;
	if($result) $rows_cnt=count($result);
                else $rows_cnt=0;
                $view_rank=Array();
                $i=0;
                for ( $i=0;$i<$rows_cnt;$i++ ) {
					
                        $row=$result[$i];
                        
                        $rank ++;
						if($i==0)
						$view_rank[$i][0]= "<div class=center><img src='template/neu/img/jin.png'></div>";
					else if($i==1)
						$view_rank[$i][0]= "<div class=center><img src='template/neu/img/yin.png'></div>";
					else if($i==2)
						$view_rank[$i][0]= "<div class=center><img src='template/neu/img/tong.png'></div>";
					else
                        $view_rank[$i][0]= $rank;
                        $view_rank[$i][1]=  "<div class=center>" . htmlentities ( $row['nick'] ,ENT_QUOTES,"UTF-8") ."</div>";
					    $view_rank[$i][2]=  "<div class=center><a>" . $row['school']."</a>"."</div>";

//                      $i++;
                }
				if((isset($_GET['weekcourse'])&&trim($_GET['weekcourse'])!="")){
					$weekcourse=$_GET['weekcourse'];
				    $sql="SELECT problem.`week` FROM problem WHERE problem.source = '$weekcourse' GROUP BY problem.`week`";
					$resultweek=mysql_query_cache($sql);//mysql_escape_string($sql));
				$weekcategory=array();
					foreach ($resultweek as $row){
					$weekcate=explode(" ",$row['week']);
					foreach($weekcate as $weekcat){
						array_push($weekcategory,trim($weekcat));	
						}
	}
	$weekcategory=array_unique($weekcategory);
				}
if((isset($_GET['week'])&&trim($_GET['week'])!="")){
	  $week=intval($_GET['week']);

      $sql="SELECT problem_id,title,source,submit,accepted,school,point FROM problem WHERE source='$weekcourse' and week=$week and defunct='N' and leitai is null AND problem_id NOT IN (SELECT  problem_id  FROM contest c INNER JOIN  `contest_problem` cp ON c.contest_id = cp.contest_id AND (	c.`end_time` >  now()		OR c.private =1	)		AND c.`defunct` =  'N'		) ORDER BY problem_id DESC";
	  $resultproblem=mysql_query_cache($sql);

	  foreach ($resultproblem as $row){
			$problemresult.= "<div class='lab-item'><div class='lab-item-index'>".$row['problem_id']."</div>";
			$problemresult.=  "<div class='lab-item-title' data-toggle='tooltip' data-placement='bottom' title='知识点：".$row['point']."；来源：".$row['source']."'>".$row['title']."</div>";
			$problemresult.=  "<div class='pull-right lab-item-ctrl'><a class='btn btn-default' href='status.php?problem_id=".$row['problem_id']."&jresult=4' data-toggle='modal' data-sign='signin' data-next='/courses/1'>正确：".$row['accepted']."</a> ";
			$problemresult.=  "<a class='btn btn-default' href='status.php?problem_id=".$row['problem_id']."' data-toggle='modal' data-sign='signin' data-next='/courses/1'>提交：".$row['submit']."</a> ";
			$problemresult.=  "<a class='btn btn-primary' href='problem.php?id=".$row['problem_id']."' data-toggle='modal' data-sign='signin' data-next='/courses/1'style='color: #fff;background-color: #3baeda;border: 1px solid #3baeda;border-radius: 4px;'>查看题目</a></div></div>";
		}
	
}else{
	  $sql="SELECT problem_id,title,source,submit,accepted,school,point FROM problem WHERE defunct='N'  and leitai is null AND problem_id NOT IN (SELECT  problem_id  FROM contest c INNER JOIN  `contest_problem` cp ON c.contest_id = cp.contest_id AND (	c.`end_time` >  now()		OR c.private =1	)		AND c.`defunct` =  'N'		)	ORDER BY problem_id DESC limit 6";
      $resultproblem=mysql_query_cache($sql);
	  foreach ($resultproblem as $row){
			$problemresult.= "<div class='lab-item'><div class='lab-item-index'>".$row['problem_id']."</div>";
			$problemresult.=  "<div class='lab-item-title' data-toggle='tooltip' data-placement='bottom' title='知识点：".$row['point']."；来源：".$row['source']."'>".$row['title']."</div>";
			$problemresult.=  "<div class='pull-right lab-item-ctrl'><a class='btn btn-default' href='status.php?problem_id=".$row['problem_id']."&jresult=4' data-toggle='modal' data-sign='signin' data-next='/courses/1'>正确：".$row['accepted']."</a> ";
			$problemresult.=  "<a class='btn btn-default' href='status.php?problem_id=".$row['problem_id']."' data-toggle='modal' data-sign='signin' data-next='/courses/1'>提交：".$row['submit']."</a> ";
			$problemresult.=  "<a class='btn btn-primary' href='problem.php?id=".$row['problem_id']."' data-toggle='modal' data-sign='signin' data-next='/courses/1'style='color: #fff;background-color: #3baeda;border: 1px solid #3baeda;border-radius: 4px;'>查看题目</a></div></div>";
		}
}	

        
 
 

	
	$monday=mktime(0, 0, 0, date("m"),date("d")-(date("w")+7)%8, date("Y"));
    $s=strftime("%Y-%m-%d",$monday);
    $sql="select  count(*)as count ,point from solution,problem where solution.in_date>str_to_date('$s','%Y-%m-%d')  and problem.problem_id=solution.problem_id and solution.user_id=? and result!=4 GROUP BY point ORDER BY count DESC limit 1";
	$result=pdo_query($sql,$_SESSION[$OJ_NAME.'_'.'user_id']);
		$row=$result[0];
	$point=$row['point'];
	if(!$result){
		$recommend="<h3>请多做练习!</h3>";
			}else{
		$search="%".$point."%";
		$sqls="select * from problem where defunct='N' and (title like ? or point like ?) ORDER BY rand() DESC limit 6";
		$results=pdo_query($sqls,$search,$search);
        foreach ($results as $rows){
			$recommend.= "<div class='lab-item'><div class='lab-item-index'>".$rows['problem_id']."</div>";
			$recommend.=  "<div class='lab-item-title' data-toggle='tooltip' data-placement='bottom' title='知识点：".$rows['point']."；来源：".$rows['source']."'>".$rows['title']."</div>";
			$recommend.=  "<div class='pull-right lab-item-ctrl'><a class='btn btn-default' href='status.php?problem_id=".$rows['problem_id']."' data-toggle='modal' data-sign='signin' data-next='/courses/1'>正确：".$rows['accepted']."</a> ";
			$recommend.=  "<a class='btn btn-default' href='status.php?problem_id=".$rows['problem_id']."' data-toggle='modal' data-sign='signin' data-next='/courses/1'>提交：".$rows['submit']."</a> ";
			$recommend.=  "<a class='btn btn-primary' href='problem.php?id=".$rows['problem_id']."' data-toggle='modal' data-sign='signin' data-next='/courses/1'style='color: #fff;background-color: #3baeda;border: 1px solid #3baeda;border-radius: 4px;'>查看题目</a></div></div>";
		}
	}
    $sql=" SELECT count(*)as weidu FROM `mail` WHERE to_user=?  and new_mail=1 order by mail_id desc";
	$result=pdo_query($sql,$_SESSION[$OJ_NAME.'_'.'user_id']);
	$row=$result[0];
	$weidu=$row['weidu'];
	if($_SESSION[$OJ_NAME.'_'.'user_id']){
    $sql="select  email from users where user_id = ?";
	$result=pdo_query($sql,$_SESSION[$OJ_NAME.'_'.'user_id']);
	$row=$result[0];
	$email=$row['email'];
	if(!$email){
		$emailattention="<script language='javascript'>alert('请完善您的邮箱信息！');</script>";
		$emailattention2=" <a href='modifypage.php' type='button' class='btn btn-success col-md-11 col-xs-6 login-btn' style='border: 1px solid #3baeda;border-radius: 4px;background: #fff;color: #3baeda;padding: 4px 10px;' >点击完善邮箱信息</a>";
    }
	}
	
	
		$sql=	"select * "
			."FROM `news` "
			."WHERE `defunct`!='Y'"
			."ORDER BY `importance` ASC,`time` DESC "
			."LIMIT 50";
	$Newresult=mysql_query_cache($sql);//mysql_escape_string($sql)); 
    $view_news="";
	if (!$Newresult){
		$view_news= "<h3>No News Now!</h3>";
	}else{		
	    $i=0;
		foreach ($Newresult as $row){
			$view_news.="<div class='panel-group' id='accordion'><div class='panel panel-default'><div class='panel-heading'><h4 class='panel-title'>";
			$view_news.="<a data-toggle='collapse' data-parent='#accordion' href='#collapse".$i."'>".$row['title']."</a>";
			if($i==0||$i==1)
				$view_news.="</h4></div><div id='collapse".$i++."' class='panel-collapse collapse in'><div class='panel-body'>";
			else $view_news.="</h4></div><div id='collapse".$i++."' class='panel-collapse collapse'><div class='panel-body'>";
			$view_news.="".$row['content']."</div></div></div></div>";
		}

	}
	





     $sql="SELECT contest.contest_id, contest.title,contest.start_time,contest.end_time,contest.description,contest.private FROM contest WHERE contest.defunct = 'N' and end_time>now() and exam=0";
		$resultproblem=mysql_query_cache($sql);	
	if(!$resultproblem){
		$contestresult="<h3>暂无最新比赛或者练习!</h3>";
			}else{		
         foreach ($resultproblem as $row){
			$contestresult.= "<div class='lab-item'><div class='lab-item-index'>".$row['contest_id']."</div>";
			$private=intval($row['private']);
			if($private==0)
			$contestresult.=  "<div class='lab-item-title' data-toggle='tooltip' data-placement='bottom' title='说明：".$row['description']."；状态：$MSG_Public'>".$row['title']."</div>";
		    else 
			$contestresult.=  "<div class='lab-item-title' data-toggle='tooltip' data-placement='bottom' title='说明：".$row['description']."；状态：$MSG_Private'>".$row['title']."</div>";
			$contestresult.=  "<div class='pull-right lab-item-ctrl'><a></a> ";
			$contestresult.=  "<a class='btn btn-default' data-toggle='modal' data-sign='signin' data-next='/courses/1'>截止：".$row['end_time']."</a> ";
			$contestresult.=  "<a class='btn btn-primary' href='contest.php?cid=".$row['contest_id']."' data-toggle='modal' data-sign='signin' data-next='/courses/1'style='color: #fff;background-color: #3baeda;border: 1px solid #3baeda;border-radius: 4px;'>查看</a></div></div>";
		}
			}
			if (isset($_SESSION[$OJ_NAME.'_'.'user_id'])){
$sql="SELECT `school` FROM `users` WHERE `user_id`=?";
$result=pdo_query($sql,$_SESSION[$OJ_NAME.'_'.'user_id']);
$row=$result[0];
$school=$row['school'];}
	$view_category="";
	$sql=	"select course "
			."FROM `course` WHERE `school`='$school'" ;
	$result=mysql_query_cache($sql);//mysql_escape_string($sql));
	$category=array();
        foreach ($result as $row){
		$cate=explode(" ",$row['course']);
		foreach($cate as $cat){
			array_push($category,trim($cat));	
		}
	}
	$category=array_unique($category);
	if (!$result){
		$view_category= "<h3>No Category Now!</h3>";
	}else{
		$view_category.= "<div><p>";
		
		foreach ($category as $cat){
			if(trim($cat)=="") continue;
			$view_category.= "<a class='btn btn-primary' href='probleml.php?search=".htmlentities($cat,ENT_QUOTES,'UTF-8')."'>".$cat."</a>&nbsp;";
		}
		
		$view_category.= "</p></div>";
	}
	
	
class TM{
        var $solved=0;
        var $time=0;
        var $p_wa_num;
        var $p_ac_sec;
        var $user_id;
        var $nick;
        function TM(){
                $this->solved=0;
                $this->time=0;
                $this->p_wa_num=array(0);
                $this->p_ac_sec=array(0);
        }
        function Add($pid,$sec,$res){
		global $OJ_CE_PENALTY;
//              echo "Add $pid $sec $res<br>";
                if (isset($this->p_ac_sec[$pid])&&$this->p_ac_sec[$pid]>0)
                        return;
                if ($res!=4){
			if(isset($OJ_CE_PENALTY)&&!$OJ_CE_PENALTY&&$res==11) return;  // ACM WF punish no ce 
	
                        if(isset($this->p_wa_num[$pid])){
                                $this->p_wa_num[$pid]++;
                        }else{
                                $this->p_wa_num[$pid]=1;
                        }
                }else{
                        $this->p_ac_sec[$pid]=$sec;
                        $this->solved++;
                        if(!isset($this->p_wa_num[$pid])) $this->p_wa_num[$pid]=0;
                        $this->time+=$sec+$this->p_wa_num[$pid]*1200;
//                      echo "Time:".$this->time."<br>";
//                      echo "Solved:".$this->solved."<br>";
                }
        }
}

function s_cmp($A,$B){
//      echo "Cmp....<br>";
        if ($A->solved!=$B->solved) return $A->solved<$B->solved;
        else return $A->time>$B->time;
}

// contest start time
$cid='1014';
$cids='1014';
if($OJ_MEMCACHE){
	$sql="SELECT `start_time`,`title`,`end_time` FROM `contest` WHERE `contest_id`=$cids";
        require("./include/memcache.php");
        $result = mysql_query_cache($sql);
        if($result) $rows_cnt=count($result);
        else $rows_cnt=0;
}else{
	$sql="SELECT `start_time`,`title`,`end_time` FROM `contest` WHERE `contest_id`=?";
        $result = pdo_query($sql,$cid);
        if($result) $rows_cnt=count($result);
        else $rows_cnt=0;
}


$start_time=0;
$end_time=0;
if ($rows_cnt>0){
//       $row=$result[0];

        if($OJ_MEMCACHE)
                $row=$result[0];
        else
                 $row=$result[0];
        $start_time=strtotime($row['start_time']);
        $end_time=strtotime($row['end_time']);
        $title=$row['title'];
        
}
if(!$OJ_MEMCACHE)
if ($start_time==0){
        $view_errors= "No Such Contest";
        require("template/".$OJ_TEMPLATE."/error.php");
        exit(0);
}

if ($start_time>time()){
        $view_errors= "Contest Not Started!";
        require("template/".$OJ_TEMPLATE."/error.php");
        exit(0);
}
if(!isset($OJ_RANK_LOCK_PERCENT)) $OJ_RANK_LOCK_PERCENT=0;
$lock=$end_time-($end_time-$start_time)*$OJ_RANK_LOCK_PERCENT;

//echo $lock.'-'.date("Y-m-d H:i:s",$lock);

if($OJ_MEMCACHE){
	$sql="SELECT count(1) as pbc FROM `contest_problem` WHERE `contest_id`='$cid'";
//        require("./include/memcache.php");
        $result = mysql_query_cache($sql);
        if($result) $rows_cnt=count($result);
        else $rows_cnt=0;
}else{
	$sql="SELECT count(1) as pbc FROM `contest_problem` WHERE `contest_id`=?";
        $result = pdo_query($sql,$cid);
        if($result) $rows_cnt=count($result);
        else $rows_cnt=0;
}

if($OJ_MEMCACHE)
        $row=$result[0];
else
         $row=$result[0];

// $row=$result[0];
$pid_cnt=intval($row['pbc']);

if($OJ_MEMCACHE){
	$sql="SELECT
        users.user_id,users.nick,solution.result,solution.num,solution.in_date
                FROM
                        (select * from solution where solution.contest_id='$cid' and num>=0 and problem_id>0) solution
                inner join users
                on users.user_id=solution.user_id and users.defunct='N'
        ORDER BY users.user_id,in_date";
        $result = mysql_query_cache($sql);
        if($result) $rows_cnt=count($result);
        else $rows_cnt=0;
}else{
	$sql="SELECT
        users.user_id,users.nick,solution.result,solution.num,solution.in_date
                FROM
                        (select * from solution where solution.contest_id=? and num>=0 and problem_id>0) solution
                inner join users
                on users.user_id=solution.user_id and users.defunct='N'
        ORDER BY users.user_id,in_date";
        $result = pdo_query($sql,$cid);
        if($result) $rows_cnt=count($result);
        else $rows_cnt=0;
}

$user_cnt=0;
$user_name='';
$U=array();
//$U[$user_cnt]=new TM();
for ($i=0;$i<$rows_cnt;$i++){
        $row=$result[$i];
        $n_user=$row['user_id'];
        if (strcmp($user_name,$n_user)){
                $user_cnt++;
                $U[$user_cnt]=new TM();

                $U[$user_cnt]->user_id=$row['user_id'];
                $U[$user_cnt]->nick=$row['nick'];

                $user_name=$n_user;
        }
        if(time()<$end_time&&$lock<strtotime($row['in_date']))
        	   $U[$user_cnt]->Add($row['num'],strtotime($row['in_date'])-$start_time,0);
        else
        	   $U[$user_cnt]->Add($row['num'],strtotime($row['in_date'])-$start_time,intval($row['result']));
       
}
usort($U,"s_cmp");

////firstblood
$first_blood=array();
for($i=0;$i<$pid_cnt;$i++){
      $first_blood[$i]="";
}


if($OJ_MEMCACHE){
	$sql="select num,user_id from
        (select num,user_id from solution where contest_id=$cid and result=4 order by solution_id ) contest
        group by num";
        $fb = mysql_query_cache($sql);
        if($fb) $rows_cnt=count($fb);
        else $rows_cnt=0;
}else{
	$sql="select num,user_id from
        (select num,user_id from solution where contest_id=? and result=4 order by solution_id ) contest
        group by num";
        $fb = pdo_query($sql,$cid);
        if($fb) $rows_cnt=count($fb);
        else $rows_cnt=0;
}
for ($i=0;$i<$rows_cnt;$i++){
         $row=$fb[$i];
         $first_blood[$row['num']]=$row['user_id'];
}	
     
	 
	 	$sql="SELECT
problem.source,nick,count(problem.source) count
FROM
problem,users
WHERE
problem.leitai = 1 and source=user_id and problem.defunct='N'
group by problem.source
order by count desc
limit 15
                         ";
	$result = mysql_query_cache($sql) ;
	if($result) $rows_cnt=count($result);
                else $rows_cnt=0;
                $leitai=Array();
                $i=0;
                for ( $i=0;$i<$rows_cnt;$i++ ) {
					
                        $row=$result[$i];
                        
                        $ranks ++;
						if($i==0)
						$leitai[$i][0]= "<div class=center><img src='template/neu/img/jin.png'></div>";
					else if($i==1)
						$leitai[$i][0]= "<div class=center><img src='template/neu/img/yin.png'></div>";
					else if($i==2)
						$leitai[$i][0]= "<div class=center><img src='template/neu/img/tong.png'></div>";
					else
                        $leitai[$i][0]= $ranks;
                        $leitai[$i][1]=  "<div class=center>" . htmlentities ( $row['source'] ,ENT_QUOTES,"UTF-8") ."</div>";
						$leitai[$i][2]=  "<div class=center>" . htmlentities ( $row['nick'] ,ENT_QUOTES,"UTF-8") ."</div>";
					    $leitai[$i][3]=  "<div class=center><a>" . $row['count']."</a>"."</div>";

//                      $i++;
                }
				
$sql="SELECT count(1) c FROM users";
$user=pdo_query($sql);
$row=$user[0];		
$zhuce=$row['c'];	

$sql="SELECT count(DISTINCT user_id) c from loginlog where time>=DATE_SUB(NOW(),INTERVAL 60 MINUTE)";
$zaixianuser=pdo_query($sql);
$row=$zaixianuser[0];		
$zaixian=$row['c'];	

$sql="SELECT count(1) c FROM solution";
						$problem=pdo_query($sql);
						$row=$problem[0];
$tijiao=$row['c'];	
				

$sql="SELECT COUNT(solution.solution_id) AS c FROM solution WHERE TO_DAYS(solution.in_date) = TO_DAYS(NOW())";
						$problem=pdo_query($sql);
						$row=$problem[0];
$jinri=$row['c'];					

$sql="SELECT COUNT(solution.solution_id) AS c FROM solution WHERE TO_DAYS(solution.in_date) = TO_DAYS(NOW()) AND solution.result = 4";
						$problem=pdo_query($sql);
						$row=$problem[0];
						$AC=$row['c'];	
						
						$sql="SELECT
users.user_id,
users.nick,
s.`solved`,
t.`submit`,
users.school
FROM
users
INNER JOIN (select count(distinct problem_id) solved ,user_id from solution 
						where TO_DAYS(solution.in_date) = TO_DAYS(NOW()) and result=4 
						group by user_id order by solved desc ) AS s ON users.user_id = s.user_id
INNER JOIN (select count( problem_id) submit ,user_id from solution 
						where TO_DAYS(solution.in_date) = TO_DAYS(NOW())
						group by user_id order by submit desc ) AS t ON users.user_id = t.user_id
ORDER BY
s.`solved` DESC,
t.submit ASC,
users.reg_time ASC
LIMIT 1";
						$problem=pdo_query($sql);
						$row=$problem[0];
						$star=$row['nick'];	
						$starsc=$row['school'];	
/////////////////////////Template
require("template/".$OJ_TEMPLATE."/index2.php");
/////////////////////////Common foot
if(file_exists('./include/cache_end.php'))
	require_once('./include/cache_end.php');
?>
