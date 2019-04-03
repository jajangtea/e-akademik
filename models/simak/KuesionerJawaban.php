<?php

namespace app\models\simak;

use Yii;

/**
 * This is the model class for table "kuesioner_jawaban".
 *
 * @property string $idkuesioner_jawaban
 * @property int $idpengampu_penyelenggaraan
 * @property string $idkrsmatkul
 * @property int $idkuesioner
 * @property int $idindikator
 *
 * @property Kuesioner $kuesioner
 * @property PengampuPenyelenggaraan $pengampuPenyelenggaraan
 * @property KuesionerIndikator $indikator
 */
class KuesionerJawaban extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'kuesioner_jawaban';
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
            [['idpengampu_penyelenggaraan', 'idkrsmatkul', 'idkuesioner', 'idindikator'], 'required'],
            [['idpengampu_penyelenggaraan', 'idkrsmatkul', 'idkuesioner', 'idindikator'], 'integer'],
            [['idkuesioner'], 'exist', 'skipOnError' => true, 'targetClass' => Kuesioner::className(), 'targetAttribute' => ['idkuesioner' => 'idkuesioner']],
            [['idpengampu_penyelenggaraan'], 'exist', 'skipOnError' => true, 'targetClass' => PengampuPenyelenggaraan::className(), 'targetAttribute' => ['idpengampu_penyelenggaraan' => 'idpengampu_penyelenggaraan']],
            [['idindikator'], 'exist', 'skipOnError' => true, 'targetClass' => KuesionerIndikator::className(), 'targetAttribute' => ['idindikator' => 'idindikator']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idkuesioner_jawaban' => 'Idkuesioner Jawaban',
            'idpengampu_penyelenggaraan' => 'Idpengampu Penyelenggaraan',
            'idkrsmatkul' => 'Idkrsmatkul',
            'idkuesioner' => 'Idkuesioner',
            'idindikator' => 'Idindikator',
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
    public function getPengampuPenyelenggaraan()
    {
        return $this->hasOne(PengampuPenyelenggaraan::className(), ['idpengampu_penyelenggaraan' => 'idpengampu_penyelenggaraan']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIndikator()
    {
        return $this->hasOne(KuesionerIndikator::className(), ['idindikator' => 'idindikator']);
    }
}
