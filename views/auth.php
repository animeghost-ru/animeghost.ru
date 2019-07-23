<?php


class auth
{
    function output()
    {
        echo '
            <section class="container">
                <form id="authform">
                  <div id="alert"></div>
                  <div class="form-group">
                    <label for="authlogin">Логин</label>
                    <input type="text" class="form-control" id="authlogin" placeholder="Введите логин">
                  </div>
                  <div class="form-group">
                    <label for="authpass">Password</label>
                    <input type="password" class="form-control" id="authpass" placeholder="Password">
                  </div>
                  <div class="form-group form-check">
                    <input type="checkbox" class="form-check-input" id="authcheck">
                    <label class="form-check-label" for="authcheck">Запомнить меня!</label>
                  </div>
                  <button type="submit" class="btn btn-primary" id="authbutton">Войти!</button>
                </form>
            </section>';
    }
}