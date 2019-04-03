<?php

namespace app\models\simak;

use Yii;

/**
 * This is the model class for table "pendaftaran_konsentrasi".
 *
 * @property string $nim
 * @property int $kjur
 * @property int $idkonsentrasi
 * @property int $jumlah_sks
 * @property string $tahun
 * @property int $idsmt
 * @property string $tanggal_daftar
 * @property int $status_daftar
 *
 * @property RegisterMahasiswa $nim0
 */
class PendaftaranKonsentrasi extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pendaftaran_konsentrasi';
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
            [['nim', 'kjur', 'idkonsentrasi', 'jumlah_sks', 'tahun', 'idsmt', 'tanggal_daftar'], 'required'],
            [['kjur', 'idkonsentrasi', 'jumlah_sks', 'idsmt', 'status_daftar'], 'integer'],
            [['tahun', 'tanggal_daftar'], 'safe'],
            [['nim'], 'string', 'max' => 20],
            [['nim'], 'unique'],
            [['nim'], 'exist', 'skipOnError' => true, 'targetClass' => RegisterMahasiswa::className(), 'targetAttribute' => ['nim' => 'nim']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'nim' => 'Nim',
            'kjur' => 'Kjur',
            'idkonsentrasi' => 'Idkonsentrasi',
            'jumlah_sks' => 'Jumlah Sks',
            'tahun' => 'Tahun',
            'idsmt' => 'Idsmt',
            'tanggal_daftar' => 'Tanggal Daftar',
            'status_daftar' => 'Status Daftar',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNim0()
    {
        return $this->hasOne(RegisterMahasiswa::className(), ['nim' => 'nim']);
    }
}
