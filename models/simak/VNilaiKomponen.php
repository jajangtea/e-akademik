<?php

namespace app\models\simak;

use Yii;

/**
 * This is the model class for table "v_nilai_komponen".
 *
 * @property string $idkrsmatkul
 * @property int $absensi
 * @property int $tugas
 * @property int $quiz
 * @property int $uts
 * @property int $uas
 */
class VNilaiKomponen extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'v_nilai_komponen';
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
            [['idkrsmatkul', 'absensi', 'tugas', 'quiz', 'uts', 'uas'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idkrsmatkul' => 'Idkrsmatkul',
            'absensi' => 'Absensi',
            'tugas' => 'Tugas',
            'quiz' => 'Quiz',
            'uts' => 'Uts',
            'uas' => 'Uas',
        ];
    }
}
