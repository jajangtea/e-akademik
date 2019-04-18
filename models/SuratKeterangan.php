<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%surat_keterangan}}".
 *
 * @property string $nomor_surat
 * @property int $nim
 * @property string $nama
 * @property string $tahun
 * @property string $keperluan
 */
class SuratKeterangan extends \yii\db\ActiveRecord {

    /**
     * {@inheritdoc}
     */
    public $alamat, $nama_semester;

    public static function tableName() {
        return '{{%surat_keterangan}}';
    }

    public static function getDb() {
        return Yii::$app->get('db_akademik');
    }

    public function formatRomawi() {
        $romawi = ['I', 'II', 'III', 'IV', 'V', 'VI', 'VII', 'VIII', 'IX', 'X', 'XI', 'XII'];
        $bulan = $romawi[date('n') - 1];
        return "?/SKET/Puket-I/{$bulan}/" . date('Y');
    }

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['tahunsmt'], 'unique'],
            [['nomor_surat'], 'unique'],
            [['keperluan'], 'required'],
            [['nomor_surat'], 'autonumber', 'format' => 'formatRomawi'],
            [['nim'], 'integer'],
            [['nomor_surat', 'nama', 'alamat', 'idsmt', 'tahunsmt'], 'string', 'max' => 200],
            [['tahun'], 'string', 'max' => 10],
            [['keperluan'], 'string', 'max' => 250],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels() {
        return [
            'nomor_surat' => 'Nomor Surat',
            'nim' => 'NIM',
            'idsmt' => 'Semester',
            'tahunsmt' => 'tahunsmt',
            'nama' => 'Nama',
            'tahun' => 'Tahun Akademik',
            'keperluan' => 'Keperluan',
        ];
    }

}
