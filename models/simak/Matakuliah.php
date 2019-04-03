<?php

namespace app\models\simak;

use Yii;

/**
 * This is the model class for table "matakuliah".
 *
 * @property string $kmatkul
 * @property int $idkur
 * @property string $nmatkul
 * @property string $sks
 * @property int $idkonsentrasi
 * @property int $ispilihan
 * @property int $islintas_prodi
 * @property string $semester
 * @property int $sks_tatap_muka
 * @property int $sks_praktikum
 * @property int $sks_praktik_lapangan
 * @property string $minimal_nilai
 * @property int $syarat_ta
 * @property int $aktif
 *
 * @property Kurikulum $kur
 * @property MatakuliahSyarat[] $matakuliahSyarats
 * @property NilaiKonversi2[] $nilaiKonversi2s
 * @property Penyelenggaraan[] $penyelenggaraans
 */
class Matakuliah extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'matakuliah';
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
            [['kmatkul', 'idkur', 'nmatkul', 'sks', 'idkonsentrasi', 'semester', 'sks_tatap_muka', 'sks_praktikum', 'sks_praktik_lapangan', 'minimal_nilai', 'syarat_ta'], 'required'],
            [['idkur', 'idkonsentrasi', 'ispilihan', 'islintas_prodi', 'sks_tatap_muka', 'sks_praktikum', 'sks_praktik_lapangan', 'syarat_ta', 'aktif'], 'integer'],
            [['kmatkul'], 'string', 'max' => 9],
            [['nmatkul'], 'string', 'max' => 50],
            [['sks', 'minimal_nilai'], 'string', 'max' => 1],
            [['semester'], 'string', 'max' => 2],
            [['kmatkul'], 'unique'],
            [['idkur'], 'exist', 'skipOnError' => true, 'targetClass' => Kurikulum::className(), 'targetAttribute' => ['idkur' => 'idkur']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'kmatkul' => 'Kmatkul',
            'idkur' => 'Idkur',
            'nmatkul' => 'Nmatkul',
            'sks' => 'Sks',
            'idkonsentrasi' => 'Idkonsentrasi',
            'ispilihan' => 'Ispilihan',
            'islintas_prodi' => 'Islintas Prodi',
            'semester' => 'Semester',
            'sks_tatap_muka' => 'Sks Tatap Muka',
            'sks_praktikum' => 'Sks Praktikum',
            'sks_praktik_lapangan' => 'Sks Praktik Lapangan',
            'minimal_nilai' => 'Minimal Nilai',
            'syarat_ta' => 'Syarat Ta',
            'aktif' => 'Aktif',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKur()
    {
        return $this->hasOne(Kurikulum::className(), ['idkur' => 'idkur']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMatakuliahSyarats()
    {
        return $this->hasMany(MatakuliahSyarat::className(), ['kmatkul' => 'kmatkul']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNilaiKonversi2s()
    {
        return $this->hasMany(NilaiKonversi2::className(), ['kmatkul' => 'kmatkul']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPenyelenggaraans()
    {
        return $this->hasMany(Penyelenggaraan::className(), ['kmatkul' => 'kmatkul']);
    }
}
