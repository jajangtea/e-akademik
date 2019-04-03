<?php

namespace app\models\simak;

use Yii;

/**
 * This is the model class for table "peserta_ujian_pmb".
 *
 * @property int $idpeserta_ujian
 * @property int $no_formulir
 * @property int $idjadwal_ujian
 * @property string $date_added
 *
 * @property Pin $noFormulir
 * @property JadwalUjianPmb $jadwalUjian
 */
class PesertaUjianPmb extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'peserta_ujian_pmb';
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
            [['no_formulir', 'idjadwal_ujian', 'date_added'], 'required'],
            [['no_formulir', 'idjadwal_ujian'], 'integer'],
            [['date_added'], 'safe'],
            [['no_formulir'], 'unique'],
            [['no_formulir'], 'exist', 'skipOnError' => true, 'targetClass' => Pin::className(), 'targetAttribute' => ['no_formulir' => 'no_formulir']],
            [['idjadwal_ujian'], 'exist', 'skipOnError' => true, 'targetClass' => JadwalUjianPmb::className(), 'targetAttribute' => ['idjadwal_ujian' => 'idjadwal_ujian']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idpeserta_ujian' => 'Idpeserta Ujian',
            'no_formulir' => 'No Formulir',
            'idjadwal_ujian' => 'Idjadwal Ujian',
            'date_added' => 'Date Added',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNoFormulir()
    {
        return $this->hasOne(Pin::className(), ['no_formulir' => 'no_formulir']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJadwalUjian()
    {
        return $this->hasOne(JadwalUjianPmb::className(), ['idjadwal_ujian' => 'idjadwal_ujian']);
    }
}
