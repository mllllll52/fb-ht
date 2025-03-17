<?php

namespace plugin\admin\app\model;

use plugin\admin\app\model\Base;

/**
 * @property integer $ID (主键)
 * @property mixed $Msg 关键字内容
 * @property string $created_at 创建时间
 * @property string $updated_at 更新时间
 * @property integer $admin_id 用户id
 */
class Keyword extends Base
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'keywords';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'ID';
    
    
    
}
