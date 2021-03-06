<?php

namespace app\models;

use Yii;
use yii\base\InvalidConfigException;
use yii\db\ActiveQuery;
use yii\db\Query;

/**
 * This is the model class for table "{{%user_group}}".
 *
 * @property int $id primary key
 * @property string $name group name
 */
class UserGroup extends \yii\db\ActiveRecord
{
    /**
     * Returns table name
     */
    public static function tableName(): string
    {
        return '{{%user_group}}';
    }

    /**
     * Validation rules
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            [['name'], 'required', 'message' => 'Field {attribute} is required'],
            [
                ['name'],
                'string',
                'length' => [3, 30],
                'tooShort' => 'Name length must be at least 3 characters',
                'tooLong' => 'Name length must be not greater than 30 characters',
            ],
            [
                ['name'],
                'match',
                'pattern' => '/^([A-Za-z0-9])+$/u',
                'message' => 'Name can contain only letters and digits',
            ],
        ];
    }

    /**
     * Returns labels
     *
     * @return array
     */
    public function attributeLabels(): array
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
        ];
    }

    /**
     * Links a group with users via table user2group
     * To get an array of group's users use $group->users
     *
     * @return ActiveQuery
     * @throws InvalidConfigException when query is not initialized properly
     */
    public function getUsers(): ActiveQuery
    {
        return $this->hasMany(User::class, ['id' => 'uid'])
            ->viaTable('user2group', ['gid' => 'id']);
    }

    /**
     * Returns a number of users in a group
     * To get this number use $group->usersCount
     *
     * @return int
     * @throws InvalidConfigException
     */
    public function getUsersCount(): int
    {
        return (int)$this->hasMany(User::class, ['id' => 'uid'])
            ->viaTable('user2group', ['gid' => 'id'])
            ->count();
    }

    /**
     * Returns array of groups in format [id => name]
     *
     * @return array
     */
    public static function getGroupsIdsNames(): array
    {
        $groups = [];
        $groupsRawArray = (new Query())->select('id, name')
            ->from('{{%user_group}}')
            ->orderBy('name')
            ->all();
        foreach ($groupsRawArray as $groupItem) {
            $groups[$groupItem['id']] = $groupItem['name'];
        }

        return $groups;
    }
}
