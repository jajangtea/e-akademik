<?php

namespace app\models\simak;

use Yii;

/**
 * This is the model class for table "pkrs".
 *
 * @property int $idpkrs
 * @property string $nim
 * @property string $idpenyelenggaraan
 * @property int $tambah
 * @property int $hapus
 * @property int $batal
 * @property int $sah
 * @property string $tanggal
 *
 * @property RegisterMahasiswa $nim0
 * @property Penyelenggaraan $penyelenggaraan
 */
class Pkrs extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pkrs';
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
            [['nim', 'idpenyelenggaraan', 'tambah', 'hapus', 'batal', 'sah', 'tanggal'], 'required'],
            [['idpenyelenggaraan', 'tambah', 'hapus', 'batal', 'sah'], 'integer'],
            [['tanggal'], 'safe'],
            [['nim'], 'string', 'max' => 20],
            [['nim'], 'exist', 'skipOnError' => true, 'targetClass' => RegisterMahasiswa::className(), 'targetAttribute' => ['nim' => 'nim']],
            [['idpenyelenggaraan'], 'exist', 'skipOnError' => true, 'targetClass' => Penyelenggaraan::className(), 'targetAttribute' => ['idpenyelenggaraan' => 'idpenyelenggaraan']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idpkrs' => 'Idpkrs',
            'nim' => 'Nim',
            'idpenyelenggaraan' => 'Idpenyelenggaraan',
            'tambah' => 'Tambah',
            'hapus' => 'Hapus',
            'batal' => 'Batal',
            'sah' => 'Sah',
            'tanggal' => 'Tanggal',
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
    public function getPenyelenggaraan()
    {
        return $this->hasOne(Penyelenggaraan::className(), ['idpenyelenggaraan' => 'idpenyelenggaraan']);
    }
}
