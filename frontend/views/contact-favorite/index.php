<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\ContactFavoriteeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Contact Favorites';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="contact-favorite-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Contact Favorite', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'user_id',
            'contact_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
