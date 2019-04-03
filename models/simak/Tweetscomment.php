<?php

namespace app\models\simak;

use Yii;

/**
 * This is the model class for table "tweetscomment".
 *
 * @property string $idcomment
 * @property string $id
 * @property string $comment
 * @property string $dt
 * @property string $userid
 * @property string $tipe
 */
class Tweetscomment extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tweetscomment';
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
            [['id', 'comment', 'dt', 'userid', 'tipe'], 'required'],
            [['id'], 'integer'],
            [['dt'], 'safe'],
            [['comment'], 'string', 'max' => 140],
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
            'idcomment' => 'Idcomment',
            'id' => 'ID',
            'comment' => 'Comment',
            'dt' => 'Dt',
            'userid' => 'Userid',
            'tipe' => 'Tipe',
        ];
    }
}
