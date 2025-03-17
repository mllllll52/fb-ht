<?php

namespace plugin\admin\app\model;

use plugin\admin\app\model\Base;

/**
 * @property integer $ID (主键)
 * @property integer $RunMaxLimit 当前可运行最大数量
 * @property string $Desc 服务器描述
 * @property string $LocalIp 本机ip
 * @property string $ExpiredTime 过期时间
 * @property string $Code 绑定code
 * @property mixed $delete_time 
 * @property string $created_at 创建时间
 * @property string $updated_at 更新时间
 * @property integer $admin_id
 */
class Serverinfo extends Base
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'serverinfo';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'ID';
    
    
    
}
