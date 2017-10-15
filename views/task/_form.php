
<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Status;

/* @var $this yii\web\View */
/* @var $model app\models\Task */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="task-form">

    <?php $form = ActiveForm::begin(); ?>

    <?//= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?//= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <?//= $form->field($model, 'createDate')->textInput() ?>

    <?//= $form->field($model, 'changeDate')->textInput() ?>

    <?//= $form->field($model, 'endDate')->textInput() ?>

    <?= $form->field($model, 'status_id')->dropDownList(Status::getStatusList()) ?>
	
	

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Изменить статус', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>