<?php

namespace App\View\Composers;

use App\Models\Keyword;
use Illuminate\View\View;

class SearchKeywordComposer
{
    private $data;

    public function __construct()
    {
        $this->data = Keyword::where('isDeleted',FALSE)->get();
    }

    public function compose(View $view){
        $view->with('keywords', $this->data);
    }
}
