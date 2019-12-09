<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Bandas;

/**
 * BandasSearch represents the model behind the search form of `common\models\Bandas`.
 */
class BandasSearch extends Bandas
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Id', 'Removida', 'IdListaMusica'], 'integer'],
            [['Nome', 'Descricao', 'Localizacao', 'Contacto', 'Logo'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Bandas::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'Id' => $this->Id,
            'Removida' => $this->Removida,
            'IdListaMusica' => $this->IdListaMusica,
        ]);

        $query->andFilterWhere(['like', 'Nome', $this->Nome])
            ->andFilterWhere(['like', 'Descricao', $this->Descricao])
            ->andFilterWhere(['like', 'Localizacao', $this->Localizacao])
            ->andFilterWhere(['like', 'Contacto', $this->Contacto])
            ->andFilterWhere(['like', 'Logo', $this->Logo]);

        return $dataProvider;
    }
}
