<?php

namespace app\models\simak;

use Yii;

/**
 * This is the model class for table "cat_berita".
 *
 * @property int $idcat_berita
 * @property string $namecat_berita
 *
 * @property Berita[] $beritas
 */
class CatBerita extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cat_berita';
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
            [['idcat_berita', 'namecat_berita'], 'required'],
            [['idcat_berita'], 'integer'],
            [['namecat_berita'], 'string', 'max' => 35],
            [['idcat_berita'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idcat_berita' => 'Idcat Berita',
            'namecat_berita' => 'Namecat Berita',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBeritas()
    {
        return $this->hasMany(Berita::className(), ['idcat_berita' => 'idcat_berita']);
    }
}
