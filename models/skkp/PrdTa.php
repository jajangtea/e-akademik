<?php

namespace app\models\skkp;

use Yii;

/**
 * This is the model class for table "prd_ta".
 *
 * @property int $IdTa
 * @property string $Tahun
 * @property string $Semester
 *
 * @property PrdSidangmaster[] $prdSidangmasters
 */
class PrdTa extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'prd_ta';
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
            [['Tahun'], 'string', 'max' => 200],
            [['Semester'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'IdTa' => 'Id Ta',
            'Tahun' => 'Tahun',
            'Semester' => 'Semester',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPrdSidangmasters()
    {
        return $this->hasMany(PrdSidangmaster::className(), ['IdTa' => 'IdTa']);
    }
}
