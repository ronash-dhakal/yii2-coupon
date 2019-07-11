<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
\app\modules\coupon\CouponAsset::register($this);
/* @var $this yii\web\View */
/* @var $model app\models\Coupon */
/* @var $form yii\widgets\ActiveForm */

$this->beginBlock('action');

echo Html::a(Yii::t('app', 'index'), ['/coupon'], ['class' => 'btn btn-primary', 'title' => 'Index']);


$this->endBlock();
?>

<div class="coupon-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <div class="row">
        <div class="col-sm-6 col-sm-6">
            <?= $form->field($model, 'active')->checkbox() ?>

            <?= $form->field($model, 'public')->checkbox() ?>

            <?= $form->field($model, 'expire_on')->widget(\yii\jui\DatePicker::className(),[
                'language' => Yii::$app->utilities->getLang(),
                'dateFormat' => 'yyyy-MM-dd',
            ]) ?>

            <?= $form->field($model, 'has_condition')->checkbox() ?>



        </div>
        <div class="col-sm-6 col-sm-6">

            <strong>Current use:  <?= Yii::$app->formatter->asInteger($model->current_use); ?></strong>
            <?php
            if($model->total_use > 0){
                $model->use_type = 1;
            }
            ?>

            <?= $form->field($model, 'use_type')->dropDownList(['0'=>'unlimited','1'=>'Limited to'])?>
            <?= $form->field($model, 'total_use')->textInput(['type'=>'number']) ?>

        </div>
    </div>

    <div class="well well-sm" id="conditions" <?= ($model->has_condition)?"style='display:block'":null ?>>
        <h3>Conditions</h3>

        <?= $form->field($model, 'filter_by')->radioList([
                'price'=>'Price Range',
                'product'=>'Products',
        ],[
                'class'=>'filter-type'
        ]) ?>
        <?= $form->field($model, 'min_price')->textInput() ?>

        <?= $form->field($model, 'max_price')->textInput() ?>

        <div class="form-group field-coupon-products">
            <label class="control-label" for="coupon-description">Search <?=$model->getAttributeLabel('products')?></label>
            <input type="text" id="product-search" class="form-control"  maxlength="255" >
            <div class="help-block"></div>
        </div>
        <div id="search-data" style="display: none">

        </div>

        <?= $form->field($model, 'products')->textarea(['rows' => 6]) ?>
    </div>









    <?= $form->field($model, 'discount')->textInput() ?>

  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? Yii::t('coupon', 'Create') : Yii::t('coupon', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
