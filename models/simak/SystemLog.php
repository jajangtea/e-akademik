<?php

namespace app\models\simak;

use Yii;

/**
 * This is the model class for table "system_log".
 *
 * @property int $log_id
 * @property string $log_type
 * @property string $id
 * @property string $log_location
 * @property string $log_msg
 * @property string $log_date
 */
class SystemLog extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'system_log';
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
            [['log_type', 'log_msg'], 'string'],
            [['log_location', 'log_msg', 'log_date'], 'required'],
            [['log_date'], 'safe'],
            [['id', 'log_location'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'log_id' => 'Log ID',
            'log_type' => 'Log Type',
            'id' => 'ID',
            'log_location' => 'Log Location',
            'log_msg' => 'Log Msg',
            'log_date' => 'Log Date',
        ];
    }
}
