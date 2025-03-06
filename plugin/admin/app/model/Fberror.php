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
 * @property integer $IsValid 是否有效
 * @property string $TenantCode 
 * @property string $CreateTime 
 * @property string $CreateBy 
 * @property string $UpdateTime 
 * @property string $UpdateBy
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
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    
    
}
