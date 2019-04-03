<?php

namespace app\models\skkp;

use Yii;

/**
 * This is the model class for table "prd_statusproposal".
 *
 * @property int $idstatusProp
 * @property string $nstatusProposal
 *
 * @property PrdPengajuan[] $prdPengajuans
 */
class PrdStatusproposal extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'prd_statusproposal';
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
            [['nstatusProposal'], 'required'],
            [['nstatusProposal'], 'string', 'max' => 259],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idstatusProp' => 'Idstatus Prop',
            'nstatusProposal' => 'Nstatus Proposal',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPrdPengajuans()
    {
        return $this->hasMany(PrdPengajuan::className(), ['IDstatusProposal' => 'idstatusProp']);
    }
}
