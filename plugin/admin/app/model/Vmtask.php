<?php

namespace plugin\admin\app\model;

use plugin\admin\app\model\Base;

/**
 * @property integer $ID (主键)
 * @property mixed $VTypeId 模拟器任务类型
 * @property mixed $VmWorkList 模拟器打开列表
 * @property mixed $LocalIp 内网Ip
 * @property mixed $created_at 
 * @property mixed $updated_at 
 * @property integer $admin_id
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
