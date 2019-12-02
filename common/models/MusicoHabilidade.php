<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "musicohabilidade".
 *
 * @property int $IdMusico
 * @property int $IdHabilidade
 *
 * @property Habilidades $habilidade
 * @property Musicos $musico
 */
class MusicoHabilidade extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'musicohabilidade';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['IdMusico', 'IdHabilidade'], 'required'],
            [['IdMusico', 'IdHabilidade'], 'integer'],
            [['IdMusico', 'IdHabilidade'], 'unique', 'targetAttribute' => ['IdMusico', 'IdHabilidade']],
            [['IdHabilidade'], 'exist', 'skipOnError' => true, 'targetClass' => Habilidades::className(), 'targetAttribute' => ['IdHabilidade' => 'IDHabilidade']],
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
            'IdHabilidade' => 'Id Habilidade',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHabilidade()
    {
        return $this->hasOne(Habilidades::className(), ['IDHabilidade' => 'IdHabilidade']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMusico()
    {
        return $this->hasOne(Musicos::className(), ['IDMusico' => 'IdMusico']);
    }
}
