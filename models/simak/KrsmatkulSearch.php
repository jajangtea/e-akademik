<?php

namespace app\models\simak;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\simak\Krsmatkul;

/**
 * KrsmatkulSearch represents the model behind the search form of `app\models\simak\Krsmatkul`.
 */
class KrsmatkulSearch extends Krsmatkul {

    /**
     * {@inheritdoc}
     */
    public $nim;
    public $nama_dosen;
    public $nmatkul;
    public $krs;
    public $penyelenggaraan;
    public $profiles_mahasiswa;
    public $formulir_pendaftaran;
    public $matakuliah;
    public $dosen;
    public $kelas_mhs_detail;
    public $kelas_mhs;
    public $register_mahasiswa;

    public function rules() {
        return [
            [['idkrsmatkul', 'idkrs', 'idpenyelenggaraan', 'batal'], 'integer'],
            [['krs', 'penyelenggaraan', 'nim', 'nama_dosen', 'profiles_mahasiswa','nmatkul', 'formulir_pendaftaran', 'matakuliah', 'dosen', 'kelas_mhs_detail', 'kelas_mhs', 'register_mahasiswa'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios() {
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
    public function search($params) {
        $sql = "select * from krsmatkul km 
inner join krs kr on km.idkrs=kr.idkrs
inner join penyelenggaraan p on km.idpenyelenggaraan=p.idpenyelenggaraan
inner join profiles_mahasiswa pm on kr.nim=pm.nim
inner join formulir_pendaftaran fp on pm.no_formulir=fp.no_formulir
inner join matakuliah mk on p.kmatkul=mk.kmatkul
inner join dosen dsn on p.iddosen=dsn.iddosen
inner join kelas_mhs_detail kmd on km.idkrsmatkul=kmd.idkrsmatkul
inner join kelas_mhs kmhs on kmd.idkelas_mhs=kmhs.idkelas_mhs";
        $query = Krsmatkul::find();
        $query->joinWith(['krs', 'krs.nim0', 'krs.nim0.noFormulir', 'krs.nim0.noFormulir.profilesMahasiswa', 'penyelenggaraan', 'penyelenggaraan.dosen', 'penyelenggaraan.kmatkul0']);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $dataProvider->sort->attributes['nim'] = [
            // The tables are the ones our relation are configured to
            // in my case they are prefixed with "tbl_"
            'asc' => ['profiles_mahasiswa.nim' => SORT_ASC],
            'desc' => ['profiles_mahasiswa.nim' => SORT_DESC],
        ];
        // Lets do the same with country now
        $dataProvider->sort->attributes['nama_dosen'] = [
            'asc' => ['dosen.nama_dosen' => SORT_ASC],
            'desc' => ['dosen.nama_dosen' => SORT_DESC],
        ];
        $dataProvider->sort->attributes['nmatkul'] = [
            'asc' => ['matakuliah.nmatkul' => SORT_ASC],
            'desc' => ['matakuliah.nmatkul' => SORT_DESC],
        ];

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
                        // 'profiles_mahasiswa.nim'=>$this->nim,
                ])
                ->andFilterWhere(['like', 'profiles_mahasiswa.nim', $this->nim])
                ->andFilterWhere(['like', 'matakuliah.nmatkul', $this->nmatkul])
                ->andFilterWhere(['like', 'dosen.nama_dosen', $this->nama_dosen]);

        return $dataProvider;
    }

}
