<?php

namespace app\models\simak;

use Yii;

/**
 * This is the model class for table "transkrip_asli_detail".
 *
 * @property string $idtranskrip_detail
 * @property string $nim
 * @property string $kmatkul
 * @property string $nmatkul
 * @property string $sks
 * @property int $semester
 * @property string $n_kual
 *
 * @property TranskripAsli $nim0
 */
class TranskripAsliDetail extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'transkrip_asli_detail';
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
            [['nim', 'kmatkul', 'nmatkul', 'sks', 'semester', 'n_kual'], 'required'],
            [['semester'], 'integer'],
            [['nim'], 'string', 'max' => 20],
            [['kmatkul'], 'string', 'max' => 9],
            [['nmatkul'], 'string', 'max' => 50],
            [['sks', 'n_kual'], 'string', 'max' => 1],
            [['nim'], 'exist', 'skipOnError' => true, 'targetClass' => TranskripAsli::className(), 'targetAttribute' => ['nim' => 'nim']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idtranskrip_detail' => 'Idtranskrip Detail',
            'nim' => 'Nim',
            'kmatkul' => 'Kmatkul',
            'nmatkul' => 'Nmatkul',
            'sks' => 'Sks',
            'semester' => 'Semester',
            'n_kual' => 'N Kual',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNim0()
    {
        return $this->hasOne(TranskripAsli::className(), ['nim' => 'nim']);
    }
}
