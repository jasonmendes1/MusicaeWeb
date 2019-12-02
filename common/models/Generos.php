<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "generos".
 *
 * @property int $IDGenero
 * @property string $Nome
 *
 * @property Bandagenero[] $bandageneros
 * @property Bandas[] $bandas
 * @property Musicogenero[] $musicogeneros
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
            'IDGenero' => 'Id Genero',
            'Nome' => 'Nome',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBandageneros()
    {
        return $this->hasMany(Bandagenero::className(), ['IdGenero' => 'IDGenero']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBandas()
    {
        return $this->hasMany(Bandas::className(), ['IDBanda' => 'IdBanda'])->viaTable('bandagenero', ['IdGenero' => 'IDGenero']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMusicogeneros()
    {
        return $this->hasMany(Musicogenero::className(), ['IdGenero' => 'IDGenero']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMusicos()
    {
        return $this->hasMany(Musicos::className(), ['IDMusico' => 'IdMusico'])->viaTable('musicogenero', ['IdGenero' => 'IDGenero']);
    }
}
