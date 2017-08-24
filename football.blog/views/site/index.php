<?php

/* @var $this yii\web\View */

$this->title = 'Блог о футболе';
use yii\helpers\Html;
use app\models\Category;
use app\models\Post;
use yii\data\ActiveDataProvider; 
use yii\widgets\ListView;
use yii\bootstrap\ActiveForm;
?>
<div class="site-index">
<?php   
if(id<>NULL)
    {
    $query=Post::find()->filterWhere(['=', 'id', $_GET['id']]);
    $category = Category::find()->filterWhere(['=', 'id', $_GET['id']])->all();
    }
    else
    {
    $query=Post::find();
    $category = Category::find()->orderBy('name')->all();
    }
$imgs=NULL;
foreach ($category as $categor)
{
      $imgs[]= ['image' => '/web/uploads/'.Html::encode("{$categor->image_web_filename}")];
 }
echo linchpinstudios\backstretch\Backstrech::widget([
      'options' => [
          'duration' => 5000,
          'fade' => 750,
      ],  
                    'clickEvent' => false,                    
                    'images' => $imgs,
                  ]);
$dataProviderPost = new ActiveDataProvider([
    'query' => $query,
    'pagination' => [
        'pageSize' =>1,
    ],
]);
?>
<div style="background-color:white;padding:20px;">
<? 
echo ListView::widget([
    'dataProvider' => $dataProviderPost,
    'itemView' => '_listposts',
    'summary' => '',

]);
?>
</div>
</div>
