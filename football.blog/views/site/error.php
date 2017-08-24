<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;

$this->title = $name;
?>
<div class="site-error"> 

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="alert alert-danger">
        <?= nl2br(Html::encode($message)) ?>
    </div>

    <p>
        а逸﹫ힺ���颪ힺ���񦡮Ⱡ⯲룠򳱠 㦡-򦱢汮ꬊ    </p>
    <p>
        Ү鳥  㯧槠﹨⫥. үᲨ⬮
    </p>

</div>
