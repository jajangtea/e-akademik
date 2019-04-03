<?php

namespace app\models\simak;

use Yii;

/**
 * This is the model class for table "forumkategori".
 *
 * @property int $idkategori
 * @property string $nama_kategori
 */
class Forumkategori extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'forumkategori';
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
            [['nama_kategori'], 'required'],
            [['nama_kategori'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idkategori' => 'Idkategori',
            'nama_kategori' => 'Nama Kategori',
        ];
    }
}
