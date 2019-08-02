<?php


class animeIndex
{
    function output($row)
    {
        $db = new db;
        echo '
        <section class="container shadow-lg p-3 mb-5">
            <div class="row animecards">
        ';

        $i = $row->rowCount();
        for ($j = 0; $j < $i; $j++) {
            $anime = $row->fetch();
            $genres = $db->getAnimeGenresById($anime['id']);
                echo '
                    <div class="card">
                      <span id="aid" style="display: none">' . $anime['id'] . '</span>
                      <img src="/img/anime_posters/' . $anime['id'] . '.jpg" class="card-img-top" alt="Anime poster">
                      <div class="card-body">
                        <h5 class="card-title"><a href="/anime/'.$anime['id'].'">' . $anime['name'] . '</a></h5>
                        <div><b>Жанры</b> - 
                        ';
                for ($m = 0; $m < $genres->rowCount(); $m++) {
                    $rowGenres = $genres->fetch();
                    $genre = $db->getAnimeGenreById($rowGenres['gid']);
                    $genre = $genre->fetch();
                    echo '<a class="genresA" href="/anime/genres/' . $genre['alternativename'] . '">' . $genre['name'] . '</a> ';
                }
                echo '
                        </div>
                        <div>
                            <b>Рейтинг</b> - '.$anime['rating'].'
                        </div>
                        <p class="card-text"><b>Описание</b> - ' . substr($anime['description'], 0, 250) . '...</p>
                        <a href="/anime/' . $anime['id'] . '" class="btn btn-primary">Смотреть аниме</a>
                      </div>
                    </div>';
        }
                echo '
                </div>
            </section>
            ';
    }
}

class animePage
{
    function output($anime)
    {
        echo '
        <section class="container shadow-lg p-3 mb-5"> 
            <h3 class="text-center" style="margin: 0 auto;">'.$anime['name'].'</h3>
            <div class="l"></div>
            <div class="row">
                <div class="col-sm-4">   
                    <img src="/img/anime_posters/'.$anime['id'].'.jpg" class="anime_poster rounded border border-dark" alt="...">
                </div>
                <div class="col-sm-8">
                    <b>Жанры: </b>
                    <b>Описание: </b><p>'.$anime['description'].'</p>
                </div>
            </div>
        
        </section>';
    }
}