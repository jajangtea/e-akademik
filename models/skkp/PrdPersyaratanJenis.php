<?php

namespace app\models\skkp;

use Yii;

/**
 * This is the model class for table "prd_persyaratan_jenis".
 *
 * @property int $idPersyaratanJenis
 * @property int $idJenisSidang
 * @property int $idPersyaratan
 *
 * @property PrdJenissidang $jenisSidang
 * @property PrdPersyaratan $persyaratan
 */
class PrdPersyaratanJenis extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'prd_persyaratan_jenis';
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
            [['idJenisSidang', 'idPersyaratan'], 'integer'],
            [['idJenisSidang'], 'exist', 'skipOnError' => true, 'targetClass' => PrdJenissidang::className(), 'targetAttribute' => ['idJenisSidang' => 'IDJenisSidang']],
            [['idPersyaratan'], 'exist', 'skipOnError' => true, 'targetClass' => PrdPersyaratan::className(), 'targetAttribute' => ['idPersyaratan' => 'idPersyaratan']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idPersyaratanJenis' => 'Id Persyaratan Jenis',
            'idJenisSidang' => 'Id Jenis Sidang',
            'idPersyaratan' => 'Id Persyaratan',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJenisSidang()
    {
        return $this->hasOne(PrdJenissidang::className(), ['IDJenisSidang' => 'idJenisSidang']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPersyaratan()
    {
        return $this->hasOne(PrdPersyaratan::className(), ['idPersyaratan' => 'idPersyaratan']);
    }
}
