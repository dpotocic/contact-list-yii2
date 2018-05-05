<?php
//BUG in yii2
namespace tests\unit\fixtures;

use yii\test\ActiveFixture;

class ContactFixture extends ActiveFixture
{
    public $modelClass = 'common\models\Contact';
}
