  
<?php
$cur_path = "template/$OJ_TEMPLATE/"
?>
<!DOCTYPE html>
<html lang="en">

   <head>
      <title>注册登录</title>
      <!-- Meta tags -->
	  <meta charset="utf-8">
	  <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1" />
	<?php include("template/$OJ_TEMPLATE/tonghji.php");?>	
      <script>
        addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } 
      </script>
      <!-- Meta tags -->
      <!--pop-ups-->
      <link href="<?php echo $cur_path?>css/popuo-box.css" rel="stylesheet" type="text/css" media="all" />
      <!-- //pop-ups-->
      <!--stylesheets-->
      <link href="<?php echo $cur_path?>css/loginstyle.css" rel='stylesheet' type='text/css' media="all">
      <!--//style sheet end here-->
   </head>
   <body>
      <h1 class="header-w3ls">
         欢迎使用东北大学在线编程社区
      </h1>
      <div class="art-bothside">
         <div class="mid-cls">
            <div class="art-right-w3ls">
			<?php if($id=="teacher"){?>
               <h2 align=center>教师用户登录</h2>
			<?php }else{?>
			<h2 align=center>编程社区用户登录</h2>
			
               <p>从现在开始，你的大学生活将是如此的不同。</p><p>巨大的脑洞，丰富的题库，全面的测试用例，全新的视野，让你的编程学习更加精彩。</p>
			   <?php }?>
			   <div class="art-right-w3ls">
			   <form action="login.php" method="post" role="form" class="form-horizontal" onSubmit="return jsMd5();">
                  <input type="hidden" name="prevurl" value="<?php echo $_SERVER['HTTP_REFERER']?>">
				  <input type="hidden" name="teacher" value="<?php echo $id?>">
				  <div class="main">
                     <div class="form-left-to-w3l">
                        <input type="text" name="user_id" placeholder="<?php echo $MSG_USER_ID?>" required="required">
                     </div>
                  </div>
                  <div class="main">
                     <div class="form-left-to-w3l">
                        <input type="password" name="password" placeholder="<?php echo $MSG_PASSWORD?>" id="password" required="required">
                        <div class="clear"></div>
                     </div>
					 <div class="form-left-to-w3l">
                        <a href="">忘记密码?</a>
                     </div>
                  </div>
                  <div class="btnn">
                     <button name="submit" type="submit" style="background-color:#3baeda">登录</button>
					 
                  </div>
               </form>
			   </div>
               <div class="banner-agileits-btm">
                  <div class="w3layouts_more-buttn">
                     <h3>我还不是编程社区用户，现在 <a href="#small-dialog1 " class="play-icon popup-with-zoom-anim">注册</a></h3>
                  </div>
                  <div id="small-dialog1" class="mfp-hide w3ls_small_dialog wthree_pop">
                     <div class="agileits_modal_body">
                        <!--login form-->
                        <div class="letter-w3ls">
                           <form>
                              <div class="form-left-to-w3l">
                               <input type="text" name="user_id" placeholder="<?php echo $MSG_USER_ID?>" required="">
                              </div>
					      <div class="form-left-to-w3l">
                         <input type="text" name="nick" placeholder="<?php echo $MSG_NICK?>">
                         </div>
							<div class="form-left-to-w3l">
                        <input type="password" name="password" placeholder="<?php echo $MSG_PASSWORD?>" id="password" required="">
                        <div class="clear"></div>
                     </div>
                     <div class="form-right-w3ls ">
                        <input type="password" name="rptpassword" placeholder="<?php echo $MSG_REPEAT_PASSWORD?>" id="confirm_password" required="">
                     </div>
					 <div class="form-right-w3ls">
                        <input type="email" name="email" placeholder="<?php echo $MSG_EMAIL?>">
                     </div>
					 <div class="form-left-to-w3l">
                        <input type="text" name="school" placeholder="<?php echo $MSG_SCHOOL?>" required="">
                     </div>  
                              <div class="btnn">
                                <!-- <button type="submit">注册</button><br>-->
								<h1>暂时未开放个人注册，如需使用请联系管理员</h1>
                              </div>
                           </form>
						   <br>
						                     <div class="art-right-w3ls">
                     <h1>注册表示您已经同意我们的 <a href="<?php echo $cur_path?>privacy/index.php">隐私条款</a></h1>
                   
                  </div>
                           <div class="clear"></div>
                        </div>
                        <!--//login form-->
                     </div>
                  </div>
               </div>
            </div>
            <div class="art-left-w3ls">
               <img src="<?php echo $cur_path?>images/right1.jpg" class="img-fluid" alt="">
            </div>
         </div>
      </div>
      <div class="copy">
         <!--<p>&copy;2018 Astronauts sign up & login Form. All Rights Reserved | Design by <a href="http://www.W3Layouts.com" target="_blank">W3Layouts</a></p>-->
      </div>
	  	  <script src="../include/md5-min.js"></script>
<script>
    function jsMd5(){
        if($("input[name=password]").val()=="") return false;
        $("input[name=password]").val(hex_md5($("input[name=password]").val()));
        return true;
    }
</script>
      <!--js working-->
      <script src='<?php echo $cur_path?>js/jquery-2.2.3.min.js'></script>
      <!--//js working-->
      <script>
         var password = document.getElementById("password")
           , confirm_password = document.getElementById("confirm_password");
         
         function validatePassword(){
           if(password.value != rept_password.value) {
             confirm_password.setCustomValidity("Passwords Don't Match");
           } else {
             confirm_password.setCustomValidity('');
           }
         }
         
         password.onchange = validatePassword;
         confirm_password.onkeyup = validatePassword;
      </script>
      <!--//scripts-->
      <script src="<?php echo $cur_path?>js/jquery.magnific-popup.js"></script>
      <!-- //pop-up-box -->
      <script>
         $(document).ready(function () {
         	$('.popup-with-zoom-anim').magnificPopup({
         		type: 'inline',
         		fixedContentPos: false,
         		fixedBgPos: true,
         		overflowY: 'auto',
         		closeBtnInside: true,
         		preloader: false,
         		midClick: true,
         		removalDelay: 300,
         		mainClass: 'my-mfp-zoom-in'
         	});
         
         });
      </script>

      <!-- //pop-up-box -->
   </body>
</html>