<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\SiteCategoryResource;
use App\Repositories\SiteCategoryRepository;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class SiteCategoryController extends Controller
{
    public function __construct(
        protected SiteCategoryRepository $siteCategoryRepository
    ) {
    }

    public function getAll(Request $request): ResourceCollection
    {
        $siteCategories = $this->siteCategoryRepository->getAll();
        return SiteCategoryResource::collection($siteCategories);
    }
}
