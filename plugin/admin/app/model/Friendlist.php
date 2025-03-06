<?php

namespace plugin\admin\app\model;

use plugin\admin\app\model\Base;

/**
 * @property integer $ID (主键)
 * @property mixed $ULink 我的Fb link
 * @property integer $Age 年龄
 * @property mixed $Sex 姓别
 * @property mixed $City 国家
 * @property mixed $ExData exData
 * @property mixed $OLink 好友Link
 * @property integer $IsValid 是否有效
 * @property string $TenantCode 
 * @property string $CreateTime 
 * @property string $CreateBy 
 * @property string $UpdateTime 
 * @property string $UpdateBy
 */
class Friendlist extends Base
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'friendlist';

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
