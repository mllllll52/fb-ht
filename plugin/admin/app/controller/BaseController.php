<?php

namespace plugin\admin\app\controller;

use support\Request;
use support\Response;
use plugin\admin\app\controller\Crud;
use plugin\admin\app\common\Util;



/**
 * 服务器 
 */
class BaseController extends Crud
{

    public $noNeedAuth = ['getTaskListApi'];


    // 获取广告组列表
    public function getTaskListApi(Request $request): Response
    {
        $localIp = $request->post("LocalIp");
        $admin_id = admin_id();
        $keys = Util::db()->table('vmTask')->where('admin_id', $admin_id)->get()->toArray();
        $server = Util::db()->table('serverInfo')->where('admin_id', $admin_id)->where('LocalIp', $localIp)->get()->toArray();
        $data = [];
        foreach ($server as $item) {
            $item = (array) $item;
            $data["maxNum"] = $item["RunMaxLimit"];
        }
        $data["taskList"] = $keys;
        return $this->json(200, "ok", $data);
    }




// 获取服务器列表
    public function getServerIdDesc(Request $ids): Response
    {
        $ids = 63;
        $admin_id = admin_id();
        $keys = Util::db()->table('serverInfo')->where('admin_id', $admin_id)->where('id', $ids)->get()->toArray();

        foreach ($keys as $item) {
            $item = (array) $item;
            $data[] = [
                "value" => $item["ID"],
                "name" => $item["Desc"]
            ];
        }

        return $this->json(0, "ok", $data);
    }



    // 获取用户信息列表
    public function getUserMap(Request $request): Response
    {

        $admin_id = admin_id();
        $keys = Util::db()->table('userMsgList')->where('admin_id', $admin_id)->get()->toArray();

        foreach ($keys as $item) {
            $item = (array) $item;
            $data[] = [
                "value" => $item["ID"],
                "name" => $item["Desc"]
            ];
        }

        return $this->json(0, "ok", $data);
    }


    // 获取服务器列表
    public function getServerMap(Request $request): Response
    {

        $admin_id = admin_id();
        $keys = Util::db()->table('serverInfo')->where('admin_id', $admin_id)->get()->toArray();

        foreach ($keys as $item) {
            $item = (array) $item;
            $data[] = [
                "value" => $item["ID"],
                "name" => $item["Desc"]
            ];
        }

        return $this->json(0, "ok", $data);
    }

    // 获取广告组列表
    public function getAvertGourpMap(Request $request): Response
    {

        $admin_id = admin_id();
        $keys = Util::db()->table('avertGourp')->where('admin_id', $admin_id)->get()->toArray();

        foreach ($keys as $item) {
            $item = (array) $item;
            $data[] = [
                "value" => $item["ID"],
                "name" => $item["GroupName"]
            ];
        }

        return $this->json(0, "ok", $data);
    }



    // 获取关键字列表
    public function getKeyMap(Request $request): Response
    {

        $admin_id = admin_id();
        $keys = Util::db()->table('keyWords')->where('admin_id', $admin_id)->get()->toArray();

        foreach ($keys as $item) {
            $item = (array) $item;
            $data[] = [
                "value" => $item["ID"],
                "name" => $item["Msg"]
            ];
        }

        return $this->json(0, "ok", $data);
    }

}
