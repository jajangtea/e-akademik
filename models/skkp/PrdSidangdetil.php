<?php

namespace app\models\skkp;

use Yii;

/**
 * This is the model class for table "prd_sidangdetil".
 *
 * @property int $IdSidangDetil
 * @property int $IdPendaftaran
 * @property string $Penguji1
 * @property string $Penguji2
 *
 * @property PrdPendaftaran $pendaftaran
 * @property PrdDosen $penguji1
 * @property PrdDosen $penguji2
 */
class PrdSidangdetil extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'prd_sidangdetil';
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
            [['Penguji1', 'Penguji2'], 'string', 'max' => 20],
            [['IdPendaftaran'], 'exist', 'skipOnError' => true, 'targetClass' => PrdPendaftaran::className(), 'targetAttribute' => ['IdPendaftaran' => 'idPendaftaran']],
            [['Penguji1'], 'exist', 'skipOnError' => true, 'targetClass' => PrdDosen::className(), 'targetAttribute' => ['Penguji1' => 'KodeDosen']],
            [['Penguji2'], 'exist', 'skipOnError' => true, 'targetClass' => PrdDosen::className(), 'targetAttribute' => ['Penguji2' => 'KodeDosen']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'IdSidangDetil' => 'Id Sidang Detil',
            'IdPendaftaran' => 'Id Pendaftaran',
            'Penguji1' => 'Penguji1',
            'Penguji2' => 'Penguji2',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPendaftaran()
    {
        return $this->hasOne(PrdPendaftaran::className(), ['idPendaftaran' => 'IdPendaftaran']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPenguji1()
    {
        return $this->hasOne(PrdDosen::className(), ['KodeDosen' => 'Penguji1']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPenguji2()
    {
        return $this->hasOne(PrdDosen::className(), ['KodeDosen' => 'Penguji2']);
    }
}
