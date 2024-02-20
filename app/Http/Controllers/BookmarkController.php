<?php

namespace App\Http\Controllers;

use App\Http\Resources\BookmarkResource;
use App\Repositories\BookmarkRepository;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\Resources\Json\ResourceCollection;

class BookmarkController extends Controller
{
    public function __construct(
        protected BookmarkRepository $bookmarkRepository
    ) { }
    
    public function getAll(Request $request): ResourceCollection
    {
        $params    = ['guest_user_id' => $request->user()->id];
        $bookmarks = $this->bookmarkRepository->getAll($params);

        return BookmarkResource::collection($bookmarks);
    }

    public function get(Request $request, int $id): BookmarkResource
    {
        $bookmark = $this->bookmarkRepository->get($request->user()->id, $id);

        return new BookmarkResource($bookmark);
    }

    public function add(Request $request): BookmarkResource
    {
        $params = $request->all();
        $params['guest_user_id'] = $request->user()->id;

        $bookmark = $this->bookmarkRepository->add($params);

        return new BookmarkResource($bookmark);
    }

    public function edit(Request $request, int $id): BookmarkResource
    {
        $params = $request->all();
        $params['guest_user_id'] = $request->user()->id;

        $this->bookmarkRepository->edit($id, $params);

        $bookmark = $this->get($request, $id);
        return new BookmarkResource($bookmark);
    }

    public function delete(Request $request, int $id): Response
    {
        $this->bookmarkRepository->delete($request->user()->id, $id);

        return response()->noContent();
    }
}
