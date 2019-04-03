<?php

namespace app\models\simak;

use Yii;

/**
 * This is the model class for table "jawaban".
 *
 * @property int $idjawaban
 * @property int $idsoal
 * @property string $jawaban
 * @property int $status
 *
 * @property Soal $soal
 */
class Jawaban extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'jawaban';
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
            [['idsoal', 'jawaban'], 'required'],
            [['idsoal', 'status'], 'integer'],
            [['jawaban'], 'string'],
            [['idsoal'], 'exist', 'skipOnError' => true, 'targetClass' => Soal::className(), 'targetAttribute' => ['idsoal' => 'idsoal']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idjawaban' => 'Idjawaban',
            'idsoal' => 'Idsoal',
            'jawaban' => 'Jawaban',
            'status' => 'Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSoal()
    {
        return $this->hasOne(Soal::className(), ['idsoal' => 'idsoal']);
    }
}
