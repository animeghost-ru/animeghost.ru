<?php


class anime
{
    function output()
    {
        $db = new db;
        echo '
        <section class="container shadow-lg p-3 mb-5">
            <div class="card-deck mb-1">
        ';
        $row = $db->getAnimeCardsFromAnime();
        $i = $row->rowCount();
        for ($j = 0; $j < $i; $j++) {
            $anime = $row->fetch();
            $genres = explode(',', substr($anime['genres'], 1, strlen($anime['genres']) - 2));
            if (($j / 3) != 1) {
                echo '
                    <div class="card" style="width: 18rem;">
                      <span id="aid" style="display: none">' . $anime['id'] . '</span>
                      <img src="/img/anime_posters/' . $anime['id'] . '.jpg" class="card-img-top" alt="Anime poster">
                      <div class="card-body">
                        <h5 class="card-title">' . $anime['name'] . '</h5>
                        <div>Жанры - 
                        ';
                for ($m = 0; $m < count($genres); $m++) {
                    echo '<a class="genresA" href="/anime/genres/' . $genres[$m] . '">' . $genres[$m] . '</a> ';
                }
                echo '
                        </div>
                        <p class="card-text">' . substr($anime['description'], 0, 300) . '...</p>
                        <a href="/anime/' . $anime['id'] . '" class="btn btn-primary">Смотреть аниме</a>
                      </div>
                    </div>';
            } else {
                echo '
                </div>
                <div class="card-deck mb-1">
                    <div class="card" style="width: 18rem;">
                      <span id="aid" style="display: none">' . $anime['id'] . '</span>
                      <img src="/img/anime_posters/' . $anime['id'] . '.jpg" class="card-img-top" alt="Anime poster">
                      <div class="card-body">
                        <h5 class="card-title">' . $anime['name'] . '</h5>
                        <div>Жанры - 
                        ';
                for ($m = 0; $m < count($genres); $m++) {
                    echo '<a class="genresA" href="/anime/genres/' . $genres[$m] . '">' . $genres[$m] . '</a> ';
                }
                echo '
                        </div>
                        <p class="card-text">' . substr($anime['description'], 0, 300) . '...</p>
                        <a href="/anime/' . $anime['id'] . '" class="btn btn-primary">Смотреть аниме</a>
                      </div>
                    </div>';
            }
        }
                echo '
                </div>
            </section>
            ';
    }
}