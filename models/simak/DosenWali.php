<?php

namespace app\models\simak;

use Yii;

/**
 * This is the model class for table "dosen_wali".
 *
 * @property int $iddosen_wali
 * @property int $iddosen
 *
 * @property Dosen $dosen
 */
class DosenWali extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'dosen_wali';
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
            [['iddosen'], 'required'],
            [['iddosen'], 'integer'],
            [['iddosen'], 'exist', 'skipOnError' => true, 'targetClass' => Dosen::className(), 'targetAttribute' => ['iddosen' => 'iddosen']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'iddosen_wali' => 'Iddosen Wali',
            'iddosen' => 'Iddosen',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDosen()
    {
        return $this->hasOne(Dosen::className(), ['iddosen' => 'iddosen']);
    }
}
