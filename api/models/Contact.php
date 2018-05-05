<?php

namespace api\models;

use Yii;

class Contact extends \common\models\Contact
{

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

    public function fields()
    {

        return [
            'id',
            'first_name',
            'last_name',
            'profile_photo',
            'email',
        ];
    }


}


/**
 *  @SWG\Definition(
 *   definition="NewContact",
 *   type="object",
 *   required={"email"},
 *   properties={
 *          @SWG\Property(property="first_name", format="string", type="string", example="John", description="Contact first name"),
 *          @SWG\Property(property="last_name", format="string", type="number", example="Doe", description="Contact last name" ),
 *          @SWG\Property(property="profile_photo", format="string", type="string", example="http://avatar.com/img.jpg", description="Link to avatar image"),
 *          @SWG\Property(property="email", format="string", type="string", example="email@example.com", description="Email"),
 *   }
 * )
 */

/**
 *  @SWG\Definition(
 *   definition="Contact",
 *   type="object",
 *   properties={
 *       @SWG\Property(property="id", format="integer", type="int"),
 *       @SWG\Property(property="first_name", format="string", type="string"),
 *      @SWG\Property(property="last_name", format="string", type="string"),
 *      @SWG\Property(property="profile_photo", format="string", type="string"),
 *      @SWG\Property(property="email", format="string", type="string"),
 *   }
 * )
 */

