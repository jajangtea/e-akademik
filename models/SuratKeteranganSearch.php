<?php

namespace app\models;

use app\models\SuratKeterangan;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use yii\data\SqlDataProvider;

include 'models/pdo-debug.php';

/**
 * SuratKeteranganSearch represents the model behind the search form of `app\models\SuratKeterangan`.
 */
class SuratKeteranganSearch extends SuratKeterangan {

    /**
     * {@inheritdoc}
     */
    public $idsmt;
    public $alamat;
    public function rules() {
        return [
            [['nomor_surat', 'nama','idsmt', 'alamat','tahun', 'keperluan'], 'safe'],
            [['nim'], 'integer'],
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
    public function searchx($params) {
        $query = SuratKeterangan::find();

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
            'nim' => $this->nim,
        ]);

        $query->andFilterWhere(['like', 'nomor_surat', $this->nomor_surat])
                ->andFilterWhere(['like', 'nama', $this->nama])
                ->andFilterWhere(['like', 'tahun', $this->tahun])
                ->andFilterWhere(['like', 'keperluan', $this->keperluan]);

        return $dataProvider;
    }

    public function search($params) {
        $query = "select * from v_krsmhs vkms 
        inner join register_mahasiswa rm on rm.nim=vkms.nim
        inner join formulir_pendaftaran fm on rm.no_formulir=fm.no_formulir
        where rm.nim=:nim and vkms.tahun=:tahun and vkms.idsmt=:idsmt";

        $queryCount = "select count(*) from v_krsmhs vkms 
        inner join register_mahasiswa rm on rm.nim=vkms.nim
        inner join formulir_pendaftaran fm on rm.no_formulir=fm.no_formulir
        where rm.nim=:nim and vkms.tahun=:tahun and vkms.idsmt=:idsmt";

        $queryparams = [
            ':nim' => Yii::$app->session['nim'],
            ':tahun' => Yii::$app->session['tahun'],
            ':idsmt' => Yii::$app->session['idsmt'],
        ];
        $count = Yii::$app->db_simak->createCommand($queryCount, $queryparams)->queryScalar();

//        $pedeb = new PdoDebugger();
//        echo $pedeb::show($query, $queryparams);
//        exit;

        $dataProvider = new SqlDataProvider([
            'db' => 'db_simak',
            'params' => $queryparams,
            'sql' => $query,
            'totalCount' => $count,
            'sort' => [
                'attributes' => [
                    'nim' => [
                        'asc' => ['nim' => SORT_ASC],
                        'desc' => ['nim' => SORT_DESC],
                        'default' => SORT_ASC,
                        'label' => 'NIM',
                    ],
                    'nama_mhs' => [
                        'asc' => ['nama_mhs' => SORT_ASC],
                        'desc' => ['nama_mhs' => SORT_DESC],
                        'default' => SORT_ASC,
                        'label' => 'Nama Mahasiswa',
                    ],
                ],
            ],
        ]);
        $this->load($params);
        return $dataProvider;
    }

}
