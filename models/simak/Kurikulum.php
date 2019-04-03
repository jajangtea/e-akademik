<?php

namespace app\models\simak;

use Yii;

/**
 * This is the model class for table "kurikulum".
 *
 * @property int $idkur
 * @property int $kjur
 * @property string $ta
 * @property string $tanggal
 * @property string $catatan
 * @property int $default_
 *
 * @property DataKonversi2[] $dataKonversi2s
 * @property Matakuliah[] $matakuliahs
 */
class Kurikulum extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'kurikulum';
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
            [['kjur', 'ta', 'tanggal', 'catatan', 'default_'], 'required'],
            [['kjur', 'default_'], 'integer'],
            [['ta', 'tanggal'], 'safe'],
            [['catatan'], 'string', 'max' => 60],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idkur' => 'Idkur',
            'kjur' => 'Kjur',
            'ta' => 'Ta',
            'tanggal' => 'Tanggal',
            'catatan' => 'Catatan',
            'default_' => 'Default',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDataKonversi2s()
    {
        return $this->hasMany(DataKonversi2::className(), ['idkur' => 'idkur']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMatakuliahs()
    {
        return $this->hasMany(Matakuliah::className(), ['idkur' => 'idkur']);
    }
}
