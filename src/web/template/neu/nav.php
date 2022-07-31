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
                <img src="<?php echo $cur_path?>img/logo.png">
            </a>
        </div>
        <div class="collapse navbar-collapse" id="header-navbar-collapse">
            <ul class="nav navbar-nav">
			    <li class="">
                    <a href="/">主页</a>
                </li>

                <li class="">
                    <a href="problemset.php">题库</a>
                </li>
				 <?php
							if(isset($_SESSION[$OJ_NAME.'_'.'administrator'])||isset($_SESSION[$OJ_NAME.'_'.'contest_creator'])||isset($_SESSION[$OJ_NAME.'_'.'problem_editor'])){ ?>
                <li class=" bootcamp new-nav logo-1111">
                    <a href="status.php">状态</a>
                    
                </li>
							<?php }?>
                <li class=" new-nav logo-1111">
                    <a href="ranklist.php">排名</a>
                    
                </li>
									<?php if(!$OJ_EXAM){?>
				<li class=" new-nav logo-1111">
                    <a href="arena.php">擂台</a>
                    
                </li>
					<?php }?>
                            <!--    <li class=" new-nav logo-1111">
                    <a href="bbs.php">社区</a>
                    
                </li>-->
				<li class="dropdown ">
				                    <a href="" data-toggle="dropdown">
                         竞赛/作业
                        <span class="caret"></span>
                    </a>
                        <ul class="dropdown-menu" >
                        <li><a class="" href="contest.php" >竞赛</a></li>
						<li><a class="" href="projectlist.php" >作业</a></li>
                        <li><a class="" href="examlist.php">考试</a></li>
                    </ul>
					</li>

            </ul>

                                                                                 <?php
                                                                                if(!isset($_SESSION[$OJ_NAME.'_'.'user_id'])){?>           
            <div class="navbar-right btns">
                <a class="btn btn-default navbar-btn sign-up" style='color: #fff;background-color: #3baeda;border: 1px solid #3baeda;border-radius: 4px;'  href="<?php echo $path_fix?>loginpage.php">学生登录</a>
            </div> 
			            <div class="navbar-right btns">
						&nbsp;&nbsp;
                 </div>
			            <div class="navbar-right btns">
                <a class="btn btn-default navbar-btn sign-up" style='color: #fff;background-color: #3baeda;border: 1px solid #3baeda;border-radius: 4px;'  href="http://202.118.11.198/loginpage.php?id=teacher">教师登录</a>
            </div>
 					<?php }?>
 <?php
                                                                                if(isset($_SESSION[$OJ_NAME.'_'.'user_id'])){     $sid=$_SESSION[$OJ_NAME.'_'.'user_id'];?>
					<ul class="nav navbar-nav">

				<?php if(isset($_GET['cid'])){
	$cid=intval($_GET['cid']);
?>
             			
<li class="dropdown ">
                    <a href="<?php echo $path_fix?>contest.php?user=<?php echo $sid ?>" class="dropdown-toggle" data-toggle="dropdown">
                        <?php echo $cid?>
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                                      <li class="active" ><a href="contest.php?cid=<?php echo $cid?>">
			<?php echo $MSG_PROBLEMS?>
	      </a></li>
               <li ><a href="status.php?cid=<?php echo $cid?>">
			<?php echo $MSG_STATUS?>
	      </a></li>
              <li  ><a href="contestrank.php?cid=<?php echo $cid?>">
			<?php echo $MSG_RANKLIST?>
	      </a></li>
              <li ><a href="conteststatistics.php?cid=<?php echo $cid?>">
			<?php echo $MSG_STATISTICS?>
	      </a></li>
                    </ul>
                </li>
<?php }?>
<?php 
  if(isset($_SESSION[$OJ_NAME.'_'.'user_id'])){     $sid=$_SESSION[$OJ_NAME.'_'.'user_id'];}
if($sid==1801779){
?>
				<li class=" new-nav logo-1111">
                    <a href="sim.php">相似性</a>
                    
                </li>
<?php }?>
    				<li class="dropdown ">
				        <a href="" data-toggle="dropdown">
                         学生分析
                        <span class="caret"></span>
                    </a>
                        <ul class="dropdown-menu" >
                        <li><a class="" href="analysis.php?user=<?php echo $sid ?>" target="view_window">答题总览</a></li>
						<li><a class="" href="inquiry.php" target="view_window">每周总结</a></li>
                        <li><a class="" href="individual.php?user=<?php echo $sid ?>" target="view_window">个人分析</a></li>
                    </ul>
					</li>  
<li class="dropdown " >
                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">
                        欢迎您，<?php echo $sid?>
                        <span class="caret"></span>
                    </a>
					<?php     function checkmail(){
		global $OJ_NAME;
			
		$sql="SELECT count(1) FROM `mail` WHERE 
				new_mail=1 AND `to_user`=?";
		$result=pdo_query($sql,$_SESSION[$OJ_NAME.'_'.'user_id']);
		if(!$result) return false;
		$row=$result[0];
		$retmsg="<span id=red>未读(".$row[0].")</span>";
		
		return $retmsg;
		
	}?>
                    <ul class="dropdown-menu" >
                        <li><a class="" href="modifypage.php" >修改信息</a></li>
						<li><a class="" href="analysis.php?user=<?php echo $sid ?>" >我的分析</a></li>
                        <li><a class="" href="status.php?user_id=<?php echo $sid?>">我的提交</a></li>
						<li><a class="" href="contest.php?my">我的竞赛</a></li>
												<?php
						$mail=checkmail();
				             if ($mail) { ?>
                        <li><a class="" href="mail.php" >我的消息：<?php echo $mail?></a></li>
							 <?php }?>
                    </ul>
                </li>
				</ul>
					 <div class="navbar-right btns">
                 
				 <?php
							if(isset($_SESSION[$OJ_NAME.'_'.'administrator'])||isset($_SESSION[$OJ_NAME.'_'.'contest_creator'])||isset($_SESSION[$OJ_NAME.'_'.'problem_editor'])){ ?>
							<a class="btn btn-default navbar-btn sign-up" style='color: #fff;background-color: #3baeda;border: 1px solid #3baeda;border-radius: 4px;' href="http://202.118.11.198/admin/">教师后台</a>
							<?php }?>
				<a class="btn btn-default navbar-btn sign-up" style='color: #fff;background-color: #3baeda;border: 1px solid #3baeda;border-radius: 4px;'  href="<?php echo $path_fix?>logout.php">注销</a>
            </div>															
					<?php }?>																				

        </div>
    </div>
</nav>


<!--<br><div id=broadcast class="row">
        <div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" onclick="this.parentNode.parentNode.removeChild(this.parentNode);" class="close" data-dismiss="alert">
                <span aria-hidden="true">×</span>
                <span class="sr-only">Close</span></button>
            <strong>
                <i class="fa fa-warning"></i>Alert!</strong>
            <marquee>
                <p style="font-family: Impact; font-size: 18pt">服务器将于2020.06.14 00:00 进行停机维护，请同学们留意在线时间。
</p></marquee>
        </div>
		 </div>-->