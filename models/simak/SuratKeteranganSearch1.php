<?php

namespace app\models\simak;

use PdoDebugger;
use Yii;
use yii\data\SqlDataProvider;
use yii\db\Connection;

include 'models/pdo-debug.php';

class SuratKeteranganSearch extends VKrsmhs {

    public $nim;
    public $nama_dosen;
    public $kmatkul;
    public $tahun;
    public $krs;
    public $kjur;
    public $idsmt;
    public $nama_mhs;
    public $aktif;
    public $idkelas;
    public $nama_kelas;

//    public function scenarios() {
//        // bypass scenarios() implementation in the parent class
//        return Model::scenarios();
//    }

    /**
     * {@inheritdoc}
     */
    public static function tableName() {
        return '{{%surat_keterangan}}';
    }

    public function rules() {
        return [
            [['nomor_surat'], 'autonumber', 'format' => 'formatRomawi'],
        ];
    }

    /**
     * @return Connection the database connection used by this AR class.
     */
    public static function getDb() {
        return Yii::$app->get('db_akademik');
    }

//    public function rules() {
//        return [
//            [['nomor_surat'], 'autonumber', 'format' => 'SA.' . date('Y-m-d') . '.?'],
//        ];
//    }

    public function formatRomawi() {
        $romawi = ['I', 'II', 'III', 'IV', 'V', 'VI', 'VII', 'VIII', 'IX', 'X', 'XI', 'XII'];
        $bulan = $romawi[date('n') - 1];
        return date('Y') . "/{$bulan}/?";
    }

    /**
     * {@inheritdoc}
     */
    public function search($params) {
        $query = "select * from v_krsmhs vkms 
 inner join register_mahasiswa rm on rm.nim=vkms.nim
 inner join formulir_pendaftaran fm on rm.no_formulir=fm.no_formulir
 where rm.nim=:nim and vkms.tahun=:tahun";

        $queryCount = "select * from v_krsmhs vkms 
 inner join register_mahasiswa rm on rm.nim=vkms.nim
 inner join formulir_pendaftaran fm on rm.no_formulir=fm.no_formulir
 where rm.nim=:nim and vkms.tahun=:tahun";

        $queryparams = [
            ':nim' => Yii::$app->session['nim'],
            ':tahun' => Yii::$app->session['tahun'],
        ];
        $count = Yii::$app->db_simak->createCommand($queryCount, $queryparams)->queryScalar();

//        $pedeb = new PdoDebugger();
//        echo $pedeb::show($queryCount, $queryparams);
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
