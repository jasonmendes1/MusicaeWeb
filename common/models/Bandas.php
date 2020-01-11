<?php

namespace common\models;

use Yii;
use yii\web\Link;
use yii\helpers\Url;

/**
 * This is the model class for table "bandas".
 *
 * @property int $Id
 * @property string $Nome
 * @property string $Descricao
 * @property string $Localizacao
 * @property string $Contacto
 * @property resource $Logo
 * @property int $Removida
 * @property int $IdGenero
 *
 * @property Bandahabilidades[] $bandahabilidades
 * @property Habilidades[] $habilidades
 * @property Bandamembros[] $bandamembros
 * @property Musicos[] $musicos
 * @property Generos $genero
 * @property Bandashistorico[] $bandashistoricos
 * @property Musicos[] $musicos0
 */
class Bandas extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'bandas';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Nome', 'Descricao', 'Localizacao', 'Contacto', 'Logo', 'Removida', 'IdGenero'], 'required'],
            [['Logo'], 'string'],
            [['Removida', 'IdGenero'], 'integer'],
            [['Nome', 'Descricao', 'Localizacao', 'Contacto'], 'string', 'max' => 255],
            [['IdGenero'], 'exist', 'skipOnError' => true, 'targetClass' => Generos::className(), 'targetAttribute' => ['IdGenero' => 'Id']],
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
            'Descricao' => 'Descricao',
            'Localizacao' => 'Localizacao',
            'Contacto' => 'Contacto',
            'Logo' => 'Logo',
            'Removida' => 'Removida',
            'IdGenero' => 'Id Genero',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBandahabilidades()
    {
        return $this->hasMany(Bandahabilidades::className(), ['IdBanda' => 'Id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHabilidades()
    {
        return $this->hasMany(Habilidades::className(), ['Id' => 'IdHabilidade'])->viaTable('bandahabilidades', ['IdBanda' => 'Id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBandamembros()
    {
        return $this->hasMany(Bandamembros::className(), ['IdBanda' => 'Id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMusicos()
    {
        return $this->hasMany(Musicos::className(), ['Id' => 'IdMusico'])->viaTable('bandamembros', ['IdBanda' => 'Id']);
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
    public function getBandashistoricos()
    {
        return $this->hasMany(Bandashistorico::className(), ['IdBanda' => 'Id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMusicos0()
    {
        return $this->hasMany(Musicos::className(), ['Id' => 'IdMusico'])->viaTable('bandashistorico', ['IdBanda' => 'Id']);
    }

    public function afterSave($insert, $changedAttributes)
    {
        parent::afterSave($insert, $changedAttributes);

        //Obter dados do registo em causa
        $Id = $this->Id;
        $Nome = $this->Nome;
        $Descricao = $this->Descricao;
        $Contacto = $this->Contacto;
        $Logo = $this->Logo;
        $Removida = $this->Removida;
        $myObj = new \stdClass();
        $myObj->Id = $Id;
        $myObj->Nome = $Nome;
        $myObj->Descricao = $Descricao;
        $myObj->Contacto = $Contacto;
        $myObj->Logo = $Logo;
        $myObj->Removida = $Removida;
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
        $prod_Descricao = $this->Descricao;
        $prod_Contacto = $this->Contacto;
        $prod_Logo = $this->Logo;
        $prod_Removida = $this->Removida;
        $myObj = new \stdClass();
        $myObj->Id = $prod_Id;
        $myObj->Nome = $prod_Nome;
        $myObj->Descricao = $prod_Descricao;
        $myObj->Contacto = $prod_Contacto;
        $myObj->Logo = $prod_Logo;
        $myObj->Removida = $prod_Removida;
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
        return ['Id', 'Nome', 'Descricao', 'Contacto', 'Logo', 'Removida'];
    }

    public function extraFields()
    {
        return ['genero'];
    }
}
