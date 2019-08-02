<?php

class profile
{
    function output($mode, $customuser = NULL)
    {
        global $user, $var, $language;
        if ($mode == 1)
        {
            echo '
            <section class="container shadow-lg p-3 mb-5">
                <div class="text-center">
                  <div class="card-header">
                    <ul class="nav nav-pills card-header-pills">
                      <li class="nav-item">
                        <a class="nav-link active" id="yourprofile">'.$language[$_SESSION['selected']]['yourprofile'].'</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="youranimes">'.$language[$_SESSION['selected']]['youranimes'].'</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="yoursettings">'.$language[$_SESSION['selected']]['profilesettings'].'</a>
                      </li>
                    </ul>
                  </div>
                  
                  <div class="yourprofile card-body main-card-body">
                    <div class="row">
                        <div class="col">
                                <div class="card-body">
                                    <img class="rounded" src="/img/users/' . md5($user['id']) . '.png" width="100px" height="100px" alt="User Avatar">
                                </div>
                                <div class="card-header"><b><h5>' . $user['name'] . '</h5></b><h6>'.$user['firstname'].' '.$user['surname'].'</h6></div>
                        </div>
                        <div class="col">
                            <div class="card">
                                <div class="card-header">'.$language[$_SESSION['selected']]['userinfo'].'</div>
                                <div class="card-body">
                                    <p>'.$language[$_SESSION['selected']]['role'][4].' - '.$language[$_SESSION['selected']]['role'][$user['access']].'</p>
                                    <p>'.$language[$_SESSION['selected']]['level'].' - '.$user['level'].'</p>
                                    <p>'.$language[$_SESSION['selected']]['watched'].' - '.$user['watched'].'</p>
                                    <p>'.$language[$_SESSION['selected']]['readed'].' - '.$user['readed'].'</p>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card">                        
                                <div class="card-header">'.$language[$_SESSION['selected']]['sociallinks'].'</div>
                                <div class="card-body">
                                    <p>MAL - </p>
                                    <p>VK - </p>
                                    <p>INSTAGRAM - </p>
                                    <p>TELEGRAM - </p>
                                </div>
                            </div>
                        </div>
                    </div>
                  </div>
                  <div class="useranimes card-body main-card-body">
                    <h5>'.$language[$_SESSION['selected']]['youranimes'].'</h5>
                  </div>
                  <div class="usersettings card-body main-card-body">
                    <h5>'.$language[$_SESSION['selected']]['profilesettings'].'</h5>
                  </div>
                </div>
            </section>
            ';
        }
        elseif($mode == 2)
        {
            echo '
            <section class="container shadow-lg p-3 mb-5">
                <div class="text-center">
                  <div class="card-header">
                    <ul class="nav nav-pills card-header-pills">
                      <li class="nav-item">
                        <a class="nav-link active" id="yourprofile">Профиль пользователя - '.$customuser['name'].'</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="youranimes">Аниме пользователя - '.$customuser['name'].'</a>
                      </li>
                    </ul>
                  </div>
                  <div class="yourprofile card-body main-card-body">
                    <div class="row">
                        <div class="col">
                            <div class="card">
                                <div class="card-header"><h5>' . $customuser['name'] . '</h5><h6>'.$customuser['firstname'].' '.$customuser['surname'].'</h6></div>
                                <div class="card-body">
                                    <img src="/img/users/' . md5($customuser['id']) . '.png" width="100px" height="100px" alt="User Avatar">
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card">
                                <div class="card-header">Информация о пользователе</div>
                                <div class="card-body">
                                    <p>Уровень пользователя - '.$customuser['level'].'</p>
                                    <p>Просмотрено аниме - '.$customuser['watched'].'</p>
                                    <p>Прочитано манги - '.$customuser['readed'].'</p>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card">                        
                                <div class="card-header">Ссылки на соц. сети</div>
                                <div class="card-body">
                                    <p>VK - </p>
                                    <p>INSTAGRAM - </p>
                                    <p>TELEGRAM - </p>
                                </div>
                            </div>
                        </div>
                    </div>
                  </div>
                  <div class="useranimes card-body main-card-body">
                    <h5>Аниме пользователя - '.$customuser['name'].'</h5>
                  </div>
                </div>
            </section>
            ';
        }
        elseif ($mode == 3){
            echo '
            <section class="container shadow-lg p-3 mb-5">                
                <div class="card text-center">
                  <div class="card-body">
                    <h5>Увы, но такого пользователя не существует!</h5>
                  </div>
                </div>
            </section>
            ';
        }
    }
}