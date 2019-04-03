<?php

namespace app\models\simak;

use Yii;

/**
 * This is the model class for table "group_access".
 *
 * @property int $group_id
 * @property int $module_id
 * @property int $r
 * @property int $w
 */
class GroupAccess extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'group_access';
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
            [['group_id', 'module_id'], 'required'],
            [['group_id', 'module_id', 'r', 'w'], 'integer'],
            [['group_id', 'module_id'], 'unique', 'targetAttribute' => ['group_id', 'module_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'group_id' => 'Group ID',
            'module_id' => 'Module ID',
            'r' => 'R',
            'w' => 'W',
        ];
    }
}
