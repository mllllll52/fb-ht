<?php

namespace plugin\admin\app\controller;

use support\Request;
use support\Response;
use plugin\admin\app\model\Serverinfo;
use plugin\admin\app\controller\Crud;
use support\exception\BusinessException;
use plugin\admin\app\common\Util;

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
     * 服务器更新
     * @param Request $request
     * @return Response
     * @throws BusinessException
     */
    public function serverInfoUpdate(Request $request): Response
    {
        $plan = [
            24,
            7*24,
            30*24,
            90*24,
            365*24,
            100*365*24
        ];


        $Code = $request->post("Code");
        $LocalIp = $request->post("LocalIp");

        $keys = Util::db()->table('cdk')->where('Code', $Code)->get()->toArray();
        if (empty($keys)) {
            return json(['code' => 1, 'msg' => '无效cdk']);
        }

        [$id, $data] = $this->updateInput($request);
        foreach ($keys as $key) {
            if ($key->IsUse == 1){
                return json(['code' => 1, 'msg' => '该cdk已被使用']);
            }

            $timestamp = time();
            if (!$key-> CountExpiredTime){
                $newTime = $plan[$key->ExType] * 3600;
                $data["ExpiredTime"] = date('Y-m-d H:i:s', $timestamp + $newTime);
            }

            $CountExpiredTime = $key-> CountExpiredTime;
            $cdkData = [
                "CountExpiredTime" => $CountExpiredTime ?? $data["ExpiredTime"],
                "UseTime" => date('Y-m-d H:i:s', $timestamp ),
                "IsUse" => 1,
                "BanMac" => $LocalIp,
                "UseTenantCode" => admin_id(),
                "IsSellCode" => 1,
            ];
            $postData = Util::db()->table('cdk')->where('ID', $key->ID)->update($cdkData);
            if ($postData === false) {
                return json(['code' => 1, 'msg' => 'CDK 更新失败']);
            }

        }
        $this->doUpdate($id, $data);
        return json(['code' => 0, 'msg' => '操作成功', 'redirect' => 'serverinfo/index']);
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
            return $this->serverInfoUpdate($request);
        }
        return view('serverinfo/update');
    }

}
