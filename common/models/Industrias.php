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
}
