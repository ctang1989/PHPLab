<?php
/*
 * 快递查询结果
 */

require_once 'ims.php';

if($_GET['action'] == 'search_express'){
	$express_com = check_null($_POST['express_com']);
	$express_number = $_POST['express_number'];

	$res = ickd($express_com, $express_number);
	$status = $res['status'];
	$data = $res['data'];
}
?>
<!DOCTYPE html>
<html lang="zh-CN">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <title>快递查询</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- 自定义样式 -->
    <link href="css/index.css" rel="stylesheet">

    <!--[if lt IE 9]>
      <script src="//cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="//cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
  	<!-- 导航条 -->
  	<nav class="navbar navbar-default navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand" href="index.php">
          	<img src="images/logo.png">
          </a>
          <p class="navbar-text">快递查询</p>
        </div>
      </div>
    </nav>
    
	<!-- 表格-->
	<div class="container-fluid container-table-define">
		<table class="table table-bordered table-striped">
		<?php
			if ($status > 0){
				echo "<tr class='success'><th>".$res['expTextName']."</th><th>".$res['mailNo']."</th></tr>";
				foreach ($data as $item){
					echo "<tr><td>".$item['time']."</td><td>".$item['context']."</td></tr>";
				}
			}else{
				echo "<tr class='danger'><th>".$res['expTextName']."</th><th>".$res['mailNo']."</th></tr>";
				echo "<tr><td colspan='2'>该单号暂无查询记录</td></tr>";
			}
		?>
		</table>
	</div>
	
	<div class="container-fluid container-button-define">
		<a href="index.php" class="btn btn-info btn-block btn-lg" role="button">查询其他</a>
	</div>
		
	<footer class="footer">
      <div class="container-fluid">
        <p class="text-muted">Copyright &copy; 2013 - 2015 Huilian. All Rights Reserved</p>
      </div>
    </footer>

    <!-- 加载jQuery -->
    <script src="js/jquery.min.js"></script>
    <!-- 加载bootstrap -->
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript">
	    
	</script>
  </body>
</html>