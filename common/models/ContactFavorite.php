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

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getContact()
    {
        return $this->hasMany(ContactPhone::className(), ['id' => 'contact_id']);
    }
}

/**
 *  @SWG\Definition(
 *   definition="BaseContactFavorite",
 *   type="object",
 *   properties={
 *      @SWG\Property(property="user_id", format="int32", type="integer", example="1"),
 *      @SWG\Property(property="contact_id", format="int32", type="integer", example="1"),
 *   }
 *  )
 */

/**
 *  @SWG\Definition(
 *   definition="ContactFavorite",
 *   type="object",
 *   allOf={
 *       @SWG\Schema(ref="#/definitions/BaseContactFavorite"),
 *       @SWG\Definition(
 *           properties={
 *              @SWG\Property(
 *                  property="contact",
 *                  type="array",
 *                      @SWG\Items(ref="#/definitions/BaseContact"),
 *              ),
 *          }
 *      ),
 *   }
 * )
 */
