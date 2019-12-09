<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\BandaMembros;

/**
 * BandaMembrosSearch represents the model behind the search form of `common\models\BandaMembros`.
 */
class BandaMembrosSearch extends BandaMembros
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['DataEntrada'], 'safe'],
            [['IdBanda', 'IdMusico'], 'integer'],
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
        $query = BandaMembros::find();

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
            'DataEntrada' => $this->DataEntrada,
            'IdBanda' => $this->IdBanda,
            'IdMusico' => $this->IdMusico,
        ]);

        return $dataProvider;
    }
}
