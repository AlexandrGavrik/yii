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

	<article class="col-sm-8 panel panel-success fixed-top">
		<h1><?= Html::encode($this->title) ?></h1>
		
		<div class="alert alert-info">
			<strong><?= $model->statusName ?></strong>
			<p>Выполнить до <?= $model->endDate ?></p>
		
		</div>
		
		<hr>
		<p><?= $model->description ?></p>
		
	</article>
	<aside class="col-sm-3  panel panel-success col-sm-offset-1">
		<dl>
			<dt>Создан</dt>
			<dd class="text-right"><?= $model->createDate ?></dd>
			<dt>Редактирован</dt>
			<dd class="text-right"><?= $model->changeDate ?></dd>
			<dt>Автор</dt>
			<dd class="text-right"><?= $model->userName ?></dd>
		</dl>
		<?= $this->render('_form', ['model' => $model]) ?>
	</aside>

</div>