<?php

namespace plugin\admin\app\controller;

use support\Request;
use support\Response;
use plugin\admin\app\model\Userparam;
use plugin\admin\app\controller\Crud;
use support\exception\BusinessException;
use plugin\admin\app\common\Util;

/**
 * 任务 
 */
class UserparamController extends Crud
{
    
    /**
     * @var Userparam
     */
    protected $model = null;
    protected $dataLimit = "personal";

    protected $dataLimitField = "admin_id";
    /**
     * 构造函数
     * @return void
     */
    public function __construct()
    {
        $this->model = new Userparam;
    }


    /**
     * 插入新的数据
     * @return Response
     */
    public function addTask(Request $request): Response
    {
        $num = $request->post("CreateNum");
        for ($i = 0; $i < $num; $i++){
            $this->taskInsert($request);
        }

        return view('userparam/index');
    }


    //修改上报参数
    public function taskInsert(Request $request): Response
    {
        $admin_id = admin_id();
        $data = $this->insertInput($request);
        $ids = $data["ServerIdId"];

        $result = Util::db()->select("SHOW TABLE STATUS LIKE 'userparams'");
        $nextId = $result[0]->Auto_increment ?? null;

        $keys = Util::db()->table('serverinfo')->where('admin_id', $admin_id)->where('id', $ids)->get()->toArray();
        $vmData = [];
        foreach ($keys as $key) {
            $data["VmName"] = $key->Desc . "-" . $nextId;
//            新创建的任务数据  默认生成一条新的创建模拟器数据
            $VmWorkList = [
                [
                    "ip" =>  $key->LocalIp,
                    "VmName" =>  $key->Desc."-".$nextId,
                    "ID" =>  $nextId,
                    "ServerName" =>  $key->Desc
                ]
            ];

            $vmData["VTypeId"] = 1;
            $vmData["VmWorkList"] = json_encode($VmWorkList);
            $vmData["LocalIp"] = $key->LocalIp;
            $currentTime = date('Y-m-d H:i:s');

            $vmData["created_at"] = $currentTime;
            $vmData["updated_at"] = $currentTime;
            $vmData["admin_id"] = $admin_id;
        }


        // test 增加定时器

        $this->vmtaskInsert($vmData);
        $data["TempStr3"] = $this->bindAccountData($vmData);

        $data["CreateNum"] = 1;
        $id = $this->doInsert($data);
        return $this->json(0, 'ok', ['id' => $id]);
    }


    /**
     * 绑定账号数据
     */
    private function bindAccountData($data):string
    {
        $keys = Util::db()->table('fbAccount')->where('admin_id', admin_id())->where('Int1', '!=', 2)->get()->toArray();
        Util::db()->table('fbAccount')->where('id', $keys[0]->ID)->update(['Int1' => '2']);
        return $keys[0]->ID;
    }


    /**
     * 插入模拟器任务列表
     * @return Response
     */
    private function vmtaskInsert($data):void
    {
         Util::db()->table('vmTask')->insert($data);
    }


    /**
     * 浏览
     * @return Response
     */
    public function index(): Response
    {
        return view('userparam/index');
    }

    /**
     * 插入
     * @param Request $request
     * @return Response
     * @throws BusinessException
     */
    public function insert(Request $request): Response
    {
        if ($request->method() === 'POST') {
            return parent::insert($request);
        }
        return view('userparam/insert');
    }

    /**
     * 更新
     * @param Request $request
     * @return Response
     * @throws BusinessException
    */
    public function update(Request $request): Response
    {
        if ($request->method() === 'POST') {
            return parent::update($request);
        }
        return view('userparam/update');
    }

}
