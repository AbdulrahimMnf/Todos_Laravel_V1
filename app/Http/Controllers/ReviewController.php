<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReviePostRequest;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(ReviePostRequest $request)
    {
        Review::create($request->post());
        return redirect('');
    }
}
