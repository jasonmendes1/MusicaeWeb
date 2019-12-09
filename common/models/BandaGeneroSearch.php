<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\BandaGenero;

/**
 * BandaGeneroSearch represents the model behind the search form of `common\models\BandaGenero`.
 */
class BandaGeneroSearch extends BandaGenero
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['IdBanda', 'IdGenero'], 'integer'],
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
        $query = BandaGenero::find();

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
            'IdBanda' => $this->IdBanda,
            'IdGenero' => $this->IdGenero,
        ]);

        return $dataProvider;
    }
}
