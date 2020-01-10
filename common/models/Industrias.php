<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "industrias".
 *
 * @property int $Id
 * @property string $Tipo
 * @property int $IdProfile
 * @property int $IdGenero
 * @property int $IdListaMusica
 * @property int $IdListaFoto
 *
 * @property Industriabandas[] $industriabandas
 * @property Bandas[] $bandas
 * @property Generos $genero
 * @property Listafotos $listaFoto
 * @property Listamusicas $listaMusica
 * @property Profiles $profile
 */
class Industrias extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'industrias';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Tipo', 'IdProfile', 'IdGenero', 'IdListaMusica', 'IdListaFoto'], 'required'],
            [['Tipo'], 'string'],
            [['IdProfile', 'IdGenero', 'IdListaMusica', 'IdListaFoto'], 'integer'],
            [['IdProfile'], 'unique'],
            [['IdGenero'], 'exist', 'skipOnError' => true, 'targetClass' => Generos::className(), 'targetAttribute' => ['IdGenero' => 'Id']],
            [['IdListaFoto'], 'exist', 'skipOnError' => true, 'targetClass' => Listafotos::className(), 'targetAttribute' => ['IdListaFoto' => 'Id']],
            [['IdListaMusica'], 'exist', 'skipOnError' => true, 'targetClass' => Listamusicas::className(), 'targetAttribute' => ['IdListaMusica' => 'Id']],
            [['IdProfile'], 'exist', 'skipOnError' => true, 'targetClass' => Profiles::className(), 'targetAttribute' => ['IdProfile' => 'Id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'Id' => 'ID',
            'Tipo' => 'Tipo',
            'IdProfile' => 'Id Profile',
            'IdGenero' => 'Id Genero',
            'IdListaMusica' => 'Id Lista Musica',
            'IdListaFoto' => 'Id Lista Foto',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIndustriabandas()
    {
        return $this->hasMany(Industriabandas::className(), ['IdIndustria' => 'Id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBandas()
    {
        return $this->hasMany(Bandas::className(), ['Id' => 'IdBanda'])->viaTable('industriabandas', ['IdIndustria' => 'Id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGenero()
    {
        return $this->hasOne(Generos::className(), ['Id' => 'IdGenero']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getListaFoto()
    {
        return $this->hasOne(Listafotos::className(), ['Id' => 'IdListaFoto']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getListaMusica()
    {
        return $this->hasOne(Listamusicas::className(), ['Id' => 'IdListaMusica']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProfile()
    {
        return $this->hasOne(Profiles::className(), ['Id' => 'IdProfile']);
    }

    public function afterSave($insert, $changedAttributes)
    {
        parent::afterSave($insert, $changedAttributes);

        //Obter dados do registo em causa
        $Id=$this->Id;
        $Nome=$this->Nome;
        $Descricao=$this->Descricao;
        $Contacto=$this->Contacto;
        $Logo=$this->Logo;
        $Removida=$this->Removida;
        $IdListaMusica=$this->IdListaMusica;
        $myObj=new \stdClass();
        $myObj->Id=$Id;
        $myObj->Nome=$Nome;
        $myObj->Descricao=$Descricao;
        $myObj->Contacto=$Contacto;
        $myObj->Logo=$Logo;
        $myObj->Removida=$Removida;
        $myObj->IdListaMusica=$IdListaMusica;
        $myJSON = json_encode($myObj);
        if($insert)
            $this->FazPublish("INSERT",$myJSON);
        else
            $this->FazPublish("UPDATE",$myJSON);
    } 

    public function afterDelete()
    {
        parent::afterDelete();
        $prod_id= $this->id;
        $myObj=new \stdClass();
        $myObj->id=$prod_id;
        $myJSON = json_encode($myObj);
        $this->FazPublish("DELETE",$myJSON);
    }

    public function FazPublish($canal,$msg)
    {
        $server = "127.0.0.1";
        $port = 1883;
        $username = ""; // set your username
        $password = ""; // set your password
        $client_id = "phpMQTT-publisher"; // unique!
        $mqtt = new \app\mosquitto\phpMQTT($server, $port, $client_id);
        if ($mqtt->connect(true, NULL, $username, $password)){
            $mqtt->publish($canal, $msg, 0);
            $mqtt->close();
        }
        else { file_put_contents("debug.output","Time out!"); }
    }
}
