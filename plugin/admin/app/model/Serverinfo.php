<?php

namespace plugin\admin\app\model;

use plugin\admin\app\model\Base;

/**
 * @property integer $ID (主键)
 * @property integer $RunMaxLimit 当前可运行最大数量
 * @property mixed $Desc 服务器描述
 * @property mixed $LocalIp 本机ip
 * @property string $ExpiredTime 过期时间
 * @property string $Code 绑定code
 * @property integer $IsValid 是否有效
 * @property string $TenantCode 
 * @property string $CreateTime 
 * @property string $CreateBy 
 * @property string $UpdateTime 
 * @property string $UpdateBy
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
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    
    
}
