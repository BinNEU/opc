<?php
$cur_path = "template/$OJ_TEMPLATE/";

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">
<style>
layui-table{width:100%;background-color:#fff}.layui-table tr{transition:all .3s;-webkit-transition:all .3s}.layui-table thead tr{background-color:#f2f2f2}.layui-table th{text-align:left}.layui-table td,.layui-table th{padding:9px 15px;min-height:20px;line-height:20px;border:1px solid #e2e2e2;font-size:14px}.layui-table tr:hover,.layui-table[lay-even] tr:nth-child(even){background-color:#f8f8f8}.layui-table[lay-skin=line],.layui-table[lay-skin=row]{border:1px solid #e2e2e2}.layui-table[lay-skin=line] td,.layui-table[lay-skin=line] th{border:none;border-bottom:1px solid #e2e2e2}.layui-table[lay-skin=row] td,.layui-table[lay-skin=row] th{border:none;border-right:1px solid #e2e2e2}.layui-table[lay-skin=nob] td,.layui-table[lay-skin=nob] th{border:none}
</style>

    <title><?php echo $OJ_NAME?></title>  
    <?php include("template/$OJ_TEMPLATE/css.php");?>	    


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="http://cdn.bootcss.com/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="http://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
<body>
	<!-- Fixed navbar -->
	    <?php include("template/$OJ_TEMPLATE/nav.php");?>	
    <div class="container"> 
	<!-- Header -->

	<!-- /Header -->
      <div class="jumbotron">
            <section class="news-box top-margin">
        <div class="container">
            <h2><span>我的状态</span></h2>
            <div class="row">
			<div class="col-lg-6 col-md-4 col-sm-12">
				<div id="echarts" style="width:100%;height:350px;display:inline-block"></div>
			             	
		<?php	
$user=$_SESSION[$OJ_NAME.'_'.'user_id'];		
$sql="SELECT UNIX_TIMESTAMP(date(in_date))*1000 md,count(1) as c,count(if(result=4,true,null)) as ac FROM `solution` where  `user_id`=?  group by md order by md asc  ";
	$result2=pdo_query($sql,$user);//mysql_escape_string($sql));
	$row=$result2[0];
			?>
                                </div>
                <div class="col-lg-3 col-md-4 col-sm-12">
                   
      <div id="overall-typepie1" style="width:400px;height:350px;display:inline-block"></div>
	<?php

	$sid=$_SESSION[$OJ_NAME.'_'.'user_id'];

      //查询问题信息
	  
	  //数据库查询
	  //$sql = "SELECT base.*,runtimeinfo.error FROM (SELECT sbase.*,sim.sim_s_id,sim FROM(SELECT solution_id,user_id,time,memory,result,language FROM solution where problem_id = ?)sbase LEFT JOIN sim ON sbase.solution_id = sim.s_id)base LEFT OUTER JOIN runtimeinfo ON base.solution_id = runtimeinfo.solution_id";
	  $sql = "SELECT base.*,runtimeinfo.error FROM (SELECT solution_id,problem_id,user_id,time,memory,result,language,judgetime FROM solution where user_id = ?)base LEFT OUTER JOIN runtimeinfo ON base.solution_id = runtimeinfo.solution_id";
	  
	  $results = pdo_query($sql, $sid);
	  $row=$results[0];
		?>											    

                                
                </div>
                
                <div class="col-lg-3 col-md-4 col-sm-12">
                   
      <div id="leida" style="width:100%;height:350px;display:inline-block"></div>
	  		<?php	
$user=$_SESSION[$OJ_NAME.'_'.'user_id'];		
$sql="select count(*) al,count(if(result=4,true,null)) ac ,point from (SELECT solution.problem_id,point,result FROM `solution`,problem WHERE `user_id`=? and solution.problem_id=problem.problem_id) a group by point";
	$result3=pdo_query($sql,$user);//mysql_escape_string($sql));
			?>
                                
                </div>
            </div>
        </div>
    </section>
         <section class="container">
        <div class="col-md-8">
            <h2 class="section-title"><span>通知</span></h2>
            <div>  
                 <hr width='100%'><?php echo $view_news?><hr>
            </div>
			
			
        </div>
		          <div class="col-md-4"><div class="title-box clearfix "><h2 class="title-box_primary">我的管理</h2></div> 
		   <div class="title-box clearfix ">
		   <ul>
		   
		    <li ><a class="btn" href='<?php echo $path_fix?>export_ac_code.php' style="font-weight: 400;display: inline-block;width: auto;vertical-align: middle;font-size:15px; color:white;  background-color:#3d84e6;  line-height: 1.42857143;height: 34px;padding: 6px 12px;border: 1px solid #ccc;border-radius: 4px;">下载源码</a>点击按钮下载你提交的源程序代码</li>
			<li ><a class="btn" href='<?php echo $path_fix?>modifypage.php' style="font-weight: 400;display: inline-block;width: auto;vertical-align: middle;font-size:15px; color:white;  background-color:#3d84e6;  line-height: 1.42857143;height: 34px;padding: 6px 12px;border: 1px solid #ccc;border-radius: 4px;">修改信息</a>点击按钮修改密码等个人信息</li>
					    <li ><a class="btn" href='<?php echo $path_fix?>mail.php' style="font-weight: 400;display: inline-block;width: auto;vertical-align: middle;font-size:15px; color:white;  background-color:#3d84e6;  line-height: 1.42857143;height: 34px;padding: 6px 12px;border: 1px solid #ccc;border-radius: 4px;">我的消息</a>点击按钮查看收到的短消息</li>
		    <li ><a class="btn" href='<?php echo $path_fix?>status.php?user_id=<?php echo $sid?>' style="font-weight: 400;display: inline-block;width: auto;vertical-align: middle;font-size:15px; color:white;  background-color:#3d84e6;  line-height: 1.42857143;height: 34px;padding: 6px 12px;border: 1px solid #ccc;border-radius: 4px;">我的提交</a>点击按钮查看我的提交记录信息</li>
		    <li ><a class="btn" href='<?php echo $path_fix?>contest.php?my' style="font-weight: 400;display: inline-block;width: auto;vertical-align: middle;font-size:15px; color:white;  background-color:#3d84e6;  line-height: 1.42857143;height: 34px;padding: 6px 12px;border: 1px solid #ccc;border-radius: 4px;">我的竞赛</a>点击按钮查看参加的竞赛</li>	
		    <li ><a class="btn" href='<?php echo $path_fix?>logout.php' style="font-weight: 400;display: inline-block;width: auto;vertical-align: middle;font-size:15px; color:white;  background-color:#3d84e6;  line-height: 1.42857143;height: 34px;padding: 6px 12px;border: 1px solid #ccc;border-radius: 4px;">注销登录</a>点击按钮注销登录状态</li>			
			
			 
			 </ul>
			</div>
         </div>
    </section>


			<div class="clear"></div>
			<!--CLEAR FLOATS-->
		</div>
		</div>
<script src="<?php echo $cur_path?>jquery.min.js"></script>

	<!-- JavaScript libs are placed at the end of the document so the pages load faster -->


	<script type='text/javascript' src='<?php echo $cur_path?>assets/js/jquery.min.js'></script>
    <script src="<?php echo $cur_path?>assets/js/bootstrap.min.js"></script> 
		<script>
    <?php
	  //输送classConfig
	  echo "classConfig='".$class_data."';\n";
	  echo "pdoData='".addslashes(json_encode($results))."';\n";
	  echo "Data='".addslashes(json_encode($result2))."';\n";
	  	  echo "LDData='".addslashes(json_encode($result3))."';\n";
	?>
	</script>
	
    <script type="text/javascript" src="<?php echo $cur_path?>echarts.min.js"></script>
	<script type="text/javascript" src="<?php echo $cur_path?>analysis.js"></script>	
	

</body>
</html>