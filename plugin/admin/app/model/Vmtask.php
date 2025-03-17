<?php

namespace plugin\admin\app\model;

use plugin\admin\app\model\Base;

/**
 * @property integer $ID (主键)
 * @property integer $VTypeId 模拟器任务类型
 * @property string $VmWorkList 模拟器打开列表
 * @property string $LocalIp 内网Ip
 * @property string $created_at 创建时间
 * @property string $updated_at 更新时间
 * @property integer $admin_id 用户id
 */
class Vmtask extends Base
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'vmtask';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'ID';
    
    
    
}
