<?php
namespace api\rest;

use Yii;
use yii\helpers\ArrayHelper;
use yii\filters\auth\HttpBasicAuth;
use yii\filters\auth\HttpBearerAuth;
use yii\filters\auth\QueryParamAuth;
use api\filters\ErrorToExceptionFilter;
use filsh\yii2\oauth2server\filters\auth\CompositeAuth;

class ActiveController extends \yii\rest\ActiveController
{
    /**
     * @inheritdoc
     */
    public function behaviors() {
        $behaviors = parent::behaviors();

        $behaviors['corsFilter'] = [
            'class' => \yii\filters\Cors::className(),
            'cors' => [
                // restrict access to
                'Origin' => ['*'],
                'Access-Control-Request-Method' => ['GET', 'POST', 'OPTIONS', '*'],
                // Allow only POST and PUT methods
                'Access-Control-Request-Headers' => ['*'],
                // Allow only headers 'X-Wsse'
                'Access-Control-Allow-Credentials' => null,
                // Allow OPTIONS caching
                'Access-Control-Max-Age' => 86400,
                // Allow the X-Pagination-Current-Page header to be exposed to the browser.
                'Access-Control-Expose-Headers' => ['X-Pagination-Current-Page'],
                'Access-Control-Allow-Headers' => ['Content-Type']
            ],
        ];

        return $behaviors ;
    }

}