<?php

namespace plugin\admin\app\controller;

use support\Request;
use support\Response;
use plugin\admin\app\model\Userparam;
use plugin\admin\app\controller\Crud;
use support\exception\BusinessException;
use plugin\admin\app\model\userTaskConfig;

/**
 * 任务 
 */
class UserparamController extends Crud
{
    protected $noNeedLogin = ['getTaskStatue'];

    // 获取任务状态
    public function getTaskStatue()
    {
        // 获取 Text 和 id 列
        $tasks = userTaskConfig::pluck('Text', 'id');

        // 转换数据格式（对象结构）
        $formattedTasks = $tasks->mapWithKeys(function ($text, $id) {
            return [
                $id => [
                    'Selected'  => false,
                    'Disabled'  => false,
                    'ParentId'  => '',
                    'Text'      => $text,
                    'Value'     => $id,
                ]
            ];
        });

        // 返回 JSON 格式的对象
        return json($formattedTasks);
    }


    /**
     * @var Userparam
     */
    protected $model = null;

    /**
     * 构造函数
     * @return void
     */
    public function __construct()
    {
        $this->model = new Userparam;
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
