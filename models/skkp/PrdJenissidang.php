<?php

namespace app\models\skkp;

use Yii;

/**
 * This is the model class for table "prd_jenissidang".
 *
 * @property int $IDJenisSidang
 * @property string $NamaSidang
 * @property double $NominalVakasi
 *
 * @property PrdPengajuan[] $prdPengajuans
 * @property PrdPersyaratanJenis[] $prdPersyaratanJenis
 * @property PrdSidangmaster[] $prdSidangmasters
 */
class PrdJenissidang extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'prd_jenissidang';
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
            [['IDJenisSidang', 'NominalVakasi'], 'required'],
            [['IDJenisSidang'], 'integer'],
            [['NominalVakasi'], 'number'],
            [['NamaSidang'], 'string', 'max' => 50],
            [['IDJenisSidang'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'IDJenisSidang' => 'Id Jenis Sidang',
            'NamaSidang' => 'Nama Sidang',
            'NominalVakasi' => 'Nominal Vakasi',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPrdPengajuans()
    {
        return $this->hasMany(PrdPengajuan::className(), ['IDJenisSidang' => 'IDJenisSidang']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPrdPersyaratanJenis()
    {
        return $this->hasMany(PrdPersyaratanJenis::className(), ['idJenisSidang' => 'IDJenisSidang']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPrdSidangmasters()
    {
        return $this->hasMany(PrdSidangmaster::className(), ['IDJenisSidang' => 'IDJenisSidang']);
    }
}
