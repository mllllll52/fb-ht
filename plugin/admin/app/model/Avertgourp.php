<?php

namespace plugin\admin\app\model;

use plugin\admin\app\model\Base;

/**
 * @property integer $ID (主键)
 * @property mixed $GroupName 组名称
 * @property mixed $ExData 
 * @property integer $ExData2 
 * @property mixed $Desc 备注
 * @property integer $Sex 姓别
 * @property integer $Age 年龄
 * @property mixed $UTypeId 广告类型
 * @property integer $IsValid 是否有效
 * @property string $TenantCode 
 * @property string $CreateTime 
 * @property string $CreateBy 
 * @property string $UpdateTime 
 * @property string $UpdateBy
 */
class Avertgourp extends Base
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'avertgourp';

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
