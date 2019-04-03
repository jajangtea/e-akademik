<?php

namespace app\models\skkp;

use Yii;

/**
 * This is the model class for table "prd_jadwalbimbingan".
 *
 * @property int $idJadwalBimbingan
 * @property string $hari
 * @property string $jam
 * @property string $KodeDosen
 *
 * @property PrdDosen $kodeDosen
 */
class PrdJadwalbimbingan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'prd_jadwalbimbingan';
    }

    /**
     * @return \yii\db\Connection the database connection used by this AR class.
     */
    public static function getDb()
    {
        return Yii::$app->get('db_skkp');
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['hari', 'jam'], 'string', 'max' => 200],
            [['KodeDosen'], 'string', 'max' => 3],
            [['KodeDosen'], 'exist', 'skipOnError' => true, 'targetClass' => PrdDosen::className(), 'targetAttribute' => ['KodeDosen' => 'KodeDosen']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idJadwalBimbingan' => 'Id Jadwal Bimbingan',
            'hari' => 'Hari',
            'jam' => 'Jam',
            'KodeDosen' => 'Kode Dosen',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKodeDosen()
    {
        return $this->hasOne(PrdDosen::className(), ['KodeDosen' => 'KodeDosen']);
    }
}
