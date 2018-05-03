<?php

namespace app\models;

use Yii;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $user_name
 * @property int $online_status
 * @property string $pas_md5
 * @property string $cook_key
 * @property string $email
 * @property string $reg_date
 */
class User extends \yii\db\ActiveRecord implements IdentityInterface
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_name', 'pas_md5', 'email', 'reg_date'], 'required'],
            [['online_status'], 'integer'],
            [['reg_date'], 'safe'],
            [['user_name', 'cook_key', 'email'], 'string', 'max' => 50],
            [['pas_md5'], 'string', 'max' => 255],
            [['user_name'], 'unique'],
            [['email'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_name' => 'User Name',
            'online_status' => 'Online Status',
            'pas_md5' => 'Pas Md5',
            'cook_key' => 'Cook Key',
            'email' => 'Email',
            'reg_date' => 'Reg Date',
        ];
    }


    public function getNote()
    {
//        return $this -> hasMany(Note::class, ['user_id' => 'id']);
        return $this -> hasMany(Note::class, ['user_id' => 'id']);
    }


    public function findByUsername($username)
    {
        return static::findOne(['user_name' => $username]);
    }


    /**
     * Finds an identity by the given ID.
     * @param string|int $id the ID to be looked for
     * @return IdentityInterface the identity object that matches the given ID.
     * Null should be returned if such an identity cannot be found
     * or the identity is not in an active state (disabled, deleted, etc.)
     */
    public static function findIdentity($id)
    {
        return self::findOne($id);
    }


    /**
     * Returns an ID that can uniquely identify a user identity.
     * @return string|int an ID that uniquely identifies a user identity.
     */
    public function getId()
    {
        return $this -> id;
    }


    /**
     * Finds an identity by the given token.
     * @param mixed $token the token to be looked for
     * @param mixed $type the type of the token. The value of this parameter depends on the implementation.
     * For example, [[\yii\filters\auth\HttpBearerAuth]] will set this parameter to be `yii\filters\auth\HttpBearerAuth`.
     * @return IdentityInterface the identity object that matches the given token.
     * Null should be returned if such an identity cannot be found
     * or the identity is not in an active state (disabled, deleted, etc.)
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['cook_key' => $token]);
    }



    /**
     * Returns a key that can be used to check the validity of a given identity ID.
     *
     * The key should be unique for each individual user, and should be persistent
     * so that it can be used to check the validity of the user identity.
     *
     * The space of such keys should be big enough to defeat potential identity attacks.
     *
     * This is required if [[User::enableAutoLogin]] is enabled.
     * @return string a key that is used to check the validity of a given identity ID.
     * @see validateAuthKey()
     */
    public function getAuthKey()
    {
        return $this -> cook_key;
    }


    /**
     * Validates the given auth key.
     *
     * This is required if [[User::enableAutoLogin]] is enabled.
     * @param string $authKey the given auth key
     * @return bool whether the given auth key is valid.
     * @see getAuthKey()
     */
    public function validateAuthKey($authKey)
    {
        return $this->cook_key === $authKey;
    }


    public function createAuthKey()
    {
        $this -> cook_key = Yii::$app->security->generateRandomString();
    }

}
