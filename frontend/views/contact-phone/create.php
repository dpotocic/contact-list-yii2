<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\ContactPhone */

$this->title = 'Create Contact Phone';
$this->params['breadcrumbs'][] = ['label' => 'Contact Phones', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="contact-phone-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
