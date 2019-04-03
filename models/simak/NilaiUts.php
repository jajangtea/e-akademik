<?php

namespace app\models\simak;

use Yii;

/**
 * This is the model class for table "nilai_uts".
 *
 * @property string $idnilai_uts
 * @property string $idkrsmatkul
 * @property int $n_kuan
 *
 * @property Krsmatkul $krsmatkul
 */
class NilaiUts extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'nilai_uts';
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
            [['idkrsmatkul', 'n_kuan'], 'required'],
            [['idkrsmatkul', 'n_kuan'], 'integer'],
            [['idkrsmatkul'], 'unique'],
            [['idkrsmatkul'], 'exist', 'skipOnError' => true, 'targetClass' => Krsmatkul::className(), 'targetAttribute' => ['idkrsmatkul' => 'idkrsmatkul']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idnilai_uts' => 'Idnilai Uts',
            'idkrsmatkul' => 'Idkrsmatkul',
            'n_kuan' => 'N Kuan',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKrsmatkul()
    {
        return $this->hasOne(Krsmatkul::className(), ['idkrsmatkul' => 'idkrsmatkul']);
    }
}
