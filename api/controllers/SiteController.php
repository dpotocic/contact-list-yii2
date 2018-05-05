<?php

namespace api\controllers;

use yii\base\Event;
use yii\base\InvalidParamException;
use yii\filters\AccessControl;
use yii\filters\auth\CompositeAuth;
use yii\filters\auth\QueryParamAuth;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use yii\helpers\Json;
use yii\helpers\Url;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\web\Response;
use Yii;
use yii\web\User;

/**
 * Site controller
 */
class SiteController extends Controller
{
    public function actions()
    {
        return [
            'doc' => [
                'class' => 'light\swagger\SwaggerAction',
                'restUrl' => Yii::$app->urlManager->createAbsoluteUrl('/api'),
            ],
            'api' => [
                'class' => 'light\swagger\SwaggerApiAction',
                'scanDir' => [
                    Yii::getAlias('@api'),
                ],
            ],
        ];
    }
}


