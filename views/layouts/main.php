<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use yii\widgets\Menu;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => 'My Company',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
            ['label' => 'Home', 'url' => ['/site/index']],
            ['label' => 'Gii', 'url' => ['/gii']],
            ['label' => 'Задачи', 'url' => ['/task/index']],
            ['label' => 'Админ T', 'url' => ['/admin/task/index']],
            ['label' => 'Админ S', 'url' => ['/admin/status/index']],
            ['label' => 'Админ U', 'url' => ['/admin/user/index']],
            //['label' => 'Задачи2', 'url' => ['/task/index2']],
            ['label' => 'Role', 'url' => ['/task/role']],
            //['label' => 'About', 'url' => ['/site/about']],
            //['label' => 'Contact', 'url' => ['/site/contact']],
            Yii::$app->user->isGuest ? (
                ['label' => 'Login', 'url' => ['/site/login']]
            ) : (
                '<li>'
                . Html::beginForm(['/site/logout'], 'post')
                . Html::submitButton(
                    'Logout (' . Yii::$app->user->identity->username . ')',
                    ['class' => 'btn btn-link logout']
                )
                . Html::endForm()
                . '</li>'
            )
        ],
    ]);
    NavBar::end();
	
	
    ?>
  <?php
    NavBar::begin([
    
        'options' => [
            'class' => 'tabbable tabs-right',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav'],
        'items' => [
            ['label' => 'Задачи', 'url' => ['/task/index']],
            ['label' => 'Админ T', 'url' => ['/admin/task/index']],
            ['label' => 'Админ S', 'url' => ['/admin/status/index']],
            ['label' => 'Админ U', 'url' => ['/admin/user/index']],
          
        ],
    ]);
    NavBar::end();
	
	
    ?>
    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; My Company <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>

</body>
</html>
<?php $this->endPage() ?>
