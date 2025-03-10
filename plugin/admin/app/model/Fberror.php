<?php

namespace plugin\admin\app\model;

use plugin\admin\app\model\Base;

/**
 * @property integer $ID (主键)
 * @property mixed $Ip 服务器ip
 * @property mixed $Imei 模拟器id
 * @property mixed $VmName 模拟器名
 * @property mixed $Msg 错误信息
 * @property mixed $ExData 其他数据
 * @property mixed $created_at 
 * @property mixed $updated_at 
 * @property integer $admin_id
 */
class Fberror extends Base
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'fberror';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'ID';
    
    
    
}
