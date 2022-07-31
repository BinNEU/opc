<?php
header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); // Date in the past
////////////////////////////Common head
	$cache_time=2;
	$OJ_CACHE_SHARE=false;					//这两行两行的两个变量不懂
	require_once('./include/cache_start.php');
    require_once('./include/db_info.inc.php');
    require_once('./include/memcache.php');           //包含某文件
	require_once('./include/setlang.php');
	$view_title= "$MSG_STATUS";                   //变量是"状态"
//从这里开始要删掉	

	$first=1000;
  //if($OJ_SAE) $first=1;
$sql="select max(`problem_id`) as upid FROM `problem` order by 'problem_id' desc";   //从问题表中查询最大的问题编号
$page_cnt=100;
$result=mysql_query_cache($sql);           //查询缓存的结果放到 $result 中
$row=$result[0];
$max_p=$row['upid'];//2019.3.21 修改倒序输出   //$row['upid'] 取出最大问题编号的那条记录 放到 $max_p 中
$cnt=$row['upid']-$first; //问题编号是从1000开始的 $cnt 就是总共多少个问题
$cnt=$cnt/$page_cnt;  //若最大问题编号1256  此处就是256/100=2.56

//从这里结束	
        
require_once("./include/my_func.inc.php");
if(isset($OJ_LANG)){									//isset()是检查变量是否设置，并且不是空值
                require_once("./lang/$OJ_LANG.php");     //把那些常量文件导入进来
        }
require_once("./include/const.inc.php");
if($OJ_TEMPLATE!="classic")             //在$OJ_TEMPLATE另一个文件中不是定义的'neu'吗  这里是为什么？
	$judge_color=Array("label gray","label label-info","label label-warning","label label-warning","label label-success","label label-danger","label label-danger","label label-warning","label label-warning","label label-warning","label label-warning","label label-warning","label label-warning","label label-info");

/* $sql="SELECT
	abc.problem_id,
	abc.solution_id,
	abc.user_id,
	abc.time,
	abc.memory,
	abc.result,
	abc.`language`,
	abc.code_length,
	MAX( abc.in_date ) AS in_date 
FROM
	(
	SELECT
		solution.solution_id,
		solution.problem_id,
		solution.user_id,
		solution.in_date,
		solution.time,
		solution.memory,
		solution.result,
		solution.`language`,
		solution.code_length 
	FROM
		solution 
	WHERE
		solution.result <> 4 
		AND solution.memory > 0 
	) AS abc 
GROUP BY
	abc.problem_id,
	abc.user_id"
$result=mysql_query_cache($sql);
//那么上面应该是先把数据从数据库中拿出来
//开始开始处理表格的输出
 */

                                                                          


?>
<?php
/////////////////////////Template
if (isset($_GET['cid']))
	require("template/".$OJ_TEMPLATE."/conteststatus.php");
else
	require("template/".$OJ_TEMPLATE."/peer_begin.php");
/////////////////////////Common foot
if(file_exists('./include/cache_end.php'))
	require_once('./include/cache_end.php');
?> 