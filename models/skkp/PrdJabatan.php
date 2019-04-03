<?php

namespace app\models\skkp;

use Yii;

/**
 * This is the model class for table "prd_jabatan".
 *
 * @property int $IdJabatan
 * @property string $KodeDosen
 * @property string $IdJenisDosen
 *
 * @property PrdDosen $kodeDosen
 * @property PrdJenisdosen $jenisDosen
 */
class PrdJabatan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'prd_jabatan';
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
            [['KodeDosen', 'IdJenisDosen'], 'string', 'max' => 3],
            [['KodeDosen'], 'exist', 'skipOnError' => true, 'targetClass' => PrdDosen::className(), 'targetAttribute' => ['KodeDosen' => 'KodeDosen']],
            [['IdJenisDosen'], 'exist', 'skipOnError' => true, 'targetClass' => PrdJenisdosen::className(), 'targetAttribute' => ['IdJenisDosen' => 'IdJenisDosen']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'IdJabatan' => 'Id Jabatan',
            'KodeDosen' => 'Kode Dosen',
            'IdJenisDosen' => 'Id Jenis Dosen',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKodeDosen()
    {
        return $this->hasOne(PrdDosen::className(), ['KodeDosen' => 'KodeDosen']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJenisDosen()
    {
        return $this->hasOne(PrdJenisdosen::className(), ['IdJenisDosen' => 'IdJenisDosen']);
    }
}
