<?php

namespace app\models\simak;

use Yii;

/**
 * This is the model class for table "log_aktivitas_user".
 *
 * @property string $idlog
 * @property int $userid
 * @property string $username
 * @property string $halaman
 * @property string $aktivitas
 * @property string $date_activity
 */
class LogAktivitasUser extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'log_aktivitas_user';
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
            [['userid', 'username', 'halaman', 'date_activity'], 'required'],
            [['userid'], 'integer'],
            [['aktivitas'], 'string'],
            [['date_activity'], 'safe'],
            [['username'], 'string', 'max' => 40],
            [['halaman'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idlog' => 'Idlog',
            'userid' => 'Userid',
            'username' => 'Username',
            'halaman' => 'Halaman',
            'aktivitas' => 'Aktivitas',
            'date_activity' => 'Date Activity',
        ];
    }
}
