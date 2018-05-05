<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "contact".
 *
 * @property integer $id
 * @property string $first_name
 * @property string $last_name
 * @property string $profile_photo
 * @property string $email
 * @property integer $status
 * @property string $created_at
 */
class Contact extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'contact';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['email'], 'required'],
            [['status'], 'integer'],
            [['created_at'], 'safe'],
            [['first_name', 'last_name', 'profile_photo'], 'string', 'max' => 255],
            [['email'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'profile_photo' => 'Profile Photo',
            'email' => 'Email',
            'status' => 'Status',
            'created_at' => 'Created At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getContactPhone()
    {
        return $this->hasMany(ContactPhone::className(), ['contact_id' => 'id']);
    }
}
