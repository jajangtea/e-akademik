<?php

namespace app\models\simak;

use Yii;

/**
 * This is the model class for table "nilai_ujian_masuk".
 *
 * @property string $idnilai_ujian_masuk
 * @property int $no_formulir
 * @property int $jumlah_soal
 * @property int $jawaban_benar
 * @property int $jawaban_salah
 * @property int $soal_tidak_terjawab
 * @property string $passing_grade_1
 * @property string $passing_grade_2
 * @property string $nilai
 * @property int $ket_lulus
 * @property int $kjur
 *
 * @property FormulirPendaftaran $noFormulir
 */
class NilaiUjianMasuk extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'nilai_ujian_masuk';
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
            [['no_formulir', 'jumlah_soal', 'jawaban_benar', 'jawaban_salah', 'soal_tidak_terjawab', 'passing_grade_1', 'passing_grade_2', 'nilai', 'kjur'], 'required'],
            [['no_formulir', 'jumlah_soal', 'jawaban_benar', 'jawaban_salah', 'soal_tidak_terjawab', 'ket_lulus', 'kjur'], 'integer'],
            [['passing_grade_1', 'passing_grade_2', 'nilai'], 'number'],
            [['no_formulir'], 'unique'],
            [['no_formulir'], 'exist', 'skipOnError' => true, 'targetClass' => FormulirPendaftaran::className(), 'targetAttribute' => ['no_formulir' => 'no_formulir']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idnilai_ujian_masuk' => 'Idnilai Ujian Masuk',
            'no_formulir' => 'No Formulir',
            'jumlah_soal' => 'Jumlah Soal',
            'jawaban_benar' => 'Jawaban Benar',
            'jawaban_salah' => 'Jawaban Salah',
            'soal_tidak_terjawab' => 'Soal Tidak Terjawab',
            'passing_grade_1' => 'Passing Grade 1',
            'passing_grade_2' => 'Passing Grade 2',
            'nilai' => 'Nilai',
            'ket_lulus' => 'Ket Lulus',
            'kjur' => 'Kjur',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNoFormulir()
    {
        return $this->hasOne(FormulirPendaftaran::className(), ['no_formulir' => 'no_formulir']);
    }
}
