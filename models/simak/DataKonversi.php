<?php

namespace app\models\simak;

use Yii;

/**
 * This is the model class for table "data_konversi".
 *
 * @property string $idkonversi
 * @property string $iddata_konversi
 * @property string $nim
 *
 * @property RegisterMahasiswa $nim0
 * @property DataKonversi2 $dataKonversi
 */
class DataKonversi extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'data_konversi';
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
            [['iddata_konversi', 'nim'], 'required'],
            [['iddata_konversi'], 'integer'],
            [['nim'], 'string', 'max' => 20],
            [['nim'], 'unique'],
            [['iddata_konversi'], 'unique'],
            [['nim'], 'exist', 'skipOnError' => true, 'targetClass' => RegisterMahasiswa::className(), 'targetAttribute' => ['nim' => 'nim']],
            [['iddata_konversi'], 'exist', 'skipOnError' => true, 'targetClass' => DataKonversi2::className(), 'targetAttribute' => ['iddata_konversi' => 'iddata_konversi']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idkonversi' => 'Idkonversi',
            'iddata_konversi' => 'Iddata Konversi',
            'nim' => 'Nim',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNim0()
    {
        return $this->hasOne(RegisterMahasiswa::className(), ['nim' => 'nim']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDataKonversi()
    {
        return $this->hasOne(DataKonversi2::className(), ['iddata_konversi' => 'iddata_konversi']);
    }
}
