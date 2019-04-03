<?php

namespace app\models\simak;

use Yii;

/**
 * This is the model class for table "dulang".
 *
 * @property string $iddulang
 * @property string $nim
 * @property string $tahun
 * @property int $idsmt
 * @property int $tasmt
 * @property string $tanggal
 * @property string $idkelas
 * @property string $status_sebelumnya
 * @property string $k_status
 *
 * @property RegisterMahasiswa $nim0
 */
class Dulang extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'dulang';
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
            [['nim', 'tahun', 'idsmt', 'tasmt', 'tanggal', 'idkelas', 'status_sebelumnya', 'k_status'], 'required'],
            [['tahun', 'tanggal'], 'safe'],
            [['idsmt', 'tasmt'], 'integer'],
            [['nim'], 'string', 'max' => 20],
            [['idkelas', 'status_sebelumnya', 'k_status'], 'string', 'max' => 1],
            [['nim'], 'exist', 'skipOnError' => true, 'targetClass' => RegisterMahasiswa::className(), 'targetAttribute' => ['nim' => 'nim']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'iddulang' => 'Iddulang',
            'nim' => 'Nim',
            'tahun' => 'Tahun',
            'idsmt' => 'Idsmt',
            'tasmt' => 'Tasmt',
            'tanggal' => 'Tanggal',
            'idkelas' => 'Idkelas',
            'status_sebelumnya' => 'Status Sebelumnya',
            'k_status' => 'K Status',
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
