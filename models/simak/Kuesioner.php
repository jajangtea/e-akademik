<?php

namespace app\models\simak;

use Yii;

/**
 * This is the model class for table "kuesioner".
 *
 * @property int $idkuesioner
 * @property int $old_idkuesioner
 * @property int $idsmt
 * @property string $tahun
 * @property int $idkelompok_pertanyaan
 * @property string $pertanyaan
 * @property int $orders
 * @property string $date_added
 * @property string $date_modified
 *
 * @property KelompokPertanyaan $kelompokPertanyaan
 * @property KuesionerIndikator[] $kuesionerIndikators
 * @property KuesionerJawaban[] $kuesionerJawabans
 */
class Kuesioner extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'kuesioner';
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
            [['old_idkuesioner', 'idsmt', 'tahun', 'idkelompok_pertanyaan', 'pertanyaan', 'orders', 'date_added', 'date_modified'], 'required'],
            [['old_idkuesioner', 'idsmt', 'idkelompok_pertanyaan', 'orders'], 'integer'],
            [['tahun', 'date_added', 'date_modified'], 'safe'],
            [['pertanyaan'], 'string', 'max' => 200],
            [['idkelompok_pertanyaan'], 'exist', 'skipOnError' => true, 'targetClass' => KelompokPertanyaan::className(), 'targetAttribute' => ['idkelompok_pertanyaan' => 'idkelompok_pertanyaan']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idkuesioner' => 'Idkuesioner',
            'old_idkuesioner' => 'Old Idkuesioner',
            'idsmt' => 'Idsmt',
            'tahun' => 'Tahun',
            'idkelompok_pertanyaan' => 'Idkelompok Pertanyaan',
            'pertanyaan' => 'Pertanyaan',
            'orders' => 'Orders',
            'date_added' => 'Date Added',
            'date_modified' => 'Date Modified',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKelompokPertanyaan()
    {
        return $this->hasOne(KelompokPertanyaan::className(), ['idkelompok_pertanyaan' => 'idkelompok_pertanyaan']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKuesionerIndikators()
    {
        return $this->hasMany(KuesionerIndikator::className(), ['idkuesioner' => 'idkuesioner']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKuesionerJawabans()
    {
        return $this->hasMany(KuesionerJawaban::className(), ['idkuesioner' => 'idkuesioner']);
    }
}
