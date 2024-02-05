<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;
use App\Repositories\SiteCategoryRepository;
use App\Http\Resources\SiteCategoryResource;

class SiteCategoryController extends Controller
{
    public function __construct(
        protected SiteCategoryRepository $siteCategoryRepository
    ) { }
    
    public function getAll(Request $request): ResourceCollection
    {
        $siteCategories = $this->siteCategoryRepository->getAll();
        return SiteCategoryResource::collection($siteCategories);
    }
}
