<?php

namespace plugin\admin\app\model;

use plugin\admin\app\model\Base;

/**
 * @property integer $ID (主键)
 * @property mixed $Link 用户唯一link
 * @property string $GroupName 广告组名
 * @property integer $AdvertId 真实广告id
 * @property mixed $WhoSendLink 工作号链接
 * @property mixed $ServerIp 当前操作服务器ip
 * @property mixed $ServerDesc 服务器标志
 * @property integer $WhoSendID 工作号ID
 * @property integer $ServerID 服务器组ID
 * @property mixed $Ip 工作号Ip
 * @property mixed $ExData 
 * @property mixed $ExData2 
 * @property integer $SendNum 接收广告次数
 * @property mixed $created_at 
 * @property mixed $updated_at 
 * @property integer $admin_id
 */
class Advertsendrecord extends Base
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'advertsendrecord';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'ID';
    
    
    
}
