<?php

use yii\helpers\Html;
use yii\helpers\HtmlPurifier;
use yii\widgets\ActiveForm;
use yii\imagine\Image;  
use Imagine\Image\Box;  
use app\models\Post;
use app\models\Users;
use app\models\Comments;
use yii\data\ActiveDataProvider; 
use yii\captcha\Captcha;
use yii\widgets\Pjax;
use yii\grid\GridView; 

/* @var $this yii\web\View */
/* @var $model app\models\Users */
/* @var $form ActiveForm */
$query=Post::find()->filterWhere(['=', 'id', $_GET['showid']])->all();
$this->title = HtmlPurifier::process($query[0]->title);
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ShowPost">

    <?php $form = ActiveForm::begin(); ?>

    <p><img src="<?= Html::encode(Yii::$app->homeUrl.'uploads/')?><?= Html::encode($query[0]->image_web_filename)?>" width="80%" height="auto"></p>
    <?= HtmlPurifier::process($query[0]->content) ?>
   <p><?= '<p></p><b><i>Теги:</i></b>'.HtmlPurifier::process($query[0]->tags) ?></p>
    <h3><center>Комментарии пользователей</center></h3>
<div style="background-color:white;padding:20px;">
<? 
  $query=Comments::find()->filterWhere(['=', 'post_id', $_GET['showid']]);
  $dataProvider = new ActiveDataProvider([
    'query' => $query,
    'pagination' => [
        'pageSize' => 3,
    ],
]);
 Pjax::begin(); 
       echo GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'content',
          [
            'attribute' => 'user_id',
            'value' => 'users.username',
        ],
             [
              'attribute' => 'created_at',
               'format' =>  ['date', 'dd.MM.Y HH:mm:ss'],
             ] ,
        ],
    ]);
Pjax::end();
?>
    <h3><center>Оставить комментарий</center></h3>
        <?= $form->field($model, 'username') ?>
        
        <?= $form->field($model, 'email') ?>

                     <?= $form->field($model, 'commentText')->textarea(['rows' => 6, 'minLength'=>10]) ?>

                    <?= $form->field($model, 'verifyCode')->widget(Captcha::className(), [
                        'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6">{input}</div></div>',
                    ]) ?>
    
        <div class="form-group">
            <?= Html::submitButton('Отправить', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- ShowPost -->

