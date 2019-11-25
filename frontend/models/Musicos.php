<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "musicos".
 *
 * @property int $ID
 * @property int $IdHabilidade
 * @property int $IdGenero
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
 * @property Generos $genero
 * @property Habilidades $habilidade
 * @property Utilizadores $iD
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
            [['IdHabilidade', 'IdGenero'], 'required'],
            [['IdHabilidade', 'IdGenero'], 'integer'],
            [['IdGenero'], 'exist', 'skipOnError' => true, 'targetClass' => Generos::className(), 'targetAttribute' => ['IdGenero' => 'ID']],
            [['IdHabilidade'], 'exist', 'skipOnError' => true, 'targetClass' => Habilidades::className(), 'targetAttribute' => ['IdHabilidade' => 'ID']],
            [['ID'], 'exist', 'skipOnError' => true, 'targetClass' => Utilizadores::className(), 'targetAttribute' => ['ID' => 'ID']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'IdHabilidade' => 'Id Habilidade',
            'IdGenero' => 'Id Genero',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBandamembros()
    {
        return $this->hasMany(Bandamembros::className(), ['IdMusico' => 'ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBandashistoricos()
    {
        return $this->hasMany(Bandashistorico::className(), ['IdMusico' => 'ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBandas()
    {
        return $this->hasMany(Bandas::className(), ['ID' => 'IdBanda'])->viaTable('bandashistorico', ['IdMusico' => 'ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getListabandas()
    {
        return $this->hasMany(Listabandas::className(), ['IdMusico' => 'ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBandas0()
    {
        return $this->hasMany(Bandas::className(), ['ID' => 'IdBanda'])->viaTable('listabandas', ['IdMusico' => 'ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMusicogeneros()
    {
        return $this->hasMany(Musicogenero::className(), ['IdMusico' => 'ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGeneros()
    {
        return $this->hasMany(Generos::className(), ['ID' => 'IdGenero'])->viaTable('musicogenero', ['IdMusico' => 'ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMusicohabilidades()
    {
        return $this->hasMany(Musicohabilidade::className(), ['IdMusico' => 'ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHabilidades()
    {
        return $this->hasMany(Habilidades::className(), ['ID' => 'IdHabilidade'])->viaTable('musicohabilidade', ['IdMusico' => 'ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGenero()
    {
        return $this->hasOne(Generos::className(), ['ID' => 'IdGenero']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHabilidade()
    {
        return $this->hasOne(Habilidades::className(), ['ID' => 'IdHabilidade']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUtilizador()
    {
        return $this->hasOne(Utilizadores::className(), ['ID' => 'ID']);
    }
}
