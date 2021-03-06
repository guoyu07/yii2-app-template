<?php
use drodata\helpers\Html;
use drodata\widgets\Box;
use drodata\models\Lookup;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;

/* @var $this yii\web\View */

$this->title = 'Select2';
$this->params = [
    'title' => $this->title,
    'breadcrumbs' => [
        ['label' => 'Index', 'url' => 'index'],
        $this->title,
    ],
];

$model = new Lookup();
$lists = Lookup::items('UserStatus');

$js = <<<JS
$('.select-modal').click(function(){
    $.get(APP.baseUrl + 'demo/ajax-get-select-modal', function(response) {
        $(response).appendTo('body');

        $('#select2-modal').modal().on('shown.bs.modal', function (e) {
            $(this).attr('tabindex', false)
        })
    });
});
JS;
$this->registerJs($js);
?>
<div class="row">
<div class="col-lg-6 col-lg-offset-3 col-md-12">
<?php
Box::begin([
    'title' => $this->title,
    'tools' => [
    ],
]);
?>
    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'id')->dropDownList($lists) ?>

    <?php
    echo $form->field($model, 'name')->widget(Select2::classname(), [
        'data' => $lists,
        'options' => ['placeholder' => '请选择'],
        'addon' => [
            'append' => [
                'content' => Html::button(Html::icon('plus'), [
                    'class' => 'btn btn-default modal-create-customer', 
                    'title' => '新建', 
                ]),
                'asButton' => true
            ]
        ],
    ]);
    ?>

    <div class="form-group">
        <?= Html::button('通过 AJAX 的方式显示含有 Select2 widget 的 Modal', ['class' => 'btn btn-primary select-modal']) ?>
    </div>

    <?php ActiveForm::end(); ?>

<?php Box::end();?>
</div>
</div>
