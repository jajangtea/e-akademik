<?php

namespace app\models\simak;

use Yii;

/**
 * This is the model class for table "nilai_matakuliah".
 *
 * @property string $idnilai
 * @property string $idkrsmatkul
 * @property string $persentase_quiz
 * @property string $persentase_tugas
 * @property string $persentase_uts
 * @property string $persentase_uas
 * @property string $persentase_absen
 * @property string $nilai_quiz
 * @property string $nilai_tugas
 * @property string $nilai_uts
 * @property string $nilai_uas
 * @property string $nilai_absen
 * @property string $n_kuan
 * @property string $n_kual
 * @property int $userid_input
 * @property string $tanggal_input
 * @property int $userid_modif
 * @property string $tanggal_modif
 * @property int $bydosen
 * @property string $ket
 * @property int $telah_isi_kuesioner
 * @property string $tanggal_isi_kuesioner
 *
 * @property Krsmatkul $krsmatkul
 */
class NilaiMatakuliah extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'nilai_matakuliah';
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
            [['idkrsmatkul', 'persentase_quiz', 'persentase_tugas', 'persentase_uts', 'persentase_uas', 'persentase_absen', 'nilai_quiz', 'nilai_tugas', 'nilai_uts', 'nilai_uas', 'nilai_absen', 'n_kuan', 'n_kual', 'userid_input', 'tanggal_input', 'userid_modif', 'tanggal_modif', 'ket', 'tanggal_isi_kuesioner'], 'required'],
            [['idkrsmatkul', 'userid_input', 'userid_modif', 'bydosen', 'telah_isi_kuesioner'], 'integer'],
            [['persentase_quiz', 'persentase_tugas', 'persentase_uts', 'persentase_uas', 'persentase_absen', 'nilai_quiz', 'nilai_tugas', 'nilai_uts', 'nilai_uas', 'nilai_absen', 'n_kuan'], 'number'],
            [['tanggal_input', 'tanggal_modif', 'tanggal_isi_kuesioner'], 'safe'],
            [['n_kual'], 'string', 'max' => 1],
            [['ket'], 'string', 'max' => 20],
            [['idkrsmatkul'], 'unique'],
            [['idkrsmatkul'], 'exist', 'skipOnError' => true, 'targetClass' => Krsmatkul::className(), 'targetAttribute' => ['idkrsmatkul' => 'idkrsmatkul']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idnilai' => 'Idnilai',
            'idkrsmatkul' => 'Idkrsmatkul',
            'persentase_quiz' => 'Persentase Quiz',
            'persentase_tugas' => 'Persentase Tugas',
            'persentase_uts' => 'Persentase Uts',
            'persentase_uas' => 'Persentase Uas',
            'persentase_absen' => 'Persentase Absen',
            'nilai_quiz' => 'Nilai Quiz',
            'nilai_tugas' => 'Nilai Tugas',
            'nilai_uts' => 'Nilai Uts',
            'nilai_uas' => 'Nilai Uas',
            'nilai_absen' => 'Nilai Absen',
            'n_kuan' => 'N Kuan',
            'n_kual' => 'N Kual',
            'userid_input' => 'Userid Input',
            'tanggal_input' => 'Tanggal Input',
            'userid_modif' => 'Userid Modif',
            'tanggal_modif' => 'Tanggal Modif',
            'bydosen' => 'Bydosen',
            'ket' => 'Ket',
            'telah_isi_kuesioner' => 'Telah Isi Kuesioner',
            'tanggal_isi_kuesioner' => 'Tanggal Isi Kuesioner',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKrsmatkul()
    {
        return $this->hasOne(Krsmatkul::className(), ['idkrsmatkul' => 'idkrsmatkul']);
    }
}
