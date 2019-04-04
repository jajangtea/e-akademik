<?php

namespace app\models\akademik;

use Yii;

/**
 * This is the model class for table "{{%keperluan}}".
 *
 * @property int $idKeperluan
 * @property string $Keperluan
 *
 * @property Surat[] $surats
 */
class Keperluan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%keperluan}}';
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
            [['Keperluan'], 'required'],
            [['Keperluan'], 'string', 'max' => 250],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idKeperluan' => 'Id Keperluan',
            'Keperluan' => 'Keperluan',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSurats()
    {
        return $this->hasMany(Surat::className(), ['idKeperluan' => 'idKeperluan']);
    }
}
