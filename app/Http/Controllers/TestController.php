<?php

namespace App\Http\Controllers;

use Inertia\Inertia;

class TestController extends Controller
{
    public function show()
    {
        return Inertia::render('Test', [
            'fastFoods' => [
                'McDonalds',
                'Burger King',
                'KFC',
                'Subway',
                'Pizza Hut'
            ]
        ]);
    }
}
