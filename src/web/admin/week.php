<?php
require_once("../include/db_info.inc.php");
;?>

<?php if (!(isset($_SESSION[$OJ_NAME.'_'.'administrator'])||
			isset($_SESSION[$OJ_NAME.'_'.'contest_creator'])||
			isset($_SESSION[$OJ_NAME.'_'.'problem_editor']))){
	echo "<a href='../loginpage.php'>Please login with an administrator account first!</a>";
	exit(1);
}
if(file_exists("../lang/$OJ_LANG.php")) require_once("../lang/$OJ_LANG.php");

$user=$_SESSION[$OJ_NAME.'_'.'user_id'];
if (isset($_SESSION[$OJ_NAME.'_'.'user_id'])){
$sql="SELECT `school` FROM `users` WHERE `user_id`=?";
$result=pdo_query($sql,$_SESSION[$OJ_NAME.'_'.'user_id']);
$row=$result[0];
$school=$row['school'];}
$sql="select DISTINCT class from users where school='$school' order by convert(class using gbk)  asc";
$result=pdo_query($sql);//mysql_escape_string($sql));
$class=array();
foreach ($result as $row){
	$cate=explode(" ",$row['class']);
	foreach($cate as $cat){
		array_push($class,trim($cat));	
		}
	}
$class=array_unique($class);

if(isset($_GET['date'])){
	$date=$_GET['date'];
if(isset($_GET['myclass']))
	$myclass2=$_GET['myclass'];

$newclass = explode(',',$myclass2); 
for($index=0;$index<count($newclass);$index++){ 
$newclass2[$index]="'".$newclass[$index]."'";
} 
$myclass=implode(", ", $newclass2);
$import_class=implode("_", $newclass);
$year= date("Y",strtotime($date));
$week= date("W",strtotime($date));
$yearweek=$year."年第".$week."周";

$yw= date("yW",strtotime($date));

$sql="SELECT count(*) as c from users where class in($myclass)";
$user=pdo_query($sql);
$row=$user[0];
$class_count=$row['c'];

$sql="select count(*) as c from week_loginlog2 where w=? and user_id in (SELECT user_id from users where class  in($myclass))";
$user=pdo_query($sql,$yw);
$row=$user[0];
$login_count=$row['c'];

$sql="select SUM(count) as c from week_submit2 where w=? and id in (SELECT user_id from users where class in($myclass))";
$user=pdo_query($sql,$yw);
$row=$user[0];
$submit_count=$row['c'];

$sql="select count(point) as c ,count(((`result` = 4) or NULL)) as cc ,point,count(((`result` = 4) or NULL))/count(point) as p from (select date_format(solution.in_date,'%y%u') as w, solution.result, solution.`language`,solution.problem_id,problem.point from solution,problem where date_format(solution.in_date,'%y%u')=? and solution.`language`=0 and solution.problem_id=problem.problem_id and solution.user_id in (SELECT user_id from users where class in($myclass))) a GROUP BY point order by p asc";
$result = pdo_query($sql,$yw) ;	
	if($result) $rows_cnt=count($result);
                else $rows_cnt=0;
                $view_C=Array();
                $i=0;
                for ( $i=0;$i<$rows_cnt;$i++ ) {
					
                        $row=$result[$i];            
                        $view_C[$i][0]= $row['point'];
						$view_C[$i][1]= $row['c'];
						$view_C[$i][2]= $row['cc'];
						$view_C[$i][3]= $row['p'];

//                      $i++;
                }
$sql="select count(point) as c ,count(((`result` = 4) or NULL)) as cc ,point,count(((`result` = 4) or NULL))/count(point) as p from (select date_format(solution.in_date,'%y%u') as w, solution.result, solution.`language`,solution.problem_id,problem.point from solution,problem where date_format(solution.in_date,'%y%u')=? and solution.`language`=1 and solution.problem_id=problem.problem_id and solution.user_id in (SELECT user_id from users where class in($myclass))) a GROUP BY point order by p asc";
$result = pdo_query($sql,$yw) ;	
	if($result) $rows_cnt=count($result);
                else $rows_cnt=0;
                $view_CP=Array();
                $i=0;
                for ( $i=0;$i<$rows_cnt;$i++ ) {
					
                        $row=$result[$i];            
                        $view_CP[$i][0]= $row['point'];
						$view_CP[$i][1]= $row['c'];
						$view_CP[$i][2]= $row['cc'];
						$view_CP[$i][3]= $row['p'];

//                      $i++;
                }
$sql="select count(point) as c ,count(((`result` = 4) or NULL)) as cc ,point,count(((`result` = 4) or NULL))/count(point) as p from (select date_format(solution.in_date,'%y%u') as w, solution.result, solution.`language`,solution.problem_id,problem.point from solution,problem where date_format(solution.in_date,'%y%u')=? and solution.`language`=6 and solution.problem_id=problem.problem_id and solution.user_id in (SELECT user_id from users where class in($myclass))) a GROUP BY point order by p asc";
$result = pdo_query($sql,$yw) ;	
	if($result) $rows_cnt=count($result);
                else $rows_cnt=0;
                $view_Python=Array();
                $i=0;
                for ( $i=0;$i<$rows_cnt;$i++ ) {
					
                        $row=$result[$i];            
                        $view_Python[$i][0]= $row['point'];
						$view_Python[$i][1]= $row['c'];
						$view_Python[$i][2]= $row['cc'];
						$view_Python[$i][3]= $row['p'];

//                      $i++;
                }
$sql="select count(point) as c ,count(((`result` = 4) or NULL)) as cc ,point,count(((`result` = 4) or NULL))/count(point) as p from (select date_format(solution.in_date,'%y%u') as w, solution.result, solution.`language`,solution.problem_id,problem.point from solution,problem where date_format(solution.in_date,'%y%u')=? and solution.`language`=3 and solution.problem_id=problem.problem_id and solution.user_id in (SELECT user_id from users where class in($myclass))) a GROUP BY point order by p asc";
$result = pdo_query($sql,$yw) ;	
	if($result) $rows_cnt=count($result);
                else $rows_cnt=0;
                $view_Java=Array();
                $i=0;
                for ( $i=0;$i<$rows_cnt;$i++ ) {
					
                        $row=$result[$i];            
                        $view_Java[$i][0]= $row['point'];
						$view_Java[$i][1]= $row['c'];
						$view_Java[$i][2]= $row['cc'];
						$view_Java[$i][3]= $row['p'];

//                      $i++;
                }	

$sql="select count(problem_id) as c ,count(((`result` = 4) or NULL)) as cc ,problem_id,title,source, count(((`result` = 4) or NULL))/count(problem_id) as p from (select date_format(solution.in_date,'%y%u') as w, solution.result, solution.`language`,solution.problem_id,problem.title,problem.source from solution,problem where date_format(solution.in_date,'%y%u')=? and solution.problem_id=problem.problem_id and solution.user_id in (SELECT user_id from users where class in($myclass))) a GROUP BY problem_id order by p asc";
$result = pdo_query($sql,$yw) ;	
	if($result) $rows_cnt=count($result);
                else $rows_cnt=0;
                $view_problem=Array();
                $i=0;
                for ( $i=0;$i<$rows_cnt;$i++ ) {
					
                        $row=$result[$i]; 
						if($row['p']<1){						
                        $view_problem[$i][0]= $row['problem_id'];
						$view_problem[$i][1]= $row['title'];
						$view_problem[$i][2]= $row['source'];
						$view_problem[$i][3]= $row['c'];
						$view_problem[$i][4]= $row['cc'];
						$view_problem[$i][5]= $row['p']*100;}

//                      $i++;
                }		

$sql="select * , (acc*10)+GREATEST(p_count,c_count) as score from week_submit2 where id in (select user_id from users where class in($myclass)) and w=?";				
$result = pdo_query($sql,$yw) ;	
	if($result) $rows_cnt=count($result);
                else $rows_cnt=0;
                $view_score=Array();
                $i=0;
                for ( $i=0;$i<$rows_cnt;$i++ ) {
					
                        $row=$result[$i]; 						
                        $view_score[$i][0]= $row['id'];
						$view_score[$i][1]= $row['p_count'];
						$view_score[$i][2]= $row['acc'];
						$view_score[$i][3]= $row['score'];

//                      $i++;
                }

$sql="select * from (select a.user_id as id,name,email,w from (select user_id,name,email from users where class in($myclass)) a left join
(select user_id,w from week_loginlog2 where user_id in(select user_id from users where class in($myclass) ) and w=?) b on a.user_id=b.user_id) m
 left join(SELECT user_id,acc from (select user_id,name,email from users where class in($myclass)) a left join 
 (select * from week_submit2 where w=? and id in (select user_id as id from users where class in($myclass))) b 
 on a.user_id=b.id) n on m.id=n.user_id";
$result = pdo_query($sql,$yw,$yw);
	if($result) $rows_cnt=count($result);
                else $rows_cnt=0;
                $warning=Array();
                $i=0;
				$rank=0;
                for ( $i=0;$i<$rows_cnt;$i++ ) {
					
                        $row=$result[$i]; 
						if((is_null($row['w']))&&(is_null($row['acc']))){
	
							$warning[$rank][0]= $row['id'];
							$warning[$rank][1]= $row['name'];
							$warning[$rank][2]= "缺勤且未提交";
							$warning[$rank][3]= $row['emil'];
							$rank++;
}						else if(is_null($row['acc'])){
							$warning[$rank][0]= $row['id'];
							$warning[$rank][1]= $row['name'];
							$warning[$rank][2]= "考勤但未提交";
							$warning[$rank][3]= $row['emil'];
							$rank++;
}			
						else if($row['acc']<0.5){
							$warning[$rank][0]= $row['id'];
							$warning[$rank][1]= $row['name'];
							$warning[$rank][2]= "正确率低";
							$warning[$rank][3]= $row['emil'];
							$rank++;
}			
//                      $i++;
                }
				

}
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="renderer" content="webkit">
  		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
		<title>网站后台管理</title>
		<link rel="stylesheet" type="text/css" href="../static/admin/layui/css/layui.css"/>
		<link rel="stylesheet" type="text/css" href="../static/admin/css/admin.css"/>
	</head>
	<body>
		<div class="wrap-container welcome-container">
		<form class="layui-form" action="week.php">
  
  <div class="layui-form-item">
    <div class="layui-inline">
      <label class="layui-form-label">选择日期</label>
      <div class="layui-input-inline">
	  <?php if(isset($date)){?>
        <input type="text" name="date" id="date" lay-verify="date" placeholder="<?php echo $date;?>" value="<?php echo $date;?>" autocomplete="off" class="layui-input">
	  <?php }else{?>
	  <input type="text" name="date" id="date" lay-verify="date" placeholder="yyyy-MM-dd" autocomplete="off" class="layui-input">
	  <?php }?>
      </div>
    </div>

</div>
  <!--<div class="layui-form-item layui-form-text">
    <label class="layui-form-label">编辑器</label>
    <div class="layui-input-block">
      <textarea class="layui-textarea layui-hide" name="content" lay-verify="content" id="LAY_demo_editor"></textarea>
    </div>
  </div>-->

		    <div class="layui-form-item">
			<label class="layui-form-label">选择班级</label>
			<div class="layui-input-block">
      <div name="myclass" id="demo1" class="xm-select-demo"></div>
    </div></div>
		    <div class="layui-form-item">
			<div class="layui-input-block">
      <button type="submit" class="layui-btn" lay-submit="" lay-filter="demo1">立即提交</button>
    </div></div>
</form>
	
			<div class="row">

				<div class="welcome-left-container col-lg-9">
				<div><br></div>
					<div class="data-show">
						<ul class="clearfix">
							<li class="col-sm-12 col-md-4 col-xs-12">
								<a class="clearfix">
									<div class="icon-bg bg-org f-l">
										<span class="iconfont">&#xe606;</span>
									</div>
									<div class="right-text-con">
										<p class="name">班级总人数</p>
										<p><span class="color-org"><?php echo $class_count;?></span></p>
									</div>
								</a>
							</li>
							<li class="col-sm-12 col-md-4 col-xs-12">
								<a href="javascript:;" class="clearfix">
									<div class="icon-bg bg-blue f-l">
										<span class="iconfont">&#xe602;</span>
									</div>
									<div class="right-text-con">
										<p class="name">考勤学生数</p>
							<p><span class="color-org"><?php echo $login_count;?></span></p>
										</div>
								</a>
							</li>
							<li class="col-sm-12 col-md-4 col-xs-12">
								<a href="javascript:;" class="clearfix">
									<div class="icon-bg bg-green f-l">
										<span class="iconfont">&#xe628;</span>
									</div>
									<div class="right-text-con">
										<p class="name">提交总数</p>
							<p><span class="color-org"><?php echo $submit_count;?></span></p>
							</div>
								</a>
							</li>
						</ul>
					</div>
										<div class="chart-panel panel panel-default">
						<div class="panel-body" id="echarts" style="height: 376px;"></div>
						<?php 
						$sql="SELECT UNIX_TIMESTAMP(date(in_date))*1000 md,count(1) c,count(if(result=4,true,null)) as ac FROM (select * from solution where user_id in (select user_id from users where class in($myclass)) and date_format(solution.in_date,'%y%u')=? order by solution_id desc ) solution  where result<13 group by md order by md asc";
						$result2=pdo_query($sql,$yw);
						?>
					</div>
					
										<div class="server-panel panel panel-default">
						<div class="panel-header">知识点分析</div>
						<div class="panel-body clearfix">
												<ul class="clearfix">
							<li class="col-sm-12 col-md-6 col-xs-12">
								<a class="clearfix">
									<div class="right-text-con">
										<p class="name">C</p>
	<?php
	if(is_null($view_C[0][0])) echo "<p><span class='color-org'>本周暂无提交记录。</span></p>";
	else{
for($i=0;$i<count($view_C);$i++){
echo "<p><span class='color-org'>";
echo $view_C[$i][0];
echo "：提交";
echo $view_C[$i][1];
echo "次，正确";
echo $view_C[$i][2];
echo "次。正确率";
echo $view_C[$i][3]*100;
echo "%。</span></p>";
	}}
	?>
										
									</div>
								</a>
							</li>
							<li class="col-sm-12 col-md-6 col-xs-12">
								<a href="javascript:;" class="clearfix">
									<div class="right-text-con">
										<p class="name">C++</p>
								<?php
								if(is_null($view_CP[0][0])) echo "<p><span class='color-org'>本周暂无提交记录。</span></p>";
								else{
for($i=0;$i<count($view_CP);$i++){
echo "<p><span class='color-org'>";
echo $view_CP[$i][0];
echo "：提交";
echo $view_CP[$i][1];
echo "次，正确";
echo $view_CP[$i][2];
echo "次。正确率";
echo $view_CP[$i][3]*100;
echo "%。</span></p>";
								}}
	?>
										</div>
								</a>
							</li>
							<li class="col-sm-12 col-md-6 col-xs-12">
								<a href="javascript:;" class="clearfix">
									<div class="right-text-con">
										<p class="name">Python</p>
								<?php
								if(is_null($view_Python[0][0])) echo "<p><span class='color-org'>本周暂无提交记录。</span></p>";
								else{
for($i=0;$i<count($view_Python);$i++){
echo "<p><span class='color-org'>";
echo $view_Python[$i][0];
echo "：提交";
echo $view_Python[$i][1];
echo "次，正确";
echo $view_Python[$i][2];
echo "次。正确率";
echo $view_Python[$i][3]*100;
echo "%。</span></p>";
								}}
	?>
							</div>
								</a>
							</li>
							<li class="col-sm-12 col-md-6 col-xs-12">
								<a href="javascript:;" class="clearfix">
									<div class="right-text-con">
										<p class="name">Java</p>
								<?php
								if(is_null($view_Java[0][0])) echo "<p><span class='color-org'>本周暂无提交记录。</span></p>";
								else{
for($i=0;$i<count($view_Java);$i++){
echo "<p><span class='color-org'>";
echo $view_Java[$i][0];
echo "：提交";
echo $view_Java[$i][1];
echo "次，正确";
echo $view_Java[$i][2];
echo "次。正确率";
echo $view_Java[$i][3]*100;
echo "%。</span></p>";
								}}
	?>
							</div>
								</a>
							</li>
						</ul>
						</div>
					</div>
															<div class="server-panel panel panel-default">
						<div class="panel-header">题目分析</div>
						<div class="panel-body clearfix">
						<table class="layui-table">
  <thead align="center">
    <tr>
      <th>题号</th>
      <th>题目</th>
      <th>课程</th>
	  <th>提交数</th>
	  <th>正确数</th>
	  <th>正确率</th>
	  <th>分析</th>
    </tr>
  </thead>
  	<?php
	if(is_null($view_problem[0][0]))
	{
		echo "<tr>";
echo "<td>无提交记录</td>";
echo "<td>无提交记录</td>";
echo "<td>无提交记录</td>";
echo "<td>无提交记录</td>";
echo "<td>无提交记录</td>";
echo "<td>无提交记录</td>";
echo "<td>无提交记录</td>";
echo "</tr>";
	}
	else{
for($i=0;$i<count($view_problem);$i++){
echo "<tr>";
echo "<td><a href='../problem.php?id=".$view_problem[$i][0]."' target='_blank'>".$view_problem[$i][0]."</a></td>";
echo "<td>".$view_problem[$i][1]."</td>";
echo "<td>".$view_problem[$i][2]."</td>";
echo "<td>".$view_problem[$i][3]."</td>";
echo "<td>".$view_problem[$i][4]."</td>";
echo "<td>".$view_problem[$i][5]."%</td>";
echo "<td><a type='button' class='layui-btn'href='./problem_analysis.php?id=".$view_problem[$i][0]."&class=".$myclass2."' target='_blank'>点击查看</a></td>";
echo "</tr>";
	}}
	?>
</table>
						</div>
					</div>
	<div class="server-panel panel panel-default">
						<div class="panel-header">需要关注的学生 <a href='../student.xls.php?w=<?php echo $yw;?>&myclass=<?php echo $import_class;?>' class='layui-btn' >导出</a></div>
						<div class="panel-body clearfix">
												<table class="layui-table">
  <thead align="center">
    <tr>
      <th>学号</th>
      <th>姓名</th>
      <th>原因</th>
    </tr>
  </thead>
  <?php 
  
  for($i=0;$i<count($warning);$i++){
echo "<tr>";
echo "<td>".$warning[$i][0]."</td>";
echo "<td>".$warning[$i][1]."</td>";
echo "<td>".$warning[$i][2]."</td>";
echo "</tr>";
	}
  
  
  ?>
   
</table>
						</div>
					</div>
					<!--图表-->
				</div>
				<div class="welcome-edge col-lg-3">
									<div class="panel panel-default contact-panel">
						<div class="panel-header">您现在查看的是</div>
						<div class="panel-body">
							<h2><p>班级：<?php echo $myclass2;?></p>
							<p>时间：<?php echo $date;?>，<?php echo $yearweek;?></p></h2>
							<!--<p></p>-->
						</div>
					</div>
											
										<div class="panel panel-default contact-panel">
						<div class="panel-header">本周学生提交情况</div>
						<div class="panel-body">
						<div>学生积分按照考勤、练习以及AI预测综合得出仅供参考</div>
						<table class="layui-table">
  <thead>
    <tr>
      <th>学号</th>
	  <th>答题</th>
	  <th>正确率</th>
      <th>积分</th>
    </tr>
  </thead>
  	<?php
for($i=0;$i<count($view_score);$i++){
echo "<tr>";
echo "<td>".$view_score[$i][0]."</td>";
echo "<td>".$view_score[$i][1]."</td>";
echo "<td>".$view_score[$i][2]."</td>";
echo "<td>".(int)$view_score[$i][3]."</td>";
	}
	?>
</table>
						</div>
					</div>				

					<!--联系-->
					
					<div class="panel panel-default contact-panel">
						<div class="panel-header">联系我们</div>
						<div class="panel-body">
							<p>邮箱  <i class="iconfont">&#xe603;</i>：yansheng1117@foxmail.com</p>
							<!--<p></p>-->
						</div>
					</div>
				</div>
			</div>
		</div>

				<script>
    <?php
	  //输送classConfig
	  echo "classConfig='".$class_data."';\n";
	  echo "pdoData='".addslashes(json_encode($results))."';\n";
	  echo "Data='".addslashes(json_encode($result2))."';\n";
	?>
	</script>
		<script type="text/javascript" src="../static/admin/lib/echarts/echarts.min.js"></script>
	<script type="text/javascript" src="../static/admin/lib/echarts/analysis.js"></script>	
	<script src="../static/admin/layui/layui2.js" type="text/javascript" charset="utf-8"></script>
	<script src="../static/admin/layui/xm-select.js" type="text/javascript" charset="utf-8"></script>
<script>
layui.use(['form', 'layedit', 'laydate'], function(){
  var form = layui.form
  ,layer = layui.layer
  ,layedit = layui.layedit
  ,laydate = layui.laydate;
  
  //日期
  laydate.render({
    elem: '#date'
  });
  laydate.render({
    elem: '#date1'
  });
  
  //创建一个编辑器
  var editIndex = layedit.build('LAY_demo_editor');
 
  //自定义验证规则
  form.verify({
    title: function(value){
      if(value.length < 5){
        return '标题至少得5个字符啊';
      }
    }
    ,pass: [
      /^[\S]{6,12}$/
      ,'密码必须6到12位，且不能出现空格'
    ]
    ,content: function(value){
      layedit.sync(editIndex);
    }
  });
  
  //监听指定开关
  form.on('switch(switchTest)', function(data){
    layer.msg('开关checked：'+ (this.checked ? 'true' : 'false'), {
      offset: '6px'
    });
    layer.tips('温馨提示：请注意开关状态的文字可以随意定义，而不仅仅是ON|OFF', data.othis)
  });
  
  
  //表单取值
  layui.$('#LAY-component-form-getval').on('click', function(){
    var data = form.val('example');
    alert(JSON.stringify(data));
  });
  //加载层

});


</script>
<script>
var demo1 = xmSelect.render({
	el: '#demo1', 
	name: 'myclass',
	height: '500px',
	autoRow: true,
		toolbar: {
		show: true,
	},
	tips: '请选择要查询的班级',
	filterable: true,
	data: [
	<?php 
	foreach ($class as $cat){
                    if(trim($cat)=="") continue;
					
					if(in_array($cat,$newclass)) 
						$my_class2.= "{name: '".$cat."', value: '".$cat."', selected: true},";
					else 
						$my_class2.= "{name: '".$cat."', value: '".$cat."'},";
                }	
				echo $my_class2	;
	?>
	]
})
</script>

	</body>
	
</html>
