<?php

namespace plugin\admin\app\model;

use plugin\admin\app\model\Base;

/**
 * @property integer $ID (主键)
 * @property mixed $FbData fb帐号数据
 * @property mixed $ProxyData 代理帐号数据
 * @property mixed $StatusStrId 异常状态
 * @property mixed $Data 
 * @property mixed $Data2 
 * @property integer $Int1 帐号使用状态
 * @property string $created_at 创建时间
 * @property string $updated_at 更新时间
 * @property integer $admin_id 用户id
 */
class Fbaccount extends Base
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'fbaccount';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'ID';
    
    
    
}
