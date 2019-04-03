<?php

namespace app\models\simak;

use Yii;

/**
 * This is the model class for table "usulan_penelitian".
 *
 * @property int $idusulan
 * @property string $nim
 * @property string $tahun
 * @property int $idsmt
 * @property string $tanggal
 * @property string $judul_usulan
 * @property string $lokasi
 * @property string $subyek
 * @property string $abstrak
 * @property int $iddosen1
 * @property int $iddosen2
 * @property int $status
 *
 * @property RegisterMahasiswa $nim0
 */
class UsulanPenelitian extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'usulan_penelitian';
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
            [['nim', 'tahun', 'idsmt', 'tanggal', 'judul_usulan', 'lokasi', 'subyek', 'abstrak', 'iddosen1', 'iddosen2', 'status'], 'required'],
            [['tahun', 'tanggal'], 'safe'],
            [['idsmt', 'iddosen1', 'iddosen2', 'status'], 'integer'],
            [['abstrak'], 'string'],
            [['nim'], 'string', 'max' => 20],
            [['judul_usulan'], 'string', 'max' => 255],
            [['lokasi'], 'string', 'max' => 100],
            [['subyek'], 'string', 'max' => 70],
            [['nim'], 'exist', 'skipOnError' => true, 'targetClass' => RegisterMahasiswa::className(), 'targetAttribute' => ['nim' => 'nim']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idusulan' => 'Idusulan',
            'nim' => 'Nim',
            'tahun' => 'Tahun',
            'idsmt' => 'Idsmt',
            'tanggal' => 'Tanggal',
            'judul_usulan' => 'Judul Usulan',
            'lokasi' => 'Lokasi',
            'subyek' => 'Subyek',
            'abstrak' => 'Abstrak',
            'iddosen1' => 'Iddosen1',
            'iddosen2' => 'Iddosen2',
            'status' => 'Status',
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
