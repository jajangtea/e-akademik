<?php

namespace app\models\simak;

use Yii;

/**
 * This is the model class for table "v_konversi2".
 *
 * @property string $iddata_konversi
 * @property string $nama
 * @property string $alamat
 * @property string $no_telp
 * @property string $nim_asal
 * @property string $kode_pt_asal
 * @property string $kjenjang
 * @property string $njenjang
 * @property string $kode_ps_asal
 * @property int $kjur
 * @property string $tahun
 * @property string $kmatkul
 * @property string $kmatkul_asal
 * @property string $matkul_asal
 * @property int $sks_asal
 * @property string $idnilai_konversi
 * @property string $n_kual
 * @property string $nmatkul
 * @property string $sks
 * @property string $semester
 */
class VKonversi2 extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'v_konversi2';
    }

    /**
     * @return \yii\db\Connection the database connection used by this AR class.
     */
    public static function getDb()
    {
        return Yii::$app->get('db_simak');
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['iddata_konversi', 'kjur', 'sks_asal', 'idnilai_konversi'], 'integer'],
            [['nama', 'alamat', 'no_telp', 'nim_asal', 'kode_pt_asal', 'kjenjang', 'njenjang', 'kode_ps_asal', 'kjur', 'tahun', 'kmatkul', 'kmatkul_asal', 'matkul_asal', 'sks_asal', 'n_kual', 'nmatkul', 'sks', 'semester'], 'required'],
            [['tahun'], 'safe'],
            [['nama', 'matkul_asal'], 'string', 'max' => 80],
            [['alamat'], 'string', 'max' => 150],
            [['no_telp'], 'string', 'max' => 25],
            [['nim_asal'], 'string', 'max' => 30],
            [['kode_pt_asal', 'kode_ps_asal'], 'string', 'max' => 6],
            [['kjenjang', 'n_kual', 'sks'], 'string', 'max' => 1],
            [['njenjang'], 'string', 'max' => 15],
            [['kmatkul', 'kmatkul_asal'], 'string', 'max' => 9],
            [['nmatkul'], 'string', 'max' => 50],
            [['semester'], 'string', 'max' => 2],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'iddata_konversi' => 'Iddata Konversi',
            'nama' => 'Nama',
            'alamat' => 'Alamat',
            'no_telp' => 'No Telp',
            'nim_asal' => 'Nim Asal',
            'kode_pt_asal' => 'Kode Pt Asal',
            'kjenjang' => 'Kjenjang',
            'njenjang' => 'Njenjang',
            'kode_ps_asal' => 'Kode Ps Asal',
            'kjur' => 'Kjur',
            'tahun' => 'Tahun',
            'kmatkul' => 'Kmatkul',
            'kmatkul_asal' => 'Kmatkul Asal',
            'matkul_asal' => 'Matkul Asal',
            'sks_asal' => 'Sks Asal',
            'idnilai_konversi' => 'Idnilai Konversi',
            'n_kual' => 'N Kual',
            'nmatkul' => 'Nmatkul',
            'sks' => 'Sks',
            'semester' => 'Semester',
        ];
    }
}
