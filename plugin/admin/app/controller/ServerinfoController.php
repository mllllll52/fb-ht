<?php

namespace plugin\admin\app\controller;

use support\Request;
use support\Response;
use plugin\admin\app\model\Serverinfo;
use plugin\admin\app\controller\Crud;
use support\exception\BusinessException;
/**
 * 服务器 
 */
class ServerinfoController extends Crud
{
    
    /**
     * @var Serverinfo
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
        $this->model = new Serverinfo;
    }
    
    /**
     * 浏览
     * @return Response
     */
    public function index(): Response
    {
        return view('serverinfo/index');
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
        return view('serverinfo/insert');
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
        return view('serverinfo/update');
    }

}
