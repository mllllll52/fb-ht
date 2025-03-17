<?php

namespace plugin\admin\app\model;

use plugin\admin\app\model\Base;

/**
 * @property integer $ID (主键)
 * @property string $VmName 模拟器名称
 * @property string $Imei Imei
 * @property mixed $Link 链接
 * @property mixed $Desc 描述
 * @property integer $ProId 任务进度
 * @property integer $CreateNum 增加数量绑定
 * @property mixed $ExData 拓展数据
 * @property mixed $ExData3 拓展字段3
 * @property mixed $TempStr3 绑定帐号
 * @property integer $ServerIdId 服务列表ID
 * @property integer $UserMsgId 个人信息
 * @property string $created_at 创建时间
 * @property string $updated_at 更新时间
 * @property integer $admin_id 用户id
 * @property string $ProTask 每日任务列表
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
    
    
    
}
