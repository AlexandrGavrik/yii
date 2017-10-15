<?php
use yii\bootstrap\Nav;
use yii\helpers\Html;
use yii\widgets\LinkPager;

$tasks=$tasks1->getModels();


echo Nav::widget(
	[
		'activateItems'=>true,
		'activateParents'=>true,
		'encodeLabels'=>false,
		'options'=>[
			'class'=>'nav nav-tabs'
		],
		'items'=>[
			[
				'label'=>'Ссылка 1 <span class="glyphicon glyphicon-alert">',
				'url'=>['#'],
				'options'=>['class'=>'disabled'],
				'linkOptions'=>['onClick'=>'return false;'],
			],
			[
				'label'=>'Ссылка 2',
				'url'=>['task/index'],
			],
			[
				'label'=>'Выпадающее меню',
				'items'=>[
					[
						'label'=>'Ссылка 1',
						'url'=>['#'],
					],
					'<li class="divider"></li>',
					'<li class="dropdown-header">Описание</li>',
					[
						'label'=>'Ссылка 2',
						'url'=>['task/index'],
					]
				]
			],
			[
						'label'=>'Ссылка 3',
						'url'=>['task/index'],
					]
		]
	]
);
?>



<h1>Задачи</h1>
<?php  echo $this->render('_search', ['model' => $searchModel]); ?>
<hr />
<?php foreach ($tasks as $task): ?>
    
        <h2><?= Html::encode("{$task->name} ({$task->endDate})") ?></h2>
        <p></p><?= $task->description ?></p>
        <p></p><?= $task->statusName ?></p>
        <?php echo \yii\bootstrap\Html::a('Подробнее',['task/view','id'=>$task->id],['class'=>'btn btn-success']) ?>
    <hr />
<?php endforeach; ?>
<!-- 
	<link rel="stylesheet" href="css/user_style.css" type="text/css" />
-->

<?//= LinkPager::widget(['pagination' => $pagination]) ?>