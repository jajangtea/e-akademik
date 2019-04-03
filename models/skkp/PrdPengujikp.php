<?php

namespace app\models\skkp;

use Yii;

/**
 * This is the model class for table "prd_pengujikp".
 *
 * @property int $idPengujiKp
 * @property int $idPendaftaran
 * @property int $idUser
 *
 * @property PrdPendaftaran $pendaftaran
 * @property PrdUser $user
 */
class PrdPengujikp extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'prd_pengujikp';
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
            [['idPendaftaran', 'idUser'], 'integer'],
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
            'idPengujiKp' => 'Id Penguji Kp',
            'idPendaftaran' => 'Id Pendaftaran',
            'idUser' => 'Id User',
        ];
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
