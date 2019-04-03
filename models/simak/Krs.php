<?php

namespace app\models\simak;

use Yii;

/**
 * This is the model class for table "krs".
 *
 * @property string $idkrs
 * @property string $tgl_krs
 * @property string $no_krs
 * @property string $nim
 * @property int $idsmt
 * @property string $tahun
 * @property int $tasmt
 * @property int $sah
 * @property string $tgl_disahkan
 *
 * @property RegisterMahasiswa $nim0
 * @property Krsmatkul[] $krsmatkuls
 */
class Krs extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'krs';
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
            [['tgl_krs', 'no_krs', 'nim', 'idsmt', 'tahun', 'tasmt', 'sah', 'tgl_disahkan'], 'required'],
            [['tgl_krs', 'tahun', 'tgl_disahkan'], 'safe'],
            [['idsmt', 'tasmt', 'sah'], 'integer'],
            [['no_krs'], 'string', 'max' => 50],
            [['nim'], 'string', 'max' => 20],
            [['nim'], 'exist', 'skipOnError' => true, 'targetClass' => RegisterMahasiswa::className(), 'targetAttribute' => ['nim' => 'nim']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idkrs' => 'Idkrs',
            'tgl_krs' => 'Tgl Krs',
            'no_krs' => 'No Krs',
            'nim' => 'Nim',
            'idsmt' => 'Idsmt',
            'tahun' => 'Tahun',
            'tasmt' => 'Tasmt',
            'sah' => 'Sah',
            'tgl_disahkan' => 'Tgl Disahkan',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNim0()
    {
        return $this->hasOne(RegisterMahasiswa::className(), ['nim' => 'nim']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKrsmatkuls()
    {
        return $this->hasMany(Krsmatkul::className(), ['idkrs' => 'idkrs']);
    }
}
