<?php
namespace api\rest;

use Yii;
use yii\helpers\ArrayHelper;
use yii\filters\auth\HttpBasicAuth;
use yii\filters\auth\HttpBearerAuth;
use yii\filters\auth\QueryParamAuth;
use api\filters\ErrorToExceptionFilter;
use filsh\yii2\oauth2server\filters\auth\CompositeAuth;

class Controller extends \yii\rest\Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return ArrayHelper::merge(parent::behaviors(), [
                'authenticator' => [
                    'class' => CompositeAuth::className(),
                    'authMethods' => [
                        ['class' => HttpBearerAuth::className()],
                        ['class' => QueryParamAuth::className(), 'tokenParam' => 'accessToken'],
                    ]
                ],
                'exceptionFilter' => [
                    'class' => ErrorToExceptionFilter::className()
                ],
            ]);
    }
}