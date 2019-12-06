<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "musicos".
 *
 * @property int $IDMusico
 * @property string $NivelCompromisso
 * @property int $idProfile
 *
 * @property Bandamembros[] $bandamembros
 * @property Bandashistorico[] $bandashistoricos
 * @property Bandas[] $bandas
 * @property Listabandas[] $listabandas
 * @property Bandas[] $bandas0
 * @property Musicogenero[] $musicogeneros
 * @property Generos[] $generos
 * @property Musicohabilidade[] $musicohabilidades
 * @property Habilidades[] $habilidades
 * @property Profiles $musico
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
            [['idProfile'], 'required'],
            [['idProfile'], 'integer'],
            [['IDMusico'], 'exist', 'skipOnError' => true, 'targetClass' => Profiles::className(), 'targetAttribute' => ['IDMusico' => 'IdProfile']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'IDMusico' => 'Id Musico',
            'NivelCompromisso' => 'Nivel Compromisso',
            'idProfile' => 'Id Profile',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBandamembros()
    {
        return $this->hasMany(Bandamembros::className(), ['IdMusico' => 'IDMusico']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBandashistoricos()
    {
        return $this->hasMany(Bandashistorico::className(), ['IdMusico' => 'IDMusico']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBandas()
    {
        return $this->hasMany(Bandas::className(), ['IDBanda' => 'IdBanda'])->viaTable('bandashistorico', ['IdMusico' => 'IDMusico']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getListabandas()
    {
        return $this->hasMany(Listabandas::className(), ['IdMusico' => 'IDMusico']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBandas0()
    {
        return $this->hasMany(Bandas::className(), ['IDBanda' => 'IdBanda'])->viaTable('listabandas', ['IdMusico' => 'IDMusico']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMusicogeneros()
    {
        return $this->hasMany(Musicogenero::className(), ['IdMusico' => 'IDMusico']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGeneros()
    {
        return $this->hasMany(Generos::className(), ['IDGenero' => 'IdGenero'])->viaTable('musicogenero', ['IdMusico' => 'IDMusico']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMusicohabilidades()
    {
        return $this->hasMany(Musicohabilidade::className(), ['IdMusico' => 'IDMusico']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHabilidades()
    {
        return $this->hasMany(Habilidades::className(), ['IDHabilidade' => 'IdHabilidade'])->viaTable('musicohabilidade', ['IdMusico' => 'IDMusico']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProfile()
    {
        return $this->hasOne(Profiles::className(), ['IdProfile' => 'IDMusico']);
    }
}
