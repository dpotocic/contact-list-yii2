<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "contact_phone".
 *
 * @property integer $id
 * @property integer $contact_id
 * @property string $label
 * @property string $phone_number
 */
class ContactPhone extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'contact_phone';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['contact_id', 'label', 'phone_number'], 'required'],
            [['contact_id'], 'integer'],
            [['label', 'phone_number'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'contact_id' => 'Contact ID',
            'label' => 'Label',
            'phone_number' => 'Phone Number',
        ];
    }
}
