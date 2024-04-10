<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>div</title>

</head>
<body>
    <div style="display: flex; flex-direction: column">
        <?php 
        for($i=0; $i<=5; $i++){
            echo '<div style="width: 10%; height: 10%; background-color: red" class="div-img">
            <img style="object-fit; width: 100%; height: 100%">
            </div>';
        }
        ?>
    </div>
</body>
</html>