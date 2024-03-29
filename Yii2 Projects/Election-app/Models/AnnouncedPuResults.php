<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "announced_pu_results".
 *
 * @property int $result_id
 * @property string $polling_unit_uniqueid
 * @property string $party_abbreviation
 * @property int $party_score
 * @property string $entered_by_user
 * @property string $date_entered
 * @property string $user_ip_address
 */
class AnnouncedPuResults extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'announced_pu_results';
    }

    /**
     * {@inheritdoc}
     */
    public function getPollingUnits()
    {
        return $this->hasMany(PollingUnit::class, ['polling_unit_id' => 'uniqueid']);
    }

    public function getLga()
    {
        return $this->hasOne(Lga::class, ['uniqueid' => 'lga_id']);
    }

    public function getAnnouncedPuResults()
    {
        return $this->hasMany(AnnouncedPuResults::class, ['polling_unit_uniqueid' => 'uniqueid']);
    }
    public function rules()
    {
        return [
            [['polling_unit_uniqueid', 'lga_name', 'party_abbreviation', 'party_score'], 'required'],
            [['party_score'], 'integer'],
            [['date_entered'], 'safe'],
            [['polling_unit_uniqueid', 'entered_by_user', 'user_ip_address'], 'string', 'max' => 50],
            [['party_abbreviation'], 'string', 'max' => 4],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'result_id' => 'Result ID',
            'polling_unit_uniqueid' => 'Polling Unit Uniqueid',
            'party_abbreviation' => 'Party Abbreviation',
            'party_score' => 'Party Score',
            // 'entered_by_user' => 'Entered By User',
            // 'date_entered' => 'Date Entered',
            // 'user_ip_address' => 'User Ip Address',
        ];
    }
}
