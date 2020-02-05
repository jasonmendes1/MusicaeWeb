<?php

namespace frontend\models;

use common\models\Generos;
use common\models\Habilidades;
use Yii;
use yii\base\Model;
use common\models\User;
use common\models\Profiles;
use common\models\Musicos;
use yii\helpers\BaseVarDumper;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $username;
    public $email;
    public $password;
    public $Nome;
    public $Sexo;
    public $DataNac;
    public $Descricao;
    public $Foto;
    public $Localidade;
    public $IdUser;
    public $NivelCompromisso;
    public $idProfile;
    public $idGenero;
    public $idHabilidade;


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['username', 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This username has already been taken.'],
            ['username', 'string', 'min' => 2, 'max' => 255],
            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This email address has already been taken.'],
            ['password', 'required'],
            ['password', 'string', 'min' => 6],

            [['Nome', 'Sexo', 'DataNac', 'Descricao', 'Localidade'], 'required'],
            [['DataNac'], 'safe'],
            [['Foto'], 'string'],
            [['IdUser'], 'integer'],
            [['Nome', 'Sexo', 'Descricao', 'Localidade'], 'string', 'max' => 80],
            [['IdUser'], 'unique'],
            [['IdUser'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['IdUser' => 'id']],

            [['NivelCompromisso', 'idHabilidade', 'idGenero'], 'required'],
            [['NivelCompromisso'], 'string'],
            ['NivelCompromisso', 'in', 'range' => ['Diversao','Moderadamente Comprometido','Comprometido','Muito Comprometido','Tour']],
            [['idProfile', 'idHabilidade', 'idGenero'], 'integer'],
            [['idProfile'], 'unique'],
            [['idProfile'], 'exist', 'skipOnError' => true, 'targetClass' => Profiles::className(), 'targetAttribute' => ['idProfile' => 'Id']],
            [['idGenero'], 'exist', 'skipOnError' => true, 'targetClass' => Generos::className(), 'targetAttribute' => ['idGenero' => 'Id']],
            [['idHabilidade'], 'exist', 'skipOnError' => true, 'targetClass' => Habilidades::className(), 'targetAttribute' => ['idHabilidade' => 'Id']],
        ];
    }

    public function attributeLabels()
    {
        return [
            'DataNac' => 'Data de Nascimento',
            'Descricao' => 'Descrição',
            'NivelCompromisso' => 'Nivel de Compromisso',
            'idGenero' => 'Género',
            'idHabilidade' => 'Habilidade',
        ];
    }

    /**
     * Signs user up.
     *
     * @return bool whether the creating new account was successful and email was sent
     */

    public function signup()
    {
        if ($this->validate()) {
            $user = new User();
            $user->username = $this->username;
            $user->email = $this->email;
            $user->setPassword($this->password);
            $user->generateAuthKey();

            $profile = new Profiles();
            $profile->Nome = $this->Nome;
            $profile->Sexo = $this->Sexo;
            $profile->DataNac = $this->DataNac;
            $profile->Descricao = $this->Descricao;
            $profile->Foto = null;
            $profile->Localidade = $this->Localidade;

            $user->save(false);
            $profile->IdUser = $user->getId();
            $profile->save(false);

            $musico = new Musicos();
            $musico->NivelCompromisso = $this->NivelCompromisso;
            $musico->idHabilidade = $this->idHabilidade;
            $musico->idGenero = $this->idGenero;

            $musico->idProfile = $profile->Id;
            $musico->save(false);

            /*$auth = \Yii::$app->authManager;
            $userRole = $auth->getRole('user');
            $auth->assign($userRole, $user->getId());*/

            return $user;
        }
        return null;
    }

    /**
     * Sends confirmation email to user
     * @param User $user user model to with email should be send
     * @return bool whether the email was sent
     */
    protected function sendEmail($user)
    {
        return Yii::$app
            ->mailer
            ->compose(
                ['html' => 'emailVerify-html', 'text' => 'emailVerify-text'],
                ['user' => $user]
            )
            ->setFrom([Yii::$app->params['supportEmail'] => Yii::$app->name . ' robot'])
            ->setTo($this->email)
            ->setSubject('Account registration at ' . Yii::$app->name)
            ->send();
    }
}
