<?php
use yii\helpers\Html;
use yii\imagine\Image;  
use Imagine\Image\Box;  
      if ($model->image_web_filename!='') {
       $path=Yii::$app->basePath . '/web/uploads/'; 
       $filename=$model->image_web_filename;
       $filetumb='thumbnail-500x300.jpg';
        Image::thumbnail($path.$filename, $imwidth, $imheight)
                ->resize(new Box($imwidth, $imheight))
                ->save($path.$filetumb, 
                        ['quality' => 70]);
echo newerton\fancybox\FancyBox::widget([
    'target' => 'a[rel=fancybox]',
    'helpers' => true,
    'mouse' => true,
    'config' => [
        'maxWidth' => '95%',
        'maxHeight' => '95%',
        'playSpeed' => 7000,
        'padding' => 0,
        'fitToView' => false,
        'width' => '70%',
        'height' => '70%',
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
echo Html::a(Html::img(Yii::$app->homeUrl.'/uploads/'.$filetumb,['class'=>'leftimg']), Yii::$app->homeUrl.'/uploads/'.$filename, ['rel' => 'fancybox']);
  }     
?>
