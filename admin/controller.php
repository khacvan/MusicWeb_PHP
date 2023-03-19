<?php
    include '../controller/connectDB.php';



/*----------------------------------------------Sử dụng trong file index----------------------------------------------*/
    // Tổng số tài khoản
    $sql_total_user = "SELECT COUNT(*) as total FROM users";
    $result = mysqli_query($conn, $sql_total_user);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $total_user = $row['total'];
    }


    // Tổng số bài hát
    $sql_total_song = "SELECT COUNT(*) as total FROM songs";
    $result = mysqli_query($conn, $sql_total_song);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $total_song = $row['total'];
    }


/*----------------------------------------------Sử dụng trong file song_data----------------------------------------------*/
    // Xuất danh sách bài hát
    function getSongGenres($songId, $conn) {
        $sql = "SELECT st.name 
                                FROM song_song_type sst 
                                JOIN song_type st ON sst.song_type_id = st.id 
                                WHERE sst.song_id = '$songId'";

        $result = mysqli_query($conn, $sql);
        $genres = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $genres[] = $row["name"];
        }
        mysqli_free_result($result);
        return implode(", ", $genres);
    }

    function getSongSingers($songId, $conn) {
        $sql = "SELECT sg.name
                            FROM singer_song ss
                            JOIN singer sg ON ss.singer_id = sg.id
                            WHERE ss.song_id = '$songId'";

        $result = mysqli_query($conn, $sql);
        $singers = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $singers[] = $row["name"];
        }
        mysqli_free_result($result);
        return implode(", ", $singers);
    }

    function getSong($conn){
        $sql_read_song = 'SELECT * FROM songs';
        $result = mysqli_query($conn, $sql_read_song);
        if (mysqli_num_rows($result) > 0) {
            $listSongs = array();
            while ($row = mysqli_fetch_assoc($result)) {
                $singers = getSongSingers($row['id'],$conn);
                $genres =   getSongGenres($row['id'],$conn);
                $song = array(
                    'id' => $row['id'],
                    'name' => $row['name'],
                    'genres' => $genres,
                    'singers' => $singers,
                    'year' => $row['year'],
                    'data' => $row['data'],
                    'image' => $row['image']
                );
                $listSongs[] = $song;

            }
            return $listSongs;
        }
    }


    function getSongTypes($conn){
        $sql= 'SELECT * FROM song_type';
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            $listSongTypes = array();
            while ($row = mysqli_fetch_assoc($result)) {
                $songTypes = array(
                    'id' => $row['id'],
                    'name' => $row['name'],
                );
                $listSongTypes[] = $songTypes;

            }
            return $listSongTypes;
        }
    }

    function getSingers($conn){
        $sql= 'SELECT * FROM singer';
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            $listSingers = array();
            while ($row = mysqli_fetch_assoc($result)) {
                $singers = array(
                    'id' => $row['id'],
                    'name' => $row['name'],
                    'country' => $row['country']
                );
                $listSingers[] = $singers;

            }
            mysqli_close($conn);
            return $listSingers;
        }
    }



/*--------------------------------------------------------------------------------------------------------*/

/*----------------------------------------------Sử dụng trong file user_data----------------------------------------------*/
    function getUsers($conn) {
        $sql = 'SELECT * FROM users';
        $result = mysqli_query($conn, $sql);
        $listUsers = array();
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                if($row['vip']==1){
                    $row['vip']="Vip Member";
                    $vipClass = "badge bg-success";
                }else{
                    $row['vip']="Member";
                    $vipClass= "badge bg-secondary";
                }

                if($row['roles']==1){
                    $row['roles']="Admin";
                }else{
                    $row['roles']="User";
                }
                $user = array(
                    'id' => $row['id'],
                    'username' => $row['username'],
                    'password' => $row['password'],
                    'email' => $row['email'],
                    'avatar' => $row['avatar'],
                    'vip' => $row['vip'],
                    'roles' => $row['roles'],
                    'vipClass' => $vipClass
                );
                $listUsers[] = $user;
            }
        }
        mysqli_close($conn);
        return $listUsers;
    }

/*--------------------------------------------------------------------------------------------------------*/


?>