<?php

namespace common\models;

use Yii;
use yii\helpers\BaseVarDumper;

/**
 * This is the model class for table "bandamembros".
 *
 * @property string $DataEntrada
 * @property int $IdBanda
 * @property int $IdMusico
 *
 * @property Bandas $banda
 * @property Musicos $musico
 */
class BandaMembros extends \yii\db\ActiveRecord
{

    /*public $Nome;
    public $Descricao;
    public $Localizacao;
    public $Contacto;
    public $Logo;
    public $Removida;
    public $IdGenero;
    public $DataEntrada;
    public $IdBanda;
    public $IdMusico;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'bandamembros';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [

            [['Nome', 'Descricao', 'Localizacao', 'Contacto', 'IdGenero'], 'required'],
            [['Logo'], 'string'],
            [['Removida', 'IdGenero'], 'integer'],
            [['Nome', 'Descricao', 'Localizacao', 'Contacto'], 'string', 'max' => 255],
            [['IdGenero'], 'exist', 'skipOnError' => true, 'targetClass' => Generos::className(), 'targetAttribute' => ['IdGenero' => 'Id']],

            [['DataEntrada'], 'required'],
            [['DataEntrada'], 'safe'],
            [['IdBanda', 'IdMusico'], 'integer'],
            [['IdBanda', 'IdMusico'], 'unique', 'targetAttribute' => ['IdBanda', 'IdMusico']],
            [['IdBanda'], 'exist', 'skipOnError' => true, 'targetClass' => Bandas::className(), 'targetAttribute' => ['IdBanda' => 'Id']],
            [['IdMusico'], 'exist', 'skipOnError' => true, 'targetClass' => Musicos::className(), 'targetAttribute' => ['IdMusico' => 'Id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'Descricao' => 'Descrição',
            'Localizacao' => 'Localização',
            'Contacto' => 'Contacto',
            'IdGenero' => 'Género',
            'DataEntrada' => 'Data de Entrada',
            'IdBanda' => 'Banda',
            'IdMusico' => 'Musico',
        ];
    }

    public function criarBanda()
    {
        $user_id = Yii::$app->user->identity->getId();
        $profile = Profiles::find()->where(['IdUser' => $user_id])->one();
        $musico = Musicos::find()->where(['idProfile' => $profile->Id])->one();

        if ($this->validate()) {
            $banda = new Bandas();
            $banda->Nome = $this->Nome;
            $banda->Descricao = $this->Descricao;
            $banda->Localizacao = $this->Localizacao;
            $banda->Contacto = $this->Contacto;
            $banda->Logo = null;
            $banda->Removida = '0';
            $banda->IdGenero = $this->IdGenero;

            $bandamembros = new BandaMembros();
            $bandamembros->DataEntrada = $this->DataEntrada;

            $banda->save(false);
            $bandamembros->IdBanda = $banda->Id;
            $bandamembros->IdMusico = $musico;
            $bandamembros->save(false);

            return $bandamembros;
        }
        return null;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBanda()
    {
        return $this->hasOne(Bandas::className(), ['Id' => 'IdBanda']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMusico()
    {
        return $this->hasOne(Musicos::className(), ['Id' => 'IdMusico']);
    }
}