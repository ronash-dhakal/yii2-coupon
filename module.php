<?php

namespace ronash\coupon;

use yii\web\ForbiddenHttpException;

/**
 * coupon module definition class
 */
class module extends \yii\base\Module
{
    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'app\modules\coupon\controllers';
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
