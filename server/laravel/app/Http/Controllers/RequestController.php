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
        $this->middleware('auth')->except(['index', 'show', 'search', 'tagsearch', 'likedrank', 'watchedrank']);
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

    public function all()
    {
        $products = MaterialRequest::with('user')->orderBy(MaterialRequest::CREATED_AT, 'desc')->paginate();
        return $products;
    }
}
