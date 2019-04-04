<?php

namespace app\models\akademik;

use Yii;

/**
 * This is the model class for table "{{%mahasiswa}}".
 *
 * @property int $idMahasiswa
 * @property int $nim
 * @property string $nama
 * @property string $alamat
 * @property string $tlp
 * @property int $idProdi
 *
 * @property Prodi $prodi
 * @property Surat[] $surats
 */
class Mahasiswa extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%mahasiswa}}';
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
            [['nim', 'nama', 'alamat', 'tlp', 'idProdi'], 'required'],
            [['nim', 'idProdi'], 'integer'],
            [['nama', 'alamat'], 'string', 'max' => 250],
            [['tlp'], 'string', 'max' => 15],
            [['idProdi'], 'exist', 'skipOnError' => true, 'targetClass' => Prodi::className(), 'targetAttribute' => ['idProdi' => 'idProdi']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idMahasiswa' => 'Id Mahasiswa',
            'nim' => 'Nim',
            'nama' => 'Nama',
            'alamat' => 'Alamat',
            'tlp' => 'Tlp',
            'idProdi' => 'Id Prodi',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProdi()
    {
        return $this->hasOne(Prodi::className(), ['idProdi' => 'idProdi']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSurats()
    {
        return $this->hasMany(Surat::className(), ['idMahasiswa' => 'idMahasiswa']);
    }
}
