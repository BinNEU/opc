<?php
$cur_path = "template/$OJ_TEMPLATE/";
$url=basename($_SERVER['REQUEST_URI']);
$dir=basename(getcwd());
if($dir=="discuss3") $path_fix="../";
else $path_fix="";
if(isset($OJ_NEED_LOGIN)&&$OJ_NEED_LOGIN&&(
        $url!='loginpage.php'&&
        $url!='lostpassword.php'&&
        $url!='lostpassword2.php'&&
        $url!='registerpage.php'
    ) && !isset($_SESSION[$OJ_NAME.'_'.'user_id'])){

    header("location:".$path_fix."loginpage.php");
    exit();
}

if($OJ_ONLINE){
    require_once($path_fix.'include/online.php');
    $on = new online();
}
?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="author" content="Yansheng">
  <meta http-equiv="Cache-Control" content="o-transform">
  <meta http-equiv="Cache-Control" content="no-siteapp">
  <meta name="csrf-token" content="1483758872##fd2cac389b2b7c009a744bcaecaa41d71592cfe8">
	
		
        <title><?php echo $OJ_NAME?></title>
		
    <meta content="" name="author">

	<link rel="shortcut icon" href="../../favicon.ico">
	<link rel="stylesheet" href="<?php echo $cur_path?>static/font-awesome//4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo $cur_path?>static/highlight.js/9.8.0/monokai-sublime.min.css">
    <link rel="stylesheet" href="<?php echo $cur_path?>app/css/libs/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo $cur_path?>app/css/libs/katex/0.6.0/katex.min.css">
    <link rel="stylesheet" href="<?php echo $cur_path?>app/css/libs/videojs/5.11.7/video-js.min.css">
	<link rel="stylesheet" href="<?php echo $cur_path?>app/css/dest/styles.css?=2016121272249">
<style>
layui-table{width:100%;background-color:#fff}.layui-table tr{transition:all .3s;-webkit-transition:all .3s}.layui-table thead tr{background-color:#f2f2f2}.layui-table th{text-align:left}.layui-table td,.layui-table th{padding:9px 15px;min-height:20px;line-height:20px;border:1px solid #e2e2e2;font-size:14px}.layui-table tr:hover,.layui-table[lay-even] tr:nth-child(even){background-color:#f8f8f8}.layui-table[lay-skin=line],.layui-table[lay-skin=row]{border:1px solid #e2e2e2}.layui-table[lay-skin=line] td,.layui-table[lay-skin=line] th{border:none;border-bottom:1px solid #e2e2e2}.layui-table[lay-skin=row] td,.layui-table[lay-skin=row] th{border:none;border-right:1px solid #e2e2e2}.layui-table[lay-skin=nob] td,.layui-table[lay-skin=nob] th{border:none}
</style>
	<style>
		@font-face {
			font-family: "lantingxihei";
			src: url("<?php echo $cur_path?>fonts/FZLTCXHJW.TTF");
		}

        /* modal 模态框*/
        #invite-user .modal-body {
            overflow: hidden;
        }
		#invite-user .modal-body .form-label {
			margin-bottom: 16px;
			font-size:14px;
		}
		#invite-user .modal-body .form-invite {
			width: 80%;
			padding: 6px 12px;
			background-color: #eeeeee;
			border: 1px solid #cccccc;
			border-radius: 5px;
			float: left;
			margin-right: 10px;
		}
		#invite-user .modal-body .msg-modal-style {
			background-color: #7dd383;
			margin-top: 10px;
			padding: 6px 0;
			text-align: center;
			width: 100%;
		}
		#invite-user .modal-body .modal-flash {
			position: absolute;
			top: 53px;
			right: 74px;
			z-index: 999;
		}
		/* end modal */

        .en-footer {
            padding: 30px;
            text-align: center;
            font-size: 14px;
        }
    </style>
	
<style style="text/css">
.navbar-banner {
    margin-top: 50px;
    background: url("<?php echo $cur_path?>img/homepage-bg.png");
    background-size: cover;
    backgtound-repeat: no-repeat;
}
</style>

<link rel="stylesheet" href="<?php echo $cur_path?>restatic/js/libs/marked/katex/katex.min.css">
	<style>
    .bootcamp-infobox {
        margin: 50px 0 0;
    }
    .invite-friends-link {
        margin-top:10px;
        padding-left:8px;
    }
    .invite-friends-link input {
        margin-left:-5px;
    }
    .invite-friends-link button {
        float:left;
        margin-top:5px;
        margin-left:-5px;
    }
    .invite-friends-link .copy-msg {
        float:left;
        margin-top:10px;
        margin-left:20px;
        color:#42b1ad;
    }
    p.join-vip-faq {
        margin-top:20px;
        margin-bottom:-50px;
        font-size:13px;
    }
    p.join-vip-faq img {
        height:13px;
        width:13px;
        margin-top:-2px;
    }
    a.vip-without-bean {
        font-size:18px;
        line-height:30px;
    }
</style>  
    
</head>

  <body>

   <?php include("template/$OJ_TEMPLATE/nav.php");?>   
   <div class="container layout layout-margin-top"> 
    <div class="content">
<?php
$rank=1;
?>
<center><h3>Contest RankList -- <?php echo $title?></h3><a href="contestrank.xls.php?cid=<?php echo $cid?>" >Download</a></center>
<table id=rank><thead><tr class=toprow align=center><td class="{sorter:'false'}" width=5%>Rank<th width=10%>User</th><th width=10%>Nick</th><th width=5%>Solved</th><th width=5%>Penalty</th>
<?php
for ($i=0;$i<$pid_cnt;$i++)
echo "<td><a href=problem.php?cid=$cid&pid=$i>$PID[$i]</a></td>";
echo "</tr></thead>\n<tbody>";
if(false)for ($i=0;$i<$user_cnt;$i++){
if ($i&1) echo "<tr class=oddrow align=center>\n";
else echo "<tr class=evenrow align=center>\n";
echo "<td>";
$uuid=$U[$i]->user_id;
$nick=$U[$i]->nick;
if($nick[0]!="*")
echo $rank++;
else
echo "*";
$usolved=$U[$i]->solved;
if(isset($_GET['user_id'])&&$uuid==$_GET['user_id']) echo "<td bgcolor=#ffff77>";
else echo"<td>";
echo "<a name=\"$uuid\" href=userinfo.php?user=$uuid>$uuid</a>";
echo "<td><a href=userinfo.php?user=$uuid>".htmlentities($U[$i]->nick,ENT_QUOTES,"UTF-8")."</a>";
echo "<td><a href=status.php?user_id=$uuid&cid=$cid>$usolved</a>";
echo "<td>".sec2str($U[$i]->time);
for ($j=0;$j<$pid_cnt;$j++){
$bg_color="eeeeee";
if (isset($U[$i]->p_ac_sec[$j])&&$U[$i]->p_ac_sec[$j]>0){
$aa=0x33+$U[$i]->p_wa_num[$j]*32;
$aa=$aa>0xaa?0xaa:$aa;
$aa=dechex($aa);
$bg_color="$aa"."ff"."$aa";
//$bg_color="aaffaa";
if($uuid==$first_blood[$j]){
$bg_color="aaaaff";
}
}else if(isset($U[$i]->p_wa_num[$j])&&$U[$i]->p_wa_num[$j]>0) {
$aa=0xaa-$U[$i]->p_wa_num[$j]*10;
$aa=$aa>16?$aa:16;
$aa=dechex($aa);
$bg_color="ff$aa$aa";
}
echo "<td class=well style='background-color:#$bg_color'>";
if(isset($U[$i])){
if (isset($U[$i]->p_ac_sec[$j])&&$U[$i]->p_ac_sec[$j]>0)
echo sec2str($U[$i]->p_ac_sec[$j]);
if (isset($U[$i]->p_wa_num[$j])&&$U[$i]->p_wa_num[$j]>0)
echo "(-".$U[$i]->p_wa_num[$j].")";
}
}
echo "</tr>\n";
}
echo "</tbody></table>";
?>
      </div>

    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <?php include("template/$OJ_TEMPLATE/js.php");?>	    
<script type="text/javascript" src="include/jquery.tablesorter.js"></script>
<script type="text/javascript">
$(document).ready(function()
{
$.tablesorter.addParser({
// set a unique id
id: 'punish',
is: function(s) {
// return false so this parser is not auto detected
return false;
},
format: function(s) {
// format your data for normalization
var v=s.toLowerCase().replace(/\:/,'').replace(/\:/,'').replace(/\(-/,'.').replace(/\)/,'');
//alert(v);
v=parseFloat('0'+v);
return v>1?v:v+Number.MAX_VALUE-1;
},
// set type, either numeric or text
type: 'numeric'
});
$("#rank").tablesorter({
headers: {
4: {
sorter:'punish'
}
<?php
for ($i=0;$i<$pid_cnt;$i++){
echo ",".($i+5).": { ";
echo " sorter:'punish' ";
echo "}";
}
?>
}
});
}
);
</script>
<script>
  function getTotal(rows){
    var total=0;
    return rows.length-1;
    for(var i=0;i<rows.length&&total==0;i++){
      try{
         total=parseInt(rows[rows.length-i].cells[0].innerHTML);
          if(isNaN(total)) total=0;
      }catch(e){
      
      }
    }
    return total;
  
  }
function metal(){
  var tb=window.document.getElementById('rank');
  var rows=tb.rows;
  try{
  var total=getTotal(rows);
  //alert(total);
	  for(var i=1;i<rows.length;i++){
	  	var cell=rows[i].cells[0];
      var acc=rows[i].cells[3];
      var ac=parseInt(acc.innerHTML);
      if (isNaN(ac)) ac=parseInt(acc.textContent);
                
                
	  	if(cell.innerHTML!="*"&&ac>0){
	 
	  	     var r=i;
	  	     if(r==1){
	  	       cell.innerHTML="Winner";
                       //cell.style.cssText="background-color:gold;color:red";
                       cell.className="badge btn-warning";
	  	     }else{
	  	       cell.innerHTML=r;
		     }
	  	     if(r>1&&r<=total*.05+1)
	  	        cell.className="badge btn-warning";
	  	     if(r>total*.05+1&&r<=total*.20+1)
	  	        cell.className="badge";
	  	     if(r>total*.20+1&&r<=total*.45+1)
	  	        cell.className="badge btn-danger";
	  	     if(r>total*.45+1&&ac>0)
              		cell.className="badge badge-info";
	  	}
	  }
  }catch(e){
     alert(e);
  }
}
metal();
replay();
<?php if (isset($solution_json)) echo "var solutions=$solution_json;"?>
var replay_index=0;
function replay(){
  replay_index=0;
  window.setTimeout("add()",1000);
}
function add(){
  if(replay_index>=solutions.length) return metal();
  var solution=solutions[replay_index];
  var tab=$("#rank");
  var row=findrow(tab,solution);
  if(row==null)
	tab.append(newrow(tab,solution));
  row=findrow(tab,solution);
  update(tab,row,solution);
  replay_index++;
  sort(tab[0].rows);
  metal();
  window.setTimeout("add()",5);
}
function sec2str(sec){
   var ret="";
   if(sec<36000) ret="0" ;
   ret+=parseInt(sec/3600);
   ret+=":";
   if(sec%3600/60<10) ret+="0" ;
   ret+=parseInt(sec%3600/60);
   ret+=":";
   if(sec%60<10) ret+="0";
   ret+=parseInt(sec%60);
   return ret;
}
function str2sec(str){
   var s=str.split(":");
   var h=parseInt(s[0]);
   var m=parseInt(s[1]);
   var s=parseInt(s[2]);
   return h*3600+m*60+s;
}
function colorful(td,ac,num){
  if(num<0) num=-num;else num=0;
  num*=10
  if(num>255) num=255;
  if(ac&&num>200) num=200;
  var rb=ac?num:255-num;
  if(ac){
//	td.className="well green";
	td.style="background-color: rgb("+rb+",255,"+rb+");";
  }else{
	td.style="background-color: rgb(255,"+rb+","+rb+");";
  }
}
function update(tab,row,solution){
 var col=parseInt(solution["num"])+5;
 var old=row.cells[col].innerHTML;
 var time=0;
 if(old!="") time=parseInt(old);
 if(!(old.charAt(0)=='-'||old=='')) return;
 if(parseInt(solution["result"])==4){
 	if(old.charAt(0)=='-'||old=='') {
		var pt=time;
		time= parseInt(solution["in_date"])-time*1200;

        	penalty=str2sec(row.cells[4].innerHTML);
 		penalty+=time;
 		row.cells[4].innerHTML=sec2str(penalty);
 		row.cells[col].innerHTML=sec2str( parseInt(solution["in_date"]));
		if(pt!=0)
	 		row.cells[col].innerHTML+="("+pt+")";
 		colorful(row.cells[col],true,pt);
	}else{
		if(row.cells[col].className=="well green");
	}
	row.cells[3].innerHTML=parseInt(row.cells[3].innerHTML)+1;
 }else{
        	time--;
 		row.cells[col].innerHTML=time;
 	colorful(row.cells[col],false,time);
 }
 /*
 if(parseInt(solution["result"])==4){
 	if(row.cells[col].className!="well green"){
	}
	row.cells[col].className="well green";
 }else{
 	if(row.cells[col].className!="well green") 
		row.cells[col].className="well red";
 }
*/
}
function sort(rows){
   for(var i=1;i<rows.length;i++){
       for(var j=1;j<i;j++){
	   if(cmp(rows[i],rows[j])){
		swapNode(rows[i],rows[j]);
 	   }
       }

   }

}
 function swapNode(node1,node2)
        {
          var parent = node1.parentNode;//父节点
          var t1 = node1.nextSibling;//两节点的相对位置
          var t2 = node2.nextSibling;
$(node1).fadeToggle("slow");          
$(node2).fadeToggle("slow");          
          //如果是插入到最后就用appendChild
          if(t1) parent.insertBefore(node2,t1);
          else parent.appendChild(node2);
          if(t2) parent.insertBefore(node1,t2);
          else parent.appendChild(node1);
$(node1).fadeToggle("slow");          
$(node2).fadeToggle("slow");          
}    
function cmp(a,b){
   if(parseInt(a.cells[3].innerHTML)>parseInt(b.cells[3].innerHTML))
	return true;
   
   if(parseInt(a.cells[3].innerHTML)==parseInt(b.cells[3].innerHTML))
	return str2sec(a.cells[4].innerHTML)<str2sec(b.cells[4].innerHTML);
}
 function trim(str){ //删除左右两端的空格
　　     return str.replace(/(^\s*)|(\s*$)/g, "");
　　 }
function newrow(tab,solution){

  var row="<tr><td></td><td>"+solution['user_id']+"</td>";
  row+="<td>"+trim(solution['nick'])+"</td>";
  row+="<td>";
  var css="grey";
  var time=0;
  if(solution['result']==4){
	 row+="1";
	 time=solution['in_date'];
	 count=sec2str( time);
         css="well green";
  } else{
	 row+="0";
	 css="well red";
	 count=-1;
  }
  row+="</td>";
  var n=tab[0].rows[0].cells.length;
  row+="<td>"+sec2str(time)+"</td>";

  for(var i=5;i<n;i++) {
	if(i-5==solution['num'])
		row+="<td class='"+css+"'>"+count+"</td>"; 
	else
		row+="<td></td>"; 
  }
  row+="</tr>";
  return row;  
}
function findrow(tab,solution){
  var rows=tab[0].rows;
  for(var i=0;i<rows.length;i++){
     if(rows[i].cells[1].innerHTML==solution['user_id']) 
	return rows[i];

  }
  return null;
}
</script>
<style>
.well{
   background-image:none;
   padding:1px;
}
td{
   white-space:nowrap;

}
.red{
  background-color:#ffa0a0;
}
.green{
  background-color:#33ff33;
}

</style>
  </body>
</html>
