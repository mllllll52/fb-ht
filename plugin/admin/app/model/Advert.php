<?php

namespace plugin\admin\app\model;

use plugin\admin\app\model\Base;

/**
 * @property integer $ID (主键)
 * @property mixed $Msg 广告内容
 * @property mixed $Desc 提供的备注字段
 * @property mixed $GroupNameId 广告组
 * @property mixed $created_at 
 * @property mixed $updated_at 
 * @property integer $admin_id
 */
class Advert extends Base
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'advert';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'ID';
    
    
    
}
