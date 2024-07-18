<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CommentController extends Controller
{
   /**
     * @OA\Post (
     *     path="/api/comments",
     *     tags={"Comments"},
     *     summary="新增文章評論",
     *     description="新增文章評論",
     *     @OA\RequestBody(
     *         required=true,
     *         description="Comments",
     *         @OA\JsonContent(
     *             required={"postId","content"},
     *             @OA\Property(type="integer", property="postId", description="文章id(posts.id)"),
     *             @OA\Property(type="string", property="content", description="content"),
     *             @OA\Property(type="boolean", property="isAvailable", description="是否公開"),
     *         )
     *     ),
     *     @OA\Response (
     *          response=200,
     *          description="請求成功",
     *              @OA\MediaType(
     *                 mediaType="application/json",
     *                 @OA\Schema(ref="#/components/schemas/Comments")
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
     * @OA\Put (
     *     path="/api/comments/{id}/disable",
     *     tags={"Comments"},
     *     summary="評論者本人將文章的評論改成私人",
     *     description="評論者本人將文章的評論改成私人",
     *     @OA\Parameter(
     *         name="id",
     *         description="評論id(comments.id)",
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
     *                 @OA\Schema(ref="#/components/schemas/Comments")
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
}
