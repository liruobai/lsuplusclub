<?php
/**
 * Created by PhpStorm.
 * User: Robinson-5
 * Date: 2016/11/27
 * Time: 11:40
 */

namespace App\Api\Controllers;
use App\Discuss;
//use App\Api\Controllers\BaseController;
use App\Api\Transformers\DiscussTransformers;
use App\Api\Transformers\CommentsTransformers;

class DiscussionController extends BaseController{
    public function index(){
        $discussions = Discuss::all();
        return $this->collection($discussions,new DiscussTransformers());
//        return Discuss::all();
    }
    public function show($id)
    {
        $discussions = Discuss::find($id);
        if (! $discussions){
            return $this->response->errorNotFound('Used not found');
        }
        return $this->item($discussions,new CommentsTransformers());
    }
}