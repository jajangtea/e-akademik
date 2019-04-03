<?php

namespace app\models\skkp;

use Yii;

/**
 * This is the model class for table "prd_jenisdosen".
 *
 * @property string $IdJenisDosen
 * @property string $NamaJenis
 *
 * @property PrdJabatan[] $prdJabatans
 */
class PrdJenisdosen extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'prd_jenisdosen';
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
            [['IdJenisDosen'], 'required'],
            [['IdJenisDosen'], 'string', 'max' => 3],
            [['NamaJenis'], 'string', 'max' => 50],
            [['IdJenisDosen'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'IdJenisDosen' => 'Id Jenis Dosen',
            'NamaJenis' => 'Nama Jenis',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPrdJabatans()
    {
        return $this->hasMany(PrdJabatan::className(), ['IdJenisDosen' => 'IdJenisDosen']);
    }
}
