<?php

namespace app\models\skkp;

use Yii;

/**
 * This is the model class for table "prd_pengujiskripsi".
 *
 * @property int $idPengujiSkripsi
 * @property int $idPendaftaran
 * @property int $idUser
 * @property double $nilai
 * @property int $idPengajuan
 *
 * @property PrdNilaiPenguji[] $prdNilaiPengujis
 * @property PrdPendaftaran $pendaftaran
 * @property PrdUser $user
 */
class PrdPengujiskripsi extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'prd_pengujiskripsi';
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
            [['idPendaftaran', 'idUser', 'idPengajuan'], 'integer'],
            [['nilai', 'idPengajuan'], 'required'],
            [['nilai'], 'number'],
            [['idPendaftaran'], 'exist', 'skipOnError' => true, 'targetClass' => PrdPendaftaran::className(), 'targetAttribute' => ['idPendaftaran' => 'idPendaftaran']],
            [['idUser'], 'exist', 'skipOnError' => true, 'targetClass' => PrdUser::className(), 'targetAttribute' => ['idUser' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idPengujiSkripsi' => 'Id Penguji Skripsi',
            'idPendaftaran' => 'Id Pendaftaran',
            'idUser' => 'Id User',
            'nilai' => 'Nilai',
            'idPengajuan' => 'Id Pengajuan',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPrdNilaiPengujis()
    {
        return $this->hasMany(PrdNilaiPenguji::className(), ['idPengujiSkripsi' => 'idPengujiSkripsi']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPendaftaran()
    {
        return $this->hasOne(PrdPendaftaran::className(), ['idPendaftaran' => 'idPendaftaran']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(PrdUser::className(), ['id' => 'idUser']);
    }
}
