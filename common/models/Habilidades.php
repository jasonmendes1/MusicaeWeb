<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "habilidades".
 *
 * @property int $Id
 * @property string $Nome
 *
 * @property Bandahabilidades[] $bandahabilidades
 * @property Bandas[] $bandas
 * @property Musicohabilidade[] $musicohabilidades
 * @property Musicos[] $musicos
 */
class Habilidades extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'habilidades';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Nome'], 'required'],
            [['Nome'], 'string'],
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
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBandahabilidades()
    {
        return $this->hasMany(Bandahabilidades::className(), ['IdHabilidade' => 'Id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBandas()
    {
        return $this->hasMany(Bandas::className(), ['Id' => 'IdBanda'])->viaTable('bandahabilidades', ['IdHabilidade' => 'Id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMusicohabilidades()
    {
        return $this->hasMany(Musicohabilidade::className(), ['IdHabilidade' => 'Id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMusicos()
    {
        return $this->hasMany(Musicos::className(), ['Id' => 'IdMusico'])->viaTable('musicohabilidade', ['IdHabilidade' => 'Id']);
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
