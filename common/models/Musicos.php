<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "musicos".
 *
 * @property int $Id
 * @property string $NivelCompromisso
 * @property int $idProfile
 * @property int $idHabilidade
 * @property int $idGenero
 *
 * @property Bandamembros[] $bandamembros
 * @property Bandas[] $bandas
 * @property Bandashistorico[] $bandashistoricos
 * @property Bandas[] $bandas0
 * @property Profiles $profile
 * @property Generos $genero
 * @property Habilidades $habilidade
 */
class Musicos extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'musicos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['NivelCompromisso'], 'string'],
            [['idProfile', 'idHabilidade', 'idGenero'], 'required'],
            [['idProfile', 'idHabilidade', 'idGenero'], 'integer'],
            [['idProfile'], 'unique'],
            [['idProfile'], 'exist', 'skipOnError' => true, 'targetClass' => Profiles::className(), 'targetAttribute' => ['idProfile' => 'Id']],
            [['idGenero'], 'exist', 'skipOnError' => true, 'targetClass' => Generos::className(), 'targetAttribute' => ['idGenero' => 'Id']],
            [['idHabilidade'], 'exist', 'skipOnError' => true, 'targetClass' => Habilidades::className(), 'targetAttribute' => ['idHabilidade' => 'Id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'Id' => 'ID',
            'NivelCompromisso' => 'Nivel Compromisso',
            'idProfile' => 'Id Profile',
            'idHabilidade' => 'Id Habilidade',
            'idGenero' => 'Id Genero',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBandamembros()
    {
        return $this->hasMany(Bandamembros::className(), ['IdMusico' => 'Id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBandas()
    {
        return $this->hasMany(Bandas::className(), ['Id' => 'IdBanda'])->viaTable('bandamembros', ['IdMusico' => 'Id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBandashistoricos()
    {
        return $this->hasMany(Bandashistorico::className(), ['IdMusico' => 'Id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBandas0()
    {
        return $this->hasMany(Bandas::className(), ['Id' => 'IdBanda'])->viaTable('bandashistorico', ['IdMusico' => 'Id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProfile()
    {
        return $this->hasOne(Profiles::className(), ['Id' => 'idProfile']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGenero()
    {
        return $this->hasOne(Generos::className(), ['Id' => 'idGenero']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHabilidade()
    {
        return $this->hasOne(Habilidades::className(), ['Id' => 'idHabilidade']);
    }

    public function afterSave($insert, $changedAttributes)
    {
        parent::afterSave($insert, $changedAttributes);

        //Obter dados do registo em causa
        $Id = $this->Id;
        $NivelCompromisso = $this->NivelCompromisso;
        $idProfile = $this->idProfile;
        $idHabilidade = $this->idHabilidade;
        $idGenero = $this->idGenero;
        $myObj = new \stdClass();
        $myObj->Id = $Id;
        $myObj->Nome = $NivelCompromisso;
        $myObj->Descricao = $idProfile;
        $myObj->Contacto = $idHabilidade;
        $myObj->Logo = $idGenero;
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
        $prod_NivelCompromisso = $this->NivelCompromisso;
        $prod_idProfile = $this->idProfile;
        $prod_idHabilidade = $this->idHabilidade;
        $prod_idGenero = $this->idGenero;
        $myObj = new \stdClass();
        $myObj->Id = $prod_Id;
        $myObj->NivelCompromisso = $prod_NivelCompromisso;
        $myObj->idProfile = $prod_idProfile;
        $myObj->idHabilidade = $prod_idHabilidade;
        $myObj->idGenero = $prod_idGenero;
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

    public function fields()
    {
        return ['Id', 'NivelCompromisso'];
    }

    public function extraFields()
    {
        return ['habilidade', 'genero'];
    }
}
