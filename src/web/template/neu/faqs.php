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
	<div class="line-and-laboratory">
<hr>
<center>
  <font size="+3"><?php echo $OJ_NAME?>  FAQ</font>
</center>
<hr>
<p><font color=green>Q</font>:What is the compiler the judge is using and what are the compiler options?<br>
  <font color=red>A</font>:The online judge system is running on <a href="http://www.debian.org/">Debian Linux</a>.
	We are using <a href="http://gcc.gnu.org/">GNU GCC/G++</a> for C/C++ compile,
	<a href="http://www.freepascal.org">Free Pascal</a> for pascal compile and
	<a href="http://openjdk.java.net">openjdk-7-jdk</a> for Java. The compile options are:<br>
</p>
<table border="1">
  <tr>
    <td>C:</td>
    <td><font color=blue>gcc Main.c -o Main -fno-asm -Wall -lm --static -std=c99 -DONLINE_JUDGE</font></td>
  </tr>
  <tr>
    <td>C++:</td>
    <td><font color=blue>g++ Main.cc -o Main -fno-asm -Wall -lm --static -std=c++11 -DONLINE_JUDGE</font></td>
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
<p>  Our compiler software version:<br>
  <font color=blue>gcc (Ubuntu/Linaro 4.4.4-14ubuntu5) 4.4.5</font><br>
  <font color=blue>glibc 2.3.6</font><br>
<font color=blue>Free Pascal Compiler version 2.4.0-2 [2010/03/06] for i386<br>
java version "1.7"<br>
</font></p>
<hr>
<font color=green>Q</font>:Where is the input and the output?<br>
<font color=red>A</font>:Your program shall read input from stdin('Standard Input') and write output to stdout('Standard Output').For example,you can use 'scanf' in C or 'cin' in C++ to read from stdin,and use 'printf' in C or 'cout' in C++ to write to stdout.<br>
User programs are not allowed to open and read from/write to files, you will get a "<font color=green>Runtime Error</font>" if you try to do so.<br><br>
Here is a sample solution for problem 1000 using C++:<br>
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
Here is a sample solution for problem 1000 using C:<br>
<pre><font color="blue">
#include &lt;stdio.h&gt;
int main(){
    int a,b;
    while(scanf("%d %d",&amp;a, &amp;b) != EOF)
        printf("%d\n",a+b);
    return 0;
}
</font></pre>
Here is a sample solution for problem 1000 using PASCAL:<br>
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

Here is a sample solution for problem 1000 using Java:<br>
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
<font color=green>Q</font>:Why did I get a Compile Error? It's well done!<br>
<font color=red>A</font>:There are some differences between GNU and MS-VC++, such as:<br>
<ul>
  <li><font color=blue>main</font> must be declared as <font color=blue>int</font>, <font color=blue>void main</font> will end up with a Compile Error.<br> 
  <li><font color=green>i</font> is out of definition after block "<font color=blue>for</font>(<font color=blue>int</font> <font color=green>i</font>=0...){...}"<br>
  <li><font color=green>itoa</font> is not an ANSI function.<br>
  <li><font color=green>__int64</font> of VC is not ANSI, but you can use <font color=blue>long long</font> for 64-bit integer.<br>try use #define __int64 long long when submit codes from MSVC6.0
</ul>
<hr>
<font color=green>Q</font>:What is the meaning of the judge's reply XXXXX?<br>
<font color=red>A</font>:Here is a list of the judge's replies and their meaning:<br>
<p><font color=blue>Pending</font> : The judge is so busy that it can't judge your submit at the moment, usually you just need to wait a minute and your submit will be judged. </p>
<p><font color=blue>Pending Rejudge</font>: The test datas has been updated, and the submit will be judged again and all of these submission was waiting for the Rejudge.</p>
<p><font color=blue>Compiling</font> : The judge is compiling your source code.<br>
</p>
<p><font color="blue">Running &amp; Judging</font>: Your code is running and being judging by our Online Judge.<br>
  </p>
<p><font color=blue>Accepted</font> : OK! Your program is correct!.<br>
  <br>
  <font color=blue>Presentation Error</font> : Your output format is not exactly the same as the judge's output, although your answer to the problem is correct. Check your output for spaces, blank lines,etc against the problem output specification.<br>
  <br>
  <font color=blue>Wrong Answer</font> : Correct solution not reached for the inputs. The inputs and outputs that we use to test the programs are not public (it is recomendable to get accustomed to a true contest dynamic ;-).<br>
  <br>
  <font color=blue>Time Limit Exceeded</font> : Your program tried to run during too much time.<br>
  <br>
  <font color=blue>Memory Limit Exceeded</font> : Your program tried to use more memory than the judge default settings.  <br>
  <br>
  <font color=blue>Output Limit Exceeded</font>: Your program tried to write too much information. This usually occurs if it goes into a infinite loop. Currently the output limit is 1M bytes.<br>
  <br>
  <font color=blue>Runtime Error</font> : All the other Error on the running phrase will get Runtime Error, such as 'segmentation fault','floating point exception','used forbidden functions', 'tried to access forbidden memories' and so on.<br>
</p>
<p>  <font color=blue>Compile Error</font> : The compiler (gcc/g++/gpc) could not compile your ANSI program. Of course, warning messages are not error messages. Click the link at the judge reply to see the actual error message.<br>
  <br>
</p>
<hr>
<font color=green>Q</font>:How to attend Online Contests?<br>
<font color=red>A</font>:Can you submit programs for any practice problems on this Online Judge? If you can, then that is the account you use in an online contest.
If you can't, then please <a href=registerpage.php>register</a> an id with password first.<br>
<br>
<hr>
<center>
  <font color=green size="+2">Any questions/suggestions please post to <a href="bbs.php">HUSTOJ BBS</a></font>
</center>
<hr>
<center>
  <table width=100% border=0>
    <tr>
      <td align=right width=65%>
      <a href = "index.php.bak"><font color=red>HUSTOJ</font></a>
      <a href = "https://github.com/zhblue/hustoj"><font color=red>16.12.02</font></a></td>
    </tr>
  </table>
</center>
      </div>

    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <?php include("template/$OJ_TEMPLATE/js.php");?>	    
 
</script>
  </body>
</html>
