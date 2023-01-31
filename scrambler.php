<?php 
include_once "scramblerf.php";
$task = 'encode';

if(isset($_GET['task']) && $_GET['task'] !=''){
    $task = $_GET['task'];
}

$key  = 'abcdefghijklmnopqrstuvwxyz1234567890';
if('key' == $task){
    $key_original = str_split($key);
    shuffle($key_original);
    $key = join('', $key_original);
}else if(isset($_POST['key']) && $_POST['key'] !=''){
    $key = $_POST['key'];
}

$scrambledData = '';
if('encode' == $task){
    $data = $_POST['data'] ?? '';
    if($data != ''){
        $scrambledData = scrambleData($data , $key);
    }
}

if('decode' == $task){
    $data = $_POST['data'] ?? '';
    if($data != ''){
        $scrambledData = decodeData($data , $key);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Scrambler</title>
    <link rel="stylesheet" href="css/milligram.css" type="text/css" />
    <link rel="stylesheet" href="css/normalize.css" type="text/css" />
    <link rel="stylesheet" href="css/style.css" type="text/css" />
</head>
<body>
    <header class="header_area"> 
        <div class="contianer"> 
         <marquee>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rerum accusantium adipisci tempore qui mollitia dolorum impedit consequatur, architecto libero ullam! Ea cupiditate aut ipsum dicta, magnam dolor provident quidem corporis.</marquee>
        </div>
    </header>

    <section class="scramble_section"> 
        <div class="container"> 
            <div class="row"> 
                <div class="column column-60 column-offset-20"> 
                    <h2>Data Scrambler <a href="index.php">Back</a></h2>
                    <p>Use this application to scramble your data</p>
                    <p>
                        <a href="/scrambler.php?task=encode">Encode</a> |
                        <a href="/scrambler.php?task=decode">Decode</a> |
                        <a href="/scrambler.php?task=key">Generate Key</a>
                    </p>
                </div>
            </div>

            <div class="row"> 
                <div class="column column-60 column-offset-20"> 
                    <form action="scrambler.php<?php if('decode' == $task){echo "?task=decode";}?>" method="post"> 
                        <label for="key">Key</label>
                        <input type="text" name="key" id="key" <?php displyaKey($key); ?>>
                        <label for="data">Data</label>
                        <textarea name="data" id="data"><?php if(isset($_POST['data'])) { echo $_POST['data']; }; ?></textarea>
                        <label for="result">Result</label>  
                        <textarea name="result" id="result"><?php echo $scrambledData ; ?></textarea>
                        <button type="submit">Do it for me</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <footer class="copyright_area"> 
        <div class="container"> 
            <p>Copyright &copy; <a href="https://www.facebook.com/w3sarwar">Golam Sarwar</a> | Reserved All Content 2023</p>
        </div>
    </footer>
</body>
</html>