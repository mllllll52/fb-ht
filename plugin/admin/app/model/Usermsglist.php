<?php

namespace plugin\admin\app\model;

use plugin\admin\app\model\Base;

/**
 * @property integer $ID (主键)
 * @property string $Desc 用户信息模板描述
 * @property integer $GroupNameId 广告组
 * @property integer $KeyWorldId 关键字
 * @property string $created_at 创建时间
 * @property string $updated_at 更新时间
 * @property integer $admin_id
 */
class Usermsglist extends Base
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'usermsglist';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'ID';
    
    
    
}
