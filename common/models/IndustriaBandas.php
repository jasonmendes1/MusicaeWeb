<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "industriabandas".
 *
 * @property string $Duracao
 * @property int $IdIndustria
 * @property int $IdBanda
 *
 * @property Bandas $banda
 * @property Industrias $industria
 */
class IndustriaBandas extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'industriabandas';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Duracao', 'IdIndustria', 'IdBanda'], 'required'],
            [['Duracao'], 'safe'],
            [['IdIndustria', 'IdBanda'], 'integer'],
            [['IdIndustria', 'IdBanda'], 'unique', 'targetAttribute' => ['IdIndustria', 'IdBanda']],
            [['IdBanda'], 'exist', 'skipOnError' => true, 'targetClass' => Bandas::className(), 'targetAttribute' => ['IdBanda' => 'IDBanda']],
            [['IdIndustria'], 'exist', 'skipOnError' => true, 'targetClass' => Industrias::className(), 'targetAttribute' => ['IdIndustria' => 'IDIndustria']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'Duracao' => 'Duracao',
            'IdIndustria' => 'Id Industria',
            'IdBanda' => 'Id Banda',
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
    public function getIndustria()
    {
        return $this->hasOne(Industrias::className(), ['IDIndustria' => 'IdIndustria']);
    }
}
