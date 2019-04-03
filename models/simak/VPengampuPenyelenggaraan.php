<?php

namespace app\models\simak;

use Yii;

/**
 * This is the model class for table "v_pengampu_penyelenggaraan".
 *
 * @property int $idpengampu_penyelenggaraan
 * @property string $idpenyelenggaraan
 * @property int $kjur
 * @property string $kmatkul
 * @property string $nmatkul
 * @property string $sks
 * @property string $semester
 * @property int $iddosen
 * @property string $nidn
 * @property string $nama_dosen
 * @property int $idsmt
 * @property string $tahun
 */
class VPengampuPenyelenggaraan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'v_pengampu_penyelenggaraan';
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
            [['idpengampu_penyelenggaraan', 'idpenyelenggaraan', 'kjur', 'iddosen', 'idsmt'], 'integer'],
            [['kjur', 'kmatkul', 'nmatkul', 'sks', 'semester', 'iddosen', 'nidn', 'idsmt', 'tahun'], 'required'],
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
            'idpengampu_penyelenggaraan' => 'Idpengampu Penyelenggaraan',
            'idpenyelenggaraan' => 'Idpenyelenggaraan',
            'kjur' => 'Kjur',
            'kmatkul' => 'Kmatkul',
            'nmatkul' => 'Nmatkul',
            'sks' => 'Sks',
            'semester' => 'Semester',
            'iddosen' => 'Iddosen',
            'nidn' => 'Nidn',
            'nama_dosen' => 'Nama Dosen',
            'idsmt' => 'Idsmt',
            'tahun' => 'Tahun',
        ];
    }
}
