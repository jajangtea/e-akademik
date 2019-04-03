<?php

namespace app\models\skkp;

use Yii;

/**
 * This is the model class for table "prd_nilai_penguji".
 *
 * @property int $idNilaiPenguji
 * @property int $idPengujiSkripsi
 * @property double $nilaiSkripsi
 *
 * @property PrdPengujiskripsi $pengujiSkripsi
 */
class PrdNilaiPenguji extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'prd_nilai_penguji';
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
            [['idPengujiSkripsi'], 'integer'],
            [['nilaiSkripsi'], 'number'],
            [['idPengujiSkripsi'], 'exist', 'skipOnError' => true, 'targetClass' => PrdPengujiskripsi::className(), 'targetAttribute' => ['idPengujiSkripsi' => 'idPengujiSkripsi']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idNilaiPenguji' => 'Id Nilai Penguji',
            'idPengujiSkripsi' => 'Id Penguji Skripsi',
            'nilaiSkripsi' => 'Nilai Skripsi',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPengujiSkripsi()
    {
        return $this->hasOne(PrdPengujiskripsi::className(), ['idPengujiSkripsi' => 'idPengujiSkripsi']);
    }
}
