<?php
// Default background class
$bodyClass = 'default-background';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $allowedDoors = [1, 2, 3];
    $doorNumber = 0;

    // Check which door was selected
    if (isset($_POST['door_1_x']) && in_array(1, $allowedDoors)) {
        $doorNumber = 1;
        $bodyClass = 'red-background'; // Background for door 1
    } elseif (isset($_POST['door_2_x']) && in_array(2, $allowedDoors)) {
        $doorNumber = 2;
        $bodyClass = 'blue-background'; // Background for door 2
    } elseif (isset($_POST['door_3_x']) && in_array(3, $allowedDoors)) {
        $doorNumber = 3;
        $bodyClass = 'green-background'; // Background for door 3
    }

    // Prepare story content
    switch ($doorNumber) {
        case 1:
            $story = "<p>You enter a world of fire and dragons! You meet a wise dragon who offers to teach you the secrets of fire magic. As you learn, you gain the ability to control fire and breathe fire.</p>";
            break;
        case 2:
            $story = "<p>You find yourself in an underwater kingdom! You discover a hidden cave filled with treasures and ancient artifacts. You meet a wise turtle who offers to teach you the secrets of water magic. As you learn, you gain the ability to control water and manipulate water elements.</p>";
            break;
        case 3:
            $story = "<p>You step into an enchanted forest! You encounter a group of magical creatures who invite you to join their adventures. You learn various magical skills and make new friends along the way.</p>";
            break;
        default:
            $story = "<p>You find yourself in a mysterious room with three magical doors. Each door leads to a different adventure. Choose wisely!</p>";
    }

} else {
    $story = "<p>You find yourself in a mysterious room with three magical doors. Each door leads to a different adventure. Choose wisely!</p>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Magic Door Adventure</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="<?php echo $bodyClass; ?>">
    <div class="container">
        <h1>Magic Door Adventure</h1>
        <div id="story">
            <?php echo $story; ?>
        </div>
        <div id="choices">
            <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
                <input type="image" src="red_door.png" name="door_1" class="door-button red-door" alt="Red Door" width="150" height="150">
                <input type="image" src="blue_door.png" name="door_2" class="door-button blue-door" alt="Blue Door" width="150" height="150">
                <input type="image" src="green_door.png" name="door_3" class="door-button green-door" alt="Green Door" width="150" height="150">
            </form>
        </div>
    </div>
    <div class="button-container">
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <input type="submit" value="Go Back" class="go-back-button">
        </form>
    </div>
</body>
</html>
