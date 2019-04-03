<?php

namespace app\models\simak;

use Yii;

/**
 * This is the model class for table "kelompok_pertanyaan".
 *
 * @property int $idkelompok_pertanyaan
 * @property int $idkategori
 * @property string $nama_kelompok
 * @property int $orders
 * @property string $create_at
 * @property string $update_at
 *
 * @property Kuesioner[] $kuesioners
 */
class KelompokPertanyaan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'kelompok_pertanyaan';
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
            [['idkategori', 'nama_kelompok', 'orders', 'create_at', 'update_at'], 'required'],
            [['idkategori', 'orders'], 'integer'],
            [['create_at', 'update_at'], 'safe'],
            [['nama_kelompok'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idkelompok_pertanyaan' => 'Idkelompok Pertanyaan',
            'idkategori' => 'Idkategori',
            'nama_kelompok' => 'Nama Kelompok',
            'orders' => 'Orders',
            'create_at' => 'Create At',
            'update_at' => 'Update At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKuesioners()
    {
        return $this->hasMany(Kuesioner::className(), ['idkelompok_pertanyaan' => 'idkelompok_pertanyaan']);
    }
}
