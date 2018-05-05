<?php

use yii\db\Migration;

class m180505_021000_data_insert extends Migration
{

    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $data = [
            'fixtures/Contact0' => [
                'first_name' => 'donnell62',
                'last_name' => 'metz.amira',
                'email' => 'bmcglynn@yahoo.com',
            ],
            'fixtures/Contact1' => [
                'first_name' => 'kbednar',
                'last_name' => 'zgleason',
                'email' => 'lucas.johns@hotmail.com',
            ],
            'fixtures/Contact2' => [
                'first_name' => 'grady.randall',
                'last_name' => 'carol35',
                'email' => 'bmills@oconner.org',
            ],
            'fixtures/Contact3' => [
                'first_name' => 'norval.langosh',
                'last_name' => 'xoberbrunner',
                'email' => 'janiya.hudson@yahoo.com',
            ],
            'fixtures/Contact4' => [
                'first_name' => 'misael.cole',
                'last_name' => 'lisette.rempel',
                'email' => 'ellen53@watsica.com',
            ],
            'fixtures/Contact5' => [
                'first_name' => 'chasity48',
                'last_name' => 'vito.durgan',
                'email' => 'julian.tillman@hotmail.com',
            ],
            'fixtures/Contact6' => [
                'first_name' => 'muriel98',
                'last_name' => 'lincoln58',
                'email' => 'dauer@marks.com',
            ],
            'fixtures/Contact7' => [
                'first_name' => 'cremin.ewald',
                'last_name' => 'zelda99',
                'email' => 'rosella49@hotmail.com',
            ],
            'fixtures/Contact8' => [
                'first_name' => 'courtney.anderson',
                'last_name' => 'mark.cruickshank',
                'email' => 'hermiston.dandre@hilpert.com',
            ],
            'fixtures/Contact9' => [
                'first_name' => 'nblock',
                'last_name' => 'carter.abbey',
                'email' => 'trohan@yahoo.com',
            ],
        ];

        $this->batchInsert('contact',
            [
                'first_name',
                'last_name',
                'email',
            ],
            $data
        );

        $data = [
            [
                'label' => 'HOME',
                'phone_number' => '123 456',
                'contact_id' => 1,
            ],
            [
                'label' => 'HOME NEW',
                'phone_number' => '231 232',
                'contact_id' => 1,
            ],
            [
                'label' => 'FAX',
                'phone_number' => '123 456',
                'contact_id' => 1,
            ],
            [
                'label' => 'WORK',
                'phone_number' => '123 456',
                'contact_id' => 2,
            ],
            [
                'label' => 'XY',
                'phone_number' => '345 43 444',
                'contact_id' => 3,
            ],
            [
                'label' => 'MAIN',
                'phone_number' => '123 456',
                'contact_id' => 4,
            ],
            [
                'label' => 'HOME HOME',
                'phone_number' => '234 555',
                'contact_id' => 5,
            ],
            [
                'label' => 'HOME HOME',
                'phone_number' => '234 2423',
                'contact_id' => 5,
            ],
            [
                'label' => 'HOME HOME',
                'phone_number' => '356896 56',
                'contact_id' => 5,
            ],
            [
                'label' => 'HOME HOME',
                'phone_number' => '56 5675 6',
                'contact_id' => 5,
            ],
        ];

        $this->batchInsert('contact_phone',
            [
                'label',
                'phone_number',
                'contact_id',
            ],
            $data
        );
    }

    public function down()
    {
        $this->truncateTable('contact');
    }



}
