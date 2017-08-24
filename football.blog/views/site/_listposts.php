<?php
use yii\helpers\Html;
use yii\helpers\HtmlPurifier;
$site=''; if(!strpos($_SERVER['REQUEST_URI'],'/site/')){$site='site/';}
$this->registerMetaTag([
    'name' => 'Keywords',
    'content' => HtmlPurifier::process($model->tags),
]);
?>
  <style>
	.post-footer {
	margin: 20px -2px 0;
	padding: 5px 10px;
	color: #666666;
	background-color: #f9f9f9;
	border-bottom: 1px solid #eeeeee;
	line-height: 1.6;
	font-size: 90%;
	}
  </style> 

<br></br>
    <h2><?= Html::encode($model->title) ?></h2>    
     <p><? $imwidth=750;$imheight=450; require_once(Yii::$app->basePath . '/extensions/fimage.php'); ?></p>
    <?= HtmlPurifier::process(substr($model->content,0,512).'...') ?>
    <p><?= '<b><i>Теги:</i></b>'.HtmlPurifier::process($model->tags) ?></p>
    <p><a class="btn btn-lg btn-default" href="<?=$site?>users/?showid=<?=Html::encode($model->id)?>">Подробнее</a></p> 
    
<div class='post-footer'>
<div class='post-footer-line post-footer-line-1'>
Опубликовано
<span class='post-timestamp'>
в
<abbr class='published' itemprop='datePublished' title=<?=date( 'Y-m-d H:i:s',$model->created_at)?>><?=date( 'Y-m-d H:i:s',$model->created_at)?></abbr></a>
</span>
<span class='reaction-buttons'>
</span>
<span class='post-comment-link'>
<a class='comment-link' href='<?=$site?>users/?showid=<?=Html::encode($model->id)?>' onclick=''>
Комментарии пользователей:
    </a>
</span>
</div>
<div class='post-footer-line post-footer-line-2'>
<span class='post-labels'>
</span>
</div>
<div class='post-footer-line post-footer-line-3'>
<span class='post-location'>
</span>
</div>
</div>
</div>
</div>