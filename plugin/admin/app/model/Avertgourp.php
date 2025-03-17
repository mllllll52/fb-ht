<?php

namespace plugin\admin\app\model;

use plugin\admin\app\model\Base;

/**
 * @property integer $ID (主键)
 * @property mixed $GroupName 组名称
 * @property mixed $Desc 备注
 * @property string $UTypeId 广告类型
 * @property string $created_at 创建时间
 * @property string $updated_at 更新时间
 * @property integer $admin_id 用户id
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
    
    
    
}
