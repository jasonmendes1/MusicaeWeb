<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "bandamembros".
 *
 * @property int $IdBanda
 * @property int $IdMusico
 * @property int $Idhabilidade
 * @property string $DataEntrada
 *
 * @property Bandas $banda
 * @property Habilidades $habilidade
 * @property Musicos $musico
 */
class BandaMembros extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'bandamembros';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['IdBanda', 'IdMusico', 'Idhabilidade', 'DataEntrada'], 'required'],
            [['IdBanda', 'IdMusico', 'Idhabilidade'], 'integer'],
            [['DataEntrada'], 'safe'],
            [['IdBanda', 'IdMusico', 'Idhabilidade'], 'unique', 'targetAttribute' => ['IdBanda', 'IdMusico', 'Idhabilidade']],
            [['IdBanda'], 'exist', 'skipOnError' => true, 'targetClass' => Bandas::className(), 'targetAttribute' => ['IdBanda' => 'IDBanda']],
            [['Idhabilidade'], 'exist', 'skipOnError' => true, 'targetClass' => Habilidades::className(), 'targetAttribute' => ['Idhabilidade' => 'IDHabilidade']],
            [['IdMusico'], 'exist', 'skipOnError' => true, 'targetClass' => Musicos::className(), 'targetAttribute' => ['IdMusico' => 'IDMusico']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'IdBanda' => 'Id Banda',
            'IdMusico' => 'Id Musico',
            'Idhabilidade' => 'Idhabilidade',
            'DataEntrada' => 'Data Entrada',
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
    public function getHabilidade()
    {
        return $this->hasOne(Habilidades::className(), ['IDHabilidade' => 'Idhabilidade']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMusico()
    {
        return $this->hasOne(Musicos::className(), ['IDMusico' => 'IdMusico']);
    }
}
