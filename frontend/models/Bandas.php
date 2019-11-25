<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "bandas".
 *
 * @property int $ID
 * @property string $Nome
 * @property string $Descricao
 * @property string $Localizacao
 * @property string $Contacto
 * @property resource $Logo
 * @property int $IdListaMusica
 *
 * @property Bandagenero[] $bandageneros
 * @property Generos[] $generos
 * @property Bandahabilidades[] $bandahabilidades
 * @property Habilidades[] $habilidades
 * @property Bandamembros[] $bandamembros
 * @property Listamusicas $listaMusica
 * @property Bandashistorico[] $bandashistoricos
 * @property Musicos[] $musicos
 * @property Listabandas[] $listabandas
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
            [['Nome', 'Descricao', 'Localizacao', 'Contacto', 'Logo', 'IdListaMusica'], 'required'],
            [['Logo'], 'string'],
            [['IdListaMusica'], 'integer'],
            [['Nome', 'Descricao', 'Localizacao', 'Contacto'], 'string', 'max' => 255],
            [['IdListaMusica'], 'exist', 'skipOnError' => true, 'targetClass' => Listamusicas::className(), 'targetAttribute' => ['IdListaMusica' => 'ID']],
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
            'Descricao' => 'Descricao',
            'Localizacao' => 'Localizacao',
            'Contacto' => 'Contacto',
            'Logo' => 'Logo',
            'IdListaMusica' => 'Id Lista Musica',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBandageneros()
    {
        return $this->hasMany(Bandagenero::className(), ['IdBanda' => 'ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGeneros()
    {
        return $this->hasMany(Generos::className(), ['ID' => 'IdGenero'])->viaTable('bandagenero', ['IdBanda' => 'ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBandahabilidades()
    {
        return $this->hasMany(Bandahabilidades::className(), ['IdBanda' => 'ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHabilidades()
    {
        return $this->hasMany(Habilidades::className(), ['ID' => 'IdHabilidade'])->viaTable('bandahabilidades', ['IdBanda' => 'ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBandamembros()
    {
        return $this->hasMany(Bandamembros::className(), ['IdBanda' => 'ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getListaMusica()
    {
        return $this->hasOne(Listamusicas::className(), ['ID' => 'IdListaMusica']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBandashistoricos()
    {
        return $this->hasMany(Bandashistorico::className(), ['IdBanda' => 'ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMusicos()
    {
        return $this->hasMany(Musicos::className(), ['ID' => 'IdMusico'])->viaTable('bandashistorico', ['IdBanda' => 'ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getListabandas()
    {
        return $this->hasMany(Listabandas::className(), ['IdBanda' => 'ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMusicos0()
    {
        return $this->hasMany(Musicos::className(), ['ID' => 'IdMusico'])->viaTable('listabandas', ['IdBanda' => 'ID']);
    }
}
