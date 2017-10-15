<?php

use yii\helpers\Html;
use yii\widgets\ListView;
use yii\widgets\Pjax;

use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $searchModel app\admin\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Users';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php //echo $this->render('_search', ['model' => $searchModel]); ?>
	
	<?php 
	//$m1=$m->getModels();
	$data11 = ArrayHelper::toArray($m);
	print_r($data11);?>
	
    <p>
        <?= Html::a('Create User', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= ListView::widget([
        'dataProvider' => $dataProvider,
        'itemOptions' => ['class' => 'item'],
        'itemView' => function ($model, $key, $index, $widget) {
            return Html::a(Html::encode($model->id), ['view', 'id' => $model->id]);
        },
    ]) ?>
<?php Pjax::end(); ?></div>
