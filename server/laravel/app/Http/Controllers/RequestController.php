<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRequest;
use App\MaterialRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RequestController extends Controller
{
    public function __construct()
    {
        // 認証が必要
        $this->middleware('auth')->except(['all']);
    }

    public function create(StoreRequest $request)
    {
        $material_request = new MaterialRequest();
        $material_request->user_id = Auth::id();
        $material_request->title = $request->title;
        $material_request->contents = $request->contents;
        $material_request->save();
        return $material_request;
    }

    public function update(Request $request)
    {
        $currentid = $request->currentMaterialRequest;
        $material_request = MaterialRequest::with('user')->where('id', $currentid)->first();
        $material_request->title = $request->title;
        $material_request->contents = $request->contents;
        $material_request->save();
    }

    public function complete(string $id)
    {
        $material_request = MaterialRequest::where('id', $id)->first();
        $material_request->iscompleted = true;
        $material_request->save();
    }

    public function all()
    {
        $material_requests = MaterialRequest::with('user')->orderBy(MaterialRequest::CREATED_AT, 'desc')->paginate();
        return $material_requests;
    }

    public function show(String $id)
    {
        $material_request = MaterialRequest::where('id', $id)->with(['user' => function ($query) {
            $query->with('userthumbnail');
        }])->first();
        return $material_request ?? abort(404);
    }
}
