<?php

namespace app\models\skkp;

use Yii;

/**
 * This is the model class for table "prd_pembimbing".
 *
 * @property int $idPembimbing
 * @property int $idDosen
 * @property int $idPengajuan
 * @property string $status
 *
 * @property PrdUser $dosen
 * @property PrdPengajuan $pengajuan
 */
class PrdPembimbing extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'prd_pembimbing';
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
            [['idDosen', 'idPengajuan'], 'integer'],
            [['status'], 'required'],
            [['status'], 'string', 'max' => 50],
            [['idDosen'], 'exist', 'skipOnError' => true, 'targetClass' => PrdUser::className(), 'targetAttribute' => ['idDosen' => 'id']],
            [['idPengajuan'], 'exist', 'skipOnError' => true, 'targetClass' => PrdPengajuan::className(), 'targetAttribute' => ['idPengajuan' => 'IDPengajuan']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idPembimbing' => 'Id Pembimbing',
            'idDosen' => 'Id Dosen',
            'idPengajuan' => 'Id Pengajuan',
            'status' => 'Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDosen()
    {
        return $this->hasOne(PrdUser::className(), ['id' => 'idDosen']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPengajuan()
    {
        return $this->hasOne(PrdPengajuan::className(), ['IDPengajuan' => 'idPengajuan']);
    }
}
