<?php

namespace app\models\simak;

use Yii;

/**
 * This is the model class for table "pengumuman".
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
 * @property string $file_name
 * @property string $file_type
 * @property int $file_size
 * @property string $file_path
 * @property string $file_url
 * @property string $date_added
 */
class Pengumuman extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pengumuman';
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
            [['idkategori', 'parentpost', 'title', 'content', 'sumlike', 'userid', 'tipe', 'nama_user', 'file_name', 'file_type', 'file_size', 'file_path', 'file_url', 'date_added'], 'required'],
            [['idkategori', 'parentpost', 'sumlike', 'unread', 'file_size'], 'integer'],
            [['content'], 'string'],
            [['date_added'], 'safe'],
            [['title'], 'string', 'max' => 255],
            [['userid'], 'string', 'max' => 20],
            [['tipe'], 'string', 'max' => 2],
            [['nama_user', 'file_name', 'file_type', 'file_path', 'file_url'], 'string', 'max' => 100],
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
            'file_name' => 'File Name',
            'file_type' => 'File Type',
            'file_size' => 'File Size',
            'file_path' => 'File Path',
            'file_url' => 'File Url',
            'date_added' => 'Date Added',
        ];
    }
}
