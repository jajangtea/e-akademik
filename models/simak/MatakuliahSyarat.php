<?php

namespace app\models\simak;

use Yii;

/**
 * This is the model class for table "matakuliah_syarat".
 *
 * @property int $idsyarat_kmatkul
 * @property string $kmatkul
 * @property string $kmatkul_syarat
 *
 * @property Matakuliah $kmatkul0
 */
class MatakuliahSyarat extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'matakuliah_syarat';
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
            [['kmatkul', 'kmatkul_syarat'], 'required'],
            [['kmatkul', 'kmatkul_syarat'], 'string', 'max' => 9],
            [['kmatkul'], 'exist', 'skipOnError' => true, 'targetClass' => Matakuliah::className(), 'targetAttribute' => ['kmatkul' => 'kmatkul']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idsyarat_kmatkul' => 'Idsyarat Kmatkul',
            'kmatkul' => 'Kmatkul',
            'kmatkul_syarat' => 'Kmatkul Syarat',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKmatkul0()
    {
        return $this->hasOne(Matakuliah::className(), ['kmatkul' => 'kmatkul']);
    }
}
