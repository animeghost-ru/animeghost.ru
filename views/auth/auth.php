<?php


class auth
{
    function output()
    {
        global $language;
        echo '
            <section class="container">
                <form id="authform">
                  <div id="alert"></div>
                  <div class="form-group">
                    <label for="authlogin">'.$language[$_SESSION['selected']]['login'].'</label>
                    <input type="text" class="form-control" id="authlogin" placeholder="'.$language[$_SESSION['selected']]['logininput'].'">
                  </div>
                  <div class="form-group">
                    <label for="authpass">'.$language[$_SESSION['selected']]['pass'].'</label>
                    <input type="password" class="form-control" id="authpass" placeholder="'.$language[$_SESSION['selected']]['passinput'].'">
                  </div>
                  <div class="form-group form-check">
                    <input type="checkbox" class="form-check-input" id="authcheck">
                    <label class="form-check-label" for="authcheck">'.$language[$_SESSION['selected']]['check'].'</label>
                  </div>
                  <button type="submit" class="btn btn-primary" id="authbutton">'.$language[$_SESSION['selected']]['LogIn'].'</button>
                </form>
            </section>';
    }
}