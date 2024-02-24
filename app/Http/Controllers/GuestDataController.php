<?php

namespace App\Http\Controllers;

use App\Http\Requests\ApiRequest;
use App\Repositories\GuestDataRepository;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Http\Resources\Json\JsonResource;

class GuestDataController
{
    protected string $apiRequestClass;
    protected string $jsonResourceClass;

    public function __construct(
        protected GuestDataRepository $guestDataRepository
    ) { }
    
    public function getAll(Request $request): ResourceCollection
    {
        $params    = ['guest_user_id' => $request->user()->id];
        $bookmarks = $this->guestDataRepository->getAll($params);

        return  $this->jsonResourceClass::collection($bookmarks);
    }

    public function get(Request $request, int $id): JsonResource
    {
        $bookmark = $this->guestDataRepository->get($request->user()->id, $id);

        return new $this->jsonResourceClass($bookmark);
    }

    public function add(ApiRequest $request): JsonResource
    {
        $params = $request->all();
        $params['guest_user_id'] = $request->user()->id;

        $bookmark = $this->guestDataRepository->add($params);

        return new $this->jsonResourceClass($bookmark);
    }

    public function edit(ApiRequest $request, int $id): JsonResource
    {
        $params = $request->all();
        $params['guest_user_id'] = $request->user()->id;

        $this->guestDataRepository->edit($id, $params);

        $bookmark = $this->get($request, $id);
        return new $this->jsonResourceClass($bookmark);
    }

    public function delete(Request $request, int $id): Response
    {
        $this->guestDataRepository->delete($request->user()->id, $id);

        return response()->noContent();
    }
}
