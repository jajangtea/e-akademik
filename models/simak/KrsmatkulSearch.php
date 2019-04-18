<?php

namespace app\models\simak;

use app\models\simak\Krsmatkul;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * KrsmatkulSearch represents the model behind the search form of `app\models\simak\Krsmatkul`.
 */
class KrsmatkulSearch extends Krsmatkul {

    /**
     * {@inheritdoc}
     */
    public $nim;
    public $nama_dosen;
    public $kmatkul;
    public $tahun;
    public $krs;
    public $kjur;
    public $idsmt;
    public $nama_mhs;
    public $k_status;

    public function rules() {
        return [
            [['idkrsmatkul', 'idkrs', 'idpenyelenggaraan', 'batal'], 'integer'],
            [['krs', 'penyelenggaraan', 'nim', 'nama_dosen', 'nama_mhs', 'kjur', 'k_status', 'tahun', 'idsmt', 'profiles_mahasiswa', 'kmatkul', 'formulir_pendaftaran', 'matakuliah', 'dosen', 'kelas_mhs_detail', 'kelas_mhs', 'register_mahasiswa'], 'safe'],
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

        $query = Krsmatkul::find();
        $query->joinWith(['krs', 'krs.nim0', 'krs.nim0.noFormulir', 'krs.nim0.noFormulir.profilesMahasiswa', 'penyelenggaraan', 'penyelenggaraan.dosen', 'penyelenggaraan.kmatkul0', 'krs.nim0.dulangs']);

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

        $dataProvider->sort->attributes['tahun'] = [
            'asc' => ['penyelenggaraan.tahun' => SORT_ASC],
            'desc' => ['penyelenggaraan.tahun' => SORT_DESC],
        ];

        $dataProvider->sort->attributes['nama_mhs'] = [
            'asc' => ['formulir_pendaftaran.nama_mhs' => SORT_ASC],
            'desc' => ['formulir_pendaftaran.nama_mhs' => SORT_DESC],
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
                ->andFilterWhere(['like', 'matakuliah.kmatkul', $this->kmatkul])
                ->andFilterWhere(['like', 'krs.tahun', Yii::$app->session['tahun']])
                ->andFilterWhere(['like', 'penyelenggaraan.kjur', Yii::$app->session['kjur']])
                ->andFilterWhere(['like', 'dulang.idsmt', Yii::$app->session['idsmt']])
                ->andFilterWhere(['like', 'formulir_pendaftaran.nama_mhs', $this->nama_mhs])
                ->andFilterWhere(['like', 'dulang.k_status', "A"])
                ->andFilterWhere(['like', 'dosen.nama_dosen', $this->nama_dosen]);
        return $dataProvider;
    }

}
