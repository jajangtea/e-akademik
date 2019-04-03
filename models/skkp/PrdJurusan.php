<?php

namespace app\models\skkp;

use Yii;

/**
 * This is the model class for table "prd_jurusan".
 *
 * @property string $KodeJurusan
 * @property string $NamaJurusan
 *
 * @property PrdMahasiswa[] $prdMahasiswas
 */
class PrdJurusan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'prd_jurusan';
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
            [['KodeJurusan'], 'required'],
            [['KodeJurusan'], 'string', 'max' => 50],
            [['NamaJurusan'], 'string', 'max' => 100],
            [['KodeJurusan'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'KodeJurusan' => 'Kode Jurusan',
            'NamaJurusan' => 'Nama Jurusan',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPrdMahasiswas()
    {
        return $this->hasMany(PrdMahasiswa::className(), ['KodeJurusan' => 'KodeJurusan']);
    }
}
