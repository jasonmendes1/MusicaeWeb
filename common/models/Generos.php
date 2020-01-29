<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "generos".
 *
 * @property int $Id
 * @property string $Nome
 *
 * @property Bandas[] $bandas
 * @property Musicos[] $musicos
 */
class Generos extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'generos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Nome'], 'required'],
            [['Nome'], 'string', 'max' => 25],
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
    public function getBandas()
    {
        return $this->hasMany(Bandas::className(), ['IdGenero' => 'Id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMusicos()
    {
        return $this->hasMany(Musicos::className(), ['idGenero' => 'Id']);
    }

    /*public function afterSave($insert, $changedAttributes)
    {
        parent::afterSave($insert, $changedAttributes);

        //Obter dados do registo em causa
        $Id = $this->Id;
        $Nome = $this->Nome;
        $myObj = new \stdClass();
        $myObj->Id = $Id;
        $myObj->Nome = $Nome;
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
        $myObj = new \stdClass();
        $myObj->Id = $prod_Id;
        $myObj->Nome = $prod_Nome;
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
