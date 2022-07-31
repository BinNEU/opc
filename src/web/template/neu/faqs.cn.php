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

<?php include("template/$OJ_TEMPLATE/nav.php");?>	
    <div class="container layout layout-margin-top ">
	<div class="content">
<hr>
<center>
  <font size="+3"><?php echo $OJ_NAME?>FAQ</font>
</center>
<hr>
<p><font color=green>Q</font>:这个在线裁判系统使用什么样的编译器和编译选项?<br>
  <font color=red>A</font>:系统运行于<a href="http://www.debian.org/">Debian</a>/<a href="http://www.ubuntu.com">Ubuntu</a>
	Linux. 使用<a href="http://gcc.gnu.org/">GNU GCC/G++</a> 作为C/C++编译器,
	<a href="http://www.freepascal.org">Free Pascal</a> 作为pascal 编译器 ，用
	<a href="http://openjdk.java.net/">openjdk-7</a> 编译 Java. 对应的编译选项如下:<br>
</p>
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
<p>  编译器版本为（系统可能升级编译器版本，这里仅供参考）:<br>
  <font color=blue>gcc version 4.8.4 (Ubuntu 4.8.4-2ubuntu1~14.04.3)</font><br>
  <font color=blue>glibc 2.19</font><br>
<font color=blue>Free Pascal Compiler version 2.6.2<br>
openjdk 1.7.0_151<br>
</font></p>
<hr>
<p><font color=green>Q</font>:程序怎样取得输入、进行输出?<br>
  <font color=red>A</font>:你的程序应该从标准输入 stdin('Standard Input')获取输入，并将结果输出到标准输出 stdout('Standard Output').例如,在C语言可以使用 'scanf' ，在C++可以使用'cin' 进行输入；在C使用 'printf' ，在C++使用'cout'进行输出.</p>
<p>用户程序不允许直接读写文件, 如果这样做可能会判为运行时错误 "<font color=green>Runtime Error</font>"。<br>
  <br>
下面是一些参考代码</p>
<p> C++:<br>
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
}</font></pre>

<hr>
<font color=green>Q</font>:为什么我的程序在自己的电脑上正常编译，而系统告诉我编译错误!<br>
<font color=red>A</font>:GCC的编译标准与VC6有些不同，更加符合c/c++标准:<br>
<ul>
  <li><font color=blue>main</font> 函数必须返回<font color=blue>int</font>, <font color=blue>void main</font> 的函数声明会报编译错误。<br> 
  <li><font color=green>i</font> 在循环外失去定义 "<font color=blue>for</font>(<font color=blue>int</font> <font color=green>i</font>=0...){...}"<br>
  <li><font color=green>itoa</font> 不是ansi标准函数.<br>
  <li><font color=green>__int64</font> 不是ANSI标准定义，只能在VC使用, 但是可以使用<font color=blue>long long</font>声明64位整数。<br>如果用了__int64,试试提交前加一句#define __int64 long long, scanf和printf 请使用%lld作为格式
</ul>
<hr>
<font color=green>Q</font>:系统返回信息都是什么意思?<br>
<font color=red>A</font>:详见下述:<br>
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
<p>  <font color=blue>Compile Error</font> : 编译错误，请点击后获得编译器的详细输出。<br>
  <br>
</p>
<hr>
<font color=green>Q</font>:如何参加在线比赛?<br>
<font color=red>A</font>:<a href=registerpage.php>注册</a> 一个帐号，然后就可以练习，点击比赛列表Contests可以看到正在进行的比赛并参加。<br>
<br>
<hr>
<center>
  <font color=green size="+2">其他问题请访问<a href="bbs.php"><?php echo $OJ_NAME?>论坛系统</a></font>
</center>
<hr>
<center>
  <table class="layui-table" width=100% border=0>
    <tr> 
      <td align=right width=65%>
      <a href = "/"><font color=red><?php echo $OJ_NAME?></font></a> 
      <a href = ""><font color=red>2020.1.22</font></a></td>
    </tr>
  </table>
</center>
      </div>

    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <?php include("template/$OJ_TEMPLATE/js.php");?>	    

  </body>
</html>
