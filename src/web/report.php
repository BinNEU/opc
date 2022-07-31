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

$sql="SELECT count(*) as count_student from users";
$user=pdo_query($sql);
$row=$user[0];
$count_student=$row['count_student'];
function point_output($point)
{
	switch ($point) {
   case "其他":
     echo "看来你的实力已经能解决综合问题了！多加练习，你一定能成为编程高手！";
     break;
	 case "基本语法":
     echo "加油啊菜鸟，你已经掌握了编程的入门！";
     break;
   case "数据类型、运算符、表达式":
     echo "你已经掌握了编程的基础，房子是一块砖一块砖垒起来的，程序也是一点一点积累的，加油！";
     break;
   case "对象和类":
     echo "类（class）和对象(object)是两种以计算机为载体的计算机语言的合称。对象是对客观事物的抽象，类是对对象的抽象。类是一种抽象的数据类型。";
     break;
	    case "顺序、分支结构":
     echo "顺序结构程序设计是最简单的，只要按照解决问题的顺序写出相应的语句就行，它的执行顺序是自上而下，依次执行。分支结构是依据一定的条件选择执行路径，不是严格按照语句出现的物理顺序。";
     break;
	    case "循环控制":
     echo "有没有觉得循环控制很神奇，可以减少源程序重复书写的工作量，用来描述重复执行某段算法的问题，这是程序设计中最能发挥计算机特长的程序结构。";
     break;
	    case "数组":
     echo "数组是在程序设计中，为了处理方便， 把具有相同类型的若干元素按无序的形式组织起来的一种形式。这些无序排列的同类数据元素的集合称为数组。";
     break;
	    case "函数":
     echo "函数是一组一起执行一个任务的语句。每个 C 程序都至少有一个函数，即主函数 main() ，所有简单的程序都可以定义其他额外的函数。";
     break;
	    case "指针":
     echo "指针，是C语言中的一个重要概念及其特点，也是掌握C语言比较困难的部分。指针是一个占据存储空间的实体在这一段空间起始位置的相对距离值。";
     break;
	    case "结构体":
     echo "结构体是由一批数据组合而成的一种新的数据类型。组成结构型数据的每个数据称为结构型数据的“成员”。";
     break;
	 case "":
     echo "这周没有答题啊同学！！！出发，永远是最有意义的事，去做就是了！！！加油！！！";
     break;
   default:
     echo "你一定做了额外的练习，看好你呦~";
}
}
if ((isset($_GET['id']))&& ($_SESSION[$OJ_NAME.'_'.'administrator'])) $id=$_GET['id'];
else $id=$_SESSION[$OJ_NAME.'_'.'user_id'];
$sql="SELECT * from users where user_id=?";
$user=pdo_query($sql,$id);
$row=$user[0];
$nick=$row['nick'];
$name=$row['name'];
$class=$row['class'];
$school=$row['school'];
$year= date("Y",(time()));
$week= date("W",(time()))-1;
$yw = date("yW",(time()));
$ywl = $yw-1;

$sql="SELECT * from week_submit2 where id=? and w=?";
$user=pdo_query($sql,$id,$ywl);
$row=$user[0];
$submit_total=$row['count'];
$submit_correct=$row['c_count'];
$submit_problem=$row['p_count'];
$submit_acc=$row['acc'];
$sql="SELECT * from week_loginlog2 where user_id=? and w=?";
$user=pdo_query($sql,$id,$ywl);
$row=$user[0];
$login_count=$row['count'];
$login_day=$row['day_count'];
if(is_null($submit_total)){
	$submit_total=0;
	$submit_correct=0;
	$submit_problem=0;
	$submit_acc=0;
}
if(is_null($login_count)){
	$login_count=0;
	$login_day=0;
}
$sql="SELECT * from week_dsubmit where id=? and w=?";
$user=pdo_query($sql,$id,$ywl);
if($user) $rows_cnt=count($user);
                else $rows_cnt=0;
                $i=0;
				$dsubmit=array(0,0,0,0,0,0,0);
				$dcorrect=array(0,0,0,0,0,0,0);
                for ($i=0;$i<$rows_cnt;$i++ ) {
					$row=$user[$i];
					$dsubmit[(int)$row['d']-1]=$row['count'];
					$dcorrect[(int)$row['d']-1]=$row['c_count'];
                }
$sql="SELECT * from week_point2 where user_id=? and w=? order by c desc";
$user=pdo_query($sql,$id,$ywl);
if($user) $rows_cnt=count($user);
                else $rows_cnt=0;
				$point=array("","","");
                $i=0;
                for ($i=0;$i<$rows_cnt;$i++ ) {
					$row=$user[$i];
					$point[$i]=$row['point'];
                }
$sql="select count(1) as c from(select w,id,acc,rank from(
select w,id,acc,@rank:=if(@temp_acc=acc,@rank,
@rank_incr) `rank`,@rank_incr := @rank_incr + 1,
@temp_acc := acc FROM week_submit2 s,(SELECT@rank := 
    0,@temp_rank := NULL,@rank_incr := 1 ) q where w=? ORDER BY acc 
DESC) a ) b";
$user=pdo_query($sql,$ywl);
$row=$user[0];
$total_student=$row["c"];

$sql="select w,id,acc,rank from(select w,id,acc,rank from(
select w,id,acc,@rank:=if(@temp_acc=acc,@rank,
@rank_incr) `rank`,@rank_incr := @rank_incr + 1,
@temp_acc := acc FROM week_submit2 s,(SELECT@rank := 
    0,@temp_rank := NULL,@rank_incr := 1 ) q where w=? ORDER BY acc 
DESC) a ) b where id=?";
$user=pdo_query($sql,$ywl,$id);
$row=$user[0];
$rank=$row["rank"];
$percent=($total_student-$rank)/$total_student;
if($acc=0) $percent=0;
$sql="select * from week_problem2 where user_id=? and w=? order by p_c desc";
$user=pdo_query($sql,$id,$ywl);
$row=$user[0];
$problem_id=$row["problem_id"];

$sql="select title from problem where problem_id =?";
$user=pdo_query($sql,$problem_id);
$row=$user[0];
$title=$row["title"];

if(is_null($title)) {
	$problem_id="检测到";
	$title="没有答对的题目啊同学！";}
	
$sql="SELECT * from week_status2 where user_id=? and w=?";
$user=pdo_query($sql,$id,$ywl);
if($user) $rows_cnt=count($user);
                else $rows_cnt=0;
                $i=0;
				$status=array();
                for ($i=0;$i<$rows_cnt;$i++ ) {
					$row=$user[$i];
					$status[(int)$row['result']]=$row['c'];
                }
$sql="select w,id,score,rank from(select w,id,score,rank from(
select w,id,score,@rank:=if(@temp_score=score,@rank,
@rank_incr) `rank`,@rank_incr := @rank_incr + 1,
@temp_score := score FROM week_submitscore s,(SELECT@rank := 
    0,@temp_rank := NULL,@rank_incr := 1 ) q where w=? ORDER BY score 
DESC) a ) b where id=?";
$user=pdo_query($sql,$ywl,$id);
$row=$user[0];
$score=$row['score'];
$score_rank=$row['rank'];;
if(is_null($score)){
	$score=0;
	$score_rank=$count_student;
}
$sql="select id,sum(score) as sum from week_submitscore where id=?";
$user=pdo_query($sql,$id);
$row=$user[0];
$score_sum=$row['sum'];

switch ($score_sum)
{
case ($score_sum>0&&$score_sum<=50):
{	
	$score_level="入门";
	$score_warning="红色";
	$score_pre="C";
	$color="red";
	break;
}
case ($score_sum>50&&$score_sum<=100):
{	
	$score_level="了解";
	$score_warning="红色";
	$score_pre="C+";
	$color="red";
	break;
}
case ($score_sum>100&&$score_sum<=200):
{	
	$score_level="熟悉";
	$score_warning="橙色";
	$score_pre="B";
	$color="orange";
	break;
}
case ($score_sum>200&&$score_sum<=300):
{	
	$score_level="掌握";
	$score_warning="黄色";
	$score_pre="A";
	$color="#EEC900";
	break;
}
case ($score_sum>300&&$score_sum<=500):
{	
	$score_level="熟练";
	$score_warning="绿色";
	$score_pre="A+";
	$color="green";
	break;
}
case ($score_sum>500&&$score_sum<=1000):
{	
	$score_level="大神";
	$score_warning="绿色";
	$score_pre="S";
	$color="green";
	break;
}
default:
   	$score_level="未知";
	$score_warning="未知";
	$score_pre="无法预测";
	$color="grey";
}

$key_word=array("","仍需努力","");
if($login_day>4) $key_word[1]="坚持不懈";
if($submit_acc>0.75) $key_word[0]="认真准确";
if($score>20)	$key_word[2]="熟能生巧";
require("template/".$OJ_TEMPLATE."/report.php");

/////////////////////////Common foot
if(file_exists('./include/cache_end.php'))
	require_once('./include/cache_end.php');
?>