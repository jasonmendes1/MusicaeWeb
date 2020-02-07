<?php

namespace frontend\models;

use common\models\BandaMembros;
use common\models\Generos;
use common\models\Habilidades;
use Yii;
use yii\base\Model;
use common\models\User;
use common\models\Profiles;
use common\models\Bandas;
use common\models\Musicos;
use yii\helpers\BaseVarDumper;


/**
 * CriarBandaForm form
 */
class CriarBandaForm extends Model
{

    public $Nome;
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
    public function rules()
    {
        return [

            [['Nome', 'Descricao', 'Localizacao', 'Contacto', 'IdGenero'], 'required'],
            [['Logo'], 'string'],
            [['Removida', 'IdGenero'], 'integer'],
            [['Nome', 'Descricao', 'Localizacao', 'Contacto'], 'string', 'max' => 255],
            [['IdGenero'], 'exist', 'skipOnError' => true, 'targetClass' => Generos::className(), 'targetAttribute' => ['IdGenero' => 'Id']],

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
            $bandamembros->DataEntrada = date('Y-m-d H:i:s');;

            $banda->save(false);
            $bandamembros->IdBanda = $banda->Id;
            $bandamembros->IdMusico = $musico->Id;
            $bandamembros->save(false);

            return $bandamembros;
        }
        return null;
    }
}