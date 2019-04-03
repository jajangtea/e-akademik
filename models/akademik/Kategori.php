<?php

namespace app\models\akademik;

use Yii;

/**
 * This is the model class for table "{{%kategori}}".
 *
 * @property int $idKategori
 * @property string $namaKategori
 *
 * @property Surat[] $surats
 */
class Kategori extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%kategori}}';
    }

    /**
     * @return \yii\db\Connection the database connection used by this AR class.
     */
    public static function getDb()
    {
        return Yii::$app->get('db_akademik');
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['namaKategori'], 'required'],
            [['namaKategori'], 'string', 'max' => 200],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idKategori' => 'Id Kategori',
            'namaKategori' => 'Nama Kategori',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSurats()
    {
        return $this->hasMany(Surat::className(), ['idKategori' => 'idKategori']);
    }
}
