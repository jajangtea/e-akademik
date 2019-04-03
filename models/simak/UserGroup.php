<?php

namespace app\models\simak;

use Yii;

/**
 * This is the model class for table "user_group".
 *
 * @property int $group_id
 * @property string $group_name
 */
class UserGroup extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user_group';
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
            [['group_id', 'group_name'], 'required'],
            [['group_id'], 'integer'],
            [['group_name'], 'string', 'max' => 30],
            [['group_id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'group_id' => 'Group ID',
            'group_name' => 'Group Name',
        ];
    }
}
