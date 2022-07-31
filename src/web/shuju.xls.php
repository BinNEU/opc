<?php
ini_set("display_errors","On");
		ob_start();
		header ( "content-type:   application/excel" );
		
?>
<?php require_once("./include/db_info.inc.php");
global $mark_base,$mark_per_problem,$mark_per_punish;
 $mark_start=60;
 $mark_end=100;
 $mark_sigma=5;
if(isset($OJ_LANG)){
		require_once("./lang/$OJ_LANG.php");
}
require_once("./include/const.inc.php");
require_once("./include/my_func.inc.php");
class TM{
	var $solved=0;
	var $time=0;
	var $p_wa_num;
	var $p_ac_sec;
	var $user_id;
    var $nick;
    var $mark=0;
	function TM(){
		$this->solved=0;
		$this->time=0;
		$this->p_wa_num=array(0);
		$this->p_ac_sec=array(0);
	}
	function Add($pid,$sec,$res,$mark_base,$mark_per_problem,$mark_per_punish){
//		echo "Add $pid $sec $res<br>";
	
		if (isset($this->p_ac_sec[$pid])&&$this->p_ac_sec[$pid]>0)
			return;
		if ($res!=4) 
			if(isset($this->p_wa_num[$pid]))
				$this->p_wa_num[$pid]++;
			else
				$this->p_wa_num[$pid]=1;
		else{
			$this->p_ac_sec[$pid]=$sec;
			$this->solved++;
			$this->time+=$sec+$this->p_wa_num[$pid]*1200;
			if($this->mark==0){
				$this->mark=$mark_base;
			}else{
				$this->mark+=$mark_per_problem;
			}
			$punish=intval($this->p_wa_num[$pid]*$mark_per_punish);
			if($punish<intval($mark_per_problem*.8))
				$this->mark-=$punish;
			else
				$this->mark-=intval($mark_per_problem*.8);
//			if($this->mark<$mark_base)
//				$this->mark=$mark_base;
//			echo "Time:".$this->time."<br>";
//			echo "Solved:".$this->solved."<br>";
		}
	}
}

function s_cmp($A,$B){
//	echo "Cmp....<br>";
	if ($A->solved!=$B->solved) return $A->solved<$B->solved;
	else return $A->time>$B->time;
}

function normalDistribution( $x,  $u,  $s) {

		$ret = 1 / ($s * sqrt(2 *  M_PI))
				* pow( M_E, -pow($x - $u, 2) / (2 * $s * $s));

		return $ret;

	}

function  getMark($users,  $start,  $end, $s) {
	 $accum = 0;
		 $p=0;
		 $ret = 0;
		 $cn=count($users);
		
		
		for ( $i = $end; $i > $start; $i--) {
			
		    $prob = $cn
					* normalDistribution($i, ($start + $end) / 2+10, ($end - $start)
							/ $s);
			$accum += $prob;
			
		
		}
		
		$p=$accum/$cn;
		$accum=0;
		$i=0;
	
		for ($i = $end; $i > $start; $i--) {
			$prob = $cn
					* normalDistribution($i, ($start + $end) / 2+10, ($end - $start)
							/ $s);
			$accum += $prob;
			while ($accum > $p/2) {
				if ($ret<$cn) 
				$users[$ret]->mark=$i;
				$accum -= $p;
				$ret++;
			}
		}
		while($ret<$cn){
			$users[$ret]->mark=$users[$ret-1]->mark;
			$ret++;
		}
		return $ret;
		
	}



// contest start time
if (!isset($_GET['shuju'])) die("No Such Information!");
$shuju=intval($_GET['shuju']);
//require_once("contest-header.php");
$myclass=$_GET['myclass'];
$course=$_GET['course'];
	header ( "content-disposition:   attachment;   filename=Record_".$myclass."_".$course.".xls" );



$sql="SELECT count(1) FROM `contest_problem` WHERE `contest_id`=?";
$result=pdo_query($sql,$cid);
 $row=$result[0];
$pid_cnt=intval($row[0]);
if($pid_cnt==1) {
	$mark_base=100;
	$mark_per_problem=0;
}else{
	$mark_per_problem=(100-$mark_base)/($pid_cnt-1);
}
$mark_per_punish=$mark_per_problem/5;

if($shuju==1){
$sql="SELECT
solution.user_id,
users.`name`,
solution.solution_id,
solution.problem_id,
solution.result,
solution.`language`,
solution.time,
solution.memory,
solution.in_date
FROM
solution ,
users ,
problem
WHERE
solution.user_id = users.user_id AND
solution.problem_id = problem.problem_id AND
users.class = ? AND
problem.source = ?
ORDER BY
solution.user_id ASC,
solution.problem_id ASC,
solution.solution_id ASC";
//echo $sql;
$result=pdo_query($sql,$myclass,$course);
echo "<center><h3>Commit Record -- $myclass -- $course</h3></center>";
echo "<table class='layui-table' lay-even lay-skin='nob'>";

echo "<thead>";
echo "<tr><td>学号<td>姓名<td>提交序号<td>题目<td>结果<td>运行时间<td>运行内存<td>提交时间</tr></thead>";

foreach($result as $row){
        echo "<tr>";
		echo "<td>".$row['user_id'];
		echo "<td>".$row['name'];
		echo "<td>".$row['solution_id'];
		echo "<td>".$row['problem_id'];
		if($row['result']==4) echo "<td>"."正确";
		else if($row['result']==5) echo "<td>"."格式错误";
		else if($row['result']==6) echo "<td>"."答案错误";
		else if($row['result']==7) echo "<td>"."时间超限";
		else if($row['result']==8) echo "<td>"."内存超限";
		else if($row['result']==9) echo "<td>"."输出超限";
		else if($row['result']==10) echo "<td>"."运行错误";
		else if($row['result']==11) echo "<td>"."编译错误";
		else if($row['result']==12) echo "<td>"."编译成功";
		else if($row['result']==13) echo "<td>"."运行完成";
		echo "<td>".$row['time'];
		echo "<td>".$row['memory'];
		echo "<td>".$row['in_date'];
        echo "</tr>";
}

echo "</table>";}
else if($shuju==2){
	$sql="select  a.user_id,a.name,a.alls,a.corrs,b.allp,b.corrp from (SELECT
solution.user_id,
users.`name`,
Count(solution.solution_id) AS `alls`,
Count(IF(solution.result=4,1,NULL)) AS corrs
FROM
solution ,
users ,
problem
WHERE
solution.problem_id = problem.problem_id AND
solution.user_id = users.user_id AND
users.class = ? AND
problem.source = ?
GROUP BY
solution.user_id)  a  JOIN 
(SELECT
solution.user_id,
users.`name`,
COUNT(DISTINCT solution.problem_id) AS allp,
COUNT(IF(solution.result=4,1,null)) AS corrp
FROM
solution ,
users ,
problem
WHERE
solution.problem_id = problem.problem_id AND
solution.user_id = users.user_id AND
users.class = ? AND
problem.source = ?
GROUP BY
solution.user_id) b on a.user_id=b.user_id

";
$result=pdo_query($sql,$myclass,$course,$myclass,$course);
echo "<center><h3>Statistical Data -- $myclass -- $course</h3></center>";
echo "<table class='layui-table' lay-even lay-skin='nob'>";

echo "<thead>";
echo "<tr><td>学号<td>姓名<td>提交总数<td>提交正确<td>题目提交数<td>题目完成数</tr></thead>";

foreach($result as $row){
        echo "<tr>";
		echo "<td>".$row['user_id'];
		echo "<td>".$row['name'];
		echo "<td>".$row['alls'];
		echo "<td>".$row['corrs'];
		echo "<td>".$row['allp'];
		echo "<td>".$row['corrp'];
        echo "</tr>";
}

echo "</table>";}	

?>
