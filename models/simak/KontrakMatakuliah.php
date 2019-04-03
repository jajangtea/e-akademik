<?php

namespace app\models\simak;

use Yii;

/**
 * This is the model class for table "kontrak_matakuliah".
 *
 * @property int $idkelas_mhs
 * @property int $absensi
 * @property int $quiz
 * @property int $tugas
 * @property int $uts
 * @property int $uas
 * @property string $keterangan
 *
 * @property KelasMhs $kelasMhs
 */
class KontrakMatakuliah extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'kontrak_matakuliah';
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
            [['idkelas_mhs', 'absensi', 'quiz', 'tugas', 'uts', 'uas', 'keterangan'], 'required'],
            [['idkelas_mhs', 'absensi', 'quiz', 'tugas', 'uts', 'uas'], 'integer'],
            [['keterangan'], 'string'],
            [['idkelas_mhs'], 'unique'],
            [['idkelas_mhs'], 'exist', 'skipOnError' => true, 'targetClass' => KelasMhs::className(), 'targetAttribute' => ['idkelas_mhs' => 'idkelas_mhs']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idkelas_mhs' => 'Idkelas Mhs',
            'absensi' => 'Absensi',
            'quiz' => 'Quiz',
            'tugas' => 'Tugas',
            'uts' => 'Uts',
            'uas' => 'Uas',
            'keterangan' => 'Keterangan',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKelasMhs()
    {
        return $this->hasOne(KelasMhs::className(), ['idkelas_mhs' => 'idkelas_mhs']);
    }
}
