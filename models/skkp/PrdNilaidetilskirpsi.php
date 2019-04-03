<?php

namespace app\models\skkp;

use Yii;

/**
 * This is the model class for table "prd_nilaidetilskirpsi".
 *
 * @property int $idNilaiSkripsi
 * @property int $IdPendaftaran
 * @property double $NilaiPenguji1
 * @property double $NIlaiPenguji2
 * @property double $NPraSidang
 *
 * @property PrdPendaftaran $pendaftaran
 */
class PrdNilaidetilskirpsi extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'prd_nilaidetilskirpsi';
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
            [['IdPendaftaran'], 'integer'],
            [['NilaiPenguji1', 'NIlaiPenguji2', 'NPraSidang'], 'number'],
            [['IdPendaftaran'], 'exist', 'skipOnError' => true, 'targetClass' => PrdPendaftaran::className(), 'targetAttribute' => ['IdPendaftaran' => 'idPendaftaran']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idNilaiSkripsi' => 'Id Nilai Skripsi',
            'IdPendaftaran' => 'Id Pendaftaran',
            'NilaiPenguji1' => 'Nilai Penguji1',
            'NIlaiPenguji2' => 'N Ilai Penguji2',
            'NPraSidang' => 'N Pra Sidang',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPendaftaran()
    {
        return $this->hasOne(PrdPendaftaran::className(), ['idPendaftaran' => 'IdPendaftaran']);
    }
}
