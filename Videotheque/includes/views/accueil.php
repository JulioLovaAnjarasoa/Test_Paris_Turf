<?php
include $_SERVER['DOCUMENT_ROOT'] . '/Test_Paris_Turf/Videotheque/includes/api/api.php';

function get_movies_types($apiKey)
{
    $url = "https://api.themoviedb.org/3/genre/movie/list?api_key=" . $apiKey;
    $types_list = get_api($url);

    return $types_list;
}

function get_movies_list($apiKey)
{
    $url = "https://api.themoviedb.org/3/discover/movie?api_key=" . $apiKey;
    $movies_list = get_api($url);

    return $movies_list;
}

function get_popular_movies($apiKey)
{
    $url = "https://api.themoviedb.org/3/movie/top_rated?api_key=" . $apiKey;
    $popular_movies = get_api($url);

    return $popular_movies;
}

function get_movies_by_types($apiKey, $id)
{
    $url = "https://api.themoviedb.org/3/movie/" . $id . "/videos?api_key=" . $apiKey;
    $movies_list = get_api($url);

    return $movies_list;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <title>Document</title>
</head>

<body>
    <div class="container-fluid">
        <div class="row flex-nowrap">
            <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark">
                <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                    <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                        <?php
                        $movies_types = get_movies_types($apiKey)['genres'];
                        foreach ($movies_types as $type) {
                        ?><li class="nav-item">
                                <a href="?genre=<?php echo $type['id']; ?>" class="nav-link align-middle px-0">
                                    <i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline"><?php echo $type['name']; ?></span>
                                </a>
                            </li>
                        <?php
                        }
                        ?>
                    </ul>
                    <hr>
                </div>
            </div>
            <?php
            if (isset($_GET['genre'])) {
            ?>
                <div class="col py-3">
                    <div class="row">
                        <h1>Movies</h1>
                        <?php
                        $movies = get_movies_by_types($apiKey, $_GET['genre'])['results'];
                        var_dump($movies);
                        foreach ($movies as $movie) {
                        ?>
                            <div class="col-4 card mb-2">
                                <div class="">
                                    <a href=""><img src="https://image.tmdb.org/t/p/original/<?php echo $movie['poster_path'] ?>" class="img-fluid rounded-start" alt="..."></a>
                                </div>
                                <div class="">
                                    <div class="card-body">
                                        <h5 class="card-title"><?php echo $movie['original_title']; ?></h5>
                                        <p class="card-text"><small class="text-muted"></small></p>
                                        <p class="card-text"><?php echo $movie['overview']; ?></p>

                                    </div>
                                </div>
                            </div>
                        <?php
                        }

                        ?>
                    </div>
                </div>
            <?php
            } else {
            ?>
                <div class="col py-3">
                    <div class="row">
                        <h3>Top rated movies</h3>
                        <?php
                        $popular_movies = get_popular_movies($apiKey)['results'];
                        foreach ($popular_movies as $movie) {
                        ?>
                            <div class="col-2 card mb-2">
                                <div class="col-md-4">
                                    <a href=""><img src="https://image.tmdb.org/t/p/original/<?php echo $movie['poster_path'] ?>" class="img-fluid rounded-start" alt="..."></a>
                                </div>
                            </div>
                        <?php

                        }
                        ?>

                    </div>
                    <div class="row">
                        <h1>Discover Movies</h1>
                        <?php
                        $movies = get_movies_list($apiKey)['results'];
                        // var_dump($movies);
                        // die();
                        foreach ($movies as $movie) {
                        ?>
                            <div class="col-4 card mb-2">
                                <div class="">
                                    <a href=""><img src="https://image.tmdb.org/t/p/original/<?php echo $movie['poster_path'] ?>" class="img-fluid rounded-start" alt="..."></a>
                                </div>
                                <div class="">
                                    <div class="card-body">
                                        <h5 class="card-title"><?php echo $movie['original_title']; ?></h5>
                                        <p class="card-text"><small class="text-muted"></small></p>
                                        <p class="card-text"><?php echo $movie['overview']; ?></p>

                                    </div>
                                </div>
                            </div>
                        <?php
                        }

                        ?>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
    </div>
</body>

</html>