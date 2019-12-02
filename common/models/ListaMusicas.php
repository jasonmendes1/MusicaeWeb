<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "listamusicas".
 *
 * @property int $IDListaMusica
 * @property string $Nome
 * @property string $CaminhoPasta
 *
 * @property Bandas[] $bandas
 * @property Industrias[] $industrias
 */
class ListaMusicas extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'listamusicas';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Nome', 'CaminhoPasta'], 'required'],
            [['Nome', 'CaminhoPasta'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'IDListaMusica' => 'Id Lista Musica',
            'Nome' => 'Nome',
            'CaminhoPasta' => 'Caminho Pasta',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBandas()
    {
        return $this->hasMany(Bandas::className(), ['IdListaMusica' => 'IDListaMusica']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIndustrias()
    {
        return $this->hasMany(Industrias::className(), ['IdListaMusica' => 'IDListaMusica']);
    }
}
