<?php

namespace app\models\akademik;

use Yii;

/**
 * This is the model class for table "{{%surat}}".
 *
 * @property int $idSurat
 * @property int $idJenis
 * @property string $tanggalSurat
 * @property int $idMahasiswa
 * @property int $idKeperluan
 * @property int $idKategori
 * @property string $tanggalBuat
 * @property string $noSurat
 * @property int $tujuan
 * @property int $idThajaran
 * @property string $judul
 *
 * @property JenisSurat $jenis
 * @property Keperluan $keperluan
 * @property Kategori $kategori
 * @property Mahasiswa $mahasiswa
 * @property Perusahaan $tujuan0
 * @property Ta $thajaran
 */
class Surat extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%surat}}';
    }

    /**
     * @return \yii\db\Connection the database connection used by this AR class.
     */
    public static function getDb()
    {
        return Yii::$app->get('db_akademik');
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idJenis', 'tanggalSurat', 'idMahasiswa', 'idKeperluan', 'idKategori', 'tanggalBuat', 'noSurat', 'tujuan', 'idThajaran'], 'required'],
            [['idJenis', 'idMahasiswa', 'idKeperluan', 'idKategori', 'tujuan', 'idThajaran'], 'integer'],
            [['tanggalSurat', 'tanggalBuat'], 'safe'],
            [['judul'], 'string'],
            [['noSurat'], 'string', 'max' => 200],
            [['idJenis'], 'exist', 'skipOnError' => true, 'targetClass' => JenisSurat::className(), 'targetAttribute' => ['idJenis' => 'idJenis']],
            [['idKeperluan'], 'exist', 'skipOnError' => true, 'targetClass' => Keperluan::className(), 'targetAttribute' => ['idKeperluan' => 'idKeperluan']],
            [['idKategori'], 'exist', 'skipOnError' => true, 'targetClass' => Kategori::className(), 'targetAttribute' => ['idKategori' => 'idKategori']],
            [['idMahasiswa'], 'exist', 'skipOnError' => true, 'targetClass' => Mahasiswa::className(), 'targetAttribute' => ['idMahasiswa' => 'idMahasiswa']],
            [['tujuan'], 'exist', 'skipOnError' => true, 'targetClass' => Perusahaan::className(), 'targetAttribute' => ['tujuan' => 'idPerusahaan']],
            [['idThajaran'], 'exist', 'skipOnError' => true, 'targetClass' => Ta::className(), 'targetAttribute' => ['idThajaran' => 'idThajaran']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idSurat' => 'Id Surat',
            'idJenis' => 'Id Jenis',
            'tanggalSurat' => 'Tanggal Surat',
            'idMahasiswa' => 'Id Mahasiswa',
            'idKeperluan' => 'Id Keperluan',
            'idKategori' => 'Id Kategori',
            'tanggalBuat' => 'Tanggal Buat',
            'noSurat' => 'No Surat',
            'tujuan' => 'Tujuan',
            'idThajaran' => 'Id Thajaran',
            'judul' => 'Judul',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJenis()
    {
        return $this->hasOne(JenisSurat::className(), ['idJenis' => 'idJenis']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKeperluan()
    {
        return $this->hasOne(Keperluan::className(), ['idKeperluan' => 'idKeperluan']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKategori()
    {
        return $this->hasOne(Kategori::className(), ['idKategori' => 'idKategori']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMahasiswa()
    {
        return $this->hasOne(Mahasiswa::className(), ['idMahasiswa' => 'idMahasiswa']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTujuan0()
    {
        return $this->hasOne(Perusahaan::className(), ['idPerusahaan' => 'tujuan']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getThajaran()
    {
        return $this->hasOne(Ta::className(), ['idThajaran' => 'idThajaran']);
    }
}
