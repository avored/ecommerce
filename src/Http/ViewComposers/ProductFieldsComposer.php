<?php

namespace AvoRed\Ecommerce\Http\ViewComposers;

use Illuminate\View\View;
use AvoRed\Framework\Models\Contracts\CategoryInterface;

class ProductFieldsComposer
{
    /**
     * Bind data to the view.
     *
     * @param  View $view
     * @return void
     */
    public function compose(View $view)
    {
        $repository = app(CategoryInterface::class);
        $categoryOptions = $repository->options($emptry = false)->pluck('name', 'id');

        $view->with('categoryOptions', $categoryOptions);
    }
}
