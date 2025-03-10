<?php

namespace plugin\admin\app\model;

use plugin\admin\app\model\Base;

/**
 * @property integer $ID (主键)
 * @property mixed $ModeTypeId 模块名
 * @property mixed $Msg 日志信息
 * @property mixed $ExData 拓展记录数据
 * @property mixed $Imei Imei
 * @property mixed $VmName 模拟器名
 * @property mixed $ErrorTypeId 错误类型
 * @property mixed $created_at 
 * @property mixed $updated_at 
 * @property integer $admin_id
 */
class Log extends Base
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'logs';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'ID';
    
    
    
}
