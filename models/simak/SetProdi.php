<?php

namespace app\models\simak;

use yii\base\Model;
use yii\db\Connection;

/**
 * This is the model class for table "kelas".
 *
 * @property string $idkelas
 * @property string $nkelas
 */
class SetProdi extends Model {
    public $kjur;
    public $tahun;
    public $idsmt;
    /**
     * {@inheritdoc}
     */

    /**
     * @return Connection the database connection used by this AR class.
     */
   

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['kjur', 'tahun', 'idsmt'], 'required','message'=>''],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels() {
        return [
            'id_prodi' => 'id_prodi',
            'tahun' => 'tahun',
            'idsmt' => 'semester',
        ];
    }

}
