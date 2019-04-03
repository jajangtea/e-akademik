<?php

namespace app\models\skkp;

use Yii;

/**
 * This is the model class for table "prd_level".
 *
 * @property int $id
 * @property string $level
 *
 * @property PrdUser[] $prdUsers
 */
class PrdLevel extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'prd_level';
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
            [['level'], 'required'],
            [['level'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'level' => 'Level',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPrdUsers()
    {
        return $this->hasMany(PrdUser::className(), ['level_id' => 'id']);
    }
}
