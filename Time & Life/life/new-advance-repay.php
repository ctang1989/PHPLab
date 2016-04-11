<?php
session_start();
//定义一个常量，用来授权调用includes里面的文件
define('IN_TG', true);
require dirname(_FILE_).'/includes/common.inc.php';
//判断是否登录
if (!isset($_COOKIE['username'])){
	_location('请先登录', 'signin.php');
}
?>
<!DOCTYPE html>
<html>
<head>
	<title><?php echo MY_SITE_NAME;?></title>
    
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	
    <!-- bootstrap -->
    <link href="css/bootstrap/bootstrap.css" rel="stylesheet" />
    <link href="css/bootstrap/bootstrap-responsive.css" rel="stylesheet" />
    <link href="css/bootstrap/bootstrap-overrides.css" type="text/css" rel="stylesheet" />

    <!-- libraries -->
    <link href="css/lib/uniform.default.css" type="text/css" rel="stylesheet" />
    <link href="css/lib/select2.css" type="text/css" rel="stylesheet" />
    <link href="css/lib/bootstrap.datepicker.css" type="text/css" rel="stylesheet" />
    <link href="css/lib/font-awesome.css" type="text/css" rel="stylesheet" />    
  
    <!-- global styles -->
    <link rel="stylesheet" type="text/css" href="css/layout.css" />
    <link rel="stylesheet" type="text/css" href="css/elements.css" />
    <link rel="stylesheet" type="text/css" href="css/icons.css" />

    <!-- libraries -->
    <link rel="stylesheet" type="text/css" href="css/lib/font-awesome.css" />
    
    <!-- this page specific styles -->
    <link rel="stylesheet" href="css/compiled/new-user.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="css/compiled/form-showcase.css" type="text/css" media="screen" />

    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>
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
			<li>
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
            <li class="active">
            	<div class="pointer">
                    <div class="arrow"></div>
                    <div class="arrow_border"></div>
                </div>
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
                    <h3>新增提前还款（20%）</h3>
                </div>

                <div class="row-fluid form-wrapper">
                    <!-- left column -->
                    <div class="span9 with-sidebar">
                        <div class="container">
                            <form class="new_user_form normal-input" action="mis.php?action=new_advance_repay" method="post" />
                                <div class="span12 field-box">
                                    <label>入账日期:</label>
                                    <input class="span9 datepicker" type="text" name="income_date" />
                                </div>
                                <div class="span12 field-box">
                                    <label>入账账户:</label>
                                    <select style="width:74.35897435897436%" class="select2" name="income_account">
	                                    <option />
	                                    <option value="6214 8302 1718 0776（招商银行-上海）" />6214 8302 1718 0776（招商银行-上海）
	                                    <option value="6217 0012 1004 5194 204（建设银行-上海）" />6217 0012 1004 5194 204（建设银行-上海）
	                                    <option value="6227 0020 0161 0181 439（建设银行-苏州）" />6227 0020 0161 0181 439（建设银行-苏州）
	                                    <option value="4563 5161 0103 7126 832（中国银行-苏州）" />4563 5161 0103 7126 832（中国银行-苏州）
	                                    <option value="6228 4804 0117 6449 015（农业银行-苏州）" />6228 4804 0117 6449 015（农业银行-苏州）
	                                    <option value="6221 7302 1701 0211 826（江苏银行-苏州）" selected="" />6221 7302 1701 0211 826（江苏银行-苏州）
	                                </select>
                                </div>
                                <div class="span12 field-box">
                                    <label>入账项目:</label>
                                    <select style="width:74.35897435897436%" class="select2" name="income_item">
	                                    <option />
	                                    <option value="工资固定划入（100）" />工资固定划入（100）
	                                    <option value="工资固定划入（200）" />工资固定划入（200）
	                                    <option value="工资固定划入（300）" />工资固定划入（300）
	                                    <option value="工资固定划入（500）" />工资固定划入（500）
	                                    <option value="工资固定划入（5%）" />工资固定划入（5%）
	                                    <option value="工资固定划入（10%）" />工资固定划入（10%）
	                                    <option value="工资固定划入（20%）" selected="" />工资固定划入（20%）
	                                    <option value="奖金分配（10%）" />奖金分配（10%）
	                                    <option value="其他收入" />其他收入
	                                </select>
                                </div>
                                <div class="span12 field-box">
                                    <label>入账金额:</label>
                                    <div class="input-append">
                                    	<input class="span9" type="text" name="income_amount" />
                                    	<span class="add-on">.00</span>
                                    </div>
                                </div>
                                <div class="span11 field-box actions">
                                    <input type="submit" class="btn-glow primary" value="新增" />
                                    <span>OR</span>
                                    <input type="reset" value="取消" class="reset" />
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- side right column -->
                    <div class="span3 form-sidebar pull-right">
                        <div class="btn-group toggle-inputs hidden-tablet">
                            <button class="glow left active" data-input="inline">INLINE INPUTS</button>
                            <button class="glow right" data-input="normal">NORMAL INPUTS</button>
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