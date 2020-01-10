<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\BandaHabilidades;

/**
 * BandaHabilidadesSearch represents the model behind the search form of `common\models\BandaHabilidades`.
 */
class BandaHabilidadesSearch extends BandaHabilidades
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['IdBanda', 'IdHabilidade'], 'integer'],
            [['experiencia', 'compromisso'], 'safe'],
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
        $query = BandaHabilidades::find();

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
            'IdHabilidade' => $this->IdHabilidade,
        ]);

        $query->andFilterWhere(['like', 'experiencia', $this->experiencia])
            ->andFilterWhere(['like', 'compromisso', $this->compromisso]);

        return $dataProvider;
    }
}
