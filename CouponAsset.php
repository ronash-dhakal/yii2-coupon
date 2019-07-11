<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace ronash\coupon;


use yii\web\AssetBundle;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class CouponAsset extends AssetBundle
{
    public $sourcePath = '@ronash/coupon/assets';
    public $baseUrl = '@web';
    public $css = [
      'coupon.css'
    ];
    public $js = [
        'coupon.js'
    ];

    public $depends = [
        'yii\web\YiiAsset',
        'ronash\coupon\NotyAsset'
    ];
}
