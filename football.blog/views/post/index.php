<?php

use yii\helpers\Html;
use yii\widgets\Pjax;
use yii\imagine\Image;  
use Imagine\Image\Box;  
use yii\helpers\ArrayHelper;
use app\models\Category; 
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
 
$this->title = 'Посты';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="post-index">

   <h1><center><?= Html::encode($this->title) ?></center></h1>

    <p>
        <?= Html::a('Добавить пост', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

 <?php 
   echo newerton\fancybox\FancyBox::widget([
    'target' => 'a[rel=fancybox]',
    'helpers' => true,
    'mouse' => true,
    'config' => [
        'maxWidth' => '90%',
        'maxHeight' => '90%',
        'playSpeed' => 7000,
        'padding' => 0,
        'fitToView' => false,
        'width' => '15%',
        'height' => '15%',
        'autoSize' => false,
        'closeClick' => false,
        'openEffect' => 'elastic',
        'closeEffect' => 'elastic',
        'prevEffect' => 'elastic',
        'nextEffect' => 'elastic',
        'closeBtn' => false,
        'openOpacity' => true,
        'helpers' => [
            'title' => ['type' => 'float'],
            'buttons' => [],
            'thumbs' => ['width' => 68, 'height' => 50],
            'overlay' => [
                'css' => [
                    'background' => 'rgba(0, 0, 0, 0.8)'
                ]
            ]
        ],
    ]
]); 
 Pjax::begin(); 
 ?>   
    <?= GridView::widget([
       'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'title',
            'content:ntext',
            //'category_id',
            //'status',
          [
            'attribute' => 'category_id',
            'value' => 'category.name',
                'filter'=>ArrayHelper::map(
        Category::find()->orderBy('name')->all(), 'id', 'name')        ],
        [
            'attribute' => 'status',
            'value' => function ($data) { return ($data->status==1)?'Опубликован':'Черновик'; }
        ],
             [
              'attribute' => 'created_at',
               'format' =>  ['date', 'dd.MM.Y HH:mm:ss'],
             ] ,
            // 'updated_at',
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
<?php  Pjax::end(); ?>
</div>
