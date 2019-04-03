<?php

namespace app\models\skkp;

use Yii;

/**
 * This is the model class for table "smk_info".
 *
 * @property int $idInfo
 * @property string $namaInfo
 * @property string $gallery
 * @property string $deskripsi
 * @property int $active
 * @property string $thumbs
 */
class SmkInfo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'smk_info';
    }

    /**
     * @return \yii\db\Connection the database connection used by this AR class.
     */
    public static function getDb()
    {
        return Yii::$app->get('db_skkp');
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['deskripsi'], 'string'],
            [['active'], 'integer'],
            [['namaInfo', 'gallery', 'thumbs'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idInfo' => 'Id Info',
            'namaInfo' => 'Nama Info',
            'gallery' => 'Gallery',
            'deskripsi' => 'Deskripsi',
            'active' => 'Active',
            'thumbs' => 'Thumbs',
        ];
    }
}
