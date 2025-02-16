<?php
include "config.php";

$query = "SELECT * FROM exercises";
$result = $db_conn->query($query);

if (!$result) {
    die("Error fetching data: " . $db_conn->error);
}

$exercises = [];
while ($row = $result->fetch_assoc()) {
    $exercises[] = $row;
}

$db_conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<link rel="icon" type="image/png" href="image/logo6.png">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercise Management - Fetch Exercises</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        h2 {
            text-align: center;
            color: #333;
        }

        .exercise-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: flex-start; /* Align container to the left */
            margin-top: 20px;
        }

        .exercise-card {
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 16px;
            margin: 16px;
            text-align: justify;
            width: 300px;
        }

        .exercise-card:nth-child(even) {
            margin-right: 0;
        }

        .exercise-image {
            max-width: 100%;
            max-height: 200px;
            margin-bottom: 16px;
            float: left; /* Align image to the left */
            margin-right: 16px; /* Add space between image and text */
        }

        .exercise-description {
            text-align: justify; 
            
        }

        .timer {
            font-size: 20px;
            margin-top: 8px;
            color: #4caf50;
        }

        .start-stop-buttons {
            margin-top: 10px;
        }

        .start-stop-buttons button {
            padding: 8px;
            margin: 4px;
            cursor: pointer;
        }

        .start-stop-buttons {
            margin-top: 10px;
            text-align: center;
        }

        .start-stop-buttons button {
            padding: 12px 20px;
            margin: 4px;
            cursor: pointer;
            border: none;
            border-radius: 6px;
            font-size: 16px;
            transition: background-color 0.3s, color 0.3s;
        }

        .start-stop-buttons button.start-timer {
            background-color: #2ecc71;
            color: #fff;
        }

        .start-stop-buttons button.start-timer:hover {
            background-color: #27ae60;
        }

        .start-stop-buttons button.stop-timer {
            background-color: #e74c3c;
            color: #fff;
        }

        .start-stop-buttons button.stop-timer:hover {
            background-color: #c0392b;
        }
    </style>
</head>
<body>

<h2>Exercise Management - Fetch Exercises</h2>

<?php if (isset($exercises) && !empty($exercises)) : ?>
    <div class="exercise-container">
        <?php foreach ($exercises as $index => $exercise) : ?>
            <div class="exercise-card">
                <?php if ($index % 2 == 0) : ?>
                    <!-- Display image on the left for even-indexed cards -->
                    <img class="exercise-image" src="<?php echo $exercise['imagePath']; ?>" alt="Exercise Image">
                <?php endif; ?>
                <h3><?php echo $exercise['exerciseName']; ?></h3>
                <p class="exercise-description"><?php echo $exercise['exerciseDescription']; ?></p>
                <div class="timer" data-duration="30">0:30</div>
                <div class="start-stop-buttons">
                    <button class="start-timer" onclick="startTimer(this)">Start</button>
                    <button class="stop-timer" onclick="stopTimer(this)">Stop</button>
                </div>
                <?php if ($index % 2 !== 0) : ?>
                    <!-- Display image on the left for odd-indexed cards -->
                    <img class="exercise-image" src="<?php echo $exercise['imagePath']; ?>" alt="Exercise Image">
                <?php endif; ?>
            </div>
        <?php endforeach; ?>
    </div>

    <script>
        // JavaScript code for countdown timer
        var timers = document.querySelectorAll('.timer');

        function startTimer(button) {
            var timer = button.parentElement.previousElementSibling;
            var duration = parseInt(timer.getAttribute('data-duration'));
            var timerValue = duration;
            var intervalId = setInterval(updateTimer, 1000);

            // Store intervalId as a data attribute of the timer
            timer.setAttribute('data-intervalid', intervalId);

            function updateTimer() {
                var minutes = Math.floor(timerValue / 60);
                var seconds = timerValue % 60;
                timer.textContent = minutes + ':' + (seconds < 10 ? '0' : '') + seconds;

                if (timerValue > 0) {
                    timerValue--;
                } else {
                    clearInterval(intervalId);
                }
            }
        }

        function stopTimer(button) {
            var timer = button.parentElement.previousElementSibling;
            var intervalId = parseInt(timer.getAttribute('data-intervalid'));

            if (intervalId) {
                clearInterval(intervalId);
            }

            timer.textContent = "Stopped";
        }
    </script>

<?php else : ?>
    <p>No exercises found.</p>
<?php endif; ?>

</body>
</html>
