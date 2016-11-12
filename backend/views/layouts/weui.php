<?php

/* @var $this \yii\web\View */
/* @var $content string */

use drodata\helpers\Html;
use backend\assets\WeUIAppAsset;

WeUIAppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body ontouchstart>
<?php $this->beginBody() ?>

<div class="container">
<?= $content ?>
</div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
