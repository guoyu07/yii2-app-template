<?php
Yii::$container->set('yii\grid\GridView', [
    'options' => ['class' => 'table-responsive grid-view'],
    'tableOptions' => [
        'class' => 'table table-striped table-hover',
    ],
]);

Yii::$container->set('yii\widgets\ListView', [
    'layout' => "{summary}\n{items}\n<div class=\"col-sm-12\">{pager}</div>",
    'summaryOptions' => ['class' => 'col-sm-12'],
    'emptyTextOptions' => ['class' => 'col-sm-12'],
]);

/**
 * Attribute hints 改用 Bootstrap Popover 显示
 */
Yii::$container->set('yii\bootstrap\ActiveForm', [
    'fieldClass' => 'drodata\bootstrap\ActiveField',
]);
