<?php

namespace plugin\admin\app\model;

use plugin\admin\app\model\Base;

/**
 * @property integer $ID (主键)
 * @property integer $Sex 姓别
 * @property integer $Age 年龄
 * @property integer $CityId 国家
 * @property mixed $Desc 用户信息模板描述
 * @property mixed $GroupNameId 广告组
 * @property mixed $VideoReplyId 视频回复
 * @property mixed $PostsReplyId 帖子回复
 * @property integer $KeyWorldId 关键字
 * @property integer $IsValid 是否有效
 * @property string $TenantCode 
 * @property string $CreateTime 
 * @property string $CreateBy 
 * @property string $UpdateTime 
 * @property string $UpdateBy
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
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    
    
}
