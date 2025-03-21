<?php

namespace plugin\admin\app\model;

use plugin\admin\app\model\Base;

/**
 * @property integer $ID (主键)
 * @property string $Code 激活码
 * @property string $CountExpiredTime 累计可使用时长
 * @property integer $ExType 卡类型
 * @property string $RecordTime 记录时间
 * @property integer $IsUse 是否被激活
 * @property mixed $BanMac 绑定物理地址
 * @property string $UseTime 激活时间
 * @property mixed $UseTenantCode 所属租户号
 * @property mixed $UseName 备注使用者
 * @property mixed $ExData 拓展字段
 * @property integer $IsSellCode 是否已出售
 * @property string $created_at 创建时间
 * @property string $updated_at 更新时间
 * @property integer $admin_id 用户id
 */
class Cdk extends Base
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'cdk';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'ID';
    
    
    
}
