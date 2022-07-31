  
<?php
$cur_path = "template/$OJ_TEMPLATE/"
?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <title>Login</title>
      <!-- Meta tags -->
	  <meta charset="utf-8">
	  <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1" />


      <!-- Meta tags -->
      <!--pop-ups-->

      <!-- //pop-ups-->
      <!--stylesheets-->
      <link href="<?php echo $cur_path?>css/loginstyle.css" rel='stylesheet' type='text/css' media="all">
      <!--//style sheet end here-->

   </head>
   <body>
      <h1 class="header-w3ls">
         欢迎使用NEUOJ
      </h1>
      <div class="art-bothside">
      
            <div class="art-right-w3ls">
               <h2 align=center>编程社区用户登录</h2>
               <p>从现在开始，你的大学生活将不同。</p><p>巨大的脑洞，丰富的题库，全面的测试用例，全新的视野，让你的编程学习更加精彩。</p>
			   
			   <div class="art-right-w3ls">
			   <form action="applogin.php" method="post">
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
                  </div>
                  <div class="btnn">
                     <button type="submit">登录</button>
                  </div>
               </form>
			   </div>
               <p>如有问题请联系管理员 yansheng1117@foxmail.com</p>
            </div>
       
      </div>
      <div class="copy">
         <p> Design by 东北大学在线编程社区</a></p>
      </div>
      <!--js working-->

      <!--//js working-->

      <!--//scripts-->
      <!-- //pop-up-box -->


      <!-- //pop-up-box -->
   </body>
</html>