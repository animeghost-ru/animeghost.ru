<?php
$pdo = new PDO('pgsql:host=pg.sweb.ru;port=5432;dbname=amarylliso', 'amarylliso', 'Mesina226');

class db
{
    function getUserIdNamePassByName($name)
    {
        global $pdo;
        $query = $pdo->prepare('SELECT id, name, passhash FROM users WHERE name = :name');
        $query->bindParam(':name', $name);
        $query->execute();
        return $query;
    }
    function insertSessionIntoSessions($row, $hash, $var)
    {
        global $pdo;
        $query = $pdo->prepare('INSERT INTO sessions (uid, hash, time, ip, user_agent) VALUES (:uid, :hash, :time, :ip, :user_agent)');
        $query->bindParam(':uid', $row['id']);
        $query->bindParam(':hash', $hash[0]);
        $query->bindParam(':time', $hash[1]);
        $query->bindParam(':ip', $var['ip']);
        $query->bindParam(':user_agent', $var['user_agent']);
        $query->execute();
    }
    function updateUsersLastActivity($id, $time)
    {
        global $pdo;
        $query = $pdo->prepare('UPDATE users SET last_activity = :time WHERE id = :id');
        $query->bindParam(':time', $time);
        $query->bindParam(':id', $id);
        $query->execute();
    }
    function deleteSessionFromSessionsWhereTime($tmp)
    {
        global $pdo;
        $query = $pdo->prepare('DELETE FROM sessions WHERE time < :time');
        $query->bindParam(':time', $tmp);
        $query->execute();
    }
    function getIdUidHashFromSessions($var)
    {
        global $pdo;
        $query = $pdo->prepare('SELECT id, uid, hash FROM sessions WHERE hash = :hash AND time > :time');
        $query->bindParam(':hash', $_SESSION['sess']);
        $query->bindParam(':time', $var['time']);
        $query->execute();
        return $query;
    }
    function getUser($id)
    {
        global $pdo;
        $query = $pdo->prepare('SELECT id, name, mail, last_activity, age, online, level, firstname, surname, watched, readed, access, prefered_language FROM users WHERE id = :id');
        $query->bindParam(':id', $id);
        $query->execute();
        return $query;
    }
    function updateSessionsTime($id, $tmp)
    {
        global $pdo;
        $query = $pdo->prepare('UPDATE sessions SET time = :time WHERE id = :id');
        $query->bindParam(':time', $tmp);
        $query->bindParam(':id', $id);
        $query->execute();
    }
    function deleteSessionFromSessionsWhereHash()
    {
        global $pdo;
        $query = $pdo->prepare('DELETE FROM sessions WHERE hash = :hash');
        $query->bindParam(':hash', $_SESSION["sess"]);
        $query->execute();
    }
    function getAnimeCardsFromAnime($genres = '')
    {
        global $pdo;
        if ($genres == '') {
            $query = $pdo->prepare('SELECT * FROM anime ORDER BY rating DESC');
            $query->execute();
            return $query;
        }else{
            $query = $pdo->prepare('SELECT * FROM anime WHERE genres ~ :genres ORDER BY rating DESC');
            $query->bindParam(':genres', $genres);
            $query->execute();
            return $query;
        }

    }
    function getAnimeNameFromAnime($aid)
    {
        global $pdo;
        $query = $pdo->prepare('SELECT * FROM anime WHERE id = :id');
        $query->bindParam(':id', $aid);
        $query->execute();
        return $query;
    }
    function insertTechIntoTech($page, $timeleft, $time)
    {
        global $pdo;
        $query = $pdo->prepare('INSERT INTO tech (page_uri, timeleft, date) VALUES (:page, :timeleft, :date)');
        $query->bindParam(':page', $page);
        $query->bindParam(':timeleft', $timeleft);
        $query->bindParam(':date', $time);
        $query->execute();
    }
    function getPageTechs($uri)
    {
        global $pdo;
        $query = $pdo->prepare('SELECT * FROM tech WHERE page_uri = :uri');
        $query->bindParam(':uri', $uri);
        $query->execute();
        return $query;
    }
    function getAnimeGenresById($aid)
    {
        global $pdo;
        $query = $pdo->prepare('SELECT * FROM genresanime WHERE aid = :aid');
        $query->bindParam(':aid', $aid);
        $query->execute();
        return $query;
    }
    function getAnimeGenreById($gid)
    {
        global $pdo;
        $query = $pdo->prepare('SELECT * FROM genres WHERE id = :gid');
        $query->bindParam(':gid', $gid);
        $query->execute();
        return $query;
    }
}