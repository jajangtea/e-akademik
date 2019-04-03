<?php

namespace app\models\simak;

use Yii;

/**
 * This is the model class for table "passinggrade".
 *
 * @property int $idpassing_grade
 * @property int $idjadwal_ujian
 * @property int $kjur
 * @property string $tahun_masuk
 * @property int $nilai
 *
 * @property JadwalUjianPmb $jadwalUjian
 */
class Passinggrade extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'passinggrade';
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
            [['idjadwal_ujian', 'kjur', 'tahun_masuk', 'nilai'], 'required'],
            [['idjadwal_ujian', 'kjur', 'nilai'], 'integer'],
            [['tahun_masuk'], 'safe'],
            [['idjadwal_ujian'], 'exist', 'skipOnError' => true, 'targetClass' => JadwalUjianPmb::className(), 'targetAttribute' => ['idjadwal_ujian' => 'idjadwal_ujian']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idpassing_grade' => 'Idpassing Grade',
            'idjadwal_ujian' => 'Idjadwal Ujian',
            'kjur' => 'Kjur',
            'tahun_masuk' => 'Tahun Masuk',
            'nilai' => 'Nilai',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJadwalUjian()
    {
        return $this->hasOne(JadwalUjianPmb::className(), ['idjadwal_ujian' => 'idjadwal_ujian']);
    }
}
