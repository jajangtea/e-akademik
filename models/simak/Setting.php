<?php

namespace app\models\simak;

use Yii;

/**
 * This is the model class for table "setting".
 *
 * @property int $setting_id
 * @property string $group
 * @property string $key
 * @property string $value
 */
class Setting extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'setting';
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
            [['setting_id', 'group', 'key', 'value'], 'required'],
            [['setting_id'], 'integer'],
            [['value'], 'string'],
            [['group'], 'string', 'max' => 50],
            [['key'], 'string', 'max' => 150],
            [['setting_id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'setting_id' => 'Setting ID',
            'group' => 'Group',
            'key' => 'Key',
            'value' => 'Value',
        ];
    }
}
