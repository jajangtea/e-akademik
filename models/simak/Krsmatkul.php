<?php

namespace app\models\simak;

use Yii;

/**
 * This is the model class for table "krsmatkul".
 *
 * @property string $idkrsmatkul
 * @property string $idkrs
 * @property string $idpenyelenggaraan
 * @property int $batal
 *
 * @property KbmDetail[] $kbmDetails
 * @property KelasMhsDetail $kelasMhsDetail
 * @property Krs $krs
 * @property Penyelenggaraan $penyelenggaraan
 * @property NilaiAbsensi $nilaiAbsensi
 * @property NilaiImported $nilaiImported
 * @property NilaiMatakuliah $nilaiMatakuliah
 * @property NilaiQuiz[] $nilaiQuizzes
 * @property NilaiTugas[] $nilaiTugas
 * @property NilaiUas $nilaiUas
 * @property NilaiUts $nilaiUts
 */
class Krsmatkul extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'krsmatkul';
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
            [['idkrs', 'idpenyelenggaraan', 'batal'], 'required'],
            [['idkrs', 'idpenyelenggaraan', 'batal'], 'integer'],
            [['idkrs'], 'exist', 'skipOnError' => true, 'targetClass' => Krs::className(), 'targetAttribute' => ['idkrs' => 'idkrs']],
            [['idpenyelenggaraan'], 'exist', 'skipOnError' => true, 'targetClass' => Penyelenggaraan::className(), 'targetAttribute' => ['idpenyelenggaraan' => 'idpenyelenggaraan']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idkrsmatkul' => 'Idkrsmatkul',
            'idkrs' => 'Idkrs',
            'idpenyelenggaraan' => 'Idpenyelenggaraan',
            'batal' => 'Batal',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKbmDetails()
    {
        return $this->hasMany(KbmDetail::className(), ['idkrsmatkul' => 'idkrsmatkul']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKelasMhsDetail()
    {
        return $this->hasOne(KelasMhsDetail::className(), ['idkrsmatkul' => 'idkrsmatkul']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKrs()
    {
        return $this->hasOne(Krs::className(), ['idkrs' => 'idkrs']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPenyelenggaraan()
    {
        return $this->hasOne(Penyelenggaraan::className(), ['idpenyelenggaraan' => 'idpenyelenggaraan']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNilaiAbsensi()
    {
        return $this->hasOne(NilaiAbsensi::className(), ['idkrsmatkul' => 'idkrsmatkul']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNilaiImported()
    {
        return $this->hasOne(NilaiImported::className(), ['idkrsmatkul' => 'idkrsmatkul']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNilaiMatakuliah()
    {
        return $this->hasOne(NilaiMatakuliah::className(), ['idkrsmatkul' => 'idkrsmatkul']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNilaiQuizzes()
    {
        return $this->hasMany(NilaiQuiz::className(), ['idkrsmatkul' => 'idkrsmatkul']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNilaiTugas()
    {
        return $this->hasMany(NilaiTugas::className(), ['idkrsmatkul' => 'idkrsmatkul']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNilaiUas()
    {
        return $this->hasOne(NilaiUas::className(), ['idkrsmatkul' => 'idkrsmatkul']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNilaiUts()
    {
        return $this->hasOne(NilaiUts::className(), ['idkrsmatkul' => 'idkrsmatkul']);
    }
}
