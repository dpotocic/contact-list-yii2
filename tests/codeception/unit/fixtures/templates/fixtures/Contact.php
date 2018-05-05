<?php
/**
 * @var $faker \Faker\Generator
 * @var $index integer
 */

$security = Yii::$app->getSecurity();

return [
    'first_name' => $faker->userName,
    'last_name' => $faker->userName,
    'email' => $faker->email,

];
