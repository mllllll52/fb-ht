<?php
/**
 * This file is part of webman.
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the MIT-LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @author    walkor<walkor@workerman.net>
 * @copyright walkor<walkor@workerman.net>
 * @link      http://www.workerman.net/
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 */

use plugin\admin\app\controller\AccountController;

use plugin\admin\app\controller\DictController;
use plugin\admin\app\controller\BaseController;

use Webman\Route;
use support\Request;
Route::any('/app/admin/base/SearchAvertGourp', [BaseController::class, 'SearchAvertGourp']);


Route::any('/app/admin/base/useEdit', [BaseController::class, 'useEdit']);

Route::any('/app/admin/base/GetUserMsg', [BaseController::class, 'GetUserMsg']);

Route::any('/app/admin/base/test', [BaseController::class, 'test']);

Route::any('/app/admin/base/delTaskList', [BaseController::class, 'delTaskList']);

Route::any('/app/admin/base/getTaskListApi', [BaseController::class, 'getTaskListApi']);

Route::any('/app/admin/base/getServerIdDesc', [BaseController::class, 'getServerIdDesc']);

Route::any('/app/admin/base/getUserMap', [BaseController::class, 'getUserMap']);

Route::any('/app/admin/base/getServerMap', [BaseController::class, 'getServerMap']);

Route::any('/app/admin/base/getAvertGourpMap', [BaseController::class, 'getAvertGourpMap']);

Route::any('/app/admin/base/getKeyMap', [BaseController::class, 'getKeyMap']);

Route::any('/app/admin/account/loginPost', [AccountController::class, 'loginPost']);

Route::any('/app/admin/account/captcha/{type}', [AccountController::class, 'captcha']);

Route::any('/app/admin/dict/get/{name}', [DictController::class, 'get']);

Route::fallback(function (Request $request) {
    return response($request->uri() . ' not found' , 404);
}, 'admin');
