<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Events List</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap');
        body { font-family: 'Inter', sans-serif; }
        .event-item {
            transition: all 0.2s ease;
        }
        .event-item:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        }
		.event-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
}
    </style>
</head>
<body class="bg-gray-50 min-h-screen p-4">
    <div class="max-w-2xl mx-auto space-y-3">
        <div class="event-header">
			<h2>Upcoming Events</h2>
			<!-- <a href="events.php" style="font-size:12px;">View All >>></a> -->
		</div>
		<?php
		include('connection.php');
		$sel=mysqli_query($con,"select * from event where status='active' ORDER BY event_date ASC limit 2");
		while($row=mysqli_fetch_array($sel))
		{
			$sel1=mysqli_query($con,"select * from location where id ='$row[loc_id]'");
			$row1=mysqli_fetch_array($sel1);
			
			$event_date = date("m/d/Y", strtotime($row["event_date"]));
		?>
		<!-- Event Item 1 -->
        <div class="event-item bg-white rounded-lg overflow-hidden border border-gray-200 flex">
            <!-- Content -->
            <div class="p-4 flex-1">
                <div class="flex items-center text-sm text-gray-500 mb-1">
                    <i class="fas fa-map-marker-alt mr-1"></i>
                    <span><?php echo $row1['location']?></span>
                </div>
                <h3 class="text-lg font-semibold text-gray-800 mb-1"><?php echo $row['event_name']?></h3>
                <div class="flex items-center text-xs text-gray-500 mb-2">
                    <i class="far fa-calendar-alt mr-1"></i>
                    <span><?php echo $event_date; ?></span>
                </div>
                <p class="text-gray-600 text-sm">
                   <?php echo $row['description']; ?>
                </p>
            </div>
            
            <!-- Image -->
            <div class="w-24 flex-shrink-0">
                <img src="../event/uploads/<?php echo $row["image"]; ?>" 
                     alt="Tech Conference" class="w-full h-full object-cover">
            </div>
        </div>
		
		<?php
		}
		?>


    </div>
</body>
</html>