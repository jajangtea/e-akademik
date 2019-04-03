<?php

namespace app\models\simak;

use Yii;

/**
 * This is the model class for table "log_nilai_matakuliah".
 *
 * @property int $idlog
 * @property string $idlog_master
 * @property string $tanggal
 * @property string $nim
 * @property string $kmatkul
 * @property string $nmatkul
 * @property string $aktivitas
 * @property string $keterangan
 *
 * @property LogMaster $logMaster
 */
class LogNilaiMatakuliah extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'log_nilai_matakuliah';
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
            [['idlog_master', 'tanggal', 'nim', 'kmatkul', 'nmatkul', 'aktivitas', 'keterangan'], 'required'],
            [['idlog_master'], 'integer'],
            [['tanggal'], 'safe'],
            [['nim'], 'string', 'max' => 20],
            [['kmatkul'], 'string', 'max' => 9],
            [['nmatkul'], 'string', 'max' => 50],
            [['aktivitas'], 'string', 'max' => 15],
            [['keterangan'], 'string', 'max' => 100],
            [['idlog_master'], 'exist', 'skipOnError' => true, 'targetClass' => LogMaster::className(), 'targetAttribute' => ['idlog_master' => 'idlog_master']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idlog' => 'Idlog',
            'idlog_master' => 'Idlog Master',
            'tanggal' => 'Tanggal',
            'nim' => 'Nim',
            'kmatkul' => 'Kmatkul',
            'nmatkul' => 'Nmatkul',
            'aktivitas' => 'Aktivitas',
            'keterangan' => 'Keterangan',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLogMaster()
    {
        return $this->hasOne(LogMaster::className(), ['idlog_master' => 'idlog_master']);
    }
}
