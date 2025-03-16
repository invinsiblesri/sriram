<?php
$directory = 'uploads/';
$movies = array_diff(scandir($directory), array('..', '.'));

foreach ($movies as $movie) {
    echo '<div class="movie-thumbnail">';
    echo '<video width="200" height="150" controls>';
    echo '<source src="' . $directory . $movie . '" type="video/mp4">';
    echo 'Your browser does not support the video tag.';
    echo '</video>';
    echo '</div>';
}
?>