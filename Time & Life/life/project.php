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
define('SCRIPT','project');
require dirname(_FILE_).'/includes/common.inc.php';
//判断是否登录
if (!isset($_COOKIE['username'])){
	_location('','signin.php');
}

//分页
global $_pagesize,$_pagenum;
_page("SELECT id FROM tbl_project_charge",10);
$_result = $mysqli->_query("SELECT id,project_name,project_begin_date,project_end_date,income_account,project_charge FROM tbl_project_charge ORDER BY id ASC LIMIT $_pagenum,$_pagesize");

//获取开发费用总和
$_total_charge = $mysqli->_fetch_array("SELECT SUM(binary project_charge) AS total_charge FROM tbl_project_charge");
$project_charge = $_total_charge['total_charge'];
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
	
	<script>
		function del(id) {
			if (confirm("确认删除？")){
				window.location.href="mis.php?action=delete_project&del_id="+id;    //本页面刷新
			}
		}
	</script>
	
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
            <div id="pad-wrapper" class="users-list">
                <div class="row-fluid header">
                    <h3>慧联项目开发</h3>
                    <div class="span8 pull-right">
                        <a href="new-project-charge.php" class="btn-flat success pull-right">
                            <span>&#43;</span>
                            	新增项目
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
                                <th class="span3 sortable">
                                    <span class="line"></span>项目名称
                                </th>
                                <th class="span2 sortable">
                                    <span class="line"></span>项目开始时间
                                </th>
                                <th class="span2 sortable">
                                    <span class="line"></span>项目结束时间
                                </th>
                                <th class="span5 sortable">
                                    <span class="line"></span>收入账户
                                </th>
                                <th class="span2 sortable">
                                    <span class="line"></span>项目费用
                                </th>
                                <th class="span2 sortable align-right">
                                    <span class="line"></span>操作
                                </th>
                            </tr>
                        </thead>
						<tbody>

							<?php
								while(!!$_rows = $mysqli->_fetch_array_list($_result)){
									$_html = array();
									$_html['id'] = $_rows['id'];
									$_html['project_name'] = $_rows['project_name'];
									$_html['project_begin_date'] = $_rows['project_begin_date'];
									$_html['project_end_date'] = $_rows['project_end_date'];
									$_html['income_account'] = $_rows['income_account'];
									$_html['project_charge'] = $_rows['project_charge'];
							?>
							<!-- row -->
							<tr>
								<td>
									<?php echo $_html['id'] ?>
								</td>
								<td>
									<?php echo $_html['project_name'] ?>
								</td>
								<td>
									<?php echo $_html['project_begin_date'] ?>
								</td>
								<td>
									<?php echo $_html['project_end_date'] ?>
								</td>
								<td>
									<?php echo $_html['income_account'] ?>
								</td>
								<td>
									<?php echo $_html['project_charge'] ?>
								</td>
								<td class="align-right">
									<ul class="actions">
										<li><a href="edit-project.php?id=<?php echo $_html['id'];?>">编辑</a></li>
										<li class="last"><a href="javascript:del(<?php echo $_html['id'];?>)">删除</a></li>
									</ul>
								</td>
							</tr>
							<?php 
								}
								$mysqli->_free_result($_result);
							?>
							<tr>
								<td>
								</td>
								<td>
								</td>
								<td>
								</td>
								<td>
								</td>
								<td class="align-right">
									费用总和:
								</td>
								<td>
									<?php echo "<strong>".$project_charge."</strong>" ?>
								</td>
								<td class="align-right">
								</td>
							</tr>
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