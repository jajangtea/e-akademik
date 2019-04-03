<?php

namespace app\models\simak;

use Yii;

/**
 * This is the model class for table "transkrip_asli".
 *
 * @property string $nim
 * @property string $nomor_transkrip
 * @property string $predikat_kelulusan
 * @property string $tanggal_lulus
 * @property string $judul_skripsi
 * @property int $iddosen_pembimbing
 * @property int $iddosen_pembimbing2
 * @property int $iddosen_ketua
 * @property int $iddosen_pemket
 * @property string $tahun
 * @property int $idsmt
 *
 * @property RegisterMahasiswa $nim0
 * @property Dosen $dosenPembimbing
 * @property Dosen $dosenKetua
 * @property Dosen $dosenPemket
 * @property TranskripAsliDetail[] $transkripAsliDetails
 */
class TranskripAsli extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'transkrip_asli';
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
            [['nim', 'nomor_transkrip', 'predikat_kelulusan', 'tanggal_lulus', 'judul_skripsi', 'iddosen_pembimbing', 'iddosen_pembimbing2', 'iddosen_ketua', 'iddosen_pemket', 'tahun', 'idsmt'], 'required'],
            [['tanggal_lulus', 'tahun'], 'safe'],
            [['iddosen_pembimbing', 'iddosen_pembimbing2', 'iddosen_ketua', 'iddosen_pemket', 'idsmt'], 'integer'],
            [['nim', 'nomor_transkrip'], 'string', 'max' => 20],
            [['predikat_kelulusan'], 'string', 'max' => 30],
            [['judul_skripsi'], 'string', 'max' => 255],
            [['nim'], 'unique'],
            [['nim'], 'exist', 'skipOnError' => true, 'targetClass' => RegisterMahasiswa::className(), 'targetAttribute' => ['nim' => 'nim']],
            [['iddosen_pembimbing'], 'exist', 'skipOnError' => true, 'targetClass' => Dosen::className(), 'targetAttribute' => ['iddosen_pembimbing' => 'iddosen']],
            [['iddosen_ketua'], 'exist', 'skipOnError' => true, 'targetClass' => Dosen::className(), 'targetAttribute' => ['iddosen_ketua' => 'iddosen']],
            [['iddosen_pemket'], 'exist', 'skipOnError' => true, 'targetClass' => Dosen::className(), 'targetAttribute' => ['iddosen_pemket' => 'iddosen']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'nim' => 'Nim',
            'nomor_transkrip' => 'Nomor Transkrip',
            'predikat_kelulusan' => 'Predikat Kelulusan',
            'tanggal_lulus' => 'Tanggal Lulus',
            'judul_skripsi' => 'Judul Skripsi',
            'iddosen_pembimbing' => 'Iddosen Pembimbing',
            'iddosen_pembimbing2' => 'Iddosen Pembimbing2',
            'iddosen_ketua' => 'Iddosen Ketua',
            'iddosen_pemket' => 'Iddosen Pemket',
            'tahun' => 'Tahun',
            'idsmt' => 'Idsmt',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNim0()
    {
        return $this->hasOne(RegisterMahasiswa::className(), ['nim' => 'nim']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDosenPembimbing()
    {
        return $this->hasOne(Dosen::className(), ['iddosen' => 'iddosen_pembimbing']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDosenKetua()
    {
        return $this->hasOne(Dosen::className(), ['iddosen' => 'iddosen_ketua']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDosenPemket()
    {
        return $this->hasOne(Dosen::className(), ['iddosen' => 'iddosen_pemket']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTranskripAsliDetails()
    {
        return $this->hasMany(TranskripAsliDetail::className(), ['nim' => 'nim']);
    }
}
