<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "bandahabilidades".
 *
 * @property int $IdBanda
 * @property int $IdHabilidade
 *
 * @property Bandas $banda
 * @property Habilidades $habilidade
 */
class BandaHabilidades extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'bandahabilidades';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['IdBanda', 'IdHabilidade'], 'required'],
            [['IdBanda', 'IdHabilidade'], 'integer'],
            [['IdBanda', 'IdHabilidade'], 'unique', 'targetAttribute' => ['IdBanda', 'IdHabilidade']],
            [['IdBanda'], 'exist', 'skipOnError' => true, 'targetClass' => Bandas::className(), 'targetAttribute' => ['IdBanda' => 'Id']],
            [['IdHabilidade'], 'exist', 'skipOnError' => true, 'targetClass' => Habilidades::className(), 'targetAttribute' => ['IdHabilidade' => 'Id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'IdBanda' => 'Id Banda',
            'IdHabilidade' => 'Id Habilidade',
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
    public function getHabilidade()
    {
        return $this->hasOne(Habilidades::className(), ['Id' => 'IdHabilidade']);
    }
}
