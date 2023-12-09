<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MovieReview;

class MovieReviewController extends Controller
{
    public function index()
    {
        $reviews = MovieReview::all();
        return view('movie-review', ['reviews' => $reviews]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'movie_title' => 'required',
            'release_date' => 'required|date',
            'movie_rating' => 'required|numeric|min:0|max:10',
            'genre' => 'required',
            'studio_email' => 'required|email',
        ]);

        MovieReview::create($request->all());

        return redirect()->route('reviews.index')->with('success', 'Review submitted successfully!');
    }
}