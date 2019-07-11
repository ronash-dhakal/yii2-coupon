<?php

use yii\helpers\Url;

return [


    // [
    // 'class'=>'\kartik\grid\DataColumn',
    // 'attribute'=>'id',
    // ],
    [
        'class' => 'kartik\grid\EditableColumn',
        'attribute' => 'name',
        /* 'readonly' => function($model, $key, $index, $widget) {
             return (!$model->active); // do not allow editing of inactive records
         },*/
        'editableOptions' => [
            'formOptions' => ['action' => ['/coupon/default/editcoupon']],
            'header' => 'Name',
            'inputType' => \kartik\editable\Editable::INPUT_TEXT,
        ],
        'hAlign' => 'left',
        'vAlign' => 'middle',

        'pageSummary' => true
    ],
    [
        'class' => 'kartik\grid\EditableColumn',
        'attribute' => 'expire_on',
        /* 'readonly' => function($model, $key, $index, $widget) {
             return (!$model->active); // do not allow editing of inactive records
         },*/
        'editableOptions' => [
            'formOptions' => ['action' => ['/coupon/default/editcoupon']],
            'header' => 'Expire on',
            'inputType' => \kartik\editable\Editable::INPUT_TEXT,

        ],
        'hAlign' => 'center',
        'vAlign' => 'middle',
        'width' => '10%',
        'pageSummary' => true
    ],

    [
        'class' => '\kartik\grid\DataColumn',
        'attribute' => 'uses',
        'value' => function ($model) {
            return $model->current_use;
        },
        'width' => '10%',
    ],
    [
        'class' => 'kartik\grid\EditableColumn',
        'attribute' => 'total_use',
        /*'readonly' => function($model, $key, $index, $widget) {
            return (!$model->active); // do not allow editing of inactive records
        },*/
        'editableOptions' => [
            'formOptions' => ['action' => ['/coupon/default/editcoupon']],
            'header' => 'Total use',
            'inputType' => \kartik\editable\Editable::INPUT_TEXT,
            'options' => [
                'pluginOptions' => ['min' => 0, 'max' => 100,'type'=>'number']
            ]
        ],
        'hAlign' => 'center',
        'vAlign' => 'middle',
        'width' => '7%',
        'pageSummary' => true
    ],
    [
        'class' => 'kartik\grid\EditableColumn',
        'attribute' => 'discount',
       /* 'readonly' => function($model, $key, $index, $widget) {
            return (!$model->active); // do not allow editing of inactive records
        },*/
        'editableOptions' => [
            'formOptions' => ['action' => ['/coupon/default/editcoupon']],
            'header' => 'Discount',
            'inputType' => \kartik\editable\Editable::INPUT_TEXT,
            'options' => [
                'pluginOptions' => ['min' => 0, 'max' => 100]
            ]
        ],
        'hAlign' => 'center',
        'vAlign' => 'middle',
        'width' => '10%',
        'pageSummary' => true
    ],

    [
        'class' => '\kartik\grid\BooleanColumn',
        'trueLabel' => 'Yes',
        'falseLabel' => 'No',
        'attribute' => 'public',
        'width' => '5%',
    ],
    [
        'class' => '\kartik\grid\BooleanColumn',
        'trueLabel' => 'Yes',
        'falseLabel' => 'No',
        'attribute' => 'has_condition',
        'width' => '10%',
    ],
    [
        'class' => 'kartik\grid\EditableColumn',
        'attribute' => 'active',

        'editableOptions' => [
            'formOptions' => ['action' => ['/coupon/default/editcoupon']],
            'header' => 'Active',
            'asPopover' => false,
            'inputType' => \kartik\editable\Editable::INPUT_RADIO_LIST,
            'data'=>[0=>'No',1=>'Yes'],
            'displayValueConfig' => [
                '0' => '<i class="glyphicon glyphicon-remove text-danger"></i>',
                '1' => '<i class="glyphicon glyphicon-ok text-success"></i>'

            ],

        ],
        'hAlign' => 'center',
        'vAlign' => 'middle',
        'pageSummary' => true
    ],
    [
        'class' => 'kartik\grid\ActionColumn',
        'template' => '{view} {update} ',
        'dropdown' => false,
        'vAlign' => 'center',
        'urlCreator' => function ($action, $model, $key, $index) {
            return Url::to([$action, 'id' => $key]);
        },
        'viewOptions' => ['role' => 'modal-remote', 'title' => 'View', 'data-toggle' => 'tooltip'],
        'updateOptions' => ['role' => 'modal-remote', 'title' => 'Update', 'data-toggle' => 'tooltip'],

    ],
    [
        'class' => 'kartik\grid\ActionColumn',
        'header' => 'Admin',
        'dropdown' => false,
        'vAlign' => 'middle',
        'urlCreator' => function ($action, $model, $key, $index) {
            return Url::to([$action, 'id' => $key]);
        },
        'template' => '{delete}',
        'deleteOptions' => ['role' => 'modal-remote', 'title' => 'Delete',
            'data-confirm' => false, 'data-method' => false,// for overide yii data api
            'data-request-method' => 'post',
            'data-toggle' => 'tooltip',
            'data-confirm-title' => 'Are you sure?',
            'data-confirm-message' => 'Are you sure want to delete this item'],
        'visible'=>Yii::$app->user->can('*')
    ],

];   