<?php
/*
 * 快递公司列表
 */

require_once '../lib/MysqliDb.class.php';

$mysqli = new MysqliDb();
$sql = "SELECT id, exp_spell_name, exp_text_name FROM tbl_express_company";
$result = $mysqli->execute_dql($sql);

$data = array();
while (!!$row = $mysqli->fetchAll($result)){
	$data[] = $row;
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
    
    <form id="express_form" action="result.php?action=search_express" method="post">
	    <!-- 下拉列表 -->
	    <div class="container-fluid container-select-define">
			<select name="express_com" class="form-control">
			  <option value="">请选择快递公司</option>
			  <?php
				  foreach ($data as $item){
				  	echo "<option value=".$item['exp_spell_name'].">".$item['exp_text_name']."</option>";
				  }
			  ?>
			</select>
	    </div>
	    
		<!-- 搜索框 -->
		<div class="container-fluid container-search-define">
			<input type="text" name="express_number" class="form-control" placeholder="请输入快递单号" required="required">
		</div>
		
		<!-- 按钮 -->
		<div class="container-fluid container-button-define">
			<button type="submit" class="btn btn-info btn-block btn-lg">
				查　询
			</button>
		</div>
	</form>

	<footer class="footer">
      <div class="container-fluid">
        <p class="text-muted">Copyright &copy; 2013 - 2015 Huilian. All Rights Reserved</p>
      </div>
    </footer>

    <!-- 加载jQuery -->
    <script src="js/jquery.min.js"></script>
    <!-- 加载bootstrap -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>