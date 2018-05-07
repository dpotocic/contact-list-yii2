<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use frontend\widgets\Alert;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Open+Sans:300,400,700">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
    <?php $this->beginBody() ?>
    <div class="wrap">
        <nav class="navbar-typeqast navbar-fixed-top navbar">
            <div class="container">
                <div class="navbar-header" style="text-align: center;">
                    <a class="navbar-brand" href="/">TYPEQAST</a>
                </div>
            </div>
        </nav>

        <div class="container">
        <?= $content ?>
        </div>
    </div>

    <footer class="footer">
        <div class="container">
        <p class="pull-left">&copy; TYPEQAST <?= date('Y') ?></p>
        <p class="pull-right"><?= Yii::powered() ?></p>
        </div>
    </footer>
    <style>
        body{
            background: #eee;
            font-family: 'Open Sans';
        }
        .navbar-typeqast{
            background-color: #49ACB5;
            border-bottom: 5px solid #89CBD0;
        }
        .navbar-brand{
            float: none;
        }
        .navbar-header{
            margin: 10px auto !important;
            width: 200px;
            float: none !important;
        }
        .navbar-typeqast a{
            color: #fff;
        }
        .navbar-typeqast a:hover{
            color: #eee;
        }
        hr{
            border: 2px solid #83C8CF;
        }
        a.active{
            color: #77C2CA;
            font-weight: bold;
        }
        a{
            color: #C0C8C7;
        }
        input{
            text-align: center;
            padding: 5px;
        }
        .main-links .header-container{
            display: block;
            margin: 0 auto;
        }
        .main-links input{
            width: 100%;
        }
    </style>
    <?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
