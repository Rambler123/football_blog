<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use yii\db\Schema;
use app\models\Category;
AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<?= \bluezed\scrollTop\ScrollTop::widget() ?>
<head>
 <link href="favicon.ico"  type="image/x-icon" rel="shortcut icon"/> 
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
$category = Category::find()->orderBy('name')->all();
//$cats[]=['label' => 'Домой', 'url' => Yii::$app->homeUrl];
foreach ($category as $categor)
{
      $cats[]=['label' => Html::encode("{$categor->name}"), 'url' => ['/site/?id='.Html::encode("{$categor->id}")]];
 }
$cats[]=['label' => 'О нас', 'url' => ['/site/about']];
$cats[]=['label' => 'Контакты', 'url' => ['/site/contact']];
 Yii::$app->user->isGuest ? (
                $cats[]=['label' => 'Вход', 'url' => ['/site/login']]
            ) : (
$cats[]=['label' => Yii::$app->user->identity->username, 'items' => [
   ['label' => 'Посты', 'url' => ['/post']],
   ['label' => 'Категории', 'url' => ['/category']],
   ['label' => 'Пользователи', 'url' => ['/users']],
   ['label' => 'Комментарии', 'url' => ['/comments']],
   ['label' => 'Выход','url' => ['/site/logout'],'linkOptions' => ['data-method' => 'post']]
   ]]
   );
?>

    <?php
    NavBar::begin([
        'brandLabel' => 'Футбольный блогер',
        'brandUrl' => Yii::$app->homeUrl.'site/',
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $cats
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
        <p class="pull-left">&copy; Футбольный блогер <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
