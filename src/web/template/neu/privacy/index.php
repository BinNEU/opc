<?php
$cur_path = "template/$OJ_TEMPLATE/";
?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="author" content="Lei Shi">
  <meta http-equiv="Cache-Control" content="o-transform">
  <meta http-equiv="Cache-Control" content="no-siteapp">
  <meta name="csrf-token" content="1483780974##87f89328c5616669f00302a263fe9061bb852818">
	
		
        <title><?php echo $OJ_NAME?></title>
		
	

    
    <meta content="" name="author">

	<link rel="shortcut icon" href="../../../favicon.ico">
	<link rel="stylesheet" href="../static/font-awesome//4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../static/highlight.js/9.8.0/monokai-sublime.min.css">
    <link rel="stylesheet" href="../app/css/libs/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="../app/css/libs/katex/0.6.0/katex.min.css">
    <link rel="stylesheet" href="../app/css/libs/videojs/5.11.7/video-js.min.css">
	<link rel="stylesheet" href="../app/css/dest/styles.css?=2016121272249">

	<style>
		@font-face {
			font-family: "lantingxihei";
			src: url("../fonts/FZLTCXHJW.TTF");
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
	.privacy-title{
        font-weight: 100;
        font-family: "Microsoft Yahei";
        color: #1ABC9C;
        font-size: 32px;
	}
    .privacy-container {     
        margin-bottom:15px;
        background-color: #FFFFFF;
        box-shadow: #CCCCCC 0px 1px 3px 0px;
        padding: 40px;
    }
	.privacy-row{		
		padding: 25px;
	}
    .privacy-h3{
        margin-bottom: 24px;
        font-weight: 100;
        font-family: "Microsoft Yahei";
        color: #1ABC9C;
        font-size: 24px;
    }
    .privacy-row p{
        line-height: 32px;
        color: #6B767D;
        font-size: 16px;
        font-weight: 100;       
    }
</style>


	
    
</head>

<body>
	
        
        
            
<nav class="navbar navbar-default navbar-fixed-top header">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#header-navbar-collapse" aria-expanded="false">
                <span class="sr-only">东北大学在线编程社区</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">
                <img src="../img/logo.png">
            </a>
        </div>
        <div class="collapse navbar-collapse" id="header-navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="">
                    <a href="../../../problemlist.php">练习</a>
                </li>
                <li class="">
                    <a href="../../../problemset.php">题库</a>
                </li>
                <li class=" bootcamp new-nav logo-1111">
                    <a href="../../../status.php"">状态</a>
                    
                </li>
                <li class=" new-nav logo-1111">
                    <a href="../../../ranklist.php">排名</a>
                    
                </li>
                                <li class=" new-nav logo-1111">
                    <a href="../../../bbs.php">社区</a>
                    
                </li>
            </ul>

                                                                                 
        </div>
    </div>
</nav>

        
	



	
<div class="container layout layout-margin-top">
    
    
    <div class="row">
        <div class="col-md-12 layout-body">
            
	<div class="container content privacy-container">
		<div class="row privacy-title">
			隐私条款
		</div>
		<div class="row privacy-row">
			<p>东北大学在线编程社区非常重视对您隐私的保护，请您仔细阅读如下声明。当您访问东北大学在线编程社区网站或使用东北大学在线编程社区提供的服务前，您需要同意隐私政策中具体解释的收集、使用、公布和以其它形式运用您或您的被代理人的个人信息的政策。如果您不同意隐私政策中的任何内容，请立即停止使用或访问东北大学在线编程社区网站。</p>
			<p>
			为了给您提供更准确、更有针对性的服务，东北大学在线编程社区可能会以如下方式，使用您提交的个人信息，但东北大学在线编程社区会以高度的勤勉义务对待这些信息。</p>
			<p>
			我们的目标是使东北大学在线编程社区成为IT在线实验方面最值得信任的网站，仅仅遵守标准的个人隐私保护条例是远远不够的。如果您对我们的隐私保护条款有任何疑问或建议，请联系我们。</p>
            <br/>
            <br/>
			<h3 class="privacy-h3">我们从您那里获得的资料</h3>
			<p>
			东北大学在线编程社区会在您自愿选择服务或提供信息的情况下收集您的个人信息（简称"个人信息"），例如您的姓名、邮件地址、电话号码及其他身份信息等。我们有可能会保留一些用户的使用习惯信息（实验相关操作及数据），用于更好地了解和服务于用户。这些数据将有利于我们开发出更符合用户需求的功能、信息和服务。同时，这些信息将用于显示目标广告。</p>
			<p>
			我们可能会收集一些特定的关于您所使用的机器的技术信息，这些信息将用于提供更好的用户使用体验，提供更方便的服务，我们所收集的技术信息可能会包括：IP地址、操作系统版本、浏览器版本、显示器分辨率，推荐网站等。</p>
            
            <p>我们会记录您在东北大学在线编程社区虚拟环境中的全部或部分操作行为（键盘及鼠标输入信息），此数据会用作东北大学在线编程社区产品优化以及其他东北大学在线编程社区及东北大学在线编程社区合作方的数据分析应用。</p>
            
			<p>
			此外，我们还可能从其他合法来源收到关于您的信息并且将其加入我们的客户信息库。</p>

			<h3 class="privacy-h3">我们如何使用收集的用户信息</h3>

			<p>我们利用从所有服务中收集的信息来提供、维护、保护和改进这些服务，同时开发新的服务为您带来更好的用户体验，并提高我们的总体服务品质。经您的许可，我们还会使用此类信息为您提供定制内容，例如向您提供课程推送，职位推荐等。</p>

			<h3 class="privacy-h3">我们分享的信息</h3>

			<p>用户在如下情况下，东北大学在线编程社区会遵照您的意愿或法律的规定披露您的个人信息，由此引发的问题将由您个人承担：</p>

			<p>（1）事先获得您的授权；</p>

			<p>（2）只有透露您的个人资料，才能使东北大学在线编程社区或其合作商提供您所要求的产品和服务；</p>

			<p>（3）根据有关的法律法规要求；</p>

			<p>（4）按照相关政府主管部门的要求；</p>
			<p>
			（5）为维护东北大学在线编程社区的合法权益；</p>

			<p>（6）您同意让第三方共享资料；</p>

			<p>（7）我们发现您违反了东北大学在线编程社区公司服务条款或任何其他产品服务的使用规定。</p>

			<h3 class="privacy-h3">用户对个人信息的控制</h3>

			<p>东北大学在线编程社区相信用户应该对他/她的个人信息拥有绝对的控制权，用户可以通过"修改个人信息"查看或修改个人信息。用户自愿注册个人信息，用户在注册时提供的所有信息，都是基于自愿，用户有权在任何时候拒绝提供这些信息。</p>

			<h3 class="privacy-h3">我们如何保护用户的个人信息</h3>

			<p>我们希望我们的用户放心的使用我们的产品和服务，所以我们承诺对您的个人信息予以保密，为此我们设置了安全程序保护您的信息不会被未经授权的访问所窃取。所有的个人信息被加密储存并放置于专业防火墙内，我们使用SSL加密技术对您所提供的个人信息传输通道进行保护，保证您的个人信息不会在传输途中被窃取。用户明确同意其使用网络服务所存在的风险将完全由其自己承担。</p>

			<h3 class="privacy-h3">Cookies和其他浏览器技术</h3>

			<p>当用户访问东北大学在线编程社区的时候，我们可能会保存用户的用户登录状态并且为用户分配一个或多个"Cookie"（一个很小的文本文件），例如：当用户访问一个需要用户登录才可以提供的信息或服务，当用户登录时，我们会把该用户的登录名和密码加密存储在用户计算机的Cookie文件中，由于是不可逆转的加密存储，其他人即使可以使用该用户的计算机，也无法识别出用户的用户名和密码。用户并不需要额外做任何工作，所有的收集和保存都由系统自动完成。</p>

			<p>Cookie文件将永久的保存在您的计算机硬盘上，除非您使用浏览器或操作系统软件手工将其删除。您也可以选择"不使用Cookie"或"在使用Cookie是事先通知我"的选项禁止Cookie的产生，但是您将为此无法使用一些东北大学在线编程社区的查询和服务。</p>

			<p>Cookie文件也可能会由东北大学在线编程社区的第三方广告合作伙伴放置到您的计算机上。这些公司可能会根据您访问相关网站的统计信息为您显示您可能感兴趣的实验产品或广告信息。这些统计信息并不包括您的个人信息。他们也可能通过这种方式来评估广告的有效度，通常这是通过一种叫做Web beacon的技术来实现的，他们可能通过这种技术来统计匿名访问的数据，并根据统计结果显示您可能感兴趣的实验产品或广告信息，同样，这些统计信息并不包括您的个人信息。</p>


			<h3 class="privacy-h3">清除Cookie</h3>

			<p>您可以将自己的浏览器设置为拒绝所有 Cookie（包括与我们的服务相关联的 Cookie），或者在我们设置 Cookie 时予以提示。但是请务必注意，如果您停用 Cookie，可能就无法正常使用我们的很多服务了。</p>


			<h3 class="privacy-h3">关于隐私条款的变更</h3>

			<p>本隐私条款自2018年12月1日起生效。东北大学在线编程社区将根据法律、法规或政策的变更和修改，或东北大学在线编程社区网站内容的变化和技术的更新，或其他东北大学在线编程社区认为合理的原因，对本隐私政策进修改并以网站公告、用户通知等合适的形式告知用户，若您不接受修订后的条款的，应立即停止使用本服务，若您继续使用本服务的，视为接受修订后的所有条款。</p>
		</div>
	</div>

        </div>
    </div>
</div>


	
	

	<div class="modal fade" id="invite-user" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title">邀请好友，双方都可获赠实验豆！</h4>
				</div>
				<div class="modal-body">
                    
                        <p><h4><a href="#sign-modal" data-toggle="modal" data-sign="signin">登录</a>后邀请好友注册，您和好友将分别获赠3个实验豆！</h4></p>
                    
					<div id="msg-modal"></div>
				</div>
			</div>
		</div>
	</div>

	<div class="modal fade" id="flash-message" tabindex="-1" role="dialog">
		<div class="modal-dialog" rolw="document">
		</div>
	</div>
	<div class="modal fade" id="modal-message" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title">注意</h4>
				</div>
				<div class="modal-body">
				</div>
				<div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
                    <button type="button" class="btn btn-primary confirm" data-dismiss="modal">确定</button>
				</div>
			</div>
		</div>
	</div>
    

    
    

	
		
			
		
	

    <div class="modal fade" id="sign-modal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <button type="button" class="close-modal" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <div class="modal-body">
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active">
                        <a href="#signin-form" aria-controls="signin-form" role="tab" data-toggle="tab">登录</a>
                    </li>
                    <li role="presentation">
                        <a href="#signup-form" aria-controls="signup-form" role="tab" data-toggle="tab">注册</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="signin-form">
                        <form action="/login" method="post">
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-envelope" style="margin:0;"></i>
                                    </div>
                                    <input type="email" name="login" class="form-control" placeholder="请输入邮箱">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-lock" style="margin:0;"></i>
                                    </div>
                                    <input type="password" name="password" class="form-control" placeholder="请输入密码">
                                </div>
                            </div>
                            <div class="form-inline verify-code-item" style="display:none;">
                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="text" name="captcha_v" class="form-control" placeholder="请输入验证码">
                                    </div>
                                </div>
                                <img class="verify-code" src="" source="img/captcha.gif">
                            </div>
                            <div class="form-group remember-login">
                                <input name="remember" type="checkbox" value="y"> 下次自动登录
                                <a class="pull-right" href="../reset_password/index.html">忘记密码？</a>
                            </div>
                            <div class="form-group">
                                <input class="btn btn-primary" name="submit" type="submit" value="进入东北大学在线编程社区">
                            </div>
                            <div class="form-group widget-signin">
                                <span>快速登录</span>
                                <a href="/auth/qq?next="><i class="fa fa-qq"></i></a>
                                <a href="/auth/weibo?next="><i class="fa fa-weibo"></i></a>
                                <a href="/auth/weixin?next="><i class="fa fa-weixin"></i></a>
                                <a href="/auth/github?next="><i class="fa fa-github"></i></a>
                                <a href="/auth/renren?next="><i class="fa fa-renren"></i></a>
                            </div>
                            <div class="form-group error-msg">
                                <div class="alert alert-danger" role="alert"></div>
                            </div>
                        </form>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="signup-form">
                        <form action="/register" method="post">
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-envelope" style="margin:0;"></i>
                                    </div>
                                    <input type="email" name="email" class="form-control" placeholder="请输入邮箱">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-lock" style="margin:0;"></i>
                                    </div>
                                    <input type="password" name="password" class="form-control" placeholder="请输入密码">
                                </div>
                            </div>
                            <div class="form-inline">
                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="text" name="captcha_v" class="form-control" placeholder="请输入验证码">
                                    </div>
                                </div>
                                <img class="verify-code" src="" source="img/captcha.gif">
                            </div>
                            <div class="form-group">
                                <input class="btn btn-primary" name="submit" type="submit" value="注册">
                            </div>
                            <div class="form-group agree-privacy">
                                注册表示您已经同意我们的<a href="../privacy/index.html" target="_blank">隐私条款</a>
                            </div>
                            <div class="form-group widget-signup">
                                <span>快速注册</span>
                                <a href="/auth/qq?next="><i class="fa fa-qq"></i></a>
                                <a href="/auth/weibo?next="><i class="fa fa-weibo"></i></a>
                                <a href="/auth/weixin?next="><i class="fa fa-weixin"></i></a>
                                <a href="/auth/github?next="><i class="fa fa-github"></i></a>
                                <a href="/auth/renren?next="><i class="fa fa-renren"></i></a>
                            </div>
                            <div class="form-group error-msg">
                                <div class="alert alert-danger" role="alert"></div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


    <div id="base-data"
        
        
            data-flash="false"
            
        
        
        data-is-login=false
        
        data-is-jwt=true
        data-socket-url="wss://comet.xxxxxx.com"
        data-msg-user=""
        data-msg-system=""
    ></div>

    <script src="../app/dest/lib/lib.js?=2016121272249"></script>
    <script src="../static/jquery/2.2.4/jquery.min.js"></script>
    <script src="../static/ace/1.2.5/ace.js"></script>
    <script src="../static/aliyun/aliyun-oss-sdk-4.3.0.min.js"></script>
    <script src="../static/highlight.js/9.8.0/highlight.min.js"></script>
    <script src="../static/jspdf/1.2.61/jspdf.min.js"></script>
    <script src="../static/plupload/2.1.9/js/plupload.full.min.js"></script>
    <script src="../static/zeroclipboard/2.2.0/ZeroClipboard.min.js"></script>
    <script src="../static/videojs/video.min.js"></script>
    <script src="../static/bootstrap-tour/0.11.0/js/bootstrap-tour.min.js"></script>
    <script src="../static/bootstrap-table/1.11.0/bootstrap-table.min.js"></script>
    <script src="../static/bootstrap-table/1.11.0/locale/bootstrap-table-zh-CN.min.js"></script>
    <script src="../static/bootstrap-table/1.11.0/extensions/filter-control/bootstrap-table-filter-control.min.js"></script>

    <script src="../static/ravenjs/3.7.0/raven.min.js"></script>


    
    <script src="../app/dest/base/index.js?=2016121272249"></script>	
        
            
            

    <div class="text-center copyright">
        <span>Copyright @2019 </span>
        <span class="ver-line"> | </span>
        <a href="#" target="_blank"></a>

    </div>
</div>

            
        
	
</body>
</html>
