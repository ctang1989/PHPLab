<?php
session_start();
//定义一个常量，用来授权调用includes里面的文件
define('IN_TG', true);
require dirname(_FILE_).'/includes/common.inc.php';
//判断是否登录
if (!isset($_COOKIE['username'])){
	//_alert_close('请先登录');
	_location('请先登录', 'signin.php');
}

if ($_GET['action'] == 'edit' && isset($_POST['id'])){

	$_clean=array();
	$_clean['project_name']=$_POST['project_name'];
	$_clean['project_begin_date']=$_POST['project_begin_date'];
	$_clean['project_end_date']=$_POST['project_end_date'];
	$_clean['income_account']=$_POST['income_account'];
	$_clean['project_charge']=$_POST['project_charge'];
	
	//修改资料
	$mysqli->_dml("UPDATE tbl_project_charge SET
								project_name='{$_clean['project_name']}',
								project_begin_date='{$_clean['project_begin_date']}',
								project_end_date='{$_clean['project_end_date']}',
								income_account='{$_clean['income_account']}',
								project_charge='{$_clean['project_charge']}'
							WHERE
								id='{$_POST['id']}'
	");
	
	//判断是否修改成功
	if ($mysqli->_affected_rows()==1){
		_location('修改成功！','project.php');
	}else {
		_location('修改失败，请重新修改！', 'project.php');
	}
}

/*
 * 获取数据
 */
if (isset($_GET['id'])){
	//获取数据
	$_rows = $mysqli->_fetch_array("SELECT * FROM tbl_project_charge WHERE id='{$_GET['id']}'");
	if ($_rows){
		$_html = array();
		$_html['id'] = $_rows['id'];
		$_html['project_name'] = $_rows['project_name'];
		$_html['project_begin_date'] = $_rows['project_begin_date'];
		$_html['project_end_date'] = $_rows['project_end_date'];
		$_html['income_account'] = $_rows['income_account'];
		$_html['project_charge'] = $_rows['project_charge'];
	}else{
		_alert_back('此信息不存在！');
	}
}

?>
<!DOCTYPE html>
<html>
<head>
	<title><?php echo MY_SITE_NAME;?></title>
    
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>
    <!-- bootstrap -->
    <link href="css/bootstrap/bootstrap.css" rel="stylesheet" />
    <link href="css/bootstrap/bootstrap-responsive.css" rel="stylesheet" />
    <link href="css/bootstrap/bootstrap-overrides.css" type="text/css" rel="stylesheet" />

    <!-- global styles -->
    <link rel="stylesheet" type="text/css" href="css/layout.css" />
    <link rel="stylesheet" type="text/css" href="css/elements.css" />
    <link rel="stylesheet" type="text/css" href="css/icons.css" />

    <!-- libraries -->
    <link href="css/lib/uniform.default.css" type="text/css" rel="stylesheet" />
    <link href="css/lib/select2.css" type="text/css" rel="stylesheet" />
    <link href="css/lib/bootstrap.datepicker.css" type="text/css" rel="stylesheet" />
    <link href="css/lib/font-awesome.css" type="text/css" rel="stylesheet" />
    
    <!-- this page specific styles -->
    <link rel="stylesheet" href="css/compiled/new-user.css" type="text/css" media="screen" />

    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
	<script>
		function cancel_modify(){
			window.location.href='project.php'//这里是你要返回的页面
		}
	</script>

<body>

    <!-- navbar -->
    <div class="navbar navbar-inverse">
        <div class="navbar-inner">
            <button type="button" class="btn btn-navbar visible-phone" id="menu-toggler">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            
            <a class="brand" href="index.php"><img src="img/huilian.png" /></a>

            <ul class="nav pull-right">
                <li class="settings hidden-phone">
                    <a href="signin.php" role="button">
                        <i class="icon-share-alt"></i>
                    </a>
                </li>
            </ul>            
        </div>
    </div>
    <!-- end navbar -->

    <!-- sidebar -->
    <div id="sidebar-nav">
        <ul id="dashboard-menu">
            <li>
                <a href="index.php">
                    <i class="icon-plane"></i>
                    <span>旅游基金</span>
                </a>
            </li>
			<li class="active">
				<div class="pointer">
                    <div class="arrow"></div>
                    <div class="arrow_border"></div>
                </div>
                <a href="project.php">
                    <i class="icon-edit"></i>
                    <span>慧联开发</span>
                </a>
            </li>
            <li>
                <a href="wage_income.php">
                    <i class="icon-laptop"></i>
                    <span>工资收入</span>
                </a>
            </li>
            <li>
                <a href="babylon_wealth.php">
                    <i class="icon-coffee"></i>
                    <span>巴比伦财富</span>
                </a>
            </li>
            <li>
                <a href="advance_repay.php">
                    <i class="icon-credit-card"></i>
                    <span>提前还款</span>
                </a>
            </li>
        </ul>
    </div>
    <!-- end sidebar -->

	<!-- main container -->
    <div class="content">
        <div class="container-fluid">
            <div id="pad-wrapper" class="new-user">
                <div class="row-fluid header">
                    <h3>修改项目信息</h3>
                </div>
                <div class="row-fluid form-wrapper">
                    <!-- left column -->
                    <div class="span9 with-sidebar">
                        <div class="container">
                            <form class="new_user_form normal-input" action="?action=edit" method="post" />
							<input type="hidden" name="id" value="<?php echo $_html['id']?>" />
                                <div class="span12 field-box">
                                    <label>项目名称:</label>
                                    <input class="span9" type="text" name="project_name" value="<?php echo $_html['project_name']; ?>" />
                                </div>
                                <div class="span12 field-box">
                                    <label>项目开始时间:</label>
                                    <input class="span9 datepicker" type="text" name="project_begin_date" value="<?php echo $_html['project_begin_date']; ?>" />
                                </div>
                                <div class="span12 field-box">
                                    <label>项目结束时间:</label>
                                    <input class="span9 datepicker" type="text" name="project_end_date" value="<?php echo $_html['project_end_date']; ?>" />
                                </div>
                                <div class="span12 field-box">
                                    <label>收入账户:</label>
                                    <select style="width:74.35897435897436%" class="select2" name="income_account">
	                                    <option />
	                                    <option value="6214 8302 1718 0776（招商银行-上海）" />6214 8302 1718 0776（招商银行-上海）
	                                    <option value="6217 0012 1004 5194 204（建设银行-上海）" />6217 0012 1004 5194 204（建设银行-上海）
	                                    <option value="6227 0020 0161 0181 439（建设银行-苏州）" />6227 0020 0161 0181 439（建设银行-苏州）
	                                    <option value="4563 5161 0103 7126 832（中国银行-苏州）" selected="" />4563 5161 0103 7126 832（中国银行-苏州）
	                                    <option value="6228 4804 0117 6449 015（农业银行-苏州）" />6228 4804 0117 6449 015（农业银行-苏州）
	                                    <option value="6228 4804 0117 6449 015（农业银行-苏州）" />6221 7302 1701 0211 826（江苏银行-苏州）
	                                </select>
                                </div>
                                <div class="span12 field-box">
                                    <label>项目费用:</label>
                                    <div class="input-append">
                                    	<input class="span9" type="text" name="project_charge" value="<?php echo $_html['project_charge']; ?>" />
                                    	<span class="add-on">.00</span>
                                    </div>
                                </div>
                                <div class="span11 field-box actions">
                                    <input type="submit" class="btn-glow primary" value="修改" />
                                    <span>OR</span>
                                    <input type="reset" value="取消" class="reset" onClick="cancel_modify()" />
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- side right column -->
                    <div class="span3 form-sidebar pull-right">
                        <div class="btn-group toggle-inputs hidden-tablet">
                            <button class="glow left" data-input="inline">INLINE INPUTS</button>
                            <button class="glow right active" data-input="normal">NORMAL INPUTS</button>
                        </div>
                        <div class="alert alert-info hidden-tablet">
                            <i class="icon-lightbulb pull-left"></i>
                            Click above to see difference between inline and normal inputs on a form
                        </div>                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end main container -->

	<div class="templatemo-footer">
		<div class="templatemo-copyright">
			<p>Copyright &copy; 2015 <?php echo MY_SITE_NAME;?></p>
		</div>
	</div>
	
	<!-- scripts -->
    <script src="js/jquery-latest.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootstrap.datepicker.js"></script>
    <script src="js/jquery.uniform.min.js"></script>
    <script src="js/select2.min.js"></script>
    <script src="js/theme.js"></script>

    <script type="text/javascript">
        $(function () {

            // toggle form between inline and normal inputs
            var $buttons = $(".toggle-inputs button");
            var $form = $("form.new_user_form");

            $buttons.click(function () {
                var mode = $(this).data("input");
                $buttons.removeClass("active");
                $(this).addClass("active");

                if (mode === "inline") {
                    $form.addClass("inline-input");
                } else {
                    $form.removeClass("inline-input");
                }
            });

            // select2 plugin for select elements
            $(".select2").select2({
                placeholder: "Select a State"
            });

            // datepicker plugin
            $('.datepicker').datepicker().on('changeDate', function (ev) {
                $(this).datepicker('hide');
            });
        });
    </script>
</body>
</html>