<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Комментарии пользователей';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="comments-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

          [
            'attribute' => 'post_id',
            'value' => 'post.title',
        ],
          [
            'attribute' => 'user_id',
            'value' => 'users.username',
        ],
             [
              'attribute' => 'created_at',
               'format' =>  ['date', 'dd.MM.Y HH:mm:ss'],
             ] ,
            'content:ntext',

            ['class' => 'yii\grid\ActionColumn',  'template'=>'{delete}'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
