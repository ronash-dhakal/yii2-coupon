<?php

namespace ronash\coupon\models;

/**
 * This is the ActiveQuery class for [[Coupon]].
 *
 * @see Coupon
 */
class CouponQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Coupon[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Coupon|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
