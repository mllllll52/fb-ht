<?php

namespace plugin\admin\app\controller;

use support\Request;
use support\Response;
use plugin\admin\app\model\Cdk;
use plugin\admin\app\controller\Crud;
use support\exception\BusinessException;

/**
 * cdk 
 */
class CdkController extends Crud
{
    
    /**
     * @var Cdk
     */
    protected $model = null;

    /**
     * 构造函数
     * @return void
     */
    public function __construct()
    {
        $this->model = new Cdk;
    }


// 修改上报参数
    public function cdkInsert(Request $request): Response
    {
        $CreateNum = $request->post("CreateNum");
        $data = $this->insertInput($request);

        for ($i = 0; $i < $CreateNum; ) {  // 注意：这里去掉了 $i++，改成在插入成功后递增
            $data["Code"] = bin2hex(random_bytes(16)); // 16 字节 = 32 位十六进制字符串

            if ($this->doSelect(['code' => $data["Code"]])->exists()) {
                continue; // 直接跳过后面的代码，重新生成
            }
            // 插入数据
            $id = $this->doInsert($data);
            $i++; // 只有插入成功才递增，确保最终插入的数量正确
        }

        return json(['code' => 0, 'msg' => '已增加' . $CreateNum . "条数据", 'redirect' => '/cdk/index']);
    }




    
    /**
     * 浏览
     * @return Response
     */
    public function index(): Response
    {
        return view('cdk/index');
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
            return $this->cdkInsert($request);
        }
        return view('cdk/insert');
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
        return view('cdk/update');
    }

}
