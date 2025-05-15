<?php

namespace App\Services;

use App\Models\Category;

class CategoryService
{
    public function __construct(
        protected Category $category,
    )
    {
        
    }

    public function getAll() {
        return $this->category->orderBy('created_at', 'DESC')->get();
    }
}