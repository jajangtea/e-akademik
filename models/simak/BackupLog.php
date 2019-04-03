<?php

namespace app\models\simak;

use Yii;

/**
 * This is the model class for table "backup_log".
 *
 * @property int $backup_log_id
 * @property int $user_id
 * @property string $backup_time
 * @property string $backup_file
 */
class BackupLog extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'backup_log';
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
            [['user_id'], 'integer'],
            [['backup_time'], 'safe'],
            [['backup_file'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'backup_log_id' => 'Backup Log ID',
            'user_id' => 'User ID',
            'backup_time' => 'Backup Time',
            'backup_file' => 'Backup File',
        ];
    }
}
