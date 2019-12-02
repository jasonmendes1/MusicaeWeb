<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "habilidades".
 *
 * @property int $IDHabilidade
 * @property string $Nome
 *
 * @property Bandahabilidades[] $bandahabilidades
 * @property Bandas[] $bandas
 * @property Bandamembros[] $bandamembros
 * @property Musicohabilidade[] $musicohabilidades
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
            'IDHabilidade' => 'Id Habilidade',
            'Nome' => 'Nome',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBandahabilidades()
    {
        return $this->hasMany(Bandahabilidades::className(), ['IdHabilidade' => 'IDHabilidade']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBandas()
    {
        return $this->hasMany(Bandas::className(), ['IDBanda' => 'IdBanda'])->viaTable('bandahabilidades', ['IdHabilidade' => 'IDHabilidade']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBandamembros()
    {
        return $this->hasMany(Bandamembros::className(), ['Idhabilidade' => 'IDHabilidade']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMusicohabilidades()
    {
        return $this->hasMany(Musicohabilidade::className(), ['IdHabilidade' => 'IDHabilidade']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMusicos()
    {
        return $this->hasMany(Musicos::className(), ['IDMusico' => 'IdMusico'])->viaTable('musicohabilidade', ['IdHabilidade' => 'IDHabilidade']);
    }
}
