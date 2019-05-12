<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Level 1</title>
    <meta name="author" content="name">
    <meta name="description" content="description here">
    <meta name="keywords" content="keywords,here">
    <link rel="stylesheet" href="style.css" type="text/css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <script type="text/javascript" src=""></script>
    <noscript>Please turn on javascript in your browser settings</noscript>
</head>
<body>
    <h1>Read Products</h1>
    <form action="?op=searchBar" method="POST">
        <input type="text" name="input" placeholder="search"><button type="submit" value="verstuur">Search</button>
    </form>
    <br>
    <?php echo $result;?>
</body>
</html>