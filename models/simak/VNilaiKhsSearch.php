<?php

namespace app\models\simak;

use PdoDebugger;
use Yii;
use yii\base\Model;
use yii\data\SqlDataProvider;
use yii\db\Connection;

include 'models/pdo-debug.php';

/**
 * This is the model class for table "v_nilai_khs".
 *
 * @property string $idkrs
 * @property string $idkrsmatkul
 * @property string $idpenyelenggaraan
 * @property string $nim
 * @property int $idsmt
 * @property string $tahun
 * @property int $tasmt
 * @property string $kmatkul
 * @property string $nmatkul
 * @property string $sks
 * @property int $idkonsentrasi
 * @property int $ispilihan
 * @property int $islintas_prodi
 * @property string $semester
 * @property string $n_kuan
 * @property string $n_kual
 * @property int $telah_isi_kuesioner
 * @property string $tanggal_isi_kuesioner
 * @property int $iddosen
 * @property string $nidn
 * @property string $nama_dosen
 * @property int $aktif
 */
class VNilaiKhsSearch extends VNilaiKhs {

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

    /**
     * {@inheritdoc}
     */

    /**
     * @return Connection the database connection used by this AR class.
     */
    public function scenarios() {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['krs', 'penyelenggaraan', 'nim', 'nama_dosen', 'nama_mhs', 'idkelas', 'nama_kelas', 'kjur', 'aktif', 'tahun', 'idsmt', 'profiles_mahasiswa', 'kmatkul', 'formulir_pendaftaran', 'matakuliah', 'dosen', 'kelas_mhs_detail', 'kelas_mhs', 'register_mahasiswa'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function search($params) {
        $query = "SELECT * FROM v_kelas_mhs vkm 
                LEFT JOIN krsmatkul km ON vkm.idkrsmatkul=km.idkrsmatkul 
                LEFT JOIN krs kr ON km.idkrs=kr.idkrs
                LEFT JOIN register_mahasiswa rm ON kr.nim=rm.nim
                LEFT JOIN formulir_pendaftaran fp ON rm.no_formulir=fp.no_formulir
                LEFT JOIN penyelenggaraan pn ON  vkm.idpenyelenggaraan=pn.idpenyelenggaraan
                LEFT JOIN matakuliah mkul ON pn.kmatkul=mkul.kmatkul
                WHERE 
                vkm.idkelas=:idkelas AND
                mkul.kmatkul =:kmatkul AND
                pn.tahun =:tahun AND
                pn.kjur LIKE :kjur AND 
                kr.idsmt  LIKE :idsmt AND
                vkm.nama_kelas=:nama_kelas AND
                vkm.nama_dosen  LIKE :nama_dosen";

        $queryCount = "SELECT count(*) FROM v_kelas_mhs vkm 
                INNER JOIN krsmatkul km ON vkm.idkrsmatkul=km.idkrsmatkul 
                INNER JOIN krs kr ON km.idkrs=kr.idkrs
                INNER JOIN register_mahasiswa rm ON kr.nim=rm.nim
                INNER JOIN formulir_pendaftaran fp ON rm.no_formulir=fp.no_formulir
                INNER JOIN penyelenggaraan pn ON  vkm.idpenyelenggaraan=pn.idpenyelenggaraan
                INNER JOIN matakuliah mkul ON pn.kmatkul=mkul.kmatkul
                WHERE 
                vkm.idkelas=:idkelas AND
                mkul.kmatkul =:kmatkul AND
                pn.tahun =:tahun AND
                pn.kjur LIKE :kjur AND 
                kr.idsmt  LIKE :idsmt AND
                vkm.nama_kelas=:nama_kelas AND
                vkm.nama_dosen  LIKE :nama_dosen";

        $queryparams = [
            ':nama_dosen' => '%' . Yii::$app->session['nama_dosen'] . '%',
            ':kmatkul' => Yii::$app->session['kmatkul'],
            ':tahun' => Yii::$app->session['tahun'],
            ':idsmt' => '%' . Yii::$app->session['idsmt'] . '%',
            ':kjur' => '%' . Yii::$app->session['kjur'] . '%',
            ':idkelas' => Yii::$app->session['idkelas'],
            ':nama_kelas' => Yii::$app->session['nama_kelas'],
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
