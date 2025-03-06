<?php

namespace plugin\admin\app\model;

use plugin\admin\app\model\Base;

/**
 * @property integer $ID (主键)
 * @property string $VmName 模拟器名称
 * @property string $Imei Imei
 * @property mixed $Link 链接
 * @property mixed $Desc 描述
 * @property mixed $ProId 任务进度
 * @property integer $CreateNum 增加数量绑定
 * @property integer $NowFriendNum 当前好友数量
 * @property mixed $ExData 拓展数据
 * @property mixed $ExData2 拓展字段2
 * @property mixed $ExData3 拓展字段3
 * @property mixed $TempStr3 绑定帐号
 * @property integer $ServerIdId 服务列表ID
 * @property integer $UserMsgId 个人信息
 * @property integer $IsSend 发广告
 * @property integer $IsValid 是否有效
 * @property string $TenantCode 
 * @property string $CreateTime 
 * @property string $CreateBy 
 * @property string $UpdateTime 
 * @property string $UpdateBy
 */
class Userparam extends Base
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'userparams';

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
