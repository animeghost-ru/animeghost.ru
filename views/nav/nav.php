<?php


class nav
{
    function output($active)
    {
        global $language, $user;
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
            case 'profile':
                $a[3]='active';
                break;
            case 'manga':
                $a[2]='active';
                break;
        }
        if (!$user) {
            echo '
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
              <a class="navbar-brand" href="/">Animeghost</a>
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                  <li class="nav-item ' . $a[0] . '">
                    <a class="nav-link" href="/">' . $language[$_SESSION['selected']]['index'] . '</a>
                  </li>
                  <li class="nav-item ' . $a[1] . '">
                    <a class="nav-link" href="/anime">' . $language[$_SESSION['selected']]['anime'] . '</a>
                  </li>
                  <li class="nav-item ' . $a[2] . '">
                    <a class="nav-link" href="/manga">' . $language[$_SESSION['selected']]['manga'] . '</a>
                  </li>
                  <li class="nav-item ' . $a[3] . '">
                    <a class="nav-link" href="/auth">' . $language[$_SESSION['selected']]['auth'] . '</a>
                  </li>
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      ' . $language[$_SESSION['selected']]['lang'] . '
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                      <a class="dropdown-item" id="rulang"><img src="/icons/russia-flag-icon-16.png"> ' . $language[$_SESSION['selected']]['rulang'] . '</a>
                      <a class="dropdown-item" id="enlang"><img src="/icons/united-kingdom-flag-icon-16.png"> ' . $language[$_SESSION['selected']]['enlang'] . '</a>
                    </div>
                  </li>
                </ul>
              </div>
            </nav>';
        }else{
            echo '
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
              <a class="navbar-brand" href="/">Animeghost</a>
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                  <li class="nav-item ' . $a[0] . '">
                    <a class="nav-link" href="/">' . $language[$_SESSION['selected']]['index'] . '</a>
                  </li>
                  <li class="nav-item ' . $a[1] . '">
                    <a class="nav-link" href="/anime">' . $language[$_SESSION['selected']]['anime'] . '</a>
                  </li>
                  <li class="nav-item ' . $a[2] . '">
                    <a class="nav-link" href="/manga">' . $language[$_SESSION['selected']]['manga'] . '</a>
                  </li>
                  <li class="nav-item ' . $a[3] . '">
                    <a class="nav-link" href="/profile">' . $language[$_SESSION['selected']]['profile'] . '</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="/ajax/logout.php">' . $language[$_SESSION['selected']]['logout'] . '</a>
                  </li>
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      ' . $language[$_SESSION['selected']]['lang'] . '
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                      <a class="dropdown-item" id="rulang"><img src="/icons/russia-flag-icon-16.png"> ' . $language[$_SESSION['selected']]['rulang'] . '</a>
                      <a class="dropdown-item" id="enlang"><img src="/icons/united-kingdom-flag-icon-16.png"> ' . $language[$_SESSION['selected']]['enlang'] . '</a>
                    </div>
                  </li>
                </ul>
              </div>
            </nav>';
        }
    }
}