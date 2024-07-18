<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

/**
 * @OA\Info(
 *      version="1.0.0",
 *      title="Blog",
 *      description="Blog API Document",
 *      @OA\Contact(
 *          email="tech@area02.com"
 *      ),
 *     @OA\License(
 *         name="Apache 2.0",
 *         url="http://www.apache.org/licenses/LICENSE-2.0.html"
 *     )
 * )
 * @OA\PathItem(
 *      path="/"
 *  )
 * @OA\Components(
 *     @OA\Response(
 *          response="200",
 *          description="success",
 *     ),
 *     @OA\Response(
 *         response="400",
 *         description="客戶端錯誤",
 *         @OA\JsonContent(
 *             example={
 *                 "message": "客戶端錯誤",
 *                 "status": 400
 *             }
 *         ),
 *     ),
 *     @OA\Response(
 *          response="401",
 *          description="身份驗證失敗",
 *          @OA\JsonContent(
 *              example={
 *                 "message":"Unauthenticated",
 *                 "status": 401
 *              }
 *          ),
 *     ),
 *     @OA\Response(
 *          response="404",
 *          description="找不到請求的資源",
 *          @OA\JsonContent(
 *              example={
 *                 "message":"Not Found",
 *                 "status": 404
 *              }
 *          ),
 *     ),
 *     @OA\Response(
 *          response="405",
 *          description="不支援此方法",
 *          @OA\JsonContent(
 *              example={
 *                 "message":"Method Not Allowed",
 *                 "status": 405
 *              }
 *          ),
 *     ),
 *     @OA\Response(
 *          response="500",
 *          description="伺服器發生錯誤",
 *          @OA\JsonContent(
 *              example={
 *                 "message":"伺服器發生錯誤",
 *                 "status": 500
 *              }
 *          ),
 *     ),
 * )
 */
class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
}
