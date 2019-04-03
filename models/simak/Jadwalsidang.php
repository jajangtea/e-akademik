<?php

namespace app\models\simak;

use Yii;

/**
 * This is the model class for table "jadwalsidang".
 *
 * @property int $idjadwalsidang
 * @property string $tanggalsidang
 * @property string $jamsidang_awal
 * @property string $jamsidang_akhir
 * @property int $kjur
 * @property int $idsmt
 * @property string $tahun
 * @property string $nim
 * @property int $penguji1
 * @property int $penguji2
 */
class Jadwalsidang extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'jadwalsidang';
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
            [['tanggalsidang', 'jamsidang_awal', 'jamsidang_akhir', 'kjur', 'idsmt', 'tahun', 'nim', 'penguji1', 'penguji2'], 'required'],
            [['tanggalsidang', 'tahun'], 'safe'],
            [['kjur', 'idsmt', 'penguji1', 'penguji2'], 'integer'],
            [['jamsidang_awal', 'jamsidang_akhir'], 'string', 'max' => 9],
            [['nim'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idjadwalsidang' => 'Idjadwalsidang',
            'tanggalsidang' => 'Tanggalsidang',
            'jamsidang_awal' => 'Jamsidang Awal',
            'jamsidang_akhir' => 'Jamsidang Akhir',
            'kjur' => 'Kjur',
            'idsmt' => 'Idsmt',
            'tahun' => 'Tahun',
            'nim' => 'Nim',
            'penguji1' => 'Penguji1',
            'penguji2' => 'Penguji2',
        ];
    }
}
