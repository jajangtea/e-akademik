<?php

namespace app\models\simak;

use Yii;

/**
 * This is the model class for table "kbm".
 *
 * @property int $idkbm
 * @property int $idkelas_mhs
 * @property int $pertemuan_ke
 * @property int $hari
 * @property string $tanggal
 * @property string $jam_masuk
 * @property string $jam_keluar
 * @property string $metode
 * @property string $materi
 * @property int $periksa
 * @property string $tanggal_periksa
 * @property int $userid
 *
 * @property KbmDetail[] $kbmDetails
 */
class Kbm extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'kbm';
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
            [['idkelas_mhs', 'pertemuan_ke', 'hari', 'tanggal', 'jam_masuk', 'jam_keluar', 'metode', 'materi', 'periksa', 'tanggal_periksa', 'userid'], 'required'],
            [['idkelas_mhs', 'pertemuan_ke', 'hari', 'periksa', 'userid'], 'integer'],
            [['tanggal', 'jam_masuk', 'jam_keluar', 'tanggal_periksa'], 'safe'],
            [['metode'], 'string', 'max' => 35],
            [['materi'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idkbm' => 'Idkbm',
            'idkelas_mhs' => 'Idkelas Mhs',
            'pertemuan_ke' => 'Pertemuan Ke',
            'hari' => 'Hari',
            'tanggal' => 'Tanggal',
            'jam_masuk' => 'Jam Masuk',
            'jam_keluar' => 'Jam Keluar',
            'metode' => 'Metode',
            'materi' => 'Materi',
            'periksa' => 'Periksa',
            'tanggal_periksa' => 'Tanggal Periksa',
            'userid' => 'Userid',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKbmDetails()
    {
        return $this->hasMany(KbmDetail::className(), ['idkbm' => 'idkbm']);
    }
}
