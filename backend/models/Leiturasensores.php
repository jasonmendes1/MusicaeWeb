<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "leiturasensores".
 *
 * @property int $id
 * @property float $Temperatura
 * @property int $Humidade
 * @property float $Luminosidade
 * @property string $Descricao
 */
class Leiturasensores extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'leiturasensores';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'Temperatura', 'Humidade', 'Luminosidade', 'Descricao'], 'required'],
            [['id', 'Humidade'], 'integer'],
            [['Temperatura', 'Luminosidade'], 'number'],
            [['Descricao'], 'string'],
            [['id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'Temperatura' => 'Temperatura',
            'Humidade' => 'Humidade',
            'Luminosidade' => 'Luminosidade',
            'Descricao' => 'Descricao',
        ];
    }
}
