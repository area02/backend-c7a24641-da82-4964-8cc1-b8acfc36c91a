<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * @OA\Schema(
     *    schema="Comments",
     *    @OA\Property(type="string", property="content", description="content"),
     *    @OA\Property(type="string", property="userName", description="評論者名字"),
     *    @OA\Property(type="boolean", property="isAvailable", description="是否公開"),
     *    @OA\Property(type="string", format="timestamp", example="1721277196", property="createdAt", description="新增時間"),
     *    @OA\Property(type="string", format="timestamp", example="1721277196", property="updatedAt", description="更新時間"),
     * ),
     * @OA\Schema(
     *    schema="Posts",
     *    @OA\Property(type="string", property="content", description="content"),
     *    @OA\Property(type="string", property="userName", description="作者名字"),
     *    @OA\Property(type="boolean", property="isAvailable", description="是否公開"),
     *    @OA\Property(type="array", property="comments", description="評論", @OA\Items(ref="#/components/schemas/Comments")),
     *    @OA\Property(type="string", format="timestamp", example="1721277196", property="createdAt", description="新增時間"),
     *    @OA\Property(type="string", format="timestamp", example="1721277196", property="updatedAt", description="更新時間"),
     * ),
     * @OA\Post (
     *     path="/api/posts",
     *     tags={"Posts"},
     *     summary="新增部落格文章",
     *     description="新增部落格文章",
     *     @OA\RequestBody(
     *         required=true,
     *         description="Posts",
     *         @OA\JsonContent(
     *             required={"content"},
     *             @OA\Property(type="string", property="content", description="content"),
     *             @OA\Property(type="boolean", property="isAvailable", description="是否公開"),
     *         )
     *     ),
     *     @OA\Response (
     *          response=200,
     *          description="請求成功",
     *              @OA\MediaType(
     *                 mediaType="application/json",
     *                 @OA\Schema(ref="#/components/schemas/Posts")
     *             )
     *     ),
     *     @OA\Response (
     *          response=400,
     *          ref="#/components/responses/400",
     *     ),
     *     @OA\Response (
     *          response=401,
     *          ref="#/components/responses/401",
     *     ),
     *     @OA\Response (
     *          response=500,
     *          ref="#/components/responses/500",
     *     )
     * )
     */
    public function create(Request $request)
    {

    }

    /**
     * @OA\Get (
     *     path="/api/posts",
     *     tags={"Posts"},
     *     summary="抓取所有部落格文章",
     *     description="抓取所有部落格文章(不包含私人)",
     *     @OA\Parameter (
     *          name="page",
     *          description="頁碼",
     *          required=false,
     *          in="query"
     *     ),
     *     @OA\Parameter (
     *          name="perPage",
     *          description="每頁幾筆",
     *          required=false,
     *          in="query"
     *     ),
     *     @OA\Parameter (
     *          name="sort",
     *          description="排序欄位(id: post.id, createdAt: 新增時間)",
     *          required=false,
     *          in="query"
     *     ),
     *     @OA\Parameter (
     *          name="order",
     *          description="排序方式(asc: 升冪排序, desc: 降冪排序)",
     *          required=false,
     *          in="query"
     *     ),
     *     @OA\Response (
     *          response=200,
     *          description="請求成功",
     *              @OA\MediaType(
     *                 mediaType="application/json",
     *                 @OA\Schema(
     *                   @OA\Property(type="array", property="posts", description="文章", @OA\Items(ref="#/components/schemas/Posts")),
     *                   @OA\Property(type="integer", property="total", description="文章總數"),
     *                 )
     *             )
     *     ),
     *     @OA\Response (
     *          response=400,
     *          ref="#/components/responses/400",
     *     ),
     *     @OA\Response (
     *          response=401,
     *          ref="#/components/responses/401",
     *     ),
     *     @OA\Response (
     *          response=500,
     *          ref="#/components/responses/500",
     *     )
     * )
     */
    public function getMany(Request $request)
    {

    }

    /**
     * @OA\Put (
     *     path="/api/posts/{id}/disable",
     *     tags={"Posts"},
     *     summary="作者將文章改成私人",
     *     description="作者將文章改成私人",
     *     @OA\Parameter(
     *         name="id",
     *         description="文章id(post.id)",
     *         example=1,
     *         required=true,
     *         in="path",
     *         @OA\Schema(
     *             type="integer"
     *         )
     *     ),
     *     @OA\Response (
     *          response=200,
     *          description="請求成功",
     *              @OA\MediaType(
     *                 mediaType="application/json",
     *                 @OA\Schema(ref="#/components/schemas/Posts")
     *             )
     *     ),
     *     @OA\Response (
     *          response=400,
     *          ref="#/components/responses/400",
     *     ),
     *     @OA\Response (
     *          response=401,
     *          ref="#/components/responses/401",
     *     ),
     *     @OA\Response (
     *          response=500,
     *          ref="#/components/responses/500",
     *     )
     * )
     */
    public function disable(Request $request, $id)
    {

    }

    /**
     * @OA\Put (
     *     path="/api/posts/{id}",
     *     tags={"Posts"},
     *     summary="作者更新部落格文章",
     *     description="作者更新部落格文章",
     *     @OA\Parameter(
     *         name="id",
     *         description="文章id(posts.id)",
     *         example=1,
     *         required=true,
     *         in="path",
     *         @OA\Schema(
     *             type="integer"
     *         )
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         description="Posts",
     *         @OA\JsonContent(
     *             @OA\Property(type="string", property="content", description="content")
     *         )
     *     ),
     *     @OA\Response (
     *          response=200,
     *          description="請求成功",
     *              @OA\MediaType(
     *                 mediaType="application/json",
     *                 @OA\Schema(ref="#/components/schemas/Posts")
     *             )
     *     ),
     *     @OA\Response (
     *          response=400,
     *          ref="#/components/responses/400",
     *     ),
     *     @OA\Response (
     *          response=401,
     *          ref="#/components/responses/401",
     *     ),
     *     @OA\Response (
     *          response=500,
     *          ref="#/components/responses/500",
     *     )
     * )
     */
    public function update(Request $request, $id)
    {

    }
}
