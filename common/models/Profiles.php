<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "profiles".
 *
 * @property int $Id
 * @property string $Nome
 * @property string $Sexo
 * @property string $DataNac
 * @property string $Descricao
 * @property resource $Foto
 * @property string $Localidade
 * @property int $IdUser
 *
 * @property Musicos $musicos
 * @property User $user
 */
class Profiles extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'profiles';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Nome', 'Sexo', 'DataNac', 'Descricao', 'Localidade', 'IdUser'], 'required'],
            [['DataNac'], 'safe'],
            [['Foto'], 'string'],
            [['IdUser'], 'integer'],
            [['Nome', 'Sexo', 'Descricao', 'Localidade'], 'string', 'max' => 255],
            [['IdUser'], 'unique'],
            [['IdUser'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['IdUser' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'Id' => 'ID',
            'Nome' => 'Nome',
            'Sexo' => 'Sexo',
            'DataNac' => 'Data Nac',
            'Descricao' => 'Descricao',
            'Foto' => 'Foto',
            'Localidade' => 'Localidade',
            'IdUser' => 'Id User',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMusicos()
    {
        return $this->hasOne(Musicos::className(), ['idProfile' => 'Id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'IdUser']);
    }

    public function afterSave($insert, $changedAttributes)
    {
        parent::afterSave($insert, $changedAttributes);

        //Obter dados do registo em causa
        $Id = $this->Id;
        $Nome = $this->Nome;
        $Sexo = $this->Sexo;
        $DataNac = $this->DataNac;
        $Descricao = $this->Descricao;
        $Foto = $this->Foto;
        $Localidade = $this->Localidade;
        $IdUser = $this->IdUser;
        $myObj = new \stdClass();
        $myObj->Id = $Id;
        $myObj->Nome = $Nome;
        $myObj->Sexo = $Sexo;
        $myObj->DataNac = $DataNac;
        $myObj->Descricao = $Descricao;
        $myObj->Foto = $Foto;
        $myObj->Localidade = $Localidade;
        $myObj->IdUser = $IdUser;
        $myJSON = json_encode($myObj);
        if ($insert)
            $this->FazPublish("INSERT", $myJSON);
        else
            $this->FazPublish("UPDATE", $myJSON);
    }

    public function afterDelete()
    {
        parent::afterDelete();
        $prod_Id = $this->Id;
        $prod_Nome = $this->Nome;
        $prod_Sexo = $this->Sexo;
        $prod_DataNac = $this->DataNac;
        $prod_Descricao = $this->Descricao;
        $prod_Foto = $this->Foto;
        $prod_Localidade = $this->Localidade;
        $prod_IdUser = $this->IdUser;
        $myObj = new \stdClass();
        $myObj->Id = $prod_Id;
        $myObj->Nome = $prod_Nome;
        $myObj->Sexo = $prod_Sexo;
        $myObj->DataNac = $prod_DataNac;
        $myObj->Descricao = $prod_Descricao;
        $myObj->Foto = $prod_Foto;
        $myObj->Localidade = $prod_Localidade;
        $myObj->IdUser = $prod_IdUser;
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
    }
}
