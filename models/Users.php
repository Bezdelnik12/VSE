<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "users".
 *
 * @property int $id
 * @property string $login
 * @property string $password
 * @property string $email
 * @property int $user_group
 * @property string $nickname
 *
 * @property Comments[] $comments
 * @property Pages[] $pages
 * @property Posts[] $posts
 */
class Users extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    public $authKey;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_group'], 'integer'],
            [['nickname'], 'required'],
            [['login', 'email', 'nickname'], 'string', 'max' => 255],
            [['password'], 'string', 'max' => 60],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'login' => 'Логин',
            'password' => 'Пароль',
            'email' => 'Email',
            'user_group' => 'Группа',
            'nickname' => 'Имя',
            'pass2' => 'pass2'
        ];
    }

    /**
     * Gets query for [[Comments]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getComments()
    {
        return $this->hasMany(Comments::className(), ['user_id' => 'id']);
    }


    /**
     * Gets query for [[Posts]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPosts()
    {
        return $this->hasMany(Posts::className(), ['autor_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentity($id)
    {
        return self::findOne(['id' => $id]);
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {

    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthKey()
    {
        return $this->authKey;
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        return Users::findOne(['login' => $username]);
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password);
    }
}
