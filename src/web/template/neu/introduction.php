<?php
$cur_path = "template/$OJ_TEMPLATE/";
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
	
		
        <title><?php echo $OJ_NAME?></title>
		
    <meta content="" name="author">

	<link rel="shortcut icon" href="../../favicon.ico">
	<link rel="stylesheet" href="<?php echo $cur_path?>static/font-awesome//4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo $cur_path?>static/highlight.js/9.8.0/monokai-sublime.min.css">
    <link rel="stylesheet" href="<?php echo $cur_path?>app/css/libs/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo $cur_path?>app/css/libs/katex/0.6.0/katex.min.css">
    <link rel="stylesheet" href="<?php echo $cur_path?>app/css/libs/videojs/5.11.7/video-js.min.css">
	<link rel="stylesheet" href="<?php echo $cur_path?>app/css/dest/styles.css?=2016121272249">
	<link rel="stylesheet" href="<?php echo $cur_path?>app/css/about.css">

	<style>
layui-table{width:100%;background-color:#fff}.layui-table tr{transition:all .3s;-webkit-transition:all .3s}.layui-table thead tr{background-color:#f2f2f2}.layui-table th{text-align:left}.layui-table td,.layui-table th{padding:9px 15px;min-height:20px;line-height:20px;border:1px solid #e2e2e2;font-size:14px}.layui-table tr:hover,.layui-table[lay-even] tr:nth-child(even){background-color:#f8f8f8}.layui-table[lay-skin=line],.layui-table[lay-skin=row]{border:1px solid #e2e2e2}.layui-table[lay-skin=line] td,.layui-table[lay-skin=line] th{border:none;border-bottom:1px solid #e2e2e2}.layui-table[lay-skin=row] td,.layui-table[lay-skin=row] th{border:none;border-right:1px solid #e2e2e2}.layui-table[lay-skin=nob] td,.layui-table[lay-skin=nob] th{border:none}
</style>
	<style>
.page { width:100%;background:#F0F0F0 url('<?php echo $cur_path?>img/dian2.png') repeat-x; }
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

<style>
.org-header {
    padding: 100px 0;
    color: #fff;
    background: url(<?php echo $cur_path?>img/org-bg.png);
    text-align: center;
}
.org-header h2 {
    font-size: 45px;
}
.org-header p {
    margin-top: 20px;
    font-size: 18px;
    font-weight: 700;
}
.org-body-desc {
    padding: 50px 0 150px;
}
.org-body-desc .media-body {
    font-size: 16px;
}
.org-body-courses {
    padding: 50px 0;
    background: #fff;
}
.org-body-courses .container {
    position: relative;
    top: -110px;
}
.org-body-courses .media {
    display: block;
    padding: 10px;
    margin-bottom: 50px;
    color: #333;
    background: #fff;
    border-radius: 4px;
    box-shadow: 0 0 4px 2px #eee;
}
.org-body-courses .media:hover,
.org-body-courses .media:focus {
    text-decoration: none;
}
.org-body-courses .media img {
    width: 80px;
    height: 80px;
    border-radius: 4px;
    box-shadow: 0 0 4px 2px #eee;
}
.org-body-courses .media-body h4 {
    word-break: break-all;
    font-size: 16px;
    line-height: 1.6em;
}
.org-course-more {
    text-align: center;
}
.org-course-more .btn {
    padding: 4px 20px;
    border-radius: 4px;
}
</style>    
  	
    
</head>
<body>
<?php include("template/$OJ_TEMPLATE/nav.php");?>	
<div class="vip-header layout-no-margin-top" style="min-height:215px;">
    <h1 class="vip-header-title">东北大学在线编程社区</h1>
	<h4 class="vip-header-description">精品题目 + 在线编译 + 统计分析 + 丰富扩展</h4>
</div>
<div class="vip-details">
 <div class="container">
<div class="col-md-4 ">
<div class="content">
<img  width="300" style="background:#3baeda;" src="<?php echo $cur_path?>img/logo.png"/>
<img height="280" width="280" src="<?php echo $cur_path?>img/logo-grey.png"/>
</div>
</div>
<div class="col-md-8 ">
<div class="content">
<center><h4 class="vip-header-description" style="color:black">关于我们</h4></center><br>
<p style=" font-size:15px;color:#000;">
东北大学在线编程社区是由东北大学开发的在线编程教育平台，搭载东北大学编程基础课程，向学生提供可在线编译评判的C语言、JAVA语言和Python语言编程题目。东北大学在线编程社区还同时有社区论坛、擂台公开赛以及作业互评等丰富模块，
为广大学生提供交流、竞技和学习的平台。我们还为学生和教师提供可视化的分析数据，帮助学生快速准确找准定位查缺补漏，为教师教学提供参考。
</p><br><center>
        <div class="row">
            <div class="col-md-3">
                <img src="<?php echo $cur_path?>/img/laboratory-proper.png">
                <div class="bootcamp-features-description">
                    <span>海量数据</span>
                    <span>分析精准</span>
                </div>
            </div>
            <div class="col-md-3">
                <img style=" padding-left: 24px;" src="<?php echo $cur_path?>/img/laboratory-nimble.png">
                <div class="bootcamp-features-description">
                    <span>全天在线</span>
                    <span>实时评判</span>
                </div>
            </div>
            <div class="col-md-3">
                <img src="<?php echo $cur_path?>/img/laboratory-higheffic.png">
                <div class="bootcamp-features-description">
                    <span>丰富题目</span>
                    <span>火速提升</span>
                </div>
            </div>
			   <div class="col-md-3">
                <img src="<?php echo $cur_path?>/img/vip-allcourses.png">
                <div class="bootcamp-features-description">
                    <span>多项功能</span>
                    <span>全面交流</span>
                </div>
            </div>

</div></center>
</div>
</div>
</div>
</div>
<div class="vip-hots">
    <div class="container">
        <div class="vip-hots-header">
            <h4>已有 <span><?php echo $zhuce;?></span> 人在东北大学在线编程社区提交了 <span><?php echo $tijiao;?></span> 次代码</h4>
        </div>
		        <div style=" text-align:center">
            <h4 class="vip-header-description" style="color:#000;" >平台服务学生<?php echo $zhuce;?>人，学生覆盖全校文法、外国语、艺术、工商、理学院、资土、冶金、材料、机械、计算机、软件、生科、建筑、医工14个学院，代码提交量<?php echo $tijiao;?>次，峰值单日提交超过11323次，开展不限时专项赛5次（当前学期都可以参与）；开展限时专项赛30次（在限定2-3小时内完成），共计参与人数3277人。
			学生自主发布擂台项目34个，其中单项最长守擂时间12059小时，单项最多被攻擂429次。</h4>
        </div>
    </div>
</div>
<div class="vip-clients" id="vip-clients">
    <div class="container">
        <div class="vip-clients-header">
            <h4>东北大学在线编程社区大事记</h4>
        </div>
        <div class="row vip-clients-body">
<div class="box">
	<ul class="event_year">
		<li class="current"><label for="2021">2021</label></li>
		<li><label for="2020">2020</label></li>
		<li><label for="2019">2019</label></li>
		<li><label for="2018">2018</label></li>
		<li><label for="2017">2017</label></li>
	</ul>
	<ul class="event_list">
			<div>
			<h3 id="2021">2021</h3>
<li><span>6月6日</span><p><span>平台发布学生个人分析模块</span></p></li>
<li><span>5月25日</span><p><span>累计提交量达1000000次</span></p></li>
<li><span>4月11日</span><p><span>平台发布教师端学生每周学情分析模块</span></p></li>
<li><span>4月10日</span><p><span>平台发布学生周报模块</span></p></li>
<li><span>3月01日</span><p><span>平台累计注册用户突破10000人</span></p></li>
		
		</div>
		<div>
			<h3 id="2020">2020</h3>
<li><span>4月13日</span><p><span>平台发布作业互评模块</span></p></li>
<li><span>3月31日</span><p><span>平台发布代码填空提交功能</span></p></li>
<li><span>3月22日</span><p><span>累计提交量达500000次</span></p></li>
<li><span>2月17日</span><p><span>平台发布课程筛选功能，平台适配移动端</span></p></li>
<li><span>2月15日</span><p><span>平台发布函数提交功能</span></p></li>
<li><span>1月04日</span><p><span>平台单日提交峰值超10000次</span></p></li>
		
		</div>
		<div>
			<h3 id="2019">2019</h3>
			<li><span>12月13日</span><p><span>平台累计提交量达300000次</span></p></li>
			<li><span>11月30日</span><p><span>平台发布题目评分与擂台评分功能</span></p></li>
			<li><span>11月12日</span><p><span>平台发布擂台赛功能</span></p></li>
			<li><span>10月11日</span><p><span>平台累计注册用户突破5000人</span></p></li>
			<li><span>7月15日</span><p><span>平台开启代码相似性检测</span></p></li>
			<li><span>6月20日</span><p><span>平台上线题目分析功能</span></p></li>
			<li><span>6月11日</span><p><span>平台UI调整</span></p></li>
			<li><span>5月14日</span><p><span>NEULC更名为东北大学在线编程社区（NEUOPC）</span></p></li>
			<li><span>3月14日</span><p><span>平台累计注册用户突破2000人</span></p></li>
		</div>
		<div>
			<h3 id="2018">2018</h3>
		<li><span>4月-12月</span><p><span>平台累计注册人数512人，发布题目93道，提交次数40000+</span></p></li>
		<li><span>4月11日</span><p><span>平台发布第一道题目</span></p></li>
		<li><span>1月26日</span><p><span>平台第一名学生注册</span></p></li>
		</div>
				<div>
			<h3 id="2017">2017</h3>
				
		<li><span>12月01日</span><p><span>NEULC正式上线</span></p></li>
		</div>
		
		
		
		
	</ul>

	<div class="clearfix"></div>
	
	</div>
        </div>
    </div>
</div>
<div class="vip-faq">
    <div class="container">
        <div class="vip-faq-header">
            <img src="<?php echo $cur_path?>/img/vip-faq.png">
            FAQ
            <span></span>
        </div>
        <div class="vip-faq-body">
            <h4>这个在线裁判系统使用什么样的编译器和编译选项？</h4>
            <div>系统运行于<a href="http://www.debian.org/">Debian</a>/<a href="http://www.ubuntu.com">Ubuntu</a>
	Linux. 使用<a href="http://gcc.gnu.org/">GNU GCC/G++</a> 作为C/C++编译器,
	<a href="http://www.freepascal.org">Free Pascal</a> 作为pascal 编译器 ，用
	<a href="http://openjdk.java.net/">openjdk-7</a> 编译 Java. 对应的编译选项如下:<br></div>
            <table class="layui-table" border="1">
  <tr>
    <td>C:</td>
    <td><font color=blue>gcc Main.c -o Main  -fno-asm -Wall -lm --static -std=c99 -DONLINE_JUDGE</font>
	    <pre>#pragma GCC optimize ("O2")</pre> 可以手工开启O2优化
	  </td>
  </tr>
  <tr>
    <td>C++:</td>
    <td><font color=blue>g++ -fno-asm -Wall -lm --static -std=c++11 -DONLINE_JUDGE -o Main Main.cc</font></td>
  </tr>
  <tr>
    <td>Pascal:</td>
    <td><font color=blue>fpc Main.pas -oMain -O1 -Co -Cr -Ct -Ci </font></td>
  </tr>
  <tr>
    <td>Java:</td>
    <td><font color="blue">javac -J-Xms32m -J-Xmx256m Main.java</font>
    <br>
    <font size="-1" color="red">*Java has 2 more seconds and 512M more memory when running and judging.</font>
    </td>
  </tr>
</table>
<div>  编译器版本为（系统可能升级编译器版本，这里仅供参考）:<br>
  <font color=blue>gcc version 4.8.4 (Ubuntu 4.8.4-2ubuntu1~14.04.3)</font><br>
  <font color=blue>glibc 2.19</font><br>
<font color=blue>Free Pascal Compiler version 2.6.2<br>
openjdk 1.7.0_151<br>
</font></div>
        </div>
        <div class="vip-faq-body">
            <h4>程序怎样取得输入、进行输出？</h4>
            <div>你的程序应该从标准输入 stdin('Standard Input')获取输入，并将结果输出到标准输出 stdout('Standard Output').例如,在C语言可以使用 'scanf' ，在C++可以使用'cin' 进行输入；在C使用 'printf' ，在C++使用'cout'进行输出。
用户程序不允许直接读写文件, 如果这样做可能会判为运行时错误 "<font color=green>Runtime Error</font>"。</div>
            <div>下面是一些参考代码</div>
            <div><p> C++:<br>
</p>
<pre><font color="blue">
#include &lt;iostream&gt;
using namespace std;
int main(){
    int a,b;
    while(cin >> a >> b)
        cout << a+b << endl;
    return 0;
}
</font></pre>
C:<br>
<pre><font color="blue">
#include &lt;stdio.h&gt;
int main(){
    int a,b;
    while(scanf("%d %d",&amp;a, &amp;b) != EOF)
        printf("%d\n",a+b);
    return 0;
}
</font></pre>
 PASCAL:<br>
<pre><font color="blue">
program p1001(Input,Output); 
var 
  a,b:Integer; 
begin 
   while not eof(Input) do 
     begin 
       Readln(a,b); 
       Writeln(a+b); 
     end; 
end.
</font></pre>
<br><br>

Java:<br>
<pre><font color="blue">
import java.util.*;
public class Main{
	public static void main(String args[]){
		Scanner cin = new Scanner(System.in);
		int a, b;
		while (cin.hasNext()){
			a = cin.nextInt(); b = cin.nextInt();
			System.out.println(a + b);
		}
	}
}</font></pre></div>
            
        </div>
        <div class="vip-faq-body">
            <h4>为什么我的程序在自己的电脑上正常编译，而系统告诉我编译错误？</h4>
            <div>GCC的编译标准与VC6有些不同，更加符合c/c++标准:<br>
<ul>
  <li>1、<font color=blue>main</font> 函数必须返回<font color=blue>int</font>, <font color=blue>void main</font> 的函数声明会报编译错误。<br> 
  <li>2、<font color=green>i</font> 在循环外失去定义 "<font color=blue>for</font>(<font color=blue>int</font> <font color=green>i</font>=0...){...}"<br>
  <li>3、<font color=green>itoa</font> 不是ansi标准函数.<br>
  <li>4、<font color=green>__int64</font> 不是ANSI标准定义，只能在VC使用, 但是可以使用<font color=blue>long long</font>声明64位整数。<br>如果用了__int64,试试提交前加一句#define __int64 long long, scanf和printf 请使用%lld作为格式
</ul></div>
            
        </div>
        <div class="vip-faq-body">
            <h4>系统返回信息都是什么意思？</h4>
            <div>详见下述:<br>
<p><font color=blue>Pending</font> : 系统忙，你的答案在排队等待. </p>
<p><font color=blue>Pending Rejudge</font>: 因为数据更新或其他原因，系统将重新判你的答案.</p>
<p><font color=blue>Compiling</font> : 正在编译.<br>
</p>
<p><font color="blue">Running &amp; Judging</font>: 正在运行和判断.<br>
</p>
<p><font color=blue>Accepted</font> : 程序通过!<br>
  <br>
  <font color=blue>Presentation Error</font> : 答案基本正确，但是格式不对。<br>
  <br>
  <font color=blue>Wrong Answer</font> : 答案不对，仅仅通过样例数据的测试并不一定是正确答案，一定还有你没想到的地方.<br>
  <br>
  <font color=blue>Time Limit Exceeded</font> : 运行超出时间限制，检查下是否有死循环，或者应该有更快的计算方法。<br>
  <br>
  <font color=blue>Memory Limit Exceeded</font> : 超出内存限制，数据可能需要压缩，检查内存是否有泄露。<br>
  <br>
  <font color=blue>Output Limit Exceeded</font>: 输出超过限制，你的输出比正确答案长了两倍.<br>
  <br>
  <font color=blue>Runtime Error</font> : 运行时错误，非法的内存访问，数组越界，指针漂移，调用禁用的系统函数。请点击后获得详细输出。<br>
</p>
<p>  <font color=blue>Compile Error</font> : 编译错误，请点击后获得编译器的详细输出。<br></div>
        </div>
        <div class="vip-faq-footer">
            <a href="bbs.php">更多疑问，查看这里></a>
        </div>
    </div>
</div>


	
	




    

    
	



</div>
        </div>
    </div>
</div>

	
    <script type="text/javascript" src="<?php echo $cur_path?>echarts.min.js"></script>
	<script type="text/javascript" src="<?php echo $cur_path?>analysis.js"></script>	
	
    <script src="<?php echo $cur_path?>app/dest/lib/lib.js?=2016121272249"></script>
    <script src="<?php echo $cur_path?>static/jquery/2.2.4/jquery.min.js"></script>
    <script src="<?php echo $cur_path?>static/ace/1.2.5/ace.js"></script>
    <script src="<?php echo $cur_path?>static/aliyun/aliyun-oss-sdk-4.3.0.min.js"></script>
    <script src="<?php echo $cur_path?>static/highlight.js/9.8.0/highlight.min.js"></script>
    <script src="<?php echo $cur_path?>static/jspdf/1.2.61/jspdf.min.js"></script>
    <script src="<?php echo $cur_path?>static/plupload/2.1.9/js/plupload.full.min.js"></script>
    <script src="<?php echo $cur_path?>static/zeroclipboard/2.2.0/ZeroClipboard.min.js"></script>
    <script src="<?php echo $cur_path?>static/videojs/video.min.js"></script>
    <script src="<?php echo $cur_path?>static/bootstrap-tour/0.11.0/js/bootstrap-tour.min.js"></script>
    <script src="<?php echo $cur_path?>static/bootstrap-table/1.11.0/bootstrap-table.min.js"></script>
    <script src="<?php echo $cur_path?>static/bootstrap-table/1.11.0/locale/bootstrap-table-zh-CN.min.js"></script>
    <script src="<?php echo $cur_path?>static/bootstrap-table/1.11.0/extensions/filter-control/bootstrap-table-filter-control.min.js"></script>

    <script src="<?php echo $cur_path?>static/ravenjs/3.7.0/raven.min.js"></script>
    

    


<script src="<?php echo $cur_path?>app/dest/course/labs.js?=2016121272249"></script>
<script src="<?php echo $cur_path?>app/dest/frontend/index.js?=2016121272249"></script>	
	
	
<script>
$(function(){
	$('label').click(function(){
		$('.event_year>li').removeClass('current');
		$(this).parent('li').addClass('current');
		var year = $(this).attr('for');
		$('#'+year).parent().prevAll('div').slideUp(800);
		$('#'+year).parent().slideDown(800).nextAll('div').slideDown(800);
	});
});
</script>

    <div class="text-center copyright">
        <span>Copyright 2019</span>
        <span class="ver-line"> | </span>
        <a href="#" target="_blank">#</a>

    </div
</body>
</html>