<?php

namespace app\models\simak;

use Yii;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;
use yii\db\Connection;

/**
 * This is the model class for table "krsmatkul".
 *
 * @property string $idkrsmatkul
 * @property string $idkrs
 * @property string $idpenyelenggaraan
 * @property int $batal
 *
 * @property KbmDetail[] $kbmDetails
 * @property KelasMhsDetail $kelasMhsDetail
 * @property Krs $krs
 * @property Penyelenggaraan $penyelenggaraan
 * @property NilaiAbsensi $nilaiAbsensi
 * @property NilaiImported $nilaiImported
 * @property NilaiMatakuliah $nilaiMatakuliah
 * @property NilaiQuiz[] $nilaiQuizzes
 * @property NilaiTugas[] $nilaiTugas
 * @property NilaiUas $nilaiUas
 * @property NilaiUts $nilaiUts
 */
class Krsmatkul extends ActiveRecord {

    /**
     * {@inheritdoc}
     */
    public static function tableName() {
        return 'krsmatkul';
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
            [['idkrs', 'idpenyelenggaraan', 'batal'], 'required'],
            [['idkrs', 'idpenyelenggaraan', 'batal'], 'integer'],
            [['idkrs'], 'exist', 'skipOnError' => true, 'targetClass' => Krs::className(), 'targetAttribute' => ['idkrs' => 'idkrs']],
            [['idpenyelenggaraan'], 'exist', 'skipOnError' => true, 'targetClass' => Penyelenggaraan::className(), 'targetAttribute' => ['idpenyelenggaraan' => 'idpenyelenggaraan']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels() {
        return [
            'idkrsmatkul' => 'Idkrsmatkul',
            'idkrs' => 'Idkrs',
            'idpenyelenggaraan' => 'Idpenyelenggaraan',
            'batal' => 'Batal',
        ];
    }

    /**
     * @return ActiveQuery
     */
    public function getKbmDetails() {
        return $this->hasMany(KbmDetail::className(), ['idkrsmatkul' => 'idkrsmatkul']);
    }

    /**
     * @return ActiveQuery
     */
    public function getKelasMhsDetail() {
        return $this->hasOne(KelasMhsDetail::className(), ['idkrsmatkul' => 'idkrsmatkul']);
    }

    /**
     * @return ActiveQuery
     */
    public function getKrs() {
        return $this->hasOne(Krs::className(), ['idkrs' => 'idkrs']);
    }

    /**
     * @return ActiveQuery
     */
    public function getPenyelenggaraan() {
        return $this->hasOne(Penyelenggaraan::className(), ['idpenyelenggaraan' => 'idpenyelenggaraan']);
    }

    /**
     * @return ActiveQuery
     */
    public function getNilaiAbsensi() {
        return $this->hasOne(NilaiAbsensi::className(), ['idkrsmatkul' => 'idkrsmatkul']);
    }

    /**
     * @return ActiveQuery
     */
    public function getNilaiImported() {
        return $this->hasOne(NilaiImported::className(), ['idkrsmatkul' => 'idkrsmatkul']);
    }

    /**
     * @return ActiveQuery
     */
    public function getNilaiMatakuliah() {
        return $this->hasOne(NilaiMatakuliah::className(), ['idkrsmatkul' => 'idkrsmatkul']);
    }

    /**
     * @return ActiveQuery
     */
    public function getNilaiQuizzes() {
        return $this->hasMany(NilaiQuiz::className(), ['idkrsmatkul' => 'idkrsmatkul']);
    }

    /**
     * @return ActiveQuery
     */
    public function getNilaiTugas() {
        return $this->hasMany(NilaiTugas::className(), ['idkrsmatkul' => 'idkrsmatkul']);
    }

    /**
     * @return ActiveQuery
     */
    public function getNilaiUas() {
        return $this->hasOne(NilaiUas::className(), ['idkrsmatkul' => 'idkrsmatkul']);
    }

    /**
     * @return ActiveQuery
     */
    public function getNilaiUts() {
        return $this->hasOne(NilaiUts::className(), ['idkrsmatkul' => 'idkrsmatkul']);
    }

    public static function namaSemester() {
        return [
            '1' => 'Ganjil',
            '2' => 'Genap',
            '3' => 'Pendek'
        ];
    }

    public static function TampilNamaSemester($kode) {
        switch ($kode) {
            case 1 :
                $nama_semester = "Ganjil";
                break;
            case 2 :
                $nama_semester = "Genap";
                break;
            case 3 :
                $nama_semester = "Pendek";
                break;
            default :
                $nama_semester = "Semester Belum dipilih";
        }
        return $nama_semester;
    }
    
    public static function TampilNamaProdi($kode) {
        switch ($kode) {
            case 12 :
                $prodi = "TEKNIK INFORMATIKA";
                break;
            case 32 :
                $prodi = "SISTEM INFORMASI";
                break;
            case 42 :
                $prodi = "SISTEM INFORMASI KONSETRASI KOMPUTER AKUNTANSI";
                break;
            default :
                $prodi = "Kode Prodi tidak ditemukan.";
        }
        return $prodi;
    }
    
     public static function getHari($kode) {
        switch ($kode) {
            case 1 :
                $nama_hari = "Senin";
                break;
            case 2 :
                  $nama_hari = "Selasa";
                break;
            case 3 :
                 $nama_hari = "Rabu";
                break;
            case 4 :
                 $nama_hari = "Kamis";
                break;
            case 5 :
                 $nama_hari = "Jumat";
                break;
            case 6 :
                 $nama_hari = "Sabtu";
                break;
            case 7 :
                 $nama_hari = "Minggu";
                break;
            default :
                $nama_hari = "Hari belum diatur.";
        }
        return $nama_hari;
    }

}
