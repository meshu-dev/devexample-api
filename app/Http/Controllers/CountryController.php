<?php

namespace App\Http\Controllers;

use App\Http\Requests\CountryRequest;
use App\Http\Resources\CountryResource;
use App\Repositories\CountryRepository;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Http\Resources\Json\JsonResource;

class CountryController
{
    public function __construct(
        protected CountryRepository $countryRepository
    ) {
    }

    public function getAll(Request $request): ResourceCollection
    {
        $params    = ['guest_user_id' => $request->user()->id];
        $bookmarks = $this->countryRepository->getAll($params);

        return CountryResource::collection($bookmarks);
    }

    public function get(Request $request, int $id): JsonResponse|JsonResource
    {
        $bookmark = $this->countryRepository->get($request->user()->id, $id);

        if ($bookmark) {
            return new CountryResource($bookmark);
        }
        return response()->json(['error' => 'Country not found'], 404);
    }

    public function add(CountryRequest $request): JsonResource
    {
        $params = $request->all();
        $params['guest_user_id'] = $request->user()->id;

        $bookmark = $this->countryRepository->add($params);

        return new CountryResource($bookmark);
    }

    public function edit(CountryRequest $request, int $id): JsonResource
    {
        $params = $request->all();
        $params['guest_user_id'] = $request->user()->id;

        $this->countryRepository->edit($id, $params);

        $bookmark = $this->get($request, $id);
        return new CountryResource($bookmark);
    }

    public function delete(Request $request, int $id): Response
    {
        $this->countryRepository->delete($request->user()->id, $id);

        return response()->noContent();
    }
}
