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
            'phones' => function($model){
                    return $model->contactPhone;
                },
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
 *   definition="BaseContact",
 *   type="object",
 *   properties={
 *      @SWG\Property(property="id", format="int32", type="integer", example="1"),
 *      @SWG\Property(property="first_name", format="string", type="string", example="John"),
 *      @SWG\Property(property="last_name", format="string", type="string", example="Doe"),
 *      @SWG\Property(property="profile_photo", format="string", type="string"),
 *      @SWG\Property(property="email", format="string", type="string"),
 *   }
 *  )
 */

/**
 *  @SWG\Definition(
 *   definition="Contact",
 *   type="object",
 *   allOf={
 *       @SWG\Schema(ref="#/definitions/BaseContact"),
 *       @SWG\Definition(
 *           properties={
 *              @SWG\Property(
 *                  property="phones",
 *                  type="array",
 *                      @SWG\Items(ref="#/definitions/BaseContactPhone"),
 *              ),
 *          }
 *      ),
 *   }
 * )
 */

/**
 * Create Contact
 *
 * @SWG\Post(
 *    path="/contact/create",
 *    summary="Create new contact entry",
 *    operationId="create",
 *    tags={"contact"},
 *    @SWG\Parameter(
 *        name="contact",
 *        in="body",
 *        required=true,
 *        @SWG\Schema(ref="#/definitions/NewContact")
 *    ),
 *    @SWG\Response(
 *        response=200,
 *        description="successful"
 *    ),
 *    @SWG\Response(
 *        response="default",
 *        description="unexpected error",
 *        @SWG\Schema(ref="#/definitions/Error")
 *    )
 * )
 *
 */

/**
 * View Contact
 *
 * @SWG\Get(
 *    path="/contact/{id}",
 *    summary="View Contact",
 *    operationId="view",
 *    tags={"contact"},
 *    @SWG\Parameter(
 *        name="id",
 *        in="path",
 *        required=true,
 *        type="integer"
 *    ),
 *    @SWG\Response(
 *        response=200,
 *        description="successful",
 *        @SWG\Schema(ref="#/definitions/Contact")
 *    ),
 *    @SWG\Response(
 *        response="default",
 *        description="unexpected error",
 *        @SWG\Schema(ref="#/definitions/Error")
 *    )
 * )
 *
 */

/**
 * Update Contact
 *
 * @SWG\Put(
 *    path="/contact/update/{id}",
 *    summary="Update Contact",
 *    operationId="update",
 *    tags={"contact"},
 *    @SWG\Parameter(
 *        name="id",
 *        in="path",
 *        required=true,
 *        type="integer"
 *    ),
 *    @SWG\Parameter(
 *        name="contact",
 *        in="body",
 *        required=true,
 *        @SWG\Schema(ref="#/definitions/NewContact")
 *    ),
 *    @SWG\Response(
 *        response=200,
 *        description="successful"
 *    ),
 *    @SWG\Response(
 *        response="default",
 *        description="unexpected error",
 *        @SWG\Schema(ref="#/definitions/Error")
 *    )
 * )
 *
 */

/**
 * Delete Contact
 *
 * @SWG\Delete(
 *    path="/contact/delete/{id}",
 *    summary="Delete Contact",
 *    operationId="delete",
 *    tags={"contact"},
 *    @SWG\Parameter(
 *        name="id",
 *        in="path",
 *        required=true,
 *        type="integer"
 *    ),
 *    @SWG\Response(
 *        response=200,
 *        description="successful"
 *    ),
 *    @SWG\Response(
 *        response="default",
 *        description="unexpected error",
 *        @SWG\Schema(ref="#/definitions/Error")
 *    )
 * )
 *
 */