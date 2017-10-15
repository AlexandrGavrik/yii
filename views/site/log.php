<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\admin\models\User */
/* @var $form ActiveForm */
?>
<div class="site-log">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'username') ?>
        <?= $form->field($model, 'password') ?>
        <?= $form->field($model, 'password_hash') ?>
    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- site-log -->
