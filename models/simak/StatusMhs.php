<?php

namespace app\models\simak;

use Yii;

/**
 * This is the model class for table "status_mhs".
 *
 * @property string $k_status
 * @property string $n_status
 */
class StatusMhs extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'status_mhs';
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
            [['k_status', 'n_status'], 'required'],
            [['k_status'], 'string', 'max' => 1],
            [['n_status'], 'string', 'max' => 20],
            [['k_status'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'k_status' => 'K Status',
            'n_status' => 'N Status',
        ];
    }
}
