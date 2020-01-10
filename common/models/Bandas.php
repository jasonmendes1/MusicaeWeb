<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "bandas".
 *
 * @property int $Id
 * @property string $Nome
 * @property string $Descricao
 * @property string $Localizacao
 * @property string $Contacto
 * @property resource $Logo
 * @property int $Removida
 * @property int $IdGenero
 *
 * @property Bandahabilidades[] $bandahabilidades
 * @property Habilidades[] $habilidades
 * @property Bandamembros[] $bandamembros
 * @property Musicos[] $musicos
 * @property Generos $genero
 * @property Bandashistorico[] $bandashistoricos
 * @property Musicos[] $musicos0
 */
class Bandas extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'bandas';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Nome', 'Descricao', 'Localizacao', 'Contacto', 'Logo', 'Removida', 'IdGenero'], 'required'],
            [['Logo'], 'string'],
            [['Removida', 'IdGenero'], 'integer'],
            [['Nome', 'Descricao', 'Localizacao', 'Contacto'], 'string', 'max' => 255],
            [['IdGenero'], 'exist', 'skipOnError' => true, 'targetClass' => Generos::className(), 'targetAttribute' => ['IdGenero' => 'Id']],
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
            'Descricao' => 'Descricao',
            'Localizacao' => 'Localizacao',
            'Contacto' => 'Contacto',
            'Logo' => 'Logo',
            'Removida' => 'Removida',
            'IdGenero' => 'Id Genero',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBandahabilidades()
    {
        return $this->hasMany(Bandahabilidades::className(), ['IdBanda' => 'Id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHabilidades()
    {
        return $this->hasMany(Habilidades::className(), ['Id' => 'IdHabilidade'])->viaTable('bandahabilidades', ['IdBanda' => 'Id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBandamembros()
    {
        return $this->hasMany(Bandamembros::className(), ['IdBanda' => 'Id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMusicos()
    {
        return $this->hasMany(Musicos::className(), ['Id' => 'IdMusico'])->viaTable('bandamembros', ['IdBanda' => 'Id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGenero()
    {
        return $this->hasOne(Generos::className(), ['Id' => 'IdGenero']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBandashistoricos()
    {
        return $this->hasMany(Bandashistorico::className(), ['IdBanda' => 'Id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMusicos0()
    {
        return $this->hasMany(Musicos::className(), ['Id' => 'IdMusico'])->viaTable('bandashistorico', ['IdBanda' => 'Id']);
    }
}
