<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "utilizadores".
 *
 * @property int $ID
 * @property string $Nome
 * @property string $Sexo
 * @property string $DataNac
 * @property string $Descricao
 * @property resource $Foto
 * @property string $Localidade
 * @property string $Experiencia
 *
 * @property Industrias $industrias
 * @property Musicos $musicos
 */
class Utilizadores extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'utilizadores';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Nome', 'Sexo', 'DataNac', 'Descricao', 'Foto', 'Localidade', 'Experiencia'], 'required'],
            [['DataNac'], 'safe'],
            [['Foto', 'Experiencia'], 'string'],
            [['Nome', 'Sexo', 'Descricao', 'Localidade'], 'string', 'max' => 255],
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
            'Sexo' => 'Sexo',
            'DataNac' => 'Data Nac',
            'Descricao' => 'Descricao',
            'Foto' => 'Foto',
            'Localidade' => 'Localidade',
            'Experiencia' => 'Experiencia',
        ];
    }
}
