<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "musicos".
 *
 * @property int $Id
 * @property string $NivelCompromisso
 * @property int $idProfile
 * @property int $idHabilidade
 * @property int $idGenero
 *
 * @property Bandamembros[] $bandamembros
 * @property Bandas[] $bandas
 * @property Bandashistorico[] $bandashistoricos
 * @property Bandas[] $bandas0
 * @property Profiles $profile
 * @property Generos $genero
 * @property Habilidades $habilidade
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
            [['idProfile', 'idHabilidade', 'idGenero'], 'required'],
            [['idProfile', 'idHabilidade', 'idGenero'], 'integer'],
            [['idProfile'], 'unique'],
            [['idProfile'], 'exist', 'skipOnError' => true, 'targetClass' => Profiles::className(), 'targetAttribute' => ['idProfile' => 'Id']],
            [['idGenero'], 'exist', 'skipOnError' => true, 'targetClass' => Generos::className(), 'targetAttribute' => ['idGenero' => 'Id']],
            [['idHabilidade'], 'exist', 'skipOnError' => true, 'targetClass' => Habilidades::className(), 'targetAttribute' => ['idHabilidade' => 'Id']],
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
            'idHabilidade' => 'Id Habilidade',
            'idGenero' => 'Id Genero',
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
    public function getProfile()
    {
        return $this->hasOne(Profiles::className(), ['Id' => 'idProfile']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGenero()
    {
        return $this->hasOne(Generos::className(), ['Id' => 'idGenero']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHabilidade()
    {
        return $this->hasOne(Habilidades::className(), ['Id' => 'idHabilidade']);
    }
}
