<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "bandamembros".
 *
 * @property string $DataEntrada
 * @property int $IdBanda
 * @property int $IdMusico
 *
 * @property Bandas $banda
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
            [['DataEntrada', 'IdBanda', 'IdMusico'], 'required'],
            [['DataEntrada'], 'safe'],
            [['IdBanda', 'IdMusico'], 'integer'],
            [['IdBanda', 'IdMusico'], 'unique', 'targetAttribute' => ['IdBanda', 'IdMusico']],
            [['IdBanda'], 'exist', 'skipOnError' => true, 'targetClass' => Bandas::className(), 'targetAttribute' => ['IdBanda' => 'Id']],
            [['IdMusico'], 'exist', 'skipOnError' => true, 'targetClass' => Musicos::className(), 'targetAttribute' => ['IdMusico' => 'Id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'DataEntrada' => 'Data de Entrada',
            'IdBanda' => 'Banda',
            'IdMusico' => 'Musico',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBanda()
    {
        return $this->hasOne(Bandas::className(), ['Id' => 'IdBanda']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMusico()
    {
        return $this->hasOne(Musicos::className(), ['Id' => 'IdMusico']);
    }
}
