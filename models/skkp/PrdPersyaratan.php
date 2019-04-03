<?php

namespace app\models\skkp;

use Yii;

/**
 * This is the model class for table "prd_persyaratan".
 *
 * @property int $idPersyaratan
 * @property string $namaPersyaratan
 *
 * @property PrdPersyaratanJenis[] $prdPersyaratanJenis
 */
class PrdPersyaratan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'prd_persyaratan';
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
            [['namaPersyaratan'], 'string', 'max' => 200],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idPersyaratan' => 'Id Persyaratan',
            'namaPersyaratan' => 'Nama Persyaratan',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPrdPersyaratanJenis()
    {
        return $this->hasMany(PrdPersyaratanJenis::className(), ['idPersyaratan' => 'idPersyaratan']);
    }
}
