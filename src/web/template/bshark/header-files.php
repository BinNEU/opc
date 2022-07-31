<?php 
require("./template/$OJ_TEMPLATE/theme.conf.php");?>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=auto" />

<!-- KaTeX核心css -->
<!--link href="https://cdn.bootcss.com/KaTeX/0.10.2/katex.min.css" rel="stylesheet"-->

<!-- Bootstrap4核心css -->
<link href="./template/bshark/bootstrap4/css/bootstrap.min.css" rel="stylesheet">

<!-- iconfont图标css -->
<link rel="stylesheet" href="./template/bshark/iconfont.css">
<script src="./template/bshark/iconfont.js"></script>

<!-- Shards核心文件 -->
<link id="shardsop" rel="stylesheet" href="./template/bshark/shards/css/shards.min.css">

<!-- 主题核心css文件（light and dark） -->
<link href="./template/bshark/main-<?php echo $THEME_MOD;?>.css" rel="stylesheet">

<!-- Highlightjs 核心文件 -->
<link href="./template/bshark/highlight/styles/tomorrow.css" rel="stylesheet">
<script src="./template/bshark/highlight/highlight.pack.js"></script>

<!-- Jquery核心文件 -->
<script src="./template/bshark/jquery-3.4.1.min.js"></script>
<script>
hljs.initHighlightingOnLoad();
</script>

<!-- ChartJs 核心文件 -->
<script src="./template/bshark/chartjs/Chart.bundle.js"></script>

<!-- SweetAlert 核心文件 -->
<script src="./template/bshark/sweetalert/sweetalert.min.js"></script>
