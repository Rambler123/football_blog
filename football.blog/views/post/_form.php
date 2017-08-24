<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\file\FileInput;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model app\models\Post */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="post-form">

    <?php $form = ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data']]); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'content')->textarea(['rows' => 10]) ?>

    <?= $form->field($model, 'category_id')->dropDownList(
  ArrayHelper::map($category, 'id', 'name')
) ?>

    <?= $form->field($model, 'status')->dropDownList([
    '0' => 'Черновик',
    '1' => 'Опубликован'
]); 
?>

<?= 
    $form->field($model, 'tags')->textInput(['maxlength' => true]);
?>

    <div class="row">
        <?= $form->field($model, 'image')->fileInput();?>
   </div>
  
<div class="row">
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Добавить' : 'Обновить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
