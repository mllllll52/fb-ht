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
 * @property mixed $created_at 
 * @property mixed $updated_at 
 * @property integer $admin_id
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
