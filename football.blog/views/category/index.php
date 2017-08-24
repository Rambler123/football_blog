<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\imagine\Image;  
use Imagine\Image\Box; 
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */ 

$this->title = 'Категории';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-index">

    <h1><center><?= Html::encode($this->title) ?></center></h1>

    <p>
        <?= Html::a('Добавить категорию', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
 <?php     Pjax::begin(); ?> 
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
       'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

          //  'id',
            'name',
            'description',
               [
                     'attribute' => 'image',
                     'format' => 'raw',
                     'value' => function ($model) {   
                        if ($model->image_web_filename!='')
                        {
                               $path=Yii::$app->basePath . '/web/uploads/'; 
                               $filename=$model->image_web_filename;
                               $filetumb='tumb-'.$filename;
                               Image::thumbnail($path.$filename, 70, 45)
                                ->resize(new Box(70,45))
                                ->save($path.$filetumb, 
                                 ['quality' => 70]);
                            return Html::a(Html::img(Yii::$app->homeUrl.'/uploads/'.$filetumb,['class'=>'leftimg']), Yii::$app->homeUrl.'/uploads/'.$filename, ['rel' => 'fancybox']);
                          }
                          else return '<no image>';
                     },
                   ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
