<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "habilidades".
 *
 * @property int $ID
 * @property string $Nome
 *
 * @property Bandahabilidades[] $bandahabilidades
 * @property Bandas[] $bandas
 * @property Bandamembros[] $bandamembros
 * @property Musicohabilidade[] $musicohabilidades
 * @property Musicos[] $musicos
 * @property Musicos[] $musicos0
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
            'ID' => 'ID',
            'Nome' => 'Nome',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBandahabilidades()
    {
        return $this->hasMany(Bandahabilidades::className(), ['IdHabilidade' => 'ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBandas()
    {
        return $this->hasMany(Bandas::className(), ['ID' => 'IdBanda'])->viaTable('bandahabilidades', ['IdHabilidade' => 'ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBandamembros()
    {
        return $this->hasMany(Bandamembros::className(), ['Idhabilidade' => 'ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMusicohabilidades()
    {
        return $this->hasMany(Musicohabilidade::className(), ['IdHabilidade' => 'ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMusicos()
    {
        return $this->hasMany(Musicos::className(), ['ID' => 'IdMusico'])->viaTable('musicohabilidade', ['IdHabilidade' => 'ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMusicos0()
    {
        return $this->hasMany(Musicos::className(), ['IdHabilidade' => 'ID']);
    }
}
