<?php

namespace plugin\admin\app\controller;

use support\Request;
use support\Response;
use plugin\admin\app\controller\Crud;
use plugin\admin\app\common\Util;
use support\View;


/**
 * 服务器 
 */
class BaseController extends Crud
{

    public $noNeedAuth = ['getTaskListApi'];

    //   测试函数
    public function test(Request $request): Response{
        $data = $request->post();
        $this->FindInitialTaskProgress($data[0]);

        return $this->json("200", "ok",$data);
    }

    //    查找当前账号任务 任务进度是否为初始 是 修改  不是 忽视

    public function useEdit(Request $request): Response{
        $admin_id = admin_id();
        $data = $request->post();
        $postData = Util::db()->table('userParams')->where('admin_id', $admin_id)->where('ID', $data["ID"])->update($data["Entity"]);
        return $this->json(200, "ok",$data);
    }
    // 返回广告数据
    public function SearchAvertGourp(Request $request): Response
    {
        $GroupNameId = $request->post("GroupNameId");
        $admin_id = admin_id();
        $advertData = Util::db()->table('advert')->where('admin_id', $admin_id)->where('GroupNameId', $GroupNameId)->get()->toArray();

        if ($advertData > 0) {
            return $this->json(200, "ok", $advertData);
        } else {
            return $this->json(404, "No data", []);
        }
    }


    // 返回任务数据
    public function GetUserMsg(Request $request): Response
    {
        $ID = $request->post("ID");
        $admin_id = admin_id();
        $userData = Util::db()->table('userParams')->where('admin_id', $admin_id)->where('ID', $ID)->get()->toArray();
        $userMsgData = Util::db()->table('userMsgList')->where('admin_id', $admin_id)->where('ID', $userData[0]->UserMsgId)->get()->toArray();
        $KeyWorldData = Util::db()->table('keywords')->where('admin_id', $admin_id)->where('ID', $userMsgData[0]->KeyWorldId)->get()->toArray();
        $avertGourpData = Util::db()->table('avertGourp')->where('admin_id', $admin_id)->where('ID', $userMsgData[0]->GroupNameId)->get()->toArray();
        $fbAccountData = Util::db()->table('fbAccount')->where('admin_id', $admin_id)->where('ID', $userData[0]->TempStr3)->get()->toArray();


        $userData[0]->TempStr3 = $fbAccountData[0];
        $userMsgData[0]->GroupNameId = $avertGourpData[0];
        $userMsgData[0]->KeyWorldId = $KeyWorldData[0];
        $userData[0]->UserMsgId = $userMsgData[0];
        if ($userData > 0) {
            return $this->json(200, "ok", $userData);
        } else {
            return $this->json(404, "No data", []);
        }
    }


    //    查找当前账号任务 任务进度是否为初始 是 修改  不是 忽视

    public function FindInitialTaskProgress($admin_id): void{
    //        获取当前账号的全部初始任务数据
            $keys = Util::db()->table('userParams')->where('admin_id', $admin_id)->where('ProId', 0)->get()->toArray();
            foreach ($keys as $key) {
                $this->addVmData($admin_id, $key->ServerIdId, $key->ID, 2);
                Util::db()->table('userParams')->where('ID', $key->ID)->update(['ProId' => 1]);
            }
    }

    /**
     * 生成模拟器任务
     */
    public function addVmData($admin_id, $ids, $id, $type):array
    {
        $keys = Util::db()->table('serverinfo')->where('admin_id', $admin_id)->where('id', $ids)->get()->toArray();
        $upData = ["VmName"=> "-".$id];
        $vmData = [];
        foreach ($keys as $key) {
//            新创建的任务数据  默认生成一条新的创建模拟器数据
            $VmWorkList = [
                [
                    "ip" =>  $key->LocalIp,
                    "VmName" =>  $key->Desc."-".$id,
                    "ID" =>  $id,
                    "ServerName" =>  $key->Desc,
                    "taskId" => $id
            ]
            ];
            $upData["VmName"] = $key->Desc."-".$id;
            $vmData["VTypeId"] = $type;
            $vmData["VmWorkList"] = json_encode($VmWorkList);
            $vmData["LocalIp"] = $key->LocalIp;
            $currentTime = date('Y-m-d H:i:s');

            $vmData["created_at"] = $currentTime;
            $vmData["updated_at"] = $currentTime;
            $vmData["admin_id"] = $admin_id;
        }
        Util::db()->table('vmTask')->insert($vmData);
        return $upData;
    }



    // 删除模拟器任务
    public function delTaskList(Request $request): Response
    {
        $ID = $request->post("ID");
        $admin_id = admin_id();
        $deletedRows = Util::db()->table('vmTask')->where('admin_id', $admin_id)->where('ID', $ID)->delete();
        if ($deletedRows > 0) {
            return $this->json(200, "Deleted successfully", ["deletedRows" => $deletedRows]);
        } else {
            return $this->json(404, "No data deleted", []);
        }
    }



    // 获取当前的模拟器任务
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
        $this->FindInitialTaskProgress($admin_id);
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
