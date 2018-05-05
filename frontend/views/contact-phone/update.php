<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\ContactPhone */

$this->title = 'Update Contact Phone: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Contact Phones', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="contact-phone-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
