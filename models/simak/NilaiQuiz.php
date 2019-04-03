<?php

namespace app\models\simak;

use Yii;

/**
 * This is the model class for table "nilai_quiz".
 *
 * @property string $idnilai_quiz
 * @property int $idquiz_mk
 * @property string $idkrsmatkul
 * @property int $n_kuan
 *
 * @property Krsmatkul $krsmatkul
 * @property QuizMk $quizMk
 */
class NilaiQuiz extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'nilai_quiz';
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
            [['idquiz_mk', 'idkrsmatkul', 'n_kuan'], 'required'],
            [['idquiz_mk', 'idkrsmatkul', 'n_kuan'], 'integer'],
            [['idkrsmatkul'], 'exist', 'skipOnError' => true, 'targetClass' => Krsmatkul::className(), 'targetAttribute' => ['idkrsmatkul' => 'idkrsmatkul']],
            [['idquiz_mk'], 'exist', 'skipOnError' => true, 'targetClass' => QuizMk::className(), 'targetAttribute' => ['idquiz_mk' => 'idquiz_mk']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idnilai_quiz' => 'Idnilai Quiz',
            'idquiz_mk' => 'Idquiz Mk',
            'idkrsmatkul' => 'Idkrsmatkul',
            'n_kuan' => 'N Kuan',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKrsmatkul()
    {
        return $this->hasOne(Krsmatkul::className(), ['idkrsmatkul' => 'idkrsmatkul']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getQuizMk()
    {
        return $this->hasOne(QuizMk::className(), ['idquiz_mk' => 'idquiz_mk']);
    }
}
