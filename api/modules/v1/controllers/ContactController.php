<?php
namespace api\modules\v1\controllers;

use api\models\Contact;
use api\models\search\ContactSearch;
use yii\filters\AccessControl;
use Yii;

class ContactController extends \api\rest\ActiveController
{
    public $modelClass = 'api\modules\v1\models\Contact';

    /*public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['access'] = [
            'class' => AccessControl::className(),
            'rules' => [
                [
                    'actions' => ['create', 'update', 'delete', 'view', 'index', 'search'],
                    'allow' => true,
                ],
            ],
        ];

        return $behaviors;
    }*/

    protected function verbs()
    {
        return [
            'index' => ['GET', 'HEAD'],
            'view' => ['GET', 'HEAD'],
            'create' => ['POST'],
            'update' => ['PUT, PATCH'],
            'delete' => ['DELETE'],
            'options' => ['OPTIONS'],
        ];
    }


    /**
     *
     * @SWG\Get(
     *    path="/contact/search",
     *    summary="Search contact list",
     *    operationId="search",
     *    tags={"contact"},
     * 	  @SWG\Parameter(
     * 			name="searchValue",
     * 			in="query",
     * 			required=true,
     * 			type="string",
     *	  ),
     *    @SWG\Response(
     *        response=200,
     *        description="successful",
     *        @SWG\Schema(ref="#/definitions/Contact")
     *    ),
     *    @SWG\Response(
     *        response="default",
     *        description="unexpected error",
     *        @SWG\Schema(ref="#/definitions/Error")
     *    )
     * )
     *
     * @return Contact|array
     */
    public function actionSearch(){

        $search = new ContactSearch();
        return $search->search(\Yii::$app->request->get(), '');

    }

}


