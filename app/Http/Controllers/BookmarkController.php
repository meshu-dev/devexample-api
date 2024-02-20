<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;
use App\Repositories\BookmarkRepository;
use App\Http\Resources\SiteResource;

class BookmarkController extends Controller
{
    public function __construct(
        protected BookmarkRepository $bookmarkRepository
    ) { }
    
    public function getAll(Request $request)//: ResourceCollection
    {
        return $this->bookmarkRepository->getAll(['guest_user_id' => $request->user()->id]);
    }
}
