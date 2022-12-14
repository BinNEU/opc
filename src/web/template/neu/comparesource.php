<?php
$cur_path = "template/$OJ_TEMPLATE/";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">
	<link type="text/css" rel="stylesheet" href="mergely/codemirror.css" />
	<link type="text/css" rel="stylesheet" href="mergely/mergely.css" />

    <title><?php echo $OJ_NAME?></title>  
	<link rel="stylesheet" href="<?php echo $cur_path?>static/font-awesome//4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo $cur_path?>static/highlight.js/9.8.0/monokai-sublime.min.css">
    <link rel="stylesheet" href="<?php echo $cur_path?>app/css/libs/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo $cur_path?>app/css/libs/katex/0.6.0/katex.min.css">
    <link rel="stylesheet" href="<?php echo $cur_path?>app/css/libs/videojs/5.11.7/video-js.min.css">
	<link rel="stylesheet" href="<?php echo $cur_path?>app/css/dest/styles.css?=2016121272249"> 


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="http://cdn.bootcss.com/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="http://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
<?php include("template/$OJ_TEMPLATE/nav.php");?>	
    <div class="container layout layout-margin-top ">   
      <!-- Main component for a primary marketing message or call to action -->
      <div class="content">
	

<!-- Requires jQuery -->
<body style="width: 100%;">
	<table  style="width: 100%;"><tr>
		<td style="width: 50%;"><input type="checkbox" id="ignorews">ignore witespaces</td>
	</tr></table>
	<br/>

	<table  style="width: 100%;"><tr>
		<td style="width: 50%;"><tt id="path-lhs"></tt> &nbsp; <a id="save-lhs" class="save-link" href="#">save</a></td>
		<td style="width: 50%;"><tt id="path-rhs"></tt> &nbsp; <a id="save-rhs" class="save-link" href="#">save</a></td>
	</tr></table>

	<div id="mergely-resizer" style="height: 450px;">
		<div id="compare">
		</div>
	</div>

</body>
	  

    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <?php include("template/$OJ_TEMPLATE/js.php");?>	    
  
 	<!-- Requires CodeMirror 2.16 -->
	<script type="text/javascript" src="mergely/codemirror.js"></script>
	
	<!-- Requires Mergely -->
	<script type="text/javascript" src="mergely/mergely.js"></script>
	
	<script type="text/javascript">
        $(document).ready(function () {
		        $('#compare').mergely({
                                width: 'auto',
                                height: 'auto', // containing div must be given a height
                                cmsettings: { readOnly: false },
                        });
                        var lhs_url =  'getsource.php?id=<?php echo intval($_GET['left'])?>';
                        var rhs_url = 'getsource.php?id=<?php echo intval($_GET['right'])?>';
                        $.ajax({
                                type: 'GET', async: true, dataType: 'text',
				url: lhs_url,
                                success: function (response) {
                                        $('#path-lhs').text(lhs_url);
                                        $('#compare').mergely('lhs', response);
                                }
                        });
                        $.ajax({
                                type: 'GET', async: true, dataType: 'text',
				url: rhs_url,
                                success: function (response) {
                                        $('#path-rhs').text(rhs_url);
                                        $('#compare').mergely('rhs', response);
                                }
                        });
			
			function checkFileList(files) {
				if (typeof window.FileReader !== 'function')
					error_msg("The file API isn't supported on this browser yet.");

				if (files.length>0) readFile(files[0], "lhs");
				if (files.length>1) readFile(files[1], "rhs");
			}

			function readFile(file, side) {
				var reader = new FileReader();
				reader.onload = function file_onload() {
					// document.getElementById('td1').innerHTML = ..
					$('#path-'+side).text(file.name);
					$('#compare').mergely(side, reader.result);
				}
				reader.readAsBinaryString(file);

			}
			function handleDragOver(evt) {
				evt.stopPropagation();
				evt.preventDefault();
				evt.dataTransfer.dropEffect = 'copy'; // Explicitly show this is a copy.
			}
			function handleFileSelect(evt) {
				document.getElementById('drop_zone').visibility = "collapse";
				evt.stopPropagation();
				evt.preventDefault();
				var files = evt.dataTransfer.files; // FileList object.
				checkFileList(files);
			}
			var dropZone = document.getElementById('drop_zone');
			document.body.addEventListener('dragover', handleDragOver, false);
			document.body.addEventListener('drop', handleFileSelect, false);

			function download_content(a, side) {
				//a.innerHTML = "preparing content..";
				var txt = $('#compare').mergely('get', side);
				var datauri = "data:plain/text;charset=UTF-8," + encodeURIComponent(txt);
				a.setAttribute('download', side+".txt");
				a.setAttribute('href', datauri);
				//a.innerHTML = "content ready.";
			}
			document.getElementById('save-lhs').addEventListener('mouseover', function() { download_content(this, "lhs"); }, false);
			document.getElementById('save-rhs').addEventListener('mouseover', function() { download_content(this, "lhs"); }, false);
			document.getElementById('ignorews').addEventListener('change', function() {
				$('#compare').mergely('options', { ignorews: this.checked });
			}, false);


		});
	</script>

 </body>
</html>
