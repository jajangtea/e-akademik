<?php

namespace app\models\simak;

use Yii;

/**
 * This is the model class for table "jawaban_ujian".
 *
 * @property int $idjawabanujian
 * @property int $idsoal
 * @property int $idjawaban
 * @property int $no_formulir
 *
 * @property Soal $soal
 * @property KartuUjian $noFormulir
 */
class JawabanUjian extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'jawaban_ujian';
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
            [['idsoal', 'idjawaban', 'no_formulir'], 'required'],
            [['idsoal', 'idjawaban', 'no_formulir'], 'integer'],
            [['idsoal'], 'exist', 'skipOnError' => true, 'targetClass' => Soal::className(), 'targetAttribute' => ['idsoal' => 'idsoal']],
            [['no_formulir'], 'exist', 'skipOnError' => true, 'targetClass' => KartuUjian::className(), 'targetAttribute' => ['no_formulir' => 'no_formulir']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idjawabanujian' => 'Idjawabanujian',
            'idsoal' => 'Idsoal',
            'idjawaban' => 'Idjawaban',
            'no_formulir' => 'No Formulir',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSoal()
    {
        return $this->hasOne(Soal::className(), ['idsoal' => 'idsoal']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNoFormulir()
    {
        return $this->hasOne(KartuUjian::className(), ['no_formulir' => 'no_formulir']);
    }
}
