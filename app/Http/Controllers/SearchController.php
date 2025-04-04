<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    protected string $folderPath = 'pages.search.';

    public function index(Request $request) {
        /* !TODO need sanitize all input data from forms */
        $search = $request->input('s');
        if($search) {
            $all = Todo::where( 'title', 'like', "%$search%")
                ->orderBy('created_at', 'DESC')
                ->get();
        }

        return view(
            $this->folderPath . 'index', [
                'all' => $all ?? null,
                'search' => $search,
            ]
        );

    }
}
