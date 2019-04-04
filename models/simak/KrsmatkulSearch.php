<?php

namespace app\models\simak;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\simak\Krsmatkul;

/**
 * KrsmatkulSearch represents the model behind the search form of `app\models\simak\Krsmatkul`.
 */
class KrsmatkulSearch extends Krsmatkul
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idkrsmatkul', 'idkrs', 'idpenyelenggaraan', 'batal'], 'integer'],
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
        $sql="select * from krsmatkul km 
inner join krs kr on km.idkrs=kr.idkrs
inner join penyelenggaraan p on km.idpenyelenggaraan=p.idpenyelenggaraan
inner join profiles_mahasiswa pm on kr.nim=pm.nim
inner join formulir_pendaftaran fp on pm.no_formulir=fp.no_formulir
inner join matakuliah mk on p.kmatkul=mk.kmatkul
inner join dosen dsn on p.iddosen=dsn.iddosen
inner join kelas_mhs_detail kmd on km.idkrsmatkul=kmd.idkrsmatkul
inner join kelas_mhs kmhs on kmd.idkelas_mhs=kmhs.idkelas_mhs";
        $query = Krsmatkul::find();

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
            'idkrsmatkul' => $this->idkrsmatkul,
            'idkrs' => $this->idkrs,
            'idpenyelenggaraan' => $this->idpenyelenggaraan,
            'batal' => $this->batal,
        ]);

        return $dataProvider;
    }
}
