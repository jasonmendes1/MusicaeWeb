<?php

namespace common\models;

use Yii;

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
 * @property int $IdListaMusica
 *
 * @property Bandagenero[] $bandageneros
 * @property Generos[] $generos
 * @property Bandahabilidades[] $bandahabilidades
 * @property Habilidades[] $habilidades
 * @property Bandamembros[] $bandamembros
 * @property Musicos[] $musicos
 * @property Listamusicas $listaMusica
 * @property Bandashistorico[] $bandashistoricos
 * @property Musicos[] $musicos0
 * @property Industriabandas[] $industriabandas
 * @property Industrias[] $industrias
 * @property Listabandas[] $listabandas
 * @property Musicos[] $musicos1
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
            [['Nome', 'Descricao', 'Localizacao', 'Contacto', 'Logo', 'Removida'], 'required'],
            [['Logo'], 'string'],
            [['Removida', 'IdListaMusica'], 'integer'],
            [['Nome', 'Descricao', 'Localizacao', 'Contacto'], 'string', 'max' => 255],
            [['IdListaMusica'], 'exist', 'skipOnError' => true, 'targetClass' => Listamusicas::className(), 'targetAttribute' => ['IdListaMusica' => 'Id']],
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
            'IdListaMusica' => 'Id Lista Musica',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBandageneros()
    {
        return $this->hasMany(Bandagenero::className(), ['IdBanda' => 'Id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGeneros()
    {
        return $this->hasMany(Generos::className(), ['Id' => 'IdGenero'])->viaTable('bandagenero', ['IdBanda' => 'Id']);
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
    public function getListaMusica()
    {
        return $this->hasOne(Listamusicas::className(), ['Id' => 'IdListaMusica']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBandashistorico()
    {
        return $this->hasMany(Bandashistorico::className(), ['IdBanda' => 'Id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMusicosBandaHistorico()
    {
        return $this->hasMany(Musicos::className(), ['Id' => 'IdMusico'])->viaTable('bandashistorico', ['IdBanda' => 'Id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIndustriabandas()
    {
        return $this->hasMany(Industriabandas::className(), ['IdBanda' => 'Id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIndustrias()
    {
        return $this->hasMany(Industrias::className(), ['Id' => 'IdIndustria'])->viaTable('industriabandas', ['IdBanda' => 'Id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getListabandas()
    {
        return $this->hasMany(Listabandas::className(), ['IdBanda' => 'Id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMusicoListaBandas()
    {
        return $this->hasMany(Musicos::className(), ['Id' => 'IdMusico'])->viaTable('listabandas', ['IdBanda' => 'Id']);
    }

    public function afterSave($insert, $changedAttributes)
    {
        parent::afterSave($insert, $changedAttributes);

        //Obter dados do registo em causa
        $id=$this->id;
        $designacao=$this->designacao;
        $preco=$this->preco;
        $img=$this->img; 
        $myObj=new \stdClass();
        $myObj->id=$id;
        $myObj->designacao=$designacao;
        $myObj->preco=$preco;
        $myObj->img=$img;
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
        $username = "jason"; // set your username
        $password = "123456"; // set your password
        $client_id = "phpMQTT-publisher"; // unique!
        $mqtt = new \app\mosquitto\phpMQTT($server, $port, $client_id);
        if ($mqtt->connect(true, NULL, $username, $password)){
            $mqtt->publish($canal, $msg, 0);
            $mqtt->close();
        }
        else { file_put_contents("debug.output","Time out!"); }
    }
 
}
