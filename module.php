<?php

namespace ronash\coupon;

use yii\web\ForbiddenHttpException;

/**
 * coupon module definition class
 */
class module extends \yii\base\Module
{
    const VERSION = '1';

    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'ronash\coupon\controllers';
    public $layout = '@app/modules/backend/views/layouts/main';



    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
        if(!\Yii::$app->user->can('admin')){
            throw new ForbiddenHttpException('You are not allowed to perform this action.');
        }
    }
}
