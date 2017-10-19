<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Status;
use app\models\User;

use kartik\datecontrol\DateControl;
/* @var $this yii\web\View */
/* @var $model app\models\TaskSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="task-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => ['class'=>'form-group-sm '], 
        
    ]); ?>
<div>
   
    <?= $form->field($model, 'name') ?>

    <?php echo $form->field($model, 'status_id')->dropDownList(Status::getStatusList(),[
        'prompt'=>'Выбрать Статус...'
    ]) ?>
	<?php echo $form->field($model, 'user_id')->dropDownList(User::getUserList(),[
        'prompt'=>'Выбрать Автора...'
    ]) ?>

    <?= $form->field($model, 'createDate') -> widget(DateControl::className(),['type'=>'date'])?>

    <?= $form->field($model, 'changeDate') -> widget(DateControl::className(),[]) ?>

    <?php  echo $form->field($model, 'endDate') -> widget(DateControl::className(),[]) ?>
</div>
    <div class="form-group">
        
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
   
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
    </div>
    <?php ActiveForm::end(); ?>

</div>
