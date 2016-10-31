<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container">
	<div class="row">
		<div class="col-md-4 col-md-offset-4">
			<div class="login-panel panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">登录</h3>
				</div>
				<div class="panel-body">
		<?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

			<?= $form->field($model, 'username')->textInput(['autofocus' => true, 'placeholder' => '用户名'])->label(false) ?>

			<?= $form->field($model, 'password')->passwordInput(['placeholder' => '密码'])->label(false) ?>

			<?= $form->field($model, 'rememberMe')->checkbox()->label('记住我') ?>

			<div class="form-group">
				<?= Html::submitButton('登录', ['class' => 'btn btn-lg btn-success btn-block', 'name' => 'login-button']) ?>
			</div>

		<?php ActiveForm::end(); ?>
				</div>
			</div>
		</div>
	</div>
</div>