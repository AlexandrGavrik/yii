
<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use app\models\Status;
//use kartik\datecontrol\DateControl;
//use kartik\datecontrol\Module;
/* @var $this yii\web\View */
/* @var $searchModel app\models\TaskSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tasks';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="task-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Task', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'description',
            'createDate:datetime',
            'changeDate:datetime',
            'endDate:datetime',
            ['attribute'=>'status_id', 'value'=>'statusName', 'filter'=>Status::getStatusList()],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
