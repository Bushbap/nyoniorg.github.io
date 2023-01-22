if (isset($_POST['submit-search'])) {
    $txtresult = $_POST['search'];
    if ($txtresult == 'red') {
        echo "<span class= 'red'>".$txtresult."</span><br>";
    }elseif ($txtresult == 'green') {
        echo "<span class= 'green'>".$txtresult."</span><br>";
    }

    function getImdbRecord($title, $ApiKey)
    {
        $path = "http://www.omdbapi.com/?t=$title&apikey=$ApiKey";
        $json = file_get_contents($path);
        return json_decode($json, TRUE);
    }

    $data = getImdbRecord($txtresult, "f3d054e8");

    if (isset($data['Error']) && 'Movie not found!' == $data['Error']) {
        echo "<span class= 'red'>{$data['Error']} by keyword <b>{$txtresult}</b></span><br>";
    } else {
        echo "<span class = 'info-box'><h3> Name :".$data['Title']."</h3><h3> Year : ".$data['Year']."</h3><h3> Duration : ".$data['Runtime'],"</h3></span>";
    }
}