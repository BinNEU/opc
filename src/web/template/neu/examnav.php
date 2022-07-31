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
            <ul  class="nav navbar-nav">
			    <li class="">
                    <a href="/">系统主页</a>
                </li>
				<?php
				if(isset($_GET['eid'])){
					$eid=intval($_GET['eid']);
				?>
                <li class=" new-nav logo-1111">
                    <a style="color:#FFF;font-size:18px;font-weight:bold;" href="exam.php?eid=<?php echo $eid?>">考试主页</a>
                </li>
				<?php
				if(isset($_GET['cid'])){
					$cid=intval($_GET['cid']);
				?>
				<li class=" new-nav logo-1111">
                    <a style="color:#FFF;font-size:18px;font-weight:bold;" href="contest.php?cid=<?php echo $cid?>&eid=<?php echo $eid?>">问题列表</a>
                </li>
				<li class=" new-nav logo-1111">
                    <a style="color:#FFF;font-size:18px;font-weight:bold;" href="status.php?user_id=<?php echo $_SESSION[$OJ_NAME.'_'.'user_id']?>&cid=<?php echo $cid?>&eid=<?php echo $eid?>">我的记录</a>
                </li>
				<?php }?>
				<?php }?>
            </ul>
									 <div class="navbar-right btns">
					 <a class="btn btn-default navbar-btn sign-up" style='color: #fff;background-color: #3baeda;border: 1px solid #3baeda;border-radius: 4px;'> <div id="CurrentTimes"></div></a>															

        </div></div>
    </div>
</nav>
		    <script type="text/javascript">
			var diff=new Date("<?php echo date("Y/m/d H:i:s")?>").getTime()-new Date().getTime();
		function changetime(){
			var ary = Array("星期日","星期一","星期二","星期三","星期四","星期五","星期六");
			var Timehtml = document.getElementById('CurrentTimes');
			var date = new Date(new Date().getTime()+diff);
			Timehtml.innerHTML = ''+date.toLocaleString()+'   '+ary[date.getDay()];
		}
		window.onload = function(){
			changetime();
			setInterval(changetime,1000);	
		}
    </script>