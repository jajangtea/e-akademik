<?php

namespace app\models\simak;

use Yii;

/**
 * This is the model class for table "tugas_mk".
 *
 * @property int $idtugas_mk
 * @property int $idkelas_mhs
 * @property string $nama
 * @property string $tujuan
 * @property string $tanggal_buat
 * @property string $tanggal_mulai
 * @property string $tanggal_selesai
 *
 * @property NilaiTugas[] $nilaiTugas
 * @property KelasMhs $kelasMhs
 */
class TugasMk extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tugas_mk';
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
            [['idkelas_mhs', 'nama', 'tujuan', 'tanggal_buat', 'tanggal_mulai', 'tanggal_selesai'], 'required'],
            [['idkelas_mhs'], 'integer'],
            [['tujuan'], 'string'],
            [['tanggal_buat', 'tanggal_mulai', 'tanggal_selesai'], 'safe'],
            [['nama'], 'string', 'max' => 255],
            [['idkelas_mhs'], 'exist', 'skipOnError' => true, 'targetClass' => KelasMhs::className(), 'targetAttribute' => ['idkelas_mhs' => 'idkelas_mhs']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idtugas_mk' => 'Idtugas Mk',
            'idkelas_mhs' => 'Idkelas Mhs',
            'nama' => 'Nama',
            'tujuan' => 'Tujuan',
            'tanggal_buat' => 'Tanggal Buat',
            'tanggal_mulai' => 'Tanggal Mulai',
            'tanggal_selesai' => 'Tanggal Selesai',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNilaiTugas()
    {
        return $this->hasMany(NilaiTugas::className(), ['idtugas_mk' => 'idtugas_mk']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKelasMhs()
    {
        return $this->hasOne(KelasMhs::className(), ['idkelas_mhs' => 'idkelas_mhs']);
    }
}
