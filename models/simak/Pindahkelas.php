<?php

namespace app\models\simak;

use Yii;

/**
 * This is the model class for table "pindahkelas".
 *
 * @property int $idpindahkelas
 * @property string $nim
 * @property string $idkelas_lama
 * @property string $idkelas_baru
 * @property string $tahun
 * @property int $idsmt
 * @property string $tanggal
 * @property string $no_surat
 * @property string $Keterangan
 *
 * @property RegisterMahasiswa $nim0
 */
class Pindahkelas extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pindahkelas';
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
            [['nim', 'idkelas_lama', 'idkelas_baru', 'tahun', 'idsmt', 'tanggal', 'no_surat', 'Keterangan'], 'required'],
            [['tahun', 'tanggal'], 'safe'],
            [['idsmt'], 'integer'],
            [['nim'], 'string', 'max' => 20],
            [['idkelas_lama', 'idkelas_baru'], 'string', 'max' => 1],
            [['no_surat'], 'string', 'max' => 30],
            [['Keterangan'], 'string', 'max' => 255],
            [['no_surat'], 'unique'],
            [['nim'], 'exist', 'skipOnError' => true, 'targetClass' => RegisterMahasiswa::className(), 'targetAttribute' => ['nim' => 'nim']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idpindahkelas' => 'Idpindahkelas',
            'nim' => 'Nim',
            'idkelas_lama' => 'Idkelas Lama',
            'idkelas_baru' => 'Idkelas Baru',
            'tahun' => 'Tahun',
            'idsmt' => 'Idsmt',
            'tanggal' => 'Tanggal',
            'no_surat' => 'No Surat',
            'Keterangan' => 'Keterangan',
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
