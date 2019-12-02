<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "listafotos".
 *
 * @property int $IdListaFoto
 * @property resource $Foto
 *
 * @property Industrias[] $industrias
 */
class ListaFotos extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'listafotos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Foto'], 'required'],
            [['Foto'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'IdListaFoto' => 'Id Lista Foto',
            'Foto' => 'Foto',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIndustrias()
    {
        return $this->hasMany(Industrias::className(), ['IdListaFoto' => 'IdListaFoto']);
    }
}
