<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "musicogenero".
 *
 * @property int $IdMusico
 * @property int $IdGenero
 *
 * @property Generos $genero
 * @property Musicos $musico
 */
class MusicoGenero extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'musicogenero';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['IdMusico', 'IdGenero'], 'required'],
            [['IdMusico', 'IdGenero'], 'integer'],
            [['IdMusico', 'IdGenero'], 'unique', 'targetAttribute' => ['IdMusico', 'IdGenero']],
            [['IdGenero'], 'exist', 'skipOnError' => true, 'targetClass' => Generos::className(), 'targetAttribute' => ['IdGenero' => 'IDGenero']],
            [['IdMusico'], 'exist', 'skipOnError' => true, 'targetClass' => Musicos::className(), 'targetAttribute' => ['IdMusico' => 'IDMusico']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'IdMusico' => 'Id Musico',
            'IdGenero' => 'Id Genero',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGenero()
    {
        return $this->hasOne(Generos::className(), ['IDGenero' => 'IdGenero']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMusico()
    {
        return $this->hasOne(Musicos::className(), ['IDMusico' => 'IdMusico']);
    }
}
