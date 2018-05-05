<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\ContactFavorite */

$this->title = 'Create Contact Favorite';
$this->params['breadcrumbs'][] = ['label' => 'Contact Favorites', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="contact-favorite-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
