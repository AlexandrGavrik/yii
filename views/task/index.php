<?php
use yii\bootstrap\Nav;
use yii\helpers\Html;
use yii\widgets\LinkPager;

$this->title = 'Задачи';
$tasks=$tasks1->getModels();
?>
<h1>Задачи</h1>
<hr>
<aside class="col-sm-3  panel panel-success col-sm-push-9">
	<?php  echo $this->render('_search', ['model' => $searchModel]); ?>
</aside>
<article class="col-sm-8 panel panel-success col-sm-pull-3">
<?php foreach ($tasks as $task): ?>
    
        <h2><?= $task->name ?> <small><?= $task->endDate ?></small></h2>
        <p><?//= $task->description ?></p>
        <p><?= $task->statusName ?></p>
        <?php echo \yii\bootstrap\Html::a('Подробнее',['task/view','id'=>$task->id],['class'=>'btn btn-success']) ?>
    <hr />
<?php endforeach; ?>
</article>
