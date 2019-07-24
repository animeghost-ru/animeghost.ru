<?php


class profile
{
    function output()
    {
        global $user;
        echo '
            <section class="container shadow-lg p-3 mb-5">
                <div class="card text-center">
                  <div class="card-header">
                    <ul class="nav nav-pills card-header-pills">
                      <li class="nav-item">
                        <a class="nav-link active" id="yourprofile">Ваш профиль</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="youranimes">Ваши Аниме</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="yoursettings">Настройки профиля</a>
                      </li>
                    </ul>
                  </div>
                  <div class="yourprofile card-body">
                    <h5>'.$user['name'].'</h5>
                    <img src="/img/users/'.md5($user['id']).'.png" width="100px" height="100px" alt="User Avatar">
                    
                  </div>
                  <div class="useranimes card-body">
                    <h5>Ваши аниме</h5>
                  </div>
                  <div class="usersettings card-body">
                    <h5>Ваши настройки</h5>
                  </div>
                </div>
            </section>
            ';
    }
}