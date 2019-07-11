<?php
/**
 * Created by PhpStorm.
 * User: ronash
 * Date: 2019-05-29
 * Time: 13:05
 */

namespace ronash\coupon;


use yii\web\AssetBundle;

class NotyAsset extends AssetBundle
{

    public $sourcePath = '@bower/noty/lib/';
    public $css = [
        'noty.css',
    ];
    public $js = [
        'noty.js'
    ];



}
