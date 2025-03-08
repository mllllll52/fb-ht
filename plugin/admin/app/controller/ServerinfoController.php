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
    public function index(Request $request): Response
    {
        // 获取查询参数（假设筛选条件为 'filter'）
        $filter = $request->input('filter', '');

        // 初始化查询构建器
        $query = $this->model->where('IsValid', 1); // 默认筛选 IsValid 为 1 的数据

        // 如果提供了过滤条件，添加筛选逻辑
        if ($filter) {
            // 假设您想根据服务器名称进行模糊查询
            $query->where('ServerName', 'like', '%' . $filter . '%');
        }

        // 执行查询
        $data = $query->get();

        // 将筛选后的数据传递到视图
        return view('serverinfo/index', ['data' => $data]);
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
