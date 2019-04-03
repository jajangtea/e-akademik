<?php

namespace app\models\simak;

use Yii;

/**
 * This is the model class for table "kuesioner_hasil".
 *
 * @property int $idpengampu_penyelenggaraan
 * @property int $jumlah_mhs
 * @property int $total_nilai
 * @property int $jumlah_soal
 * @property int $skor_tertinggi
 * @property int $skor_terendah
 * @property string $intervals
 * @property string $maks_sangatburuk
 * @property string $maks_buruk
 * @property string $maks_sedang
 * @property string $maks_baik
 * @property string $maks_sangatbaik
 * @property int $n_kuan
 * @property string $n_kual
 *
 * @property PengampuPenyelenggaraan $pengampuPenyelenggaraan
 */
class KuesionerHasil extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'kuesioner_hasil';
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
            [['idpengampu_penyelenggaraan', 'jumlah_mhs', 'total_nilai', 'jumlah_soal', 'skor_tertinggi', 'skor_terendah', 'intervals', 'maks_sangatburuk', 'maks_buruk', 'maks_sedang', 'maks_baik', 'maks_sangatbaik', 'n_kuan', 'n_kual'], 'required'],
            [['idpengampu_penyelenggaraan', 'jumlah_mhs', 'total_nilai', 'jumlah_soal', 'skor_tertinggi', 'skor_terendah', 'n_kuan'], 'integer'],
            [['intervals', 'maks_sangatburuk', 'maks_buruk', 'maks_sedang', 'maks_baik', 'maks_sangatbaik'], 'number'],
            [['n_kual'], 'string', 'max' => 25],
            [['idpengampu_penyelenggaraan'], 'unique'],
            [['idpengampu_penyelenggaraan'], 'exist', 'skipOnError' => true, 'targetClass' => PengampuPenyelenggaraan::className(), 'targetAttribute' => ['idpengampu_penyelenggaraan' => 'idpengampu_penyelenggaraan']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idpengampu_penyelenggaraan' => 'Idpengampu Penyelenggaraan',
            'jumlah_mhs' => 'Jumlah Mhs',
            'total_nilai' => 'Total Nilai',
            'jumlah_soal' => 'Jumlah Soal',
            'skor_tertinggi' => 'Skor Tertinggi',
            'skor_terendah' => 'Skor Terendah',
            'intervals' => 'Intervals',
            'maks_sangatburuk' => 'Maks Sangatburuk',
            'maks_buruk' => 'Maks Buruk',
            'maks_sedang' => 'Maks Sedang',
            'maks_baik' => 'Maks Baik',
            'maks_sangatbaik' => 'Maks Sangatbaik',
            'n_kuan' => 'N Kuan',
            'n_kual' => 'N Kual',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPengampuPenyelenggaraan()
    {
        return $this->hasOne(PengampuPenyelenggaraan::className(), ['idpengampu_penyelenggaraan' => 'idpengampu_penyelenggaraan']);
    }
}
