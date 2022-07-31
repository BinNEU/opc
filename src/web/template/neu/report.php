<?php
$cur_path = "template/$OJ_TEMPLATE/";
?>
<!DOCTYPE html>
<html lang="cn">
<head>
<title>每周报告</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="HTML5 website template">
<meta name="keywords" content="">
<meta name="author" content="">
<link rel="stylesheet" href="<?php echo $cur_path?>assets/css/share.min.css">
<link rel="stylesheet" href="<?php echo $cur_path?>assets/css/main.css">
<script src="<?php echo $cur_path?>js/Chart.js"></script>
</head>
<style type="text/css">
#tagsList {
  position: relative;
  width: 450px;
  height: 450px;
  left：100px
  margin: 150px auto 0;
}
 
#tagsList a {
  position: absolute;
  top: 0px;
  left: 0px;
  font-family: Microsoft YaHei;
  color: #fff;
  font-weight: bold;
  text-decoration: none;
  padding: 3px 6px;
}
#tagsList a:hover {
  color: #263c76;
  letter-spacing: 2px;
}
</style>
<body>

<!-- notification for small viewports and landscape oriented smartphones -->
<div class="device-notification">
  <a class="device-notification--logo"  >
    <img width="100" src="<?php echo $cur_path?>img/logo.png" alt="opc">
  </a>
</div>

<div class="perspective effect-rotate-left">
  <div class="container"><div class="outer-nav--return"></div>
    <div id="viewport" class="l-viewport">
      <div class="l-wrapper">
        <header class="header">
          <a class="header--logo"  >
            <img width="300"  src="<?php echo $cur_path?>/img/logo.png" alt="opc">
          </a>
		   <h1><?php echo $nick;?>的<?php echo $year;?>年第<?php echo $week;?>周报告<h1>
          <div class="header--nav-toggle">
            <span></span>
          </div>
        </header>
        <nav class="l-side-nav">
          <ul class="side-nav">
            <li class="is-active"><span>记录</span></li>
            <li><span>知识点</span></li>
            <li><span>状态</span></li>
            <li><span>预测</span></li>
            <li><span>总结</span></li>
          </ul>
        </nav>
        <ul class="l-main-content main-content">
          <li class="l-section section section--is-active">
            <div class="intro">
              <div class="intro--banner" id='d'>
			  <div id='d2' class="chart-container" style="position: absolute;right:0px;top:120px;height:300px; width:480px;display:none">
    <canvas id="myChart"></canvas>
</div>

			 
			  <p><h1>你的</p>
			  <p><h1>每一次练习</p>
			  <p><h1>都不会辜负你</h1></p>
                <button  onclick="showDiv()">统计
                  <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 150 118" style="enable-background:new 0 0 150 118;" xml:space="preserve">
                  <g transform="translate(0.000000,118.000000) scale(0.100000,-0.100000)">
                    <path d="M870,1167c-34-17-55-57-46-90c3-15,81-100,194-211l187-185l-565-1c-431,0-571-3-590-13c-55-28-64-94-18-137c21-20,33-20,597-20h575l-192-193C800,103,794,94,849,39c20-20,39-29,61-29c28,0,63,30,298,262c147,144,272,271,279,282c30,51,23,60-219,304C947,1180,926,1196,870,1167z"/>
                  </g>
                  </svg>
                  <span class="btn-background"></span>
                </button>
<script type="text/javascript">
  function showDiv(){   
	var d1=document.getElementById("d1");   
    var d2=document.getElementById("d2");  
	d1.style.display=d1.style.display=="none"?"":"none";  
    d2.style.display=d2.style.display=="none"?"":"none";
	if(d2.style.display!="none") {
		var ctx = document.getElementById("myChart");
var myChart = new Chart(ctx, {
    type: "bar",
    data: {
        datasets: [
            {
                label: "正确数",
                data: [<?php echo $dcorrect[0];?>, <?php echo $dcorrect[1];?>, <?php echo $dcorrect[2];?>, <?php echo $dcorrect[3];?>,<?php echo $dcorrect[4];?>,<?php echo $dcorrect[5];?>,<?php echo $dcorrect[6];?>],
				backgroundColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
				'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)'
            ],
            },
            {
                label: "提交数",
                data: [<?php echo $dsubmit[0];?>, <?php echo $dsubmit[1];?>, <?php echo $dsubmit[2];?>, <?php echo $dsubmit[3];?>,<?php echo $dsubmit[4];?>,<?php echo $dsubmit[5];?>,<?php echo $dsubmit[6];?>],
				borderColor: [
                'rgba(41,67,133,1)'
            ], 
				borderWidth: 1,
                // 将此数据集类型变为折线图
                type: "line"
            }
        ],
        labels: ["星期一", "星期二", "星期三", "星期四","星期五","星期六","星期日"]
    },
options: {
	responsive: true,
    }
});

	}
 }  
</script>  
              <div id='d1' style="display:block"> <img src="<?php echo $cur_path?>assets/img/introduction-visual.png" alt="Welcome"></div>
              </div>
              <div class="intro--options">
                <a  >
                  <h3>提交总数</h3>
                  <p><?php echo $submit_total;?></p>
                </a>
                <a  >
                  <h3>正确总数</h3>
                  <p><?php echo $submit_correct;?></p>
                </a>
                <a  >
                  <h3>登录次数</h3>
                  <p><?php echo $login_count;?></p>
                </a>
              </div>
            </div>
          </li>
          <li class="l-section section">
            <div class="work">
              <h2>本周学习的知识点</h2>
              <div class="work--lockup">
                <ul class="slider">
                  <li class="slider--item slider--item-left">
                    <a href="#0">
                      <div class="slider--item-image" style="display:table-cell; vertical-align:middle;">
                         <h1><?php echo $point[1];?></h1>
                      </div>
                      <p class="slider--item-description"><?php point_output($point[1]);?></p>
                    </a>
                  </li>
                  <li class="slider--item slider--item-center">
                    <a href="#0">
                      <div class="slider--item-image" style="display:table-cell; vertical-align:middle;">
                       <h1><?php echo $point[0];?></h1>
                      </div>
                      <p class="slider--item-description"><?php point_output($point[0]);?></p>
                    </a>
                  </li>
                  <li class="slider--item slider--item-right">
                    <a href="#0">
                      <div class="slider--item-image" style="display:table-cell; vertical-align:middle;">
                        <h1><?php echo $point[2];?></h1>
                      </div>
                      <p class="slider--item-description"><?php point_output($point[2]);?></p>
                    </a>
                  </li>
                </ul>
                <div class="slider--prev">
                  <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                  viewBox="0 0 150 118" style="enable-background:new 0 0 150 118;" xml:space="preserve">
                  <g transform="translate(0.000000,118.000000) scale(0.100000,-0.100000)">
                    <path d="M561,1169C525,1155,10,640,3,612c-3-13,1-36,8-52c8-15,134-145,281-289C527,41,562,10,590,10c22,0,41,9,61,29
                    c55,55,49,64-163,278L296,510h575c564,0,576,0,597,20c46,43,37,109-18,137c-19,10-159,13-590,13l-565,1l182,180
                    c101,99,187,188,193,199c16,30,12,57-12,84C631,1174,595,1183,561,1169z"/>
                  </g>
                  </svg>
                </div>
                <div class="slider--next">
                  <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 150 118" style="enable-background:new 0 0 150 118;" xml:space="preserve">
                  <g transform="translate(0.000000,118.000000) scale(0.100000,-0.100000)">
                    <path d="M870,1167c-34-17-55-57-46-90c3-15,81-100,194-211l187-185l-565-1c-431,0-571-3-590-13c-55-28-64-94-18-137c21-20,33-20,597-20h575l-192-193C800,103,794,94,849,39c20-20,39-29,61-29c28,0,63,30,298,262c147,144,272,271,279,282c30,51,23,60-219,304C947,1180,926,1196,870,1167z"/>
                  </g>
                  </svg>
                </div>
              </div>
          </li>
          <li class="l-section section">
            <div class="about">
              <div class="about--banner">
                <h1><p>贵有恒</p><p>何必三更起五更眠</p><p>最无益</p><p>只怕一日曝十日寒</p><p>加油！</p></h1>
                <a  >扇形统计
                  <span>
                    <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 150 118" style="enable-background:new 0 0 150 118;" xml:space="preserve">
                    <g transform="translate(0.000000,118.000000) scale(0.100000,-0.100000)">
                      <path d="M870,1167c-34-17-55-57-46-90c3-15,81-100,194-211l187-185l-565-1c-431,0-571-3-590-13c-55-28-64-94-18-137c21-20,33-20,597-20h575l-192-193C800,103,794,94,849,39c20-20,39-29,61-29c28,0,63,30,298,262c147,144,272,271,279,282c30,51,23,60-219,304C947,1180,926,1196,870,1167z"/>
                    </g>
                    </svg>
                  </span>
                </a>
  <div class="chart-container" style="position: absolute;right:0px;top:120px;height:800px; width:600px">
    <canvas id="myCharts"></canvas>
</div>
<script type="text/javascript">
var ctx = document.getElementById("myCharts");
var myCharts = new Chart(ctx, {
    type: "pie",
    data: {
        datasets: [
            {
                label: "答题情况",
                data :[<?php echo $status[4] ;?>, <?php echo $status[5] ;?>, <?php echo $status[6] ;?>, <?php echo $status[7] ;?>, <?php echo $status[8] ;?>, <?php echo $status[10] ;?>, <?php echo $status[11] ;?>],
				backgroundColor: [
				'rgba(0, 255, 127, 1 )',
				'rgba(255, 127, 0, 1)',
                'rgba(255, 193, 17, 1)',
                'rgba(218, 112, 214, 1)',
				'rgba(99, 184, 255, 1)',
				'rgba(232, 232, 232, 1)',
				'rgba(255, 106, 106, 1)',
				
            ],
            },
        ],
        labels: ["正确", "格式错误", "答案错误","时间超限","内存超限","运行错误","编译错误"]
    },
options: {
	responsive: true,
    }
});

</script>  

              </div>
              <div>
			  <p>在本周你正确提交了<?php echo $submit_problem;?>道题目，正确率<?php echo $submit_acc*100;?>%。</p>
			  <p>你的正确率超越了<?php echo round($percent,4)*100;?>%的同学</p>
			  <p>在本周你尝试次数最多的题目是：<?php echo $problem_id;?>：<?php echo $title;?></p>
              </div>
            </div>
          </li>
 <li class="l-section section">
            <div class="about">
			<div class="about--banner" id="canvas-container">
    <!--定义一个cavans容器作为画布显示-->
      <div id="tagsList">
	<a><?php echo$id;?></a>
    <a><?php echo$name;?></a>
    <a><?php echo$nick;?></a>
	<a><?php echo$class;?></a>
	<a><?php echo$school;?></a>
    <a>东北大学在线编程社区</a>
    <a>计算机</a>
    <a>C语言</a>
    <a>Python</a>
    <a>Java</a>
    <a>PHP</a>
    <a>HTML5</a>
    <a>C++</a>
    <a>数组</a>
    <a>函数</a>
    <a>排名</a>
    <a>积分</a>
    <a>编程</a>
    <a>提交</a>
    <a>正确</a>
    <a>统计</a>
    <a>状态</a>
    <a>opc.neu.edu.cn</a>
	
  </div>
  <script>
var radius = 200;
var dtr = Math.PI / 180;
var d = 300;
var mcList = [];
var active = false;
var lasta = 1;
var lastb = 1;
var distr = true;
var tspeed = 10;
var size = 250;
 
var mouseX = 0;
var mouseY = 0;
 
var howElliptical = 1;
 
var aA = null;
var oDiv = null;
 
window.onload = function () {
  var i = 0;
  var oTag = null;
 
  oDiv = document.getElementById('tagsList');
  aA = oDiv.getElementsByTagName('a');
 
  for (i = 0; i < aA.length; i++) {
    oTag = {};
    oTag.offsetWidth = aA[i].offsetWidth;
    oTag.offsetHeight = aA[i].offsetHeight;
    mcList.push(oTag);
  }
 
  sineCosine(0, 0, 0);
 
  positionAll();
 
  oDiv.onmouseover = function () {
    active = true;
  };
 
  oDiv.onmouseout = function () {
    active = false;
  };
 
  oDiv.onmousemove = function (ev) {
    var oEvent = window.event || ev;
    mouseX = oEvent.clientX - (oDiv.offsetLeft + oDiv.offsetWidth / 2);
    mouseY = oEvent.clientY - (oDiv.offsetTop + oDiv.offsetHeight / 2);
 
    mouseX /= 5;
    mouseY /= 5;
  };
  setInterval(update, 30);
};
function update() {
  var a;
  var b;
  if (active) {
    a = (-Math.min(Math.max(-mouseY, -size), size) / radius) * tspeed;
    b = (Math.min(Math.max(-mouseX, -size), size) / radius) * tspeed;
  }
  else {
    a = lasta * 0.98;
    b = lastb * 0.98;
  }
  lasta = a;
  lastb = b;
 
  if (Math.abs(a) <= 0.01 && Math.abs(b) <= 0.01) {
    return;
  }
 
  var c = 0;
  sineCosine(a, b, c);
  for (var j = 0; j < mcList.length; j++) {
    var rx1 = mcList[j].cx;
    var ry1 = mcList[j].cy * ca + mcList[j].cz * (-sa);
    var rz1 = mcList[j].cy * sa + mcList[j].cz * ca;
 
    var rx2 = rx1 * cb + rz1 * sb;
    var ry2 = ry1;
    var rz2 = rx1 * (-sb) + rz1 * cb;
 
    var rx3 = rx2 * cc + ry2 * (-sc);
    var ry3 = rx2 * sc + ry2 * cc;
    var rz3 = rz2;
 
    mcList[j].cx = rx3;
    mcList[j].cy = ry3;
    mcList[j].cz = rz3;
 
    per = d / (d + rz3);
 
    mcList[j].x = (howElliptical * rx3 * per) - (howElliptical * 2);
    mcList[j].y = ry3 * per;
    mcList[j].scale = per;
    mcList[j].alpha = per;
 
    mcList[j].alpha = (mcList[j].alpha - 0.6) * (10 / 6);
  }
 
  doPosition();
  depthSort();
}
 
function depthSort() {
  var i = 0;
  var aTmp = [];
 
  for (i = 0; i < aA.length; i++) {
    aTmp.push(aA[i]);
  }
 
  aTmp.sort(function (vItem1, vItem2) {
    if (vItem1.cz > vItem2.cz) {
      return -1;
    }
    else if (vItem1.cz < vItem2.cz) {
      return 1;
    }
    else {
      return 0;
    }
  });
  for (i = 0; i < aTmp.length; i++) {
    aTmp[i].style.zIndex = i;
  }
}
function positionAll() {
  var phi = 0;
  var theta = 0;
  var max = mcList.length;
  var i = 0;
 
  var aTmp = [];
  var oFragment = document.createDocumentFragment();
 
  //随机排序
  for (i = 0; i < aA.length; i++) {
    aTmp.push(aA[i]);
  }
 
  aTmp.sort(function () {
    return Math.random() < 0.5 ? 1 : -1;
  });
  for (i = 0; i < aTmp.length; i++) {
    oFragment.appendChild(aTmp[i]);
  }
  oDiv.appendChild(oFragment);
  for (var i = 1; i < max + 1; i++) {
    if (distr) {
      phi = Math.acos(-1 + (2 * i - 1) / max);
      theta = Math.sqrt(max * Math.PI) * phi;
    }
    else {
      phi = Math.random() * (Math.PI);
      theta = Math.random() * (2 * Math.PI);
    }
    //坐标变换
    mcList[i - 1].cx = radius * Math.cos(theta) * Math.sin(phi);
    mcList[i - 1].cy = radius * Math.sin(theta) * Math.sin(phi);
    mcList[i - 1].cz = radius * Math.cos(phi);
 
    aA[i - 1].style.left=mcList[i - 1].cx+oDiv.offsetWidth /2-mcList[i - 1].offsetWidth/2+'px';
    aA[i - 1].style.top=mcList[i - 1].cy+oDiv.offsetHeight/2-mcList[i - 1].offsetHeight/2+'px';
  }
}
function doPosition() {
  var l = oDiv.offsetWidth / 2;
  var t = oDiv.offsetHeight / 2;
  for (var i = 0; i < mcList.length; i++) {
    aA[i].style.left = mcList[i].cx + l - mcList[i].offsetWidth / 2 + 'px';
    aA[i].style.top = mcList[i].cy + t - mcList[i].offsetHeight / 2 + 'px';
 
    aA[i].style.fontSize = Math.ceil(12 * mcList[i].scale / 2) + 8 + 'px';
 
    aA[i].style.filter = "alpha(opacity=" + 100 * mcList[i].alpha + ")";
    aA[i].style.opacity = mcList[i].alpha;
  }
}
function sineCosine(a, b, c) {
  sa = Math.sin(a * dtr);
  ca = Math.cos(a * dtr);
  sb = Math.sin(b * dtr);
  cb = Math.cos(b * dtr);
  sc = Math.sin(c * dtr);
  cc = Math.cos(c * dtr);
}
</script>
</div>
              <div class="contact--lockup" style="position: absolute;right:0px;height:800px; width:600px">
                <div class="modal">
                  <div class="modal--information">
                    <p>本周积分：<?php echo (int)$score;?></p>
					<p>本周排名：<?php echo $score_rank?></p>
					<p>总积分值：<?php echo (int)$score_sum?></p>
                  </div>
                  <ul class="modal--options">
                    <li><a>积分等级：<?php echo $score_level?></a></li>
                    <li style="background-color:<?php echo $color;?>;"><a>预警级别：<?php echo $score_warning?></a></li>
                    <li><a>预测成绩：<?php echo $score_pre?></a></li>
                  </ul>
				  <br>
				  *预测成绩由AI模型得出，仅供参考！<br>**勤加复习，多看多练才是关键！
                </div>
              </div>
            </div>
          </li>

          <li class="l-section section">
            <div class="hire">
              <h2>本周关键词</h2>
              <!-- checkout formspree.io for easy form setup -->
              <form class="work-request">
                <div class="work-request--options">
                  <span class="options-a">
                    <input id="opt-1" type="checkbox" value="app design">
                    <label for="opt-1">
                      <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                      viewBox="0 0 150 111" style="enable-background:new 0 0 150 111;" xml:space="preserve">
                      <g transform="translate(0.000000,111.000000) scale(0.100000,-0.100000)">
                        <path d="M950,705L555,310L360,505C253,612,160,700,155,700c-6,0-44-34-85-75l-75-75l278-278L550-5l475,475c261,261,475,480,475,485c0,13-132,145-145,145C1349,1100,1167,922,950,705z"/>
                      </g>
                      </svg>
                      <?php echo $key_word[0];?>
                    </label>
                    <input id="opt-2" type="checkbox" value="graphic design">
                    <label for="opt-2">
                      <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                      viewBox="0 0 150 111" style="enable-background:new 0 0 150 111;" xml:space="preserve">
                      <g transform="translate(0.000000,111.000000) scale(0.100000,-0.100000)">
                        <path d="M950,705L555,310L360,505C253,612,160,700,155,700c-6,0-44-34-85-75l-75-75l278-278L550-5l475,475c261,261,475,480,475,485c0,13-132,145-145,145C1349,1100,1167,922,950,705z"/>
                      </g>
                      </svg>
                      <?php echo $key_word[1];?>
                    </label>
                    <input id="opt-3" type="checkbox" value="motion design">
                    <label for="opt-3">
                      <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                      viewBox="0 0 150 111" style="enable-background:new 0 0 150 111;" xml:space="preserve">
                      <g transform="translate(0.000000,111.000000) scale(0.100000,-0.100000)">
                        <path d="M950,705L555,310L360,505C253,612,160,700,155,700c-6,0-44-34-85-75l-75-75l278-278L550-5l475,475c261,261,475,480,475,485c0,13-132,145-145,145C1349,1100,1167,922,950,705z"/>
                      </g>
                      </svg>
                      <?php echo $key_word[2];?>
                    </label>
                  </span>
                </div>
				<h3><p>编程中我们会遇到多少挫折？<br>表放弃，沙漠尽头必是绿洲。<br>期待下一周的你更加优秀！</p></h3>
				     </form>
 <center> <div class="social-share"  data-url="http://202.118.11.198/inquiry.php" data-description="<?php echo $nick;?>的<?php echo $year;?>年第<?php echo $week;?>周报告：本周我总共提交<?php echo $submit_total;?>次代码，获得积分<?php echo $score;?>分，积分等级：<?php echo$score_level;?>，本周关键词：<?php echo $key_word[1];?>。" data-title="<?php echo $nick;?>的<?php echo $year;?>年第<?php echo $week;?>周报告：本周我总共提交<?php echo $submit_total;?>次代码，获得积分<?php echo $score;?>分，积分等级：<?php echo$score_level;?>，本周关键词：<?php echo $key_word[1];?>。"></div> </center>

			</div>
			
          </li>
        </ul>
      </div>
    </div>
  </div>
  <ul class="outer-nav">
    <li class="is-active">记录</li>
    <li>知识点</li>
    <li>状态</li>
    <li>预测</li>
    <li>总结</li>
  </ul>
</div>

<script src="<?php echo $cur_path?>assets/js/vendor/jquery-2.2.4.min.js"></script>
<script>window.jQuery || document.write('<script src="<?php echo $cur_path?>assets/js/vendor/jquery-2.2.4.min.js"><\/script>')</script>
<script src="<?php echo $cur_path?>assets/js/functions-min.js"></script>
<script type="text/javascript" src="<?php echo $cur_path?>assets/js/share.min.js"></script>
<script type="text/javascript" src="<?php echo $cur_path?>assets/js/wordcloud2.js"></script>
</body>
</html>
