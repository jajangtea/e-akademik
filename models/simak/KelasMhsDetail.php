<?php

namespace app\models\simak;

use Yii;

/**
 * This is the model class for table "kelas_mhs_detail".
 *
 * @property string $idkelas_mhs_detail
 * @property int $idkelas_mhs
 * @property string $idkrsmatkul
 *
 * @property KelasMhs $kelasMhs
 * @property Krsmatkul $krsmatkul
 */
class KelasMhsDetail extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'kelas_mhs_detail';
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
            [['idkelas_mhs', 'idkrsmatkul'], 'required'],
            [['idkelas_mhs', 'idkrsmatkul'], 'integer'],
            [['idkrsmatkul'], 'unique'],
            [['idkelas_mhs'], 'exist', 'skipOnError' => true, 'targetClass' => KelasMhs::className(), 'targetAttribute' => ['idkelas_mhs' => 'idkelas_mhs']],
            [['idkrsmatkul'], 'exist', 'skipOnError' => true, 'targetClass' => Krsmatkul::className(), 'targetAttribute' => ['idkrsmatkul' => 'idkrsmatkul']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idkelas_mhs_detail' => 'Idkelas Mhs Detail',
            'idkelas_mhs' => 'Idkelas Mhs',
            'idkrsmatkul' => 'Idkrsmatkul',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKelasMhs()
    {
        return $this->hasOne(KelasMhs::className(), ['idkelas_mhs' => 'idkelas_mhs']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKrsmatkul()
    {
        return $this->hasOne(Krsmatkul::className(), ['idkrsmatkul' => 'idkrsmatkul']);
    }
}
