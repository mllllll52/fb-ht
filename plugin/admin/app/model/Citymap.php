<?php

namespace plugin\admin\app\model;

use plugin\admin\app\model\Base;

/**
 * @property integer $ID (主键)
 * @property string $Cname 国家全名
 * @property string $CnameSmall 简写
 * @property string $CnameDesc 中家中文描述
 * @property mixed $ExData 
 * @property mixed $ExData2 
 * @property integer $Ctype 类型
 * @property integer $IsValid 是否有效
 * @property string $TenantCode 
 * @property string $CreateTime 
 * @property string $CreateBy 
 * @property string $UpdateTime 
 * @property string $UpdateBy
 */
class Citymap extends Base
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'citymap';

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
