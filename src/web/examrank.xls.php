<?php
ini_set("display_errors","Off");
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
if (!isset($_GET['eid'])) die("No Such Exam!");
$eid=intval($_GET['eid']);
//require_once("contest-header.php");
$sql="SELECT contest_id FROM `exam_problem` WHERE `exam_id`=?";
$result=pdo_query($sql,$eid);
$row=$result[0];
$cid=$row["contest_id"];

$sql="SELECT GROUP_CONCAT(contest_id) as t FROM `exam_problem` WHERE `exam_id`=?";
$result=pdo_query($sql,$eid);
$row=$result[0];
$tag=$row["t"];

$sql="SELECT `start_time`,`title` FROM `exam` WHERE `exam_id`=?";
$result=pdo_query($sql,$eid) ;
$rows_cnt=count($result);
$start_time=0;
if ($rows_cnt>0){
	 $row=$result[0];
	$start_time=strtotime($row[0]);
	$title=$row[1];
	$ftitle=rawurlencode($title);
	header ( "content-disposition:   attachment;   filename=Exam".$eid."_".$ftitle.".xls" );
}

if ($start_time==0){
	echo "No Such Exam";
	//require_once("oj-footer.php");
	exit(0);
}

if ($start_time>time()){
	echo "Exam Not Started!";
	//require_once("oj-footer.php");
	exit(0);
}

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


$sql="SELECT 
	users.user_id,users.name,solution.result,solution.num,solution.in_date 
		FROM 
			(select * from solution where solution.contest_id in ($tag) and num>=0 and problem_id>0 and user_id in (select user_id from tblexam where exam_id=$eid)) solution 
		left join users 
		on users.user_id=solution.user_id  
	ORDER BY users.user_id,in_date";
//echo $sql;
$results=pdo_query($sql);
$user_cnt=0;
$user_name='';
$U=array();
 foreach($results as $rows){
	$n_user=$rows['user_id'];
	if (strcmp($user_name,$n_user)){
		$user_cnt++;
		$U[$user_cnt]=new TM();
		$U[$user_cnt]->user_id=$rows['user_id'];
                $U[$user_cnt]->name=$rows['name'];

		$user_name=$n_user;
	}
	$U[$user_cnt]->Add($rows['num'],strtotime($rows['in_date'])-$start_time,intval($rows['result']),$mark_base,$mark_per_problem,$mark_per_punish);
}

usort($U,"s_cmp");
$rank=1;
//echo "<style> td{font-size:14} </style>";
//echo "<title>Contest RankList -- $title</title>";
echo "<center><h3>Exam RankList -- $eid</h3></center>";
echo "<table border=1><tr><td>Rank<td>User<td>Name<td>Solved<td>Penalty<td>Mark";
for ($i=0;$i<$pid_cnt;$i++)
	echo "<td>$PID[$i]";
echo "</tr>";
getMark($U,$mark_start,$mark_end,$mark_sigma);

for ($i=0;$i<$user_cnt;$i++){
	if ($i&1) echo "<tr class=oddrow align=center>";
	else echo "<tr class=evenrow align=center>";
	echo "<td>$rank";
	$rank++;
	$uuid=$U[$i]->user_id;
        
	$usolved=$U[$i]->solved;
	echo "<td>$uuid";
	if(strpos($_SERVER['HTTP_USER_AGENT'],'MSIE')){
		$U[$i]->name=iconv("utf8","gbk",$U[$i]->name);
	}
	echo "<td>".$U[$i]->name."";
	echo "<td>$usolved";
	echo "<td>".sec2str($U[$i]->time);
	echo "<td>";
        if($usolved==0) $U[$i]->mark=0;	
	
	echo $U[$i]->mark>0?intval($U[$i]->mark):0;
	for ($j=0;$j<$pid_cnt;$j++){
		echo "<td>";
		if(isset($U[$i])){
			if (isset($U[$i]->p_ac_sec[$j])&&$U[$i]->p_ac_sec[$j]>0)
				echo sec2str($U[$i]->p_ac_sec[$j]);
			if (isset($U[$i]->p_wa_num[$j])&&$U[$i]->p_wa_num[$j]>0) 
				echo "(-".$U[$i]->p_wa_num[$j].")";
		}
	}
	echo "</tr>";
}
echo "</table>";

?>
