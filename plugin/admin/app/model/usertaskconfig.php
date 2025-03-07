<?php

namespace plugin\admin\app\model;

use plugin\admin\app\model\Base;

/**
 * @property integer $id ID(主键)
 * @property string $Text 用户名
 * @property integer $isValid 是否有效
 * @property string $createTime 创建时间
 * @property string $updataTime 最近修改时间
 */
class userTaskConfig extends Base
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'userTaskConfig';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id';

}
