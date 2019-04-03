<?php

namespace app\models\simak;

use Yii;

/**
 * This is the model class for table "nilai_imported".
 *
 * @property string $idkrsmatkul
 * @property int $idkelas_mhs
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
 *
 * @property Krsmatkul $krsmatkul
 * @property KelasMhs $kelasMhs
 */
class NilaiImported extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'nilai_imported';
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
            [['idkrsmatkul', 'idkelas_mhs', 'persentase_quiz', 'persentase_tugas', 'persentase_uts', 'persentase_uas', 'persentase_absen', 'nilai_quiz', 'nilai_tugas', 'nilai_uts', 'nilai_uas', 'nilai_absen', 'n_kuan', 'n_kual'], 'required'],
            [['idkrsmatkul', 'idkelas_mhs'], 'integer'],
            [['persentase_quiz', 'persentase_tugas', 'persentase_uts', 'persentase_uas', 'persentase_absen', 'nilai_quiz', 'nilai_tugas', 'nilai_uts', 'nilai_uas', 'nilai_absen', 'n_kuan'], 'number'],
            [['n_kual'], 'string', 'max' => 1],
            [['idkrsmatkul'], 'unique'],
            [['idkrsmatkul'], 'exist', 'skipOnError' => true, 'targetClass' => Krsmatkul::className(), 'targetAttribute' => ['idkrsmatkul' => 'idkrsmatkul']],
            [['idkelas_mhs'], 'exist', 'skipOnError' => true, 'targetClass' => KelasMhs::className(), 'targetAttribute' => ['idkelas_mhs' => 'idkelas_mhs']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idkrsmatkul' => 'Idkrsmatkul',
            'idkelas_mhs' => 'Idkelas Mhs',
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
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKrsmatkul()
    {
        return $this->hasOne(Krsmatkul::className(), ['idkrsmatkul' => 'idkrsmatkul']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKelasMhs()
    {
        return $this->hasOne(KelasMhs::className(), ['idkelas_mhs' => 'idkelas_mhs']);
    }
}
