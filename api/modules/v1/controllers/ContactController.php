<?php
namespace api\modules\v1\controllers;

use api\models\Contact;
use common\models\search\ContactSearch;
use yii\filters\AccessControl;
use Yii;

class ContactController extends \api\rest\ActiveController
{
    public $modelClass = 'api\models\Bill';

    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['access'] = [
            'class' => AccessControl::className(),
            'rules' => [
                [
                    'actions' => ['search'],
                    'allow' => true,
                    'roles' => [],
                ],
            ],
        ];

        return $behaviors;
    }

    protected function verbs()
    {
        return [
            'report' => ['POST'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        $actions = parent::actions();

        //unset($actions['view']);
        unset($actions['delete']);
        //unset($actions['update']);
        unset($actions['create']);

        return $actions;
    }

    /**
     *
     * @SWG\Post(
     *    path="/contact/search",
     *    summary="Search contact list",
     *    operationId="search",
     *    tags={"contact"},
     * 	  @SWG\Parameter(
     * 			name="",
     * 			in="body",
     * 			required=true,
     * 			@SWG\Schema(ref="#/definitions/NewContact"),
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
     * @return Bill|array
     */
    public function actionSearch(){

        $search = new ContactSearch();
        return $search->search(\Yii::$app->request->get(), '');

    }
}