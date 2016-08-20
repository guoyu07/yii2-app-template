<?php

use yii\helpers\Html;
use yii\bootstrap\BaseHtml;
use common\models\Lookup;
?>
<div class="">
    <?= Html::a(
        $model->id
		, ['/file/delete', 'id' => $model->id]
		, [
			'class' => 'btn btn-xs btn-danger',
			'data' => [
                'method' => 'post',
			    'confirm' => '请再次确认',
            ],
		]
    ) ?>
</div>
