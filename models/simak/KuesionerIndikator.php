<?php

namespace app\models\simak;

use Yii;

/**
 * This is the model class for table "kuesioner_indikator".
 *
 * @property int $idindikator
 * @property int $idkuesioner
 * @property int $nilai_indikator
 * @property string $nama_indikator
 *
 * @property Kuesioner $kuesioner
 * @property KuesionerJawaban[] $kuesionerJawabans
 */
class KuesionerIndikator extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'kuesioner_indikator';
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
            [['idkuesioner', 'nilai_indikator'], 'required'],
            [['idkuesioner', 'nilai_indikator'], 'integer'],
            [['nama_indikator'], 'string', 'max' => 50],
            [['idkuesioner'], 'exist', 'skipOnError' => true, 'targetClass' => Kuesioner::className(), 'targetAttribute' => ['idkuesioner' => 'idkuesioner']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idindikator' => 'Idindikator',
            'idkuesioner' => 'Idkuesioner',
            'nilai_indikator' => 'Nilai Indikator',
            'nama_indikator' => 'Nama Indikator',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKuesioner()
    {
        return $this->hasOne(Kuesioner::className(), ['idkuesioner' => 'idkuesioner']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKuesionerJawabans()
    {
        return $this->hasMany(KuesionerJawaban::className(), ['idindikator' => 'idindikator']);
    }
}
