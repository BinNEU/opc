<?php
$cur_path = "template/$OJ_TEMPLATE/";
$url=basename($_SERVER['REQUEST_URI']);
$dir=basename(getcwd());
if($OJ_ONLINE){
    require_once($path_fix.'include/online.php');
    $on = new online();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="author" content="Yansheng">
  <meta http-equiv="Cache-Control" content="o-transform">
  <meta http-equiv="Cache-Control" content="no-siteapp">
  <meta name="csrf-token" content="1483758872##fd2cac389b2b7c009a744bcaecaa41d71592cfe8">
	
		
   <title>NEUOJ</title>
		
    <meta content="" name="author">

	<link rel="shortcut icon" href="../../favicon.ico">

    <link rel="stylesheet" href="<?php echo $cur_path?>app/css/libs/bootstrap/3.3.7/css/bootstrap.min.css">

	<link rel="stylesheet" href="<?php echo $cur_path?>app/css/dest/styles.css?=2016121272249">
<style>
layui-table{width:100%;background-color:#fff}.layui-table tr{transition:all .3s;-webkit-transition:all .3s}.layui-table thead tr{background-color:#f2f2f2}.layui-table th{text-align:left}.layui-table td,.layui-table th{padding:9px 15px;min-height:20px;line-height:20px;border:1px solid #e2e2e2;font-size:14px}.layui-table tr:hover,.layui-table[lay-even] tr:nth-child(even){background-color:#f8f8f8}.layui-table[lay-skin=line],.layui-table[lay-skin=row]{border:1px solid #e2e2e2}.layui-table[lay-skin=line] td,.layui-table[lay-skin=line] th{border:none;border-bottom:1px solid #e2e2e2}.layui-table[lay-skin=row] td,.layui-table[lay-skin=row] th{border:none;border-right:1px solid #e2e2e2}.layui-table[lay-skin=nob] td,.layui-table[lay-skin=nob] th{border:none}
</style>
    
</head>

<body>
<?php include("template/$OJ_TEMPLATE/appnav.php");?>	

    <div class="container layout layout-margin-top ">
	<div class="line-and-laboratory">
      <!-- Main component for a primary marketing message or call to action -->
<center>

<table >
<tr align='center' class='evenrow'><td width='5'></td>
<td  colspan='1'>
<form class=form-inline>
<select class="form-control search-query" onchange=javascript:window.location.href=this.value;>
<option value='appproblemlist.php?search='>选择课程</option>
<option value='appproblemlist.php?search='>ALL</option>
<?php
foreach ($category as $cat){
                    if(trim($cat)=="") continue;
                    $my_category.= "<option value='appproblemlist.php?search=".htmlentities($cat,ENT_QUOTES,'UTF-8')."'>".htmlentities($cat,ENT_QUOTES,'UTF-8')."</option>";
                }	
				echo $my_category	
?>
</select>


</form>
</td>
</tr>
</table >
<br>
<table id='appproblemlist' width='90%'class="layui-table">
<thead>
<tr class='toprow'>
<th width='10%'></th>
<th width='20%'style="text-align:center;"><?php echo $MSG_PROBLEM_ID?></th>
<th width='70%'style="text-align:center;"><?php echo $MSG_TITLE?></th>

</tr>
</thead>
<tbody>
<?php
$cnt=0;
foreach($view_problemset as $row){
if ($cnt)
echo "<tr class='oddrow'>";
else
echo "<tr class='evenrow'>";
$i=0;
foreach($row as $table_cell){
    echo "<td>";
	echo "\t".$table_cell;
	echo "</td>";
	$i++;
}
echo "</tr>";
$cnt=1-$cnt;
}
?>
</tbody>
</table>
<nav id="apppage" class="center"><ul class="pagination">
<li class="page-item"><a href="appproblemlist.php?page=1">&lt;&lt;</a></li>
<?php
if(!isset($page)) $page=1;
$page=intval($page);
$section=8;
$start=$page>$section?$page-$section:1;
$end=$page+$section>$view_total_page?$view_total_page:$page+$section;
for ($i=$start;$i<=$end;$i++){
 echo "<li class='".($page==$i?"active ":"")."page-item'>
        <a href='appproblemlist.php?page=".$i."'>".$i."</a></li>";
}
?>
<li class="page-item"><a href="appproblemlist.php?page=<?php echo $view_total_page?>">&gt;&gt;</a></li>
</ul></nav></center>

    </div> <!-- /container -->
	</div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->   

    <script src="<?php echo $cur_path?>app/dest/lib/lib.js?=2016121272249"></script>	
    <script src="<?php echo $cur_path?>static/jquery/2.2.4/jquery.min.js"></script>
    <script src="<?php echo $cur_path?>static/ace/1.2.5/ace.js"></script>
	<script src="<?php echo $cur_path?>app/dest/course/labs.js?=2016121272249"></script>


        
            

    <div class="text-center copyright">
        <span>Copyright 3</span>
        <span class="ver-line"> | </span>
        <a href="#" target="_blank">#</a>

    </div>
</body>
</html>
