<?php


class nav
{
    function output($active)
    {
        global $language;
        switch ($active) {
            case 'index':
                $a[0]='active';
                break;
            case 'anime':
                $a[1]='active';
                break;
            case 'auth':
                $a[3]='active';
                break;
            case 'manga':
                $a[2]='active';
                break;
        }
        echo '
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
              <a class="navbar-brand" href="/">Animeghost</a>
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                  <li class="nav-item '.$a[0]. '">
                    <a class="nav-link" href="/">'.$language[$_SESSION['selected']]['index'].'</a>
                  </li>
                  <li class="nav-item ' .$a[1].'">
                    <a class="nav-link" href="/anime">'.$language[$_SESSION['selected']]['anime'].'</a>
                  </li>
                  <li class="nav-item '.$a[2].'">
                    <a class="nav-link" href="/manga">'.$language[$_SESSION['selected']]['manga'].'</a>
                  </li>
                  <li class="nav-item '.$a[3].'">
                    <a class="nav-link" href="/auth">'.$language[$_SESSION['selected']]['auth'].'</a>
                  </li>
                </ul>
              </div>
            </nav>';
    }
}