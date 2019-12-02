<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "bandas".
 *
 * @property int $IDBanda
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
 * @property Listamusicas $listaMusica
 * @property Bandashistorico[] $bandashistoricos
 * @property Musicos[] $musicos
 * @property Industriabandas[] $industriabandas
 * @property Industrias[] $industrias
 * @property Listabandas[] $listabandas
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
            [['Nome', 'Descricao', 'Localizacao', 'Contacto', 'Logo', 'Removida', 'IdListaMusica'], 'required'],
            [['Logo'], 'string'],
            [['Removida', 'IdListaMusica'], 'integer'],
            [['Nome', 'Descricao', 'Localizacao', 'Contacto'], 'string', 'max' => 255],
            [['IdListaMusica'], 'exist', 'skipOnError' => true, 'targetClass' => Listamusicas::className(), 'targetAttribute' => ['IdListaMusica' => 'IDListaMusica']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'IDBanda' => 'Id Banda',
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
        return $this->hasMany(Bandagenero::className(), ['IdBanda' => 'IDBanda']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGeneros()
    {
        return $this->hasMany(Generos::className(), ['IDGenero' => 'IdGenero'])->viaTable('bandagenero', ['IdBanda' => 'IDBanda']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBandahabilidades()
    {
        return $this->hasMany(Bandahabilidades::className(), ['IdBanda' => 'IDBanda']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHabilidades()
    {
        return $this->hasMany(Habilidades::className(), ['IDHabilidade' => 'IdHabilidade'])->viaTable('bandahabilidades', ['IdBanda' => 'IDBanda']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBandamembros()
    {
        return $this->hasMany(Bandamembros::className(), ['IdBanda' => 'IDBanda']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getListaMusica()
    {
        return $this->hasOne(Listamusicas::className(), ['IDListaMusica' => 'IdListaMusica']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBandashistoricos()
    {
        return $this->hasMany(Bandashistorico::className(), ['IdBanda' => 'IDBanda']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMusicos()
    {
        return $this->hasMany(Musicos::className(), ['IDMusico' => 'IdMusico'])->viaTable('bandashistorico', ['IdBanda' => 'IDBanda']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIndustriabandas()
    {
        return $this->hasMany(Industriabandas::className(), ['IdBanda' => 'IDBanda']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIndustrias()
    {
        return $this->hasMany(Industrias::className(), ['IDIndustria' => 'IdIndustria'])->viaTable('industriabandas', ['IdBanda' => 'IDBanda']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getListabandas()
    {
        return $this->hasMany(Listabandas::className(), ['IdBanda' => 'IDBanda']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMusicos0()
    {
        return $this->hasMany(Musicos::className(), ['IDMusico' => 'IdMusico'])->viaTable('listabandas', ['IdBanda' => 'IDBanda']);
    }
}
