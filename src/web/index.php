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
	
	
	$sql="select *  from  weekrank            ";
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
				if((isset($_POST['weekcourse'])&&trim($_POST['weekcourse'])!="")){
					$weekcourse=$_POST['weekcourse'];
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
if((isset($_POST['week'])&&trim($_POST['week'])!="")){
	  $week=intval($_POST['week']);

      $sql="SELECT * FROM problem_view WHERE source='$weekcourse' and week=$week ";
	  $resultproblem=mysql_query_cache($sql);

	  foreach ($resultproblem as $row){
			$problemresult.= "<div class='lab-item'><div class='lab-item-index'>".$row['problem_id']."</div>";
			$problemresult.=  "<div class='lab-item-title' data-toggle='tooltip' data-placement='bottom' title='知识点：".$row['point']."；来源：".$row['source']."'>".$row['title']."</div>";
			$problemresult.=  "<div class='pull-right lab-item-ctrl'><a class='btn btn-default' href='status.php?problem_id=".$row['problem_id']."&jresult=4' data-toggle='modal' data-sign='signin' data-next='/courses/1'>正确：".$row['accepted']."</a> ";
			$problemresult.=  "<a class='btn btn-default' href='status.php?problem_id=".$row['problem_id']."' data-toggle='modal' data-sign='signin' data-next='/courses/1'>提交：".$row['submit']."</a> ";
			$problemresult.=  "<a class='btn btn-primary' href='problem.php?id=".$row['problem_id']."' data-toggle='modal' data-sign='signin' data-next='/courses/1'style='color: #fff;background-color: #3baeda;border: 1px solid #3baeda;border-radius: 4px;'>查看题目</a></div></div>";
		}
	
}else{
	  $sql="SELECT * from problem_view limit 6";
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
	





     $sql="select * from contest_view";
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
	
	



     
	 
	 	$sql="SELECT* from leitairank";
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
				

/////////////////////////Template
require("template/".$OJ_TEMPLATE."/index.php");
/////////////////////////Common foot
if(file_exists('./include/cache_end.php'))
	require_once('./include/cache_end.php');

?>
