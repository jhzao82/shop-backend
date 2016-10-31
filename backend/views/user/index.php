<?php

use yii\helpers\Html;
use yii\grid\GridView;
/* @var $this yii\web\View */

$this->title = '会员管理';
?>
<!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/">管理后台</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> 修改密码</a>
                        </li>
                        <li class="divider"></li>
<?php
echo '<li>'
    . Html::beginForm(['/site/logout'], 'post', ['name' => 'logoutform'])
	. Html::a('<i class="fa fa-sign-out fa-fw"></i>退出 (' . Yii::$app->user->identity->username . ')','javascript:logoutform.submit();')
	. Html::endForm()
	. '</li>';
?>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->
			
            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="查找...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            </div>
                            <!-- /input-group -->
                        </li>
                        <li>
                            <a href="/"><i class="fa fa-dashboard fa-fw"></i> 仪表盘</a>
                        </li>
                        <li>
                            <a href="/shop"><i class="fa fa-table fa-fw"></i> 商家管理</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> 商品管理<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="/item">商品管理</a>
                                </li>
                                <li>
                                    <a href="/category">分类管理</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a class="active" href="/user"><i class="fa fa-sitemap fa-fw"></i> 会员管理</a>
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
<h1 class="page-header"><?= Html::encode($this->title) ?></h1>		
<p><?= Html::a('添加会员', ['create'], ['class' => 'btn btn-success']) ?></p>
<?= GridView::widget([
	'dataProvider' => $dataProvider,
	'filterModel' => $searchModel,
	'columns' => [
		['class' => 'yii\grid\SerialColumn'],

		'id',
		'username',
		//'auth_key',
		//'password_hash',
		//'password_reset_token',
		// 'email:email',
		// 'status',
		// 'created_at',
		// 'updated_at',

		['class' => 'yii\grid\ActionColumn'],
	],
]); ?>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

