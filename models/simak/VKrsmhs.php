<?php

namespace app\models\simak;

use Yii;
use yii\db\ActiveRecord;
use yii\db\Connection;

/**
 * This is the model class for table "v_krsmhs".
 *
 * @property string $idkrsmatkul
 * @property string $idpenyelenggaraan
 * @property string $idkrs
 * @property int $batal
 * @property string $tgl_krs
 * @property string $no_krs
 * @property string $nim
 * @property int $kjur
 * @property int $idsmt
 * @property string $tahun
 * @property int $tasmt
 * @property int $sah
 * @property string $tgl_disahkan
 * @property string $kmatkul
 * @property string $nmatkul
 * @property string $sks
 * @property string $semester
 * @property string $nidn
 * @property string $nama_dosen
 * @property int $aktif
 */
class VKrsmhs extends ActiveRecord {

    /**
     * {@inheritdoc}
     */
    public static function tableName() {
        return 'v_krsmhs';
    }

    /**
     * @return Connection the database connection used by this AR class.
     */
    public static function getDb() {
        return Yii::$app->get('db_simak');
    }

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['idkrsmatkul', 'idpenyelenggaraan', 'idkrs', 'batal', 'kjur', 'idsmt', 'tasmt', 'sah', 'aktif'], 'integer'],
            [['idpenyelenggaraan', 'batal', 'tgl_krs', 'no_krs', 'nim', 'kjur', 'idsmt', 'tahun', 'tasmt', 'sah', 'tgl_disahkan', 'kmatkul', 'nmatkul', 'sks', 'semester', 'nidn'], 'required'],
            [['tgl_krs', 'tahun', 'tgl_disahkan'], 'safe'],
            [['no_krs', 'nmatkul'], 'string', 'max' => 50],
            [['nim'], 'string', 'max' => 20],
            [['kmatkul'], 'string', 'max' => 9],
            [['sks'], 'string', 'max' => 1],
            [['semester'], 'string', 'max' => 2],
            [['nidn'], 'string', 'max' => 15],
            [['nama_dosen'], 'string', 'max' => 112],
       
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels() {
        return [
            'idkrsmatkul' => 'Idkrsmatkul',
            'idpenyelenggaraan' => 'Idpenyelenggaraan',
            'idkrs' => 'Idkrs',
            'batal' => 'Batal',
            'tgl_krs' => 'Tgl Krs',
            'no_krs' => 'No Krs',
            'nim' => 'Nim',
            'kjur' => 'Kjur',
            'idsmt' => 'Idsmt',
            'tahun' => 'Tahun',
            'tasmt' => 'Tasmt',
            'sah' => 'Sah',
            'tgl_disahkan' => 'Tgl Disahkan',
            'kmatkul' => 'Kmatkul',
            'nmatkul' => 'Nmatkul',
            'sks' => 'Sks',
            'semester' => 'Semester',
            'nidn' => 'Nidn',
            'nama_dosen' => 'Nama Dosen',
            'aktif' => 'Aktif',
        ];
    }

   

}
