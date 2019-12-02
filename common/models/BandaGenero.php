<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "bandagenero".
 *
 * @property int $IdBanda
 * @property int $IdGenero
 *
 * @property Bandas $banda
 * @property Generos $genero
 */
class BandaGenero extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'bandagenero';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['IdBanda', 'IdGenero'], 'required'],
            [['IdBanda', 'IdGenero'], 'integer'],
            [['IdBanda', 'IdGenero'], 'unique', 'targetAttribute' => ['IdBanda', 'IdGenero']],
            [['IdBanda'], 'exist', 'skipOnError' => true, 'targetClass' => Bandas::className(), 'targetAttribute' => ['IdBanda' => 'IDBanda']],
            [['IdGenero'], 'exist', 'skipOnError' => true, 'targetClass' => Generos::className(), 'targetAttribute' => ['IdGenero' => 'IDGenero']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'IdBanda' => 'Id Banda',
            'IdGenero' => 'Id Genero',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBanda()
    {
        return $this->hasOne(Bandas::className(), ['IDBanda' => 'IdBanda']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGenero()
    {
        return $this->hasOne(Generos::className(), ['IDGenero' => 'IdGenero']);
    }
}
