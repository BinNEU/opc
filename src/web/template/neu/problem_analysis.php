<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <title>Analyse Problem</title>
  	<?php include("template/$OJ_TEMPLATE/tonghji.php");?>	
</head>
<hr>

<?php
require_once("admin-header.php");
if(!(isset($_SESSION[$OJ_NAME.'_'.'administrator']) || isset($_SESSION[$OJ_NAME.'_'.'problem_editor']))){
  echo "<a href='../loginpage.php'>Please Login First!</a>";
  exit(1);
}
?>

<body leftmargin="30" >
  <div class="container">
    <?php
    if(isset($_GET['id'])){
      //获得班级数据
      $class_file = fopen("classes.conf", "r") or die("cannot open classes.conf");
	  $class_data = fread($class_file, filesize("classes.conf"));
	  fclose($class_file);
	  $class_data = addslashes($class_data);
	  $class_data = str_replace("\n", "\\n", $class_data);

      //查询问题信息
	  $pid = $_GET['id'];
      $sql="SELECT * FROM `problem` WHERE `problem_id`=?";
	  $result=pdo_query($sql,intval($_GET['id']));
	  $row=$result[0];
	  echo "<center><h3>Analyse-".$row['problem_id']." ".$row['title']."</h3></center>";
	  
	  //数据库查询
	  $sql = "SELECT base.*,runtimeinfo.error FROM (SELECT sbase.*,sim.sim_s_id,sim FROM(SELECT solution_id,user_id,time,memory,result,language FROM solution where problem_id = ?)sbase LEFT JOIN sim ON sbase.solution_id = sim.s_id)base LEFT OUTER JOIN runtimeinfo ON base.solution_id = runtimeinfo.solution_id";
	  //$sql = "SELECT * FROM(SELECT solution_id,user_id,time,memory,result,language FROM solution where problem_id = ?)sbase LEFT JOIN sim ON sbase.solution_id = sim.s_id";
	  $result = pdo_query($sql, $pid);
		?>
		
		<h3 style="text-align: center">总览</h3><br>
		<div id="overall">
			<div id="overall-typepie1" style="width:400;height:400;display:inline-block"></div>
			<div id="overall-typepie2" style="width:400;height:400;display:inline-block;"></div>
			<div id="overall-timeline" style="height:350;"></div>
			<div id="overall-memoryline" style="height:350;"></div>
		</div>
		<div id="graph_analysis" style="min-width:800;height:600"></div>
	<script>
    <?php
	  //输送classConfig
	  echo "classConfig='".$class_data."';\n";
	  $arr = array();
	  //while($row=mysql_fetch_array($result,MYSQL_ASSOC){
	  foreach($result as $row){
		for($i=0; $i<count($row); $i+=1){
		  if(array_key_exists($i, $row)){
			unset($row[$i]);
		  }
		}
		
		array_push($arr, $row);
	    //echo $row['solution_id'];
	  }
	  //print($row)

	  echo "pdoData='".addslashes(json_encode($arr))."';\n";
	?>
	</script>

    <script type="text/javascript" src="echarts.min.js"></script>
	<script type="text/javascript" src="problem_analysis.js"></script>
    <?php
    }else{
      echo "<center><h3>404 Not Found</h3></center>";
    }
    ?>
  </div>
</body>
</html>    
