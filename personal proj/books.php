


<form action="addMovie.php" method="post" enctype="multipart/form-data">

  <div class="form-floating">
    <input type="text" class="form-control" id="movieName" placeholder="Movie Name" name="movie_name" required>
    <label for="movieName">Movie Name</label>
  </div>

  <div class="form-floating">
    <input type="text" class="form-control" id="movieDesc" placeholder="Movie Description" name="movie_desc" required>
    <label for="movieDesc">Movie Description</label>
  </div>

  <div class="form-floating">
    <input type="text" class="form-control" id="movieQuality" placeholder="Quality" name="movie_quality" required>
    <label for="movieQuality">Movie Quality</label>
  </div>

  <div class="form-floating">
    <input type="number" class="form-control" id="movieRating" placeholder="Rating" name="movie_rating" required>
    <label for="movieRating">Rating</label>
  </div>

  <div class="form-floating">
    <input type="file" class="form-control" id="movieImage" name="movie_image" required>
    <label for="movieImage">Image</label>
  </div>

  <button class="w-100 btn btn-lg btn-primary mt-3" type="submit" name="submit">Add Movie</button>

</form>

