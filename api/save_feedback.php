	<?php
include('connection.php'); // Database connection

if(isset($_POST['submit'])) {
    $user_id = 1; // Change this based on your session or user authentication
    $feedback = mysqli_real_escape_string($con, $_POST['feedback']);
    $rating = intval($_POST['rating']);
    $date = date("Y-m-d H:i:s");

    $query = "INSERT INTO feedback (user_id, date, feedback, rating) VALUES ('$user_id', '$date', '$feedback', '$rating')";
    
    if(mysqli_query($con, $query)) {
        echo "<script>alert('Feedback submitted successfully!'); window.location.href='feedback_res.php';</script>";
    } else {
        echo "<script>alert('Error submitting feedback. Please try again.');</script>";
    }
}
?>
