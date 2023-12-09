@extends('includes.layout')
@section('content')
<br>
<h2 class="mb-4 text-center">VectorSurv Movie Challenge</h2>
<p class="text-center">Applications Programmer 2 Candidate: Riley Wilkins</p>

<form action="/reviews" method="post" onsubmit="return validateForm()" class="mt-4 border border-dark p-4 rounded" name="reviewForm">
    @csrf
    <div id="errorBanner" class="alert alert-danger mt-2 text-center" style="display: none;">
        Please correct the highlighted field(s) below and then resubmit the form.
    </div>
    <div class="form-group row justify-content-center">
        <label for="movie_title" class="col-lg-4 col-form-label">Movie Title:</label>
        <div class="col-lg-4">
            <input type="text" class="form-control mt-2" name="movie_title">
        </div>
    </div>

    <div class="form-group row justify-content-center">
        <label for="release_date" class="col-lg-4 col-form-label">Date of Release:</label>
        <div class="col-lg-4">
            <input type="date" class="form-control mt-2" name="release_date">
        </div>
    </div>

    <div class="form-group row justify-content-center">
        <label for="movie_rating" class="col-lg-4 col-form-label">Movie Rating (out of 10):</label>
        <div class="col-lg-4">
            <input type="number" class="form-control mt-2" name="movie_rating" step="0.1" placeholder="Enter a rating between 0.0 and 10.0">
        </div>
    </div>

    <div class="form-group row justify-content-center">
        <label for="genre" class="col-lg-4 col-form-label">Genre:</label>
        <div class="col-lg-4">
            <select class="form-control mt-2" style="cursor:pointer;" name="genre">
                <option value="">Please Select</option>
                <option value="Action">Action</option>
                <option value="Animation">Animation</option>
                <option value="Comedy">Comedy</option>
                <option value="Drama">Drama</option>
                <option value="Historical">Historical</option>
                <option value="Horror">Horror</option>
                <option value="Sci Fi">Sci Fi</option>
            </select>
        </div>
    </div>

    <div class="form-group row justify-content-center">
        <label for="studio_email" class="col-lg-4 col-form-label">Studio Email:</label>
        <div class="col-lg-4">
            <input type="text" class="form-control mt-2" name="studio_email">
        </div>
    </div>

    <div class="form-group row justify-content-center">
        <div class="col-lg-8">
            <button type="submit" class="form-control mt-2 btn btn-success">Save</button>
        </div>
    </div>
</form>

<div class="table-responsive mt-4">
    <table class="table text-center">
        <thead>
            <tr>
                <th>Title</th>
                <th>Release Date</th>
                <th>Rating</th>
                <th>Genre</th>
                <th>Studio Email</th>
            </tr>
        </thead>
        <tbody>
            @if(isset($reviews))
                @foreach($reviews as $review)
                    <tr>
                        <td>{{ $review->movie_title }}</td>
                        <td>{{ \Carbon\Carbon::parse($review->release_date)->format('F j, Y') }}</td>
                        <td>{{ number_format($review->movie_rating, 1) }}</td>
                        <td>{{ $review->genre }}</td>
                        <td>{{ $review->studio_email }}</td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
</div>

<script>
    function validateForm() {
        var movieTitle = document.forms["reviewForm"]["movie_title"];
        var releaseDate = document.forms["reviewForm"]["release_date"];
        var movieRating = document.forms["reviewForm"]["movie_rating"];
        var genre = document.forms["reviewForm"]["genre"];
        var studioEmail = document.forms["reviewForm"]["studio_email"];
        var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;

        resetStyles([movieTitle, releaseDate, movieRating, genre, studioEmail]);

        var isValid = true;

        if (movieTitle.value.trim() === "") {
            setInvalidStyle(movieTitle);
            isValid = false;
        }

        if (releaseDate.value === "") {
            setInvalidStyle(releaseDate);
            isValid = false;
        }

        if (movieRating.value === "" || isNaN(movieRating.value) || movieRating.value < 0 || movieRating.value > 10) {
            setInvalidStyle(movieRating);
            isValid = false;
        }

        if (genre.value === "") {
            setInvalidStyle(genre);
            isValid = false;
        }

        // Regular expression for a valid email format
        if (studioEmail.value.trim() === "") {
            setInvalidStyle(studioEmail);
            isValid = false;
        } else if (!studioEmail.value.match(emailPattern)) {
            setInvalidStyle(studioEmail);
            isValid = false;
        }

        if (!isValid) {
            displayErrorBanner();
        }

        // If all validations pass, return true to submit the form
        return isValid;
    }

    function setInvalidStyle(element) {
        element.style.borderColor = "red";
    }

    function resetStyles(elements) {
        elements.forEach(function (element) {
            element.style.borderColor = "";
        });
    }

    function displayErrorBanner() {
        let errorBanner = document.getElementById("errorBanner");
        if (errorBanner) {
            errorBanner.style.display = "block";
        }
    }
</script>
@endsection