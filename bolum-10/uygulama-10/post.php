<html>

<body>

    <form method="POST" action="post.php">
        Notunuz: <input type="int" name="not">
        <input type="submit">
    </form>

</body>

</html>
<?php

// $sayi = 60;


// switch ($sayi) {
//     case 5:
//         echo "beş";
//         break;
//     case '6':
//         echo "altı";
//         break;

//     default:
//         echo "yanlış veri";
//         break;
// }

$not = 60;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $not = $_POST['not'];
    switch (true) {

        case ($not >= 0 and $not < 25):
            echo "notunuz 0";
            break;

        case ($not >= 25 and $not < 45):
            echo "notunuz D";
            break;
        case ($not >= 45 and $not < 55):
            echo "notunuz C";
            break;
        case ($not >= 55 and $not < 70):
            echo "notunuz B";
            break;
        case ($not >= 70 and $not < 85):
            echo "notunuz A";
            break;
        case ($not >= 85 and $not <= 100):
            echo "notunuz S";
            break;
        default:
            echo "yanlış";
    }
}
else {
    $dizi = array();
    $dizi['type'] = "error";
    echo json_encode($dizi);
}
?>