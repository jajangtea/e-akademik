<?php

namespace app\models\simak;

use Yii;

/**
 * This is the model class for table "kombi_per_ta".
 *
 * @property int $idkombi_per_ta
 * @property string $idkelas
 * @property int $idkombi
 * @property string $tahun
 * @property int $idsmt
 * @property int $biaya
 *
 * @property Kombi $kombi
 */
class KombiPerTa extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'kombi_per_ta';
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
            [['idkelas', 'idkombi', 'tahun', 'idsmt', 'biaya'], 'required'],
            [['idkombi', 'idsmt', 'biaya'], 'integer'],
            [['tahun'], 'safe'],
            [['idkelas'], 'string', 'max' => 1],
            [['idkombi'], 'exist', 'skipOnError' => true, 'targetClass' => Kombi::className(), 'targetAttribute' => ['idkombi' => 'idkombi']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idkombi_per_ta' => 'Idkombi Per Ta',
            'idkelas' => 'Idkelas',
            'idkombi' => 'Idkombi',
            'tahun' => 'Tahun',
            'idsmt' => 'Idsmt',
            'biaya' => 'Biaya',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKombi()
    {
        return $this->hasOne(Kombi::className(), ['idkombi' => 'idkombi']);
    }
}
