<?php

namespace app\models\simak;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\skkp\PrdPengajuan;

/**
 * PrdPengajuanSearch represents the model behind the search form of `app\models\skkp\PrdPengajuan`.
 */
class PrdPengajuanSearch extends PrdPengajuan
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['IDPengajuan', 'IDJenisSidang', 'NIM', 'IDstatusProposal', 'idPeriode'], 'integer'],
            [['TanggalDaftar', 'Judul', 'keterangan'], 'safe'],
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
        $query = PrdPengajuan::find();

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
            'IDPengajuan' => $this->IDPengajuan,
            'IDJenisSidang' => $this->IDJenisSidang,
            'NIM' => $this->NIM,
            'TanggalDaftar' => $this->TanggalDaftar,
            'IDstatusProposal' => $this->IDstatusProposal,
            'idPeriode' => $this->idPeriode,
        ]);

        $query->andFilterWhere(['like', 'Judul', $this->Judul])
            ->andFilterWhere(['like', 'keterangan', $this->keterangan]);

        return $dataProvider;
    }
}
