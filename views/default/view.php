<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

$this->beginBlock('action');

echo Html::a(Yii::t('app', 'index'), ['/coupon'], ['class' => 'btn btn-primary', 'title' => 'Index']);


$this->endBlock();
/* @var $this yii\web\View */
/* @var $model app\models\Coupon */
?>
<div class="coupon-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [

            'description',
            'filter_by',
            'min_price',
            'max_price',
            'discount',
            'products:ntext',
        ],
    ]) ?>

</div>
