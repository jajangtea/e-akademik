<?php

namespace app\models\skkp;

use Yii;

/**
 * This is the model class for table "prd_sidangmaster".
 *
 * @property int $IdSidang
 * @property string $Tanggal
 * @property int $IDJenisSidang
 * @property int $IdTa
 * @property int $status
 * @property string $tglBuka
 * @property string $tglTutup
 * @property int $idPeriode
 *
 * @property PrdPendaftaran[] $prdPendaftarans
 * @property PrdJenissidang $jenisSidang
 * @property PrdTa $ta
 */
class PrdSidangmaster extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'prd_sidangmaster';
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
            [['Tanggal', 'tglBuka', 'tglTutup'], 'safe'],
            [['IDJenisSidang', 'IdTa', 'status', 'idPeriode'], 'integer'],
            [['idPeriode'], 'required'],
            [['IDJenisSidang'], 'exist', 'skipOnError' => true, 'targetClass' => PrdJenissidang::className(), 'targetAttribute' => ['IDJenisSidang' => 'IDJenisSidang']],
            [['IdTa'], 'exist', 'skipOnError' => true, 'targetClass' => PrdTa::className(), 'targetAttribute' => ['IdTa' => 'IdTa']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'IdSidang' => 'Id Sidang',
            'Tanggal' => 'Tanggal',
            'IDJenisSidang' => 'Id Jenis Sidang',
            'IdTa' => 'Id Ta',
            'status' => 'Status',
            'tglBuka' => 'Tgl Buka',
            'tglTutup' => 'Tgl Tutup',
            'idPeriode' => 'Id Periode',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPrdPendaftarans()
    {
        return $this->hasMany(PrdPendaftaran::className(), ['IdSidang' => 'IdSidang']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJenisSidang()
    {
        return $this->hasOne(PrdJenissidang::className(), ['IDJenisSidang' => 'IDJenisSidang']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTa()
    {
        return $this->hasOne(PrdTa::className(), ['IdTa' => 'IdTa']);
    }
}
