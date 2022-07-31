<nav class="navbar navbar-default navbar-fixed-top header">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#header-navbar-collapse" aria-expanded="false">
                <span class="sr-only">东北大学在线编程社区</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/appproblemlist.php">
                <img src="<?php echo $cur_path?>img/logo_03.png">
            </a>
        </div>
        <div class="collapse navbar-collapse" id="header-navbar-collapse">
            <ul class="nav navbar-nav">
			    <li class=" bootcamp new-nav logo-1111">
                    <a onclick="javascript:history.back(-1);">返回上一页</a>
                    
                </li>
                <li class="">
                    <a href="<?php echo $path_fix?>appproblemlist.php">题库</a>
                </li>
                <li class=" bootcamp new-nav logo-1111">
                    <a href="<?php echo $path_fix?>appstatus.php"">状态</a>
                    
                </li>
				
            </ul>

                                                                                 <?php
                                                                                if(!isset($_SESSION[$OJ_NAME.'_'.'user_id'])){?>           
            <div class="navbar-right btns">
                <a class="btn btn-default navbar-btn sign-up" style='color: #fff;background-color: #3baeda;border: 1px solid #3baeda;border-radius: 4px;'  href="<?php echo $path_fix?>apploginpage.php">登录/注册</a>
            </div>
 					<?php }?>
 <?php
                                                                                if(isset($_SESSION[$OJ_NAME.'_'.'user_id'])){     $sid=$_SESSION[$OJ_NAME.'_'.'user_id'];?>
					<ul class="nav navbar-nav">
			
				<?php if(isset($_GET['cid'])){
	$cid=intval($_GET['cid']);
?>

<?php }?>

				</ul>
					 <div class="navbar-right btns">
                <a class="btn btn-default navbar-btn sign-up" style='color: #fff;background-color: #3baeda;border: 1px solid #3baeda;border-radius: 4px;' href="" data-toggle="modal">欢迎您，<?php echo $sid?></a>
				 <?php
							if(isset($_SESSION[$OJ_NAME.'_'.'administrator'])||isset($_SESSION[$OJ_NAME.'_'.'contest_creator'])||isset($_SESSION[$OJ_NAME.'_'.'problem_editor'])){ ?>
						
							<?php }?>
				<a class="btn btn-default navbar-btn sign-up" style='color: #fff;background-color: #3baeda;border: 1px solid #3baeda;border-radius: 4px;'  href="<?php echo $path_fix?>applogout.php">注销</a>
            </div>															
					<?php }?>																				

        </div>
    </div>
</nav>