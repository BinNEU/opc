 <?php
	$cache_time=30;
	$OJ_CACHE_SHARE=false;//!(isset($_GET['cid'])||isset($_GET['my']));
	require_once('./include/cache_start.php');
    require_once('./include/db_info.inc.php');
    require_once('./include/memcache.php');
	require_once('./include/my_func.inc.php');
	require_once('./include/const.inc.php');
	require_once('./include/setlang.php');
	$view_title= $MSG_CONTEST;
  function formatTimeLength($length)
{
	$hour = 0;
	$minute = 0;
	$second = 0;
	$result = '';
	
	if ($length >= 60)
	{
		$second = $length % 60;
		if ($second > 0)
		{
			$result = $second . '秒';
		}
		$length = floor($length / 60);
		if ($length >= 60)
		{
			$minute = $length % 60;
			if ($minute == 0)
			{
				if ($result != '')
				{
					$result = '0分' . $result;
				}
			}
			else
			{
				$result = $minute . '分' . $result;
			}
			$length = floor($length / 60);
			if ($length >= 24)
			{
				$hour = $length % 24;
				if ($hour == 0)
				{
					if ($result != '')
					{
						$result = '0小时' . $result;
					}
				}
				else
				{
					$result = $hour . '小时' . $result;
				}
				$length = floor($length / 24);
				$result = $length . '天' . $result;
			}
			else
			{
				$result = $length . '小时' . $result;
			}
		}
		else
		{
			$result = $length . '分' . $result;
		}
	}
	else
	{
		$result = $length . '秒';
	}
	return $result;
}

	$sql="SELECT count(1) c FROM users";
$user=pdo_query($sql);
$row=$user[0];		
$zhuce=$row['c'];	

$sql="SELECT count(1) c FROM solution";
						$problem=pdo_query($sql);
						$row=$problem[0];
$tijiao=$row['c'];	


/////////////////////////Template
	require("template/".$OJ_TEMPLATE."/introduction.php");
/////////////////////////Common foot
if(file_exists('./include/cache_end.php'))
	require_once('./include/cache_end.php');
?>
