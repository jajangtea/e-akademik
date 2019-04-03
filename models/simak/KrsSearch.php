<?php

namespace app\models\simak;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\simak\Krs;

/**
 * KrsSearch represents the model behind the search form of `app\models\simak\Krs`.
 */
class KrsSearch extends Krs
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idkrs', 'idsmt', 'tasmt', 'sah'], 'integer'],
            [['tgl_krs', 'no_krs', 'nim', 'tahun', 'tgl_disahkan'], 'safe'],
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
        $query = Krs::find();

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
            'idkrs' => $this->idkrs,
            'tgl_krs' => $this->tgl_krs,
            'idsmt' => $this->idsmt,
            'tahun' => $this->tahun,
            'tasmt' => $this->tasmt,
            'sah' => $this->sah,
            'tgl_disahkan' => $this->tgl_disahkan,
        ]);

        $query->andFilterWhere(['like', 'no_krs', $this->no_krs])
            ->andFilterWhere(['like', 'nim', $this->nim]);

        return $dataProvider;
    }
}
