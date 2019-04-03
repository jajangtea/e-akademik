<?php

namespace app\models\simak;

use Yii;

/**
 * This is the model class for table "nilai_konversi2".
 *
 * @property string $idnilai_konversi
 * @property string $iddata_konversi
 * @property string $kmatkul
 * @property string $kmatkul_asal
 * @property string $matkul_asal
 * @property int $sks_asal
 * @property string $n_kual
 * @property string $keterangan
 *
 * @property Matakuliah $kmatkul0
 * @property DataKonversi2 $dataKonversi
 */
class NilaiKonversi2 extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'nilai_konversi2';
    }

    /**
     * @return \yii\db\Connection the database connection used by this AR class.
     */
    public static function getDb()
    {
        return Yii::$app->get('db_simak');
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['iddata_konversi', 'kmatkul', 'kmatkul_asal', 'matkul_asal', 'sks_asal', 'n_kual'], 'required'],
            [['iddata_konversi', 'sks_asal'], 'integer'],
            [['kmatkul', 'kmatkul_asal'], 'string', 'max' => 9],
            [['matkul_asal'], 'string', 'max' => 80],
            [['n_kual'], 'string', 'max' => 1],
            [['keterangan'], 'string', 'max' => 25],
            [['kmatkul'], 'exist', 'skipOnError' => true, 'targetClass' => Matakuliah::className(), 'targetAttribute' => ['kmatkul' => 'kmatkul']],
            [['iddata_konversi'], 'exist', 'skipOnError' => true, 'targetClass' => DataKonversi2::className(), 'targetAttribute' => ['iddata_konversi' => 'iddata_konversi']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idnilai_konversi' => 'Idnilai Konversi',
            'iddata_konversi' => 'Iddata Konversi',
            'kmatkul' => 'Kmatkul',
            'kmatkul_asal' => 'Kmatkul Asal',
            'matkul_asal' => 'Matkul Asal',
            'sks_asal' => 'Sks Asal',
            'n_kual' => 'N Kual',
            'keterangan' => 'Keterangan',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKmatkul0()
    {
        return $this->hasOne(Matakuliah::className(), ['kmatkul' => 'kmatkul']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDataKonversi()
    {
        return $this->hasOne(DataKonversi2::className(), ['iddata_konversi' => 'iddata_konversi']);
    }
}
