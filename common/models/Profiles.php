<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "profiles".
 *
 * @property int $Id
 * @property string $Nome
 * @property string $Sexo
 * @property string $DataNac
 * @property string $Descricao
 * @property resource $Foto
 * @property string $Localidade
 * @property int $IdUser
 *
 * @property Musicos $musicos
 * @property User $user
 */
class Profiles extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'profiles';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Nome', 'Sexo', 'DataNac', 'Descricao', 'Localidade', 'IdUser'], 'required'],
            [['DataNac'], 'safe'],
            [['Foto'], 'string'],
            [['IdUser'], 'integer'],
            [['Nome', 'Sexo', 'Descricao', 'Localidade'], 'string', 'max' => 255],
            [['IdUser'], 'unique'],
            [['IdUser'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['IdUser' => 'id']],
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
            'Sexo' => 'Sexo',
            'DataNac' => 'Data Nac',
            'Descricao' => 'Descricao',
            'Foto' => 'Foto',
            'Localidade' => 'Localidade',
            'IdUser' => 'Id User',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMusicos()
    {
        return $this->hasOne(Musicos::className(), ['idProfile' => 'Id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'IdUser']);
    }
}
