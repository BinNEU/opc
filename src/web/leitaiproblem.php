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

$pr_flag=false;
$co_flag=false;
$score=false;
$id=intval($_GET['id']);
$user_id=$_SESSION[$OJ_NAME.'_'.'user_id'];
$sql="SELECT
problem_score.problem_id,
problem_score.user_id,
problem_score.score
FROM
problem_score
where problem_id=? and user_id=?";
$scoreresult=pdo_query($sql,$id,$user_id);
$rows=$scoreresult[0];
if($rows)
{

}
else $score=true;

$id=intval($_GET['id']);
$sql="select problem_id, AVG(score) as score from problem_score where problem_id=? group by problem_id ";
$result=pdo_query($sql,$id);
$rows=$result[0];
$problem_score=$rows['score'];
if (isset($_GET['id'])){
        // practice
        $id=intval($_GET['id']);
  //require("oj-header.php");

                $sql="SELECT * FROM `problem` WHERE `problem_id`=?";

        $pr_flag=true;
		$result=pdo_query($sql,$id);
}else if (isset($_GET['cid']) && isset($_GET['pid'])){
        // contest
        $cid=intval($_GET['cid']);
        $pid=intval($_GET['pid']);

        if (!isset($_SESSION[$OJ_NAME.'_'.'administrator']))
                $sql="SELECT langmask,private,defunct FROM `contest` WHERE `defunct`='N' AND `contest_id`=? AND `start_time`<='$now'";
        else
                $sql="SELECT langmask,private,defunct FROM `contest` WHERE `defunct`='N' AND `contest_id`=?";
        $result=pdo_query($sql,$cid);
        $rows_cnt=count($result);
        $row=($result[0]);
        $contest_ok=true;
        if ($row[1] && !isset($_SESSION[$OJ_NAME.'_'.'c'.$cid])) $contest_ok=false;
        if ($row[2]=='Y') $contest_ok=false;
        if (isset($_SESSION[$OJ_NAME.'_'.'administrator'])) $contest_ok=true;
                               
       
    $ok_cnt=$rows_cnt==1;              
        $langmask=$row[0];
        if ($ok_cnt!=1){
                // not started
                $view_errors=  "No such Contest!";
       
                require("template/".$OJ_TEMPLATE."/error.php");
                exit(0);
        }else{
                // started
                $sql="SELECT * FROM `problem` WHERE `defunct`='N' AND `problem_id`=(
                        SELECT `problem_id` FROM `contest_problem` WHERE `contest_id`=? AND `num`=?
                        )";
				$result=pdo_query($sql,$cid,$pid);
        }
        // public
        if (!$contest_ok){
       
                $view_errors= "Not Invited!";
                require("template/".$OJ_TEMPLATE."/error.php");
                exit(0);
        }
        $co_flag=true;
}else{
        $view_errors=  "<title>$MSG_NO_SUCH_PROBLEM</title><h2>$MSG_NO_SUCH_PROBLEM</h2>";
        require("template/".$OJ_TEMPLATE."/error.php");
        exit(0);
}


       
if (count($result)!=1){
   $view_errors="";
   if(isset($_GET['id'])){
      $id=intval($_GET['id']);
           $sql="SELECT  contest.`contest_id` , contest.`title`,contest_problem.num FROM `contest_problem`,`contest` 
				WHERE contest.contest_id=contest_problem.contest_id and `problem_id`=? and defunct='N'  ORDER BY `num`";
           //echo $sql;
           $result=pdo_query($sql,$id);
           if($i=count($result)){
              $view_errors.= "This problem is in Contest(s) below:<br>";
                        foreach($result as $row){
                                $view_errors.= "<a href=problem.php?cid=$row[0]&pid=$row[2]>Contest $row[0]:".
								htmlentities($row[1],ENT_QUOTES,"utf-8")
								."</a><br>";
                        }
                                 
                               
                }else{
                        $view_title= "<title>$MSG_NO_SUCH_PROBLEM!</title>";
                        $view_errors.= "<h2>$MSG_NO_SUCH_PROBLEM!</h2>";
                }
   }else{
                $view_title= "<title>$MSG_NO_SUCH_PROBLEM!</title>";
                $view_errors.= "<h2>$MSG_NO_SUCH_PROBLEM!</h2>";
        }
        require("template/".$OJ_TEMPLATE."/error.php");
        exit(0);
}else{
        $row=$result[0];
        $view_title= $row['title'];
       
}


/////////////////////////Template
require("template/".$OJ_TEMPLATE."/leitaiproblem.php");
/////////////////////////Common foot
/*if(file_exists('./include/cache_end.php'))
        require_once('./include/cache_end.php');*/
?>

