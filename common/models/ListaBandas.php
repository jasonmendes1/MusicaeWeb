<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "listabandas".
 *
 * @property int $IdMusico
 * @property int $IdBanda
 *
 * @property Bandas $banda
 * @property Musicos $musico
 */
class ListaBandas extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'listabandas';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['IdMusico', 'IdBanda'], 'required'],
            [['IdMusico', 'IdBanda'], 'integer'],
            [['IdMusico', 'IdBanda'], 'unique', 'targetAttribute' => ['IdMusico', 'IdBanda']],
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
            'IdMusico' => 'Id Musico',
            'IdBanda' => 'Id Banda',
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
