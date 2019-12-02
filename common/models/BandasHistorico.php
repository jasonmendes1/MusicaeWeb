<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "bandashistorico".
 *
 * @property int $IdMusico
 * @property string $Duracao
 * @property int $IdBanda
 *
 * @property Bandas $banda
 * @property Musicos $musico
 */
class BandasHistorico extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'bandashistorico';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['IdMusico', 'Duracao', 'IdBanda'], 'required'],
            [['IdMusico', 'IdBanda'], 'integer'],
            [['Duracao'], 'safe'],
            [['IdMusico', 'IdBanda'], 'unique', 'targetAttribute' => ['IdMusico', 'IdBanda']],
            [['IdBanda'], 'exist', 'skipOnError' => true, 'targetClass' => Bandas::className(), 'targetAttribute' => ['IdBanda' => 'IDBanda']],
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
            'Duracao' => 'Duracao',
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
    public function getMusico()
    {
        return $this->hasOne(Musicos::className(), ['IDMusico' => 'IdMusico']);
    }
}
