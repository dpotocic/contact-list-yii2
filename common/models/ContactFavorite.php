<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "contact_favorite".
 *
 * @property integer $user_id
 * @property integer $contact_id
 */
class ContactFavorite extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'contact_favorite';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'contact_id'], 'required'],
            [['user_id', 'contact_id'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'user_id' => 'User ID',
            'contact_id' => 'Contact ID',
        ];
    }
}
