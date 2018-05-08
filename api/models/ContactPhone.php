<?php

namespace api\models;

use Yii;

/**
 * This is the model class for table "contact_phone".
 *
 * @property integer $id
 * @property integer $contact_id
 * @property string $label
 * @property string $phone_number
 */
class ContactPhone extends \common\models\ContactPhone
{

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

/**
 *  @SWG\Definition(
 *   definition="BaseContactPhone",
 *   type="object",
 *   properties={
 *      @SWG\Property(property="id", format="int32", type="integer", example="1"),
 *      @SWG\Property(property="contact_id", format="int32", type="integer", example="1"),
 *      @SWG\Property(property="label", format="string", type="string", example="Home"),
 *      @SWG\Property(property="phone_number", format="string", type="string", example="555-5555"),
 *   }
 *  )
 */

/**
 *  @SWG\Definition(
 *   definition="ContactPhone",
 *   type="object",
 *   allOf={
 *       @SWG\Schema(ref="#/definitions/BaseContactPhone"),
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
