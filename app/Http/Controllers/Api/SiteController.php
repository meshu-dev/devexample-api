<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\SiteResource;
use App\Repositories\SiteRepository;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class SiteController extends Controller
{
    public function __construct(
        protected SiteRepository $siteRepository
    ) {
    }

    public function getAllSites(Request $request): ResourceCollection
    {
        $sites  = $this->siteRepository->getAll($request->all());
        return SiteResource::collection($sites);
    }

    public function getAllByCategory(int $categoryId): ResourceCollection
    {
        $sites  = $this->siteRepository->getAllByCategory($categoryId);
        return SiteResource::collection($sites);
    }
}
