
<!doctype html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="iJvdbx5F25CPf3acTmMrBNuCHrvZgkinexzp4Xlf">
    <title>东北大学测温验证平台</title>
    <style>
        @-webkit-keyframes pulse {
            50% {
                -webkit-transform: scale3d(1.2, 1.2, 1.2);
                transform: scale3d(1.2, 1.2, 1.2);
            }
        }
        @keyframes  pulse {
            50% {
                -webkit-transform: scale3d(1.2, 1.2, 1.2);
                transform: scale3d(1.2, 1.2, 1.2);
            }
        }
        .list-group {
            padding: 1em;
        }
        .list-group-item {
            font-size: 1.4em;
            padding: 0.1em;
            border: 0px;
        }
    </style>
</head>
<body>

<div id="app">
    <div class="card border-0 text-center" style="color: #006633">
        <div class="card-body">
            <h2 class="card-title p-2">东北大学通行验证</h2>

          			   <form action="showmake.php" method="post" role="form" class="form-horizontal">
                  <div class="main">
                     <div class="form-left-to-w3l">
                        <input type="text" name="user_id" placeholder="<?php echo $MSG_USER_ID?>" required="required">
						<input type="text" name="name" placeholder="姓名" required="required">
						<input type="text" name="status" placeholder="进出状态" required="required">
						<input type="text" name="weizhi" placeholder="验证位置" required="required">
                     </div>
                  </div>

                  <div class="btnn">
                     <button name="submit" type="submit" style="background-color:#3baeda">生成</button>
                  </div>
               </form>
</div>
</body>
</html>
