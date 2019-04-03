<?php

namespace app\models\simak;

use Yii;

/**
 * This is the model class for table "kelas_mhs".
 *
 * @property int $idkelas_mhs
 * @property string $idkelas
 * @property int $nama_kelas
 * @property string $hari
 * @property string $jam_masuk
 * @property string $jam_keluar
 * @property int $idpengampu_penyelenggaraan
 * @property int $idruangkelas
 * @property int $persen_quiz
 * @property int $persen_tugas
 * @property int $persen_uts
 * @property int $persen_uas
 * @property int $persen_absen
 * @property int $isi_nilai
 *
 * @property PengampuPenyelenggaraan $pengampuPenyelenggaraan
 * @property KelasMhsDetail[] $kelasMhsDetails
 * @property KontrakMatakuliah $kontrakMatakuliah
 * @property NilaiImported[] $nilaiImporteds
 * @property QuizMk[] $quizMks
 * @property TugasMk[] $tugasMks
 */
class KelasMhs extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'kelas_mhs';
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
            [['idkelas', 'nama_kelas', 'hari', 'jam_masuk', 'jam_keluar', 'idpengampu_penyelenggaraan', 'idruangkelas'], 'required'],
            [['nama_kelas', 'idpengampu_penyelenggaraan', 'idruangkelas', 'persen_quiz', 'persen_tugas', 'persen_uts', 'persen_uas', 'persen_absen', 'isi_nilai'], 'integer'],
            [['idkelas'], 'string', 'max' => 1],
            [['hari'], 'string', 'max' => 7],
            [['jam_masuk', 'jam_keluar'], 'string', 'max' => 5],
            [['idpengampu_penyelenggaraan'], 'exist', 'skipOnError' => true, 'targetClass' => PengampuPenyelenggaraan::className(), 'targetAttribute' => ['idpengampu_penyelenggaraan' => 'idpengampu_penyelenggaraan']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idkelas_mhs' => 'Idkelas Mhs',
            'idkelas' => 'Idkelas',
            'nama_kelas' => 'Nama Kelas',
            'hari' => 'Hari',
            'jam_masuk' => 'Jam Masuk',
            'jam_keluar' => 'Jam Keluar',
            'idpengampu_penyelenggaraan' => 'Idpengampu Penyelenggaraan',
            'idruangkelas' => 'Idruangkelas',
            'persen_quiz' => 'Persen Quiz',
            'persen_tugas' => 'Persen Tugas',
            'persen_uts' => 'Persen Uts',
            'persen_uas' => 'Persen Uas',
            'persen_absen' => 'Persen Absen',
            'isi_nilai' => 'Isi Nilai',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPengampuPenyelenggaraan()
    {
        return $this->hasOne(PengampuPenyelenggaraan::className(), ['idpengampu_penyelenggaraan' => 'idpengampu_penyelenggaraan']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKelasMhsDetails()
    {
        return $this->hasMany(KelasMhsDetail::className(), ['idkelas_mhs' => 'idkelas_mhs']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKontrakMatakuliah()
    {
        return $this->hasOne(KontrakMatakuliah::className(), ['idkelas_mhs' => 'idkelas_mhs']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNilaiImporteds()
    {
        return $this->hasMany(NilaiImported::className(), ['idkelas_mhs' => 'idkelas_mhs']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getQuizMks()
    {
        return $this->hasMany(QuizMk::className(), ['idkelas_mhs' => 'idkelas_mhs']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTugasMks()
    {
        return $this->hasMany(TugasMk::className(), ['idkelas_mhs' => 'idkelas_mhs']);
    }
}
