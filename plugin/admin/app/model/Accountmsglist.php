<?php

namespace plugin\admin\app\model;

use plugin\admin\app\model\Base;

/**
 * @property integer $ID (主键)
 * @property integer $Sex 姓别
 * @property integer $AddFriendNum 此帐号每天可增加好友数量
 * @property mixed $AddFriendTimeOut 每次加好友随机间隔时间
 * @property mixed $Age 年龄
 * @property integer $AddCityId 国家
 * @property mixed $FriendRuleId 方案信息
 * @property mixed $Desc 描述
 * @property integer $IsValid 是否有效
 * @property string $TenantCode 
 * @property string $CreateTime 
 * @property string $CreateBy 
 * @property string $UpdateTime 
 * @property string $UpdateBy
 */
class Accountmsglist extends Base
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'accountmsglist';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'ID';
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    
    
}
