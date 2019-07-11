<?php

namespace ronash\coupon\models;

use Yii;

/**
 * This is the model class for table "coupon".
 *
 * @property int $id
 * @property string $name
 * @property string $expire_on
 * @property int $current_use
 * @property int $total_use
 * @property string $description
 * @property int $active
 * @property int $public
 * @property int $has_condition
 * @property double $min_price
 * @property double $max_price
 * @property double $discount
 * @property string $products
 */
class Coupon extends \yii\db\ActiveRecord
{
    const CONDITION_TYPE_PRICE = 'price';
    const CONDITION_TYPE_PRODUCT = 'product';
    public $use_type;


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'coupon';
    }

    public function init()
    {
        parent::init();
        if($this->isNewRecord){
            $this->active = 1;
            $this->public = 1;
            $this->has_condition = 0;
            $this->current_use = 0;
        }
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'expire_on', 'discount'], 'required'],
            [['expire_on'], 'safe'],
            [['current_use', 'total_use', 'active', 'public', 'has_condition'], 'integer'],
            [['min_price', 'max_price', 'discount'], 'number'],
            [['products','filter_by'], 'string'],
            [['name'], 'string', 'max' => 200],
            [['description'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('coupon', 'ID'),
            'name' => Yii::t('coupon', 'Name'),
            'expire_on' => Yii::t('coupon', 'Expire On'),
            'current_use' => Yii::t('coupon', 'Current Use'),
            'total_use' => Yii::t('coupon', 'Total Use'),
            'description' => Yii::t('coupon', 'Description'),
            'active' => Yii::t('coupon', 'Active'),
            'public' => Yii::t('coupon', 'Public'),
            'has_condition' => Yii::t('coupon', 'Has Condition'),
            'min_price' => Yii::t('coupon', 'Min Price'),
            'max_price' => Yii::t('coupon', 'Max Price'),
            'discount' => Yii::t('coupon', 'Discount %'),
            'products' => Yii::t('coupon', 'Products'),
        ];
    }

    /**
     * {@inheritdoc}
     * @return CouponQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CouponQuery(get_called_class());
    }
}
