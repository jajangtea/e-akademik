<?php

namespace app\models\simak;

use Yii;

/**
 * This is the model class for table "tweets".
 *
 * @property string $id
 * @property string $tweets
 * @property string $dt
 * @property string $userid
 * @property string $tipe
 */
class Tweets extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tweets';
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
            [['tweets', 'dt', 'userid', 'tipe'], 'required'],
            [['dt'], 'safe'],
            [['tweets'], 'string', 'max' => 140],
            [['userid'], 'string', 'max' => 20],
            [['tipe'], 'string', 'max' => 2],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'tweets' => 'Tweets',
            'dt' => 'Dt',
            'userid' => 'Userid',
            'tipe' => 'Tipe',
        ];
    }
}
