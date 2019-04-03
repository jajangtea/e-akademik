<?php

namespace app\models\simak;

use Yii;

/**
 * This is the model class for table "quiz_mk".
 *
 * @property int $idquiz_mk
 * @property int $idkelas_mhs
 * @property string $nama
 * @property string $tujuan
 * @property string $tanggal_quiz
 *
 * @property NilaiQuiz[] $nilaiQuizzes
 * @property KelasMhs $kelasMhs
 */
class QuizMk extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'quiz_mk';
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
            [['idkelas_mhs', 'nama', 'tujuan', 'tanggal_quiz'], 'required'],
            [['idkelas_mhs'], 'integer'],
            [['tujuan'], 'string'],
            [['tanggal_quiz'], 'safe'],
            [['nama'], 'string', 'max' => 255],
            [['idkelas_mhs'], 'exist', 'skipOnError' => true, 'targetClass' => KelasMhs::className(), 'targetAttribute' => ['idkelas_mhs' => 'idkelas_mhs']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idquiz_mk' => 'Idquiz Mk',
            'idkelas_mhs' => 'Idkelas Mhs',
            'nama' => 'Nama',
            'tujuan' => 'Tujuan',
            'tanggal_quiz' => 'Tanggal Quiz',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNilaiQuizzes()
    {
        return $this->hasMany(NilaiQuiz::className(), ['idquiz_mk' => 'idquiz_mk']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKelasMhs()
    {
        return $this->hasOne(KelasMhs::className(), ['idkelas_mhs' => 'idkelas_mhs']);
    }
}
