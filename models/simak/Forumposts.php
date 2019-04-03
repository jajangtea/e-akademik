<?php

namespace app\models\simak;

use Yii;

/**
 * This is the model class for table "forumposts".
 *
 * @property int $idpost
 * @property int $idkategori
 * @property int $parentpost
 * @property string $title
 * @property string $content
 * @property int $sumlike
 * @property string $userid
 * @property string $tipe
 * @property string $nama_user
 * @property int $unread
 * @property string $date_added
 */
class Forumposts extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'forumposts';
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
            [['idkategori', 'parentpost', 'title', 'content', 'sumlike', 'userid', 'tipe', 'nama_user', 'date_added'], 'required'],
            [['idkategori', 'parentpost', 'sumlike', 'unread'], 'integer'],
            [['content'], 'string'],
            [['date_added'], 'safe'],
            [['title', 'nama_user'], 'string', 'max' => 100],
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
            'idpost' => 'Idpost',
            'idkategori' => 'Idkategori',
            'parentpost' => 'Parentpost',
            'title' => 'Title',
            'content' => 'Content',
            'sumlike' => 'Sumlike',
            'userid' => 'Userid',
            'tipe' => 'Tipe',
            'nama_user' => 'Nama User',
            'unread' => 'Unread',
            'date_added' => 'Date Added',
        ];
    }
}
