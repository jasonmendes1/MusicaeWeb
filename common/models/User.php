<?php
namespace common\models;

use Yii;
use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

/**
 * User model
 *
 * @property integer $id
 * @property string $username
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $verification_token
 * @property string $email
 * @property string $auth_key
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 * @property string $password write-only password
 */
class User extends ActiveRecord implements IdentityInterface
{
    const STATUS_DELETED = 0;
    const STATUS_INACTIVE = 9;
    const STATUS_ACTIVE = 10;


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        //return '{{%user}}';
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['status', 'default', 'value' => self::STATUS_INACTIVE],
            ['status', 'in', 'range' => [self::STATUS_ACTIVE, self::STATUS_INACTIVE, self::STATUS_DELETED]],
            //[['username', 'password'], 'required'],
            //[['username', 'password'], 'string', 'max' => 30] 
        ];
    }

    public function attributeLabels()
    {
        return [
            'username' => 'Username', 'password' => 'Password'
        ];
    } 


    /**
     * {@inheritdoc}
     */
    public static function findIdentity($id)
    {
        //return static::findOne(['id' => $id, 'status' => self::STATUS_ACTIVE]);
        //return isset(self::$users[$id]) ? new static(self::$users[$id]) : null;
        return static::findOne($id); 
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        //return static::findOne(['username' => $username, 'status' => self::STATUS_ACTIVE]);
        return static::findOne(['username' => $username]); 
    }

    /**
     * Finds user by password reset token
     *
     * @param string $token password reset token
     * @return static|null
     */
    public static function findByPasswordResetToken($token)
    {
        if (!static::isPasswordResetTokenValid($token)) {
            return null;
        }

        return static::findOne([
            'password_reset_token' => $token,
            'status' => self::STATUS_ACTIVE,
        ]);
    }

    /**
     * Finds user by verification email token
     *
     * @param string $token verify email token
     * @return static|null
     */
    public static function findByVerificationToken($token) {
        return static::findOne([
            'verification_token' => $token,
            'status' => self::STATUS_INACTIVE
        ]);
    }

    /**
     * Finds out if password reset token is valid
     *
     * @param string $token password reset token
     * @return bool
     */
    public static function isPasswordResetTokenValid($token)
    {
        if (empty($token)) {
            return false;
        }

        $timestamp = (int) substr($token, strrpos($token, '_') + 1);
        $expire = Yii::$app->params['user.passwordResetTokenExpire'];
        return $timestamp + $expire >= time();
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->getPrimaryKey();
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthKey()
    {
        //return $this->auth_key;
        return null; 
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {
        //return $this->getAuthKey() === $authKey;
        return null; 
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password_hash);
        return $this->password === $password;
    }

    /**
     * Generates password hash from password and sets it to the model
     *
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password_hash = Yii::$app->security->generatePasswordHash($password);
    }

    /**
     * Generates "remember me" authentication key
     */
    public function generateAuthKey()
    {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }

    /**
     * Generates new password reset token
     */
    public function generatePasswordResetToken()
    {
        $this->password_reset_token = Yii::$app->security->generateRandomString() . '_' . time();
    }

    public function generateEmailVerificationToken()
    {
        $this->verification_token = Yii::$app->security->generateRandomString() . '_' . time();
    }

    /**
     * Removes password reset token
     */
    public function removePasswordResetToken()
    {
        $this->password_reset_token = null;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProfile()
    {
        return $this->hasOne(Profiles::className(), ['IdUser' => 'Id']);
    }

    /*public function afterSave($insert, $changedAttributes)
    {
        parent::afterSave($insert, $changedAttributes);

        //Obter dados do registo em causa
        $id = $this->id;
        $username = $this->username;
        $auth_key = $this->auth_key;
        $password_hash = $this->password_hash;
        $password_reset_token = $this->password_reset_token;
        $email = $this->email;
        $status = $this->status;
        $created_at = $this->created_at;
        $updated_at = $this->updated_at;
        $verification_token = $this->verification_token;
        $myObj = new \stdClass();
        $myObj->id = $id;
        $myObj->username = $username;
        $myObj->auth_key = $auth_key;
        $myObj->password_hash = $password_hash;
        $myObj->password_reset_token = $password_reset_token;
        $myObj->email = $email;
        $myObj->status = $status;
        $myObj->created_at = $created_at;
        $myObj->updated_at = $updated_at;
        $myObj->verification_token = $verification_token;
        $myJSON = json_encode($myObj);
        if ($insert)
            $this->FazPublish("INSERT", $myJSON);
        else
            $this->FazPublish("UPDATE", $myJSON);
    }

    public function afterDelete()
    {
        parent::afterDelete();
        $prod_id = $this->id;
        $prod_username = $this->username;
        $prod_auth_key = $this->auth_key;
        $prod_password_hash = $this->password_hash;
        $prod_password_reset_token = $this->password_reset_token;
        $prod_email = $this->email;
        $prod_status = $this->status;
        $prod_created_at = $this->created_at;
        $prod_updated_at = $this->updated_at;
        $prod_verification_token = $this->verification_token;
        $myObj = new \stdClass();
        $myObj->id = $prod_id;
        $myObj->username = $prod_username;
        $myObj->auth_key = $prod_auth_key;
        $myObj->password_hash = $prod_password_hash;
        $myObj->password_reset_token = $prod_password_reset_token;
        $myObj->email = $prod_email;
        $myObj->status = $prod_status;
        $myObj->created_at = $prod_created_at;
        $myObj->updated_at = $prod_updated_at;
        $myObj->verification_token = $prod_verification_token;
        $myJSON = json_encode($myObj);
        $this->FazPublish("DELETE", $myJSON);
    }

    public function FazPublish($canal, $msg)
    {
        $server = "127.0.0.1";
        $port = 1883;
        $username = ""; // set your username
        $password = ""; // set your password
        $client_id = "phpMQTT-publisher"; // unique!
        $mqtt = new \app\mosquitto\phpMQTT($server, $port, $client_id);
        if ($mqtt->connect(true, NULL, $username, $password)) {
            $mqtt->publish($canal, $msg, 0);
            $mqtt->close();
        } else {
            file_put_contents("debug.output", "Time out!");
        }
    }*/
    
}
