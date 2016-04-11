<?php
/**
 * 慧联信息管理系统
 * ==================================
 * Copyright (c) 2013-2015 Tang Chao
 * 乐思乐享博客园
 * http://www.cnblogs.com/mchina/
 * ==================================
 * Author:唐 超
 * 个人微信：mchina_tang
 * 公众微信：zhuojinsz
 * Date:2015-03-11
 */
session_start();
//定义一个常量，用来授权调用includes里面的文件
define('IN_TG', true);
//定义一个常量，用来指定本页的内容
define('SCRIPT','index');
require dirname(_FILE_).'/includes/common.inc.php';
//判断是否登录
if (!isset($_COOKIE['username'])){
	_location('','signin.php');
}

//分页
global $_pagesize,$_pagenum;
_page("SELECT id FROM tbl_travel_fund",10);
$_result = $mysqli->_query("SELECT id,income_date,income_account,income_item,income_amount,account_balance FROM tbl_travel_fund ORDER BY id ASC LIMIT $_pagenum,$_pagesize");
?>
<!DOCTYPE html>
<html>
<head>
	<title><?php echo MY_SITE_NAME;?></title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	
    <!-- bootstrap -->
    <link href="css/bootstrap/bootstrap.css" rel="stylesheet" />
    <link href="css/bootstrap/bootstrap-responsive.css" rel="stylesheet" />
    <link href="css/bootstrap/bootstrap-overrides.css" type="text/css" rel="stylesheet" />

    <!-- global styles -->
    <link rel="stylesheet" type="text/css" href="css/layout.css" />
    <link rel="stylesheet" type="text/css" href="css/elements.css" />
    <link rel="stylesheet" type="text/css" href="css/icons.css" />

    <!-- libraries -->
    <link href="css/lib/font-awesome.css" type="text/css" rel="stylesheet" />

	<!-- this page specific styles -->
    <link rel="stylesheet" href="css/compiled/tables.css" type="text/css" media="screen" />
	
    <!-- this page specific styles -->
    <link rel="stylesheet" href="css/compiled/user-list.css" type="text/css" media="screen" />

    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
	<script type="text/javascript" src="js/member_action.js"></script>
	
</head>
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
            <li class="active">
                <div class="pointer">
                    <div class="arrow"></div>
                    <div class="arrow_border"></div>
                </div>
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
            <div id="pad-wrapper" class="users-list">
                <div class="row-fluid header">
                    <h3>旅游基金</h3>
                    <div class="span10 pull-right">
                        <a href="new-travel-fund.php" class="btn-flat success pull-right">
                            <span>&#43;</span>
                            	新增基金
                        </a>
                    </div>
                </div>

                <!-- Users table -->
                <div class="row-fluid table">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th class="span2 sortable">
                                    	序号
                                </th>
                                <th class="span2 sortable">
                                    <span class="line"></span>入账日期
                                </th>
                                <th class="span5 sortable">
                                    <span class="line"></span>入账账户
                                </th>
                                <th class="span3 sortable">
                                    <span class="line"></span>入账项目
                                </th>
                                <th class="span2 sortable">
                                    <span class="line"></span>入账金额
                                </th>
                                <th class="span2 sortable">
                                    <span class="line"></span>账户余额
                                </th>
                            </tr>
                        </thead>
						<tbody>

							<?php
								while(!!$_rows = $mysqli->_fetch_array_list($_result)){
									$_html = array();
									$_html['id'] = $_rows['id'];
									$_html['income_date'] = $_rows['income_date'];
									$_html['income_account'] = $_rows['income_account'];
									$_html['income_item'] = $_rows['income_item'];
									$_html['income_amount'] = $_rows['income_amount'];
									$_html['account_balance'] = $_rows['account_balance'];
							?>
							<!-- row -->
							<tr>
								<td>
									<?php echo $_html['id'] ?>
								</td>
								<td>
									<?php echo $_html['income_date'] ?>
								</td>
								<td>
									<?php echo $_html['income_account'] ?>
								</td>
								<td>
									<?php echo $_html['income_item'] ?>
								</td>
								<td>
									<?php echo $_html['income_amount'] ?>
								</td>
								<td>
									<?php echo $_html['account_balance'] ?>
								</td>
							</tr>
							<?php 
								}
								$mysqli->_free_result($_result);
							?>

                        </tbody>
                    </table>
                </div>
				<?php
					_paging(2, '条信息');
				?>
                <!-- end users table -->
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
    <script src="js/theme.js"></script>
</body>
</html>