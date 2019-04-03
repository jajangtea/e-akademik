<?php

namespace app\models\simak;

use Yii;

/**
 * This is the model class for table "berita".
 *
 * @property int $idberita
 * @property int $idcat_berita
 * @property string $tanggal_berita
 * @property string $tanggal_modifikasi
 * @property string $userid
 * @property string $tipe
 * @property string $judul
 * @property string $content_resume
 * @property string $main_content
 * @property int $draft
 *
 * @property CatBerita $catBerita
 */
class Berita extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'berita';
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
            [['idcat_berita', 'tanggal_berita', 'tanggal_modifikasi', 'userid', 'tipe', 'judul', 'content_resume', 'main_content', 'draft'], 'required'],
            [['idcat_berita', 'draft'], 'integer'],
            [['tanggal_berita', 'tanggal_modifikasi'], 'safe'],
            [['content_resume', 'main_content'], 'string'],
            [['userid'], 'string', 'max' => 20],
            [['tipe'], 'string', 'max' => 2],
            [['judul'], 'string', 'max' => 255],
            [['idcat_berita'], 'exist', 'skipOnError' => true, 'targetClass' => CatBerita::className(), 'targetAttribute' => ['idcat_berita' => 'idcat_berita']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idberita' => 'Idberita',
            'idcat_berita' => 'Idcat Berita',
            'tanggal_berita' => 'Tanggal Berita',
            'tanggal_modifikasi' => 'Tanggal Modifikasi',
            'userid' => 'Userid',
            'tipe' => 'Tipe',
            'judul' => 'Judul',
            'content_resume' => 'Content Resume',
            'main_content' => 'Main Content',
            'draft' => 'Draft',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCatBerita()
    {
        return $this->hasOne(CatBerita::className(), ['idcat_berita' => 'idcat_berita']);
    }
}
