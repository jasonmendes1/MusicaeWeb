<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "habilidades".
 *
 * @property int $Id
 * @property string $Nome
 *
 * @property Bandahabilidades[] $bandahabilidades
 * @property Bandas[] $bandas
 * @property Musicos[] $musicos
 */
class Habilidades extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'habilidades';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Nome'], 'required'],
            [['Nome'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'Id' => 'ID',
            'Nome' => 'Nome',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBandahabilidades()
    {
        return $this->hasMany(Bandahabilidades::className(), ['IdHabilidade' => 'Id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBandas()
    {
        return $this->hasMany(Bandas::className(), ['Id' => 'IdBanda'])->viaTable('bandahabilidades', ['IdHabilidade' => 'Id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMusicos()
    {
        return $this->hasMany(Musicos::className(), ['idHabilidade' => 'Id']);
    }
}
