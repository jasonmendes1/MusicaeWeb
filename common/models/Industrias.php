<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "industrias".
 *
 * @property int $IDIndustria
 * @property string $Tipo
 * @property int $IdGenero
 * @property int $IdListaMusica
 * @property int $IdListaFoto
 *
 * @property Industriabandas[] $industriabandas
 * @property Bandas[] $bandas
 * @property Profiles $industria
 * @property Listafotos $listaFoto
 * @property Listamusicas $listaMusica
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
            [['Tipo', 'IdGenero', 'IdListaMusica', 'IdListaFoto'], 'required'],
            [['Tipo'], 'string'],
            [['IdGenero', 'IdListaMusica', 'IdListaFoto'], 'integer'],
            [['IDIndustria'], 'exist', 'skipOnError' => true, 'targetClass' => Profiles::className(), 'targetAttribute' => ['IDIndustria' => 'IdProfile']],
            [['IdListaFoto'], 'exist', 'skipOnError' => true, 'targetClass' => Listafotos::className(), 'targetAttribute' => ['IdListaFoto' => 'IdListaFoto']],
            [['IdListaMusica'], 'exist', 'skipOnError' => true, 'targetClass' => Listamusicas::className(), 'targetAttribute' => ['IdListaMusica' => 'IDListaMusica']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'IDIndustria' => 'Id Industria',
            'Tipo' => 'Tipo',
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
        return $this->hasMany(Industriabandas::className(), ['IdIndustria' => 'IDIndustria']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBandas()
    {
        return $this->hasMany(Bandas::className(), ['IDBanda' => 'IdBanda'])->viaTable('industriabandas', ['IdIndustria' => 'IDIndustria']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIndustria()
    {
        return $this->hasOne(Profiles::className(), ['IdProfile' => 'IDIndustria']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getListaFoto()
    {
        return $this->hasOne(Listafotos::className(), ['IdListaFoto' => 'IdListaFoto']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getListaMusica()
    {
        return $this->hasOne(Listamusicas::className(), ['IDListaMusica' => 'IdListaMusica']);
    }
}
