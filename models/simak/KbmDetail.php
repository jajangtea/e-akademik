<?php

namespace app\models\simak;

use Yii;

/**
 * This is the model class for table "kbm_detail".
 *
 * @property string $idkbm_detail
 * @property int $idkbm
 * @property string $idkrsmatkul
 * @property string $kehadiran
 *
 * @property Kbm $kbm
 * @property Krsmatkul $krsmatkul
 */
class KbmDetail extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'kbm_detail';
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
            [['idkbm', 'idkrsmatkul', 'kehadiran'], 'required'],
            [['idkbm', 'idkrsmatkul'], 'integer'],
            [['kehadiran'], 'string', 'max' => 5],
            [['idkbm'], 'exist', 'skipOnError' => true, 'targetClass' => Kbm::className(), 'targetAttribute' => ['idkbm' => 'idkbm']],
            [['idkrsmatkul'], 'exist', 'skipOnError' => true, 'targetClass' => Krsmatkul::className(), 'targetAttribute' => ['idkrsmatkul' => 'idkrsmatkul']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idkbm_detail' => 'Idkbm Detail',
            'idkbm' => 'Idkbm',
            'idkrsmatkul' => 'Idkrsmatkul',
            'kehadiran' => 'Kehadiran',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKbm()
    {
        return $this->hasOne(Kbm::className(), ['idkbm' => 'idkbm']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKrsmatkul()
    {
        return $this->hasOne(Krsmatkul::className(), ['idkrsmatkul' => 'idkrsmatkul']);
    }
}
