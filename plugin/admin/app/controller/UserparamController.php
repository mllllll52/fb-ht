<?php

namespace plugin\admin\app\controller;

use support\Request;
use support\Response;
use plugin\admin\app\model\Userparam;
use plugin\admin\app\controller\Crud;
use support\exception\BusinessException;
use plugin\admin\app\common\Util;
use plugin\admin\app\controller\BaseController;

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
//        判断是权限
        $data = $this->insertInput($request);
//        获取当前的服务列表数据
        $ids = $data["ServerIdId"];
        $data["CreateNum"] = 1;

//        获取可绑定的账号id
        $data["TempStr3"] = $this->bindAccountData();
        $id = $this->doInsert($data);
        $myObj = new BaseController;  // 实例化对象


        $upList = $myObj->addVmData($admin_id, $ids, $id, 1);
        $this->doUpdate($id, $upList);
        return $this->json(0, 'ok', ['id' => $id]);
    }


    /**
     * 绑定账号数据
     */
    private function bindAccountData():string
    {
        $keys = Util::db()->table('fbAccount')->where('admin_id', admin_id())->where('Int1', '!=', 2)->get()->toArray();
        Util::db()->table('fbAccount')->where('id', $keys[0]->ID)->update(['Int1' => '2']);
        return $keys[0]->ID;
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
