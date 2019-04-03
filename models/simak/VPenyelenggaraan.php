<?php

namespace app\models\simak;

use Yii;

/**
 * This is the model class for table "v_penyelenggaraan".
 *
 * @property string $idpenyelenggaraan
 * @property int $kjur
 * @property int $idsmt
 * @property string $tahun
 * @property string $kmatkul
 * @property int $idkur
 * @property string $nmatkul
 * @property string $sks
 * @property string $semester
 * @property int $aktif
 * @property int $iddosen
 * @property string $nidn
 * @property string $nama_dosen
 */
class VPenyelenggaraan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'v_penyelenggaraan';
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
            [['idpenyelenggaraan', 'kjur', 'idsmt', 'idkur', 'aktif', 'iddosen'], 'integer'],
            [['kjur', 'idsmt', 'tahun', 'kmatkul', 'idkur', 'nmatkul', 'sks', 'semester', 'iddosen', 'nidn'], 'required'],
            [['tahun'], 'safe'],
            [['kmatkul'], 'string', 'max' => 9],
            [['nmatkul'], 'string', 'max' => 50],
            [['sks'], 'string', 'max' => 1],
            [['semester'], 'string', 'max' => 2],
            [['nidn'], 'string', 'max' => 15],
            [['nama_dosen'], 'string', 'max' => 112],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idpenyelenggaraan' => 'Idpenyelenggaraan',
            'kjur' => 'Kjur',
            'idsmt' => 'Idsmt',
            'tahun' => 'Tahun',
            'kmatkul' => 'Kmatkul',
            'idkur' => 'Idkur',
            'nmatkul' => 'Nmatkul',
            'sks' => 'Sks',
            'semester' => 'Semester',
            'aktif' => 'Aktif',
            'iddosen' => 'Iddosen',
            'nidn' => 'Nidn',
            'nama_dosen' => 'Nama Dosen',
        ];
    }
}
