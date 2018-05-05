<?php

namespace frontend\controllers;

use Yii;
use common\models\ContactFavorite;
use common\models\search\ContactFavoriteeSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ContactFavoriteController implements the CRUD actions for ContactFavorite model.
 */
class ContactFavoriteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all ContactFavorite models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ContactFavoriteeSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ContactFavorite model.
     * @param integer $user_id
     * @param integer $contact_id
     * @return mixed
     */
    public function actionView($user_id, $contact_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($user_id, $contact_id),
        ]);
    }

    /**
     * Creates a new ContactFavorite model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new ContactFavorite();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'user_id' => $model->user_id, 'contact_id' => $model->contact_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing ContactFavorite model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $user_id
     * @param integer $contact_id
     * @return mixed
     */
    public function actionUpdate($user_id, $contact_id)
    {
        $model = $this->findModel($user_id, $contact_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'user_id' => $model->user_id, 'contact_id' => $model->contact_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing ContactFavorite model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $user_id
     * @param integer $contact_id
     * @return mixed
     */
    public function actionDelete($user_id, $contact_id)
    {
        $this->findModel($user_id, $contact_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the ContactFavorite model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $user_id
     * @param integer $contact_id
     * @return ContactFavorite the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($user_id, $contact_id)
    {
        if (($model = ContactFavorite::findOne(['user_id' => $user_id, 'contact_id' => $contact_id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
