<?php

namespace App\Services;

use App\Models\User;
use App\Models\Api\Category;

class CategoryService
{
    public function getUserCategories(User $user)
    {
        return $user->categories()->get();
    }
}
