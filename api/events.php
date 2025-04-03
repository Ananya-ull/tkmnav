<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Events Listing</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap');
        body { font-family: 'Inter', sans-serif; }
				.event-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
}
    </style>
</head>
<body class="bg-gray-50 min-h-screen p-4 safe-area-padding">
    <div id="events-container" class="max-w-md mx-auto space-y-4">
        <div class="event-header">
			<h2>Upcoming Events</h2>
			<a href="add_event.php?uid=<?php echo $_REQUEST['uid']?>" style="font-size:12px;" class="bg-red-500 text-white px-3 py-1 text-sm rounded hover:bg-red-600 transition">Add Event</a> 
		</div>
		<!-- Events will be loaded from PHP -->
        <?php
        include('connection.php');

        // Query to select events
        $sql = "SELECT id, loc_id, event_name, event_date, description, image, user_id, type, status 
                FROM event 
                WHERE status = 'active' 
                ORDER BY event_date ASC";
        $result = mysqli_query($con, $sql);

        if (mysqli_num_rows($result) > 0) {
            // Output data of each row
            while($event = mysqli_fetch_assoc($result)) {
                $event_date = date("m/d/Y", strtotime($event["event_date"]));
				
				$sel=mysqli_query($con,"select * from location where id ='$event[loc_id]'");
				$rows=mysqli_fetch_array($sel);
                
                // Determine badge color based on event type
                $badge_class = '';
                switch($event["type"]) {
                    case 'Conference':
                        $badge_class = 'bg-blue-100 text-blue-800';
                        break;
                    case 'Workshop':
                        $badge_class = 'bg-purple-100 text-purple-800';
                        break;
                    default:
                        $badge_class = 'bg-green-100 text-green-800';
                }
                
                echo "
                <div class='bg-white rounded-xl shadow-sm overflow-hidden border border-gray-200'>
                    <div class='aspect-w-16 aspect-h-9'>
                        <img src='../event/uploads/" . htmlspecialchars($event["image"]) . "' alt='" . htmlspecialchars($event["event_name"]) . "' 
                             class='w-full h-48 object-cover'>
                    </div>
                    
                    <div class='p-4'>
                        <div class='flex justify-between items-start mb-2'>
                            <h3 class='text-lg font-semibold text-gray-800'>" . htmlspecialchars($event["event_name"]) . "</h3>
                            <span class='px-2 py-1 text-xs rounded-full {$badge_class}'>
                                " . htmlspecialchars($event["type"]) . "
                            </span>
                        </div>
                        
                        <div class='flex items-center text-sm text-gray-500 mb-3'>
                            <i class='far fa-calendar-alt mr-1.5'></i>
                            <span class='mr-4'>{$event_date}</span>
                            <i class='fas fa-map-marker-alt mr-1.5'></i>
                            <span>" . htmlspecialchars($rows["location"]) . "</span>
                        </div>
                        
                        <p class='text-gray-600 text-sm mb-4'>" . htmlspecialchars($event["description"]) . "</p>
                        
                    </div>
                </div>
                ";
            }
        } else {
            echo "
                <div class='p-6 text-center bg-white rounded-xl shadow-sm border border-gray-200'>
                    <i class='fas fa-calendar-times text-4xl text-gray-300 mb-3'></i>
                    <h3 class='text-lg font-medium text-gray-700'>No Upcoming Events</h3>
                    <p class='text-gray-500 mt-1'>New events will be posted soon.</p>
                </div>
            ";
        }
        mysqli_close($con);
        ?>
    </div>
</body>
</html>