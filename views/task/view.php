<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\Task;
use app\models\Status;
use app\admin\rules\AuthorRule;

/* @var $this yii\web\View */
/* @var $model app\models\Task */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Tasks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="task-view">

    <h1><?= Html::encode($this->title) ?></h1>
	<h2><?= Yii::$app->user->id ?> (<?= Yii::$app->user->identity->username ?>) <?=$model->user_id?></h2>
    <?php if(\Yii::$app->user->can('updateTask',['author_id'=>$model->user_id])):?>
    <p>
		<?= Html::a('Изменить статус', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
		
		
		
    </p>
	<?php endif; ?>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
            //'name',
            'description:text',
            'createDate:datetime',
            'changeDate:datetime',
            'endDate:datetime',
            ['attribute'=>'status_id', 'value'=>function($model){return $model->statusName;}],
			['attribute'=>'user_id', 'value'=>function($model){return $model->userName;}],
        ],
    ]) ?>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>