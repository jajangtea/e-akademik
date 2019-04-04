<?php

namespace app\models\akademik;

use Yii;

/**
 * This is the model class for table "{{%prodi}}".
 *
 * @property int $idProdi
 * @property string $kodeProdi
 * @property string $namaProdi
 *
 * @property Mahasiswa[] $mahasiswas
 */
class Prodi extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%prodi}}';
    }

    /**
     * @return \yii\db\Connection the database connection used by this AR class.
     */
    public static function getDb()
    {
        return Yii::$app->get('db_akademik');
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['kodeProdi', 'namaProdi'], 'required'],
            [['kodeProdi'], 'string', 'max' => 5],
            [['namaProdi'], 'string', 'max' => 200],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idProdi' => 'Id Prodi',
            'kodeProdi' => 'Kode Prodi',
            'namaProdi' => 'Nama Prodi',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMahasiswas()
    {
        return $this->hasMany(Mahasiswa::className(), ['idProdi' => 'idProdi']);
    }
}
