<?php

namespace app\models\simak;

use Yii;

/**
 * This is the model class for table "perpanjangan_studi".
 *
 * @property int $idperpanjangan
 * @property string $nim
 * @property string $nim_lama
 * @property string $tanggal
 *
 * @property RegisterMahasiswa $nim0
 */
class PerpanjanganStudi extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'perpanjangan_studi';
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
            [['nim', 'nim_lama', 'tanggal'], 'required'],
            [['tanggal'], 'safe'],
            [['nim', 'nim_lama'], 'string', 'max' => 20],
            [['nim'], 'exist', 'skipOnError' => true, 'targetClass' => RegisterMahasiswa::className(), 'targetAttribute' => ['nim' => 'nim']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idperpanjangan' => 'Idperpanjangan',
            'nim' => 'Nim',
            'nim_lama' => 'Nim Lama',
            'tanggal' => 'Tanggal',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNim0()
    {
        return $this->hasOne(RegisterMahasiswa::className(), ['nim' => 'nim']);
    }
}
