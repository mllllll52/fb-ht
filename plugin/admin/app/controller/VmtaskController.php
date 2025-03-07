<?php

namespace plugin\admin\app\controller;

use support\Request;
use support\Response;
use plugin\admin\app\model\Vmtask;
use plugin\admin\app\controller\Crud;
use support\exception\BusinessException;
use plugin\admin\app\model\VmTaskConfig;

/**
 * 模拟器任务 
 */
class VmtaskController extends Crud
{
    protected $noNeedLogin = ['getVmTaskName'];

    public function getVmTaskName()
    {
        // 获取 Text 和 id 列
        $tasks = VmTaskConfig::pluck('Text', 'id');

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
     * @var Vmtask
     */
    protected $model = null;

    /**
     * 构造函数
     * @return void
     */
    public function __construct()
    {
        $this->model = new Vmtask;
    }
    
    /**
     * 浏览
     * @return Response
     */
    public function index(): Response
    {
        return view('vmtask/index');
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
        return view('vmtask/insert');
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
        return view('vmtask/update');
    }

}
