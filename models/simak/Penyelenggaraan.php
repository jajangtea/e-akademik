<?php

namespace app\models\simak;

use Yii;

/**
 * This is the model class for table "penyelenggaraan".
 *
 * @property string $idpenyelenggaraan
 * @property int $idsmt
 * @property string $tahun
 * @property string $kmatkul
 * @property int $kjur
 * @property int $iddosen
 *
 * @property Krsmatkul[] $krsmatkuls
 * @property PengampuPenyelenggaraan[] $pengampuPenyelenggaraans
 * @property Matakuliah $kmatkul0
 * @property Dosen $dosen
 * @property Pkrs[] $pkrs
 */
class Penyelenggaraan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'penyelenggaraan';
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
            [['idsmt', 'tahun', 'kmatkul', 'kjur', 'iddosen'], 'required'],
            [['idsmt', 'kjur', 'iddosen'], 'integer'],
            [['tahun'], 'safe'],
            [['kmatkul'], 'string', 'max' => 9],
            [['kmatkul'], 'exist', 'skipOnError' => true, 'targetClass' => Matakuliah::className(), 'targetAttribute' => ['kmatkul' => 'kmatkul']],
            [['iddosen'], 'exist', 'skipOnError' => true, 'targetClass' => Dosen::className(), 'targetAttribute' => ['iddosen' => 'iddosen']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idpenyelenggaraan' => 'Idpenyelenggaraan',
            'idsmt' => 'Idsmt',
            'tahun' => 'Tahun',
            'kmatkul' => 'Kmatkul',
            'kjur' => 'Kjur',
            'iddosen' => 'Iddosen',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKrsmatkuls()
    {
        return $this->hasMany(Krsmatkul::className(), ['idpenyelenggaraan' => 'idpenyelenggaraan']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPengampuPenyelenggaraans()
    {
        return $this->hasMany(PengampuPenyelenggaraan::className(), ['idpenyelenggaraan' => 'idpenyelenggaraan']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKmatkul0()
    {
        return $this->hasOne(Matakuliah::className(), ['kmatkul' => 'kmatkul']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDosen()
    {
        return $this->hasOne(Dosen::className(), ['iddosen' => 'iddosen']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPkrs()
    {
        return $this->hasMany(Pkrs::className(), ['idpenyelenggaraan' => 'idpenyelenggaraan']);
    }
}
