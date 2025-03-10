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
 * @property integer $AccountMsgId 帐号信息
 * @property mixed $created_at 
 * @property mixed $updated_at 
 * @property integer $admin_id
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
