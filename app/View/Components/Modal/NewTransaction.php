<?php

namespace App\View\Components\Modal;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Services\CategoryService;

class NewTransaction extends Component
{
    public $categories;

    public function __construct(CategoryService $categoryService)
    {
        $user = auth()->user();
        if (!$user) {
            throw new \RuntimeException('Usuário não autenticado.');
        }
        $this->categories = $categoryService->getUserCategories($user);
    }

    public function render(): View|Closure|string
    {
        return view('components.modal.new-transaction', [
            'categories' => $this->categories
        ]);
    }
}
