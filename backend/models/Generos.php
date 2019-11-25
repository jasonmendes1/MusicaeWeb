<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "generos".
 *
 * @property int $ID
 * @property string $Nome
 *
 * @property Bandagenero[] $bandageneros
 * @property Bandas[] $bandas
 * @property Musicogenero[] $musicogeneros
 * @property Musicos[] $musicos
 * @property Musicos[] $musicos0
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
            'ID' => 'ID',
            'Nome' => 'Nome',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBandageneros()
    {
        return $this->hasMany(Bandagenero::className(), ['IdGenero' => 'ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBandas()
    {
        return $this->hasMany(Bandas::className(), ['ID' => 'IdBanda'])->viaTable('bandagenero', ['IdGenero' => 'ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMusicogeneros()
    {
        return $this->hasMany(Musicogenero::className(), ['IdGenero' => 'ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMusicos()
    {
        return $this->hasMany(Musicos::className(), ['ID' => 'IdMusico'])->viaTable('musicogenero', ['IdGenero' => 'ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMusicos0()
    {
        return $this->hasMany(Musicos::className(), ['IdGenero' => 'ID']);
    }
}
