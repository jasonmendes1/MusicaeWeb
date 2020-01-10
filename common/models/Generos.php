<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "generos".
 *
 * @property int $Id
 * @property string $Nome
 *
 * @property Bandas[] $bandas
 * @property Musicos[] $musicos
 */
class Generos extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'generos';
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
    public function getBandas()
    {
        return $this->hasMany(Bandas::className(), ['IdGenero' => 'Id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMusicos()
    {
        return $this->hasMany(Musicos::className(), ['idGenero' => 'Id']);
    }
}
