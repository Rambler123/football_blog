<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\imagine\Image;  
use Imagine\Image\Box;  

/* @var $this yii\web\View */
/* @var $model app\models\Post */
 
$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Посты', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="post-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Обновить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы действительно хотите удалить запись?',
                'method' => 'post',
            ],
        ]) ?>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'title',
            'content:ntext',
            'category.name',
        [
            'attribute' => 'status',
            'value' => ($model->status==1)?'Опубликован':'Черновик',
        ],
        'created_at:datetime',
        'updated_at:datetime',
        'tags',
        ],
    ]) ?>
     <? $imwidth=500;$imheight=300; require_once(Yii::$app->basePath . '/extensions/fimage.php'); ?>
</div>
