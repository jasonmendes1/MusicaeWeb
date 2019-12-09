<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "musicos".
 *
 * @property int $Id
 * @property string $NivelCompromisso
 * @property int $idProfile
 *
 * @property Bandamembros[] $bandamembros
 * @property Bandas[] $bandas
 * @property Bandashistorico[] $bandashistoricos
 * @property Bandas[] $bandas0
 * @property Listabandas[] $listabandas
 * @property Bandas[] $bandas1
 * @property Musicogenero[] $musicogeneros
 * @property Generos[] $generos
 * @property Musicohabilidade[] $musicohabilidades
 * @property Habilidades[] $habilidades
 * @property Profiles $profile
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
<<<<<<< HEAD
            [['idProfile'], 'unique'],
=======
>>>>>>> 6dcff540a2a97bea937916b61583507bb3c0de40
            [['idProfile'], 'exist', 'skipOnError' => true, 'targetClass' => Profiles::className(), 'targetAttribute' => ['idProfile' => 'Id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'Id' => 'ID',
            'NivelCompromisso' => 'Nivel Compromisso',
            'idProfile' => 'Id Profile',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBandamembros()
    {
        return $this->hasMany(Bandamembros::className(), ['IdMusico' => 'Id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBandas()
    {
        return $this->hasMany(Bandas::className(), ['Id' => 'IdBanda'])->viaTable('bandamembros', ['IdMusico' => 'Id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBandashistoricos()
    {
        return $this->hasMany(Bandashistorico::className(), ['IdMusico' => 'Id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBandas0()
    {
        return $this->hasMany(Bandas::className(), ['Id' => 'IdBanda'])->viaTable('bandashistorico', ['IdMusico' => 'Id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getListabandas()
    {
        return $this->hasMany(Listabandas::className(), ['IdMusico' => 'Id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBandas1()
    {
        return $this->hasMany(Bandas::className(), ['Id' => 'IdBanda'])->viaTable('listabandas', ['IdMusico' => 'Id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMusicogeneros()
    {
        return $this->hasMany(Musicogenero::className(), ['IdMusico' => 'Id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGeneros()
    {
        return $this->hasMany(Generos::className(), ['Id' => 'IdGenero'])->viaTable('musicogenero', ['IdMusico' => 'Id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMusicohabilidades()
    {
        return $this->hasMany(Musicohabilidade::className(), ['IdMusico' => 'Id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHabilidades()
    {
        return $this->hasMany(Habilidades::className(), ['Id' => 'IdHabilidade'])->viaTable('musicohabilidade', ['IdMusico' => 'Id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProfile()
    {
        return $this->hasOne(Profiles::className(), ['Id' => 'idProfile']);
    }
}
