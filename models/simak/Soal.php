<?php

namespace app\models\simak;

use Yii;

/**
 * This is the model class for table "soal".
 *
 * @property int $idsoal
 * @property string $nama_soal
 * @property string $date_added
 * @property string $date_modified
 *
 * @property Jawaban[] $jawabans
 * @property JawabanUjian[] $jawabanUjians
 */
class Soal extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'soal';
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
            [['nama_soal', 'date_added', 'date_modified'], 'required'],
            [['nama_soal'], 'string'],
            [['date_added', 'date_modified'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idsoal' => 'Idsoal',
            'nama_soal' => 'Nama Soal',
            'date_added' => 'Date Added',
            'date_modified' => 'Date Modified',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJawabans()
    {
        return $this->hasMany(Jawaban::className(), ['idsoal' => 'idsoal']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJawabanUjians()
    {
        return $this->hasMany(JawabanUjian::className(), ['idsoal' => 'idsoal']);
    }
}
