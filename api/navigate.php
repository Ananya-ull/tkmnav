<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Route Planner</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap');
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="bg-gray-50 min-h-screen p-4 safe-area-padding">
    <div class="max-w-md mx-auto space-y-6">
        <!-- Route Form -->
        <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-200">
            <h2 class="text-xl font-semibold mb-4 text-gray-800">Plan Your Route</h2>
            <?php
			include('connection.php');
			
			$sel=mysqli_query($con,"select * from location where id='$_REQUEST[locId]'");
			$row=mysqli_fetch_array($sel);
			
			$sel1=mysqli_query($con,"select * from location where id!='$_REQUEST[locId]'");
			
			
			
			
			?>
			
			<form id="routeForm" class="space-y-4" method="post">
                <div>
                    <label for="startPoint" class="block text-sm font-medium text-gray-700 mb-1">Start Point</label>
                    <input type="text" id="startPoint" required value='<?php echo $row['location']; ?>'
                        class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                </div>
                <div>
                    <label for="endPoint" class="block text-sm font-medium text-gray-700 mb-1">End Point</label>
					<select id="endPoint" name="endPoint" required
							class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
							<option> -- choose --</option>
						<?php 
						while ($row1 = mysqli_fetch_array($sel1)) {
							echo "<option value='" . htmlspecialchars($row1['id']) . "'>" . htmlspecialchars($row1['location']) . "</option>";
						}
						?>
					</select>
                </div>
                <button type="submit" name="navigate"
                    class="w-full py-3 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg transition duration-200">
                    <i class="fas fa-route mr-2"></i>Navigate
                </button>
            </form>
        </div>
		
		<?php
		if(isset($_POST['navigate']))
		{
			
			
			$sel2=mysqli_query($con,"select * from location where id='$_POST[endPoint]'");
			$row2=mysqli_fetch_array($sel2);
			
			$startPoint=$_REQUEST['locId'];
			$endPointName=$_POST['endPoint'];
			
			$sel3=mysqli_query($con,"SELECT * FROM navigate WHERE start_location='$startPoint' AND end_location='$endPointName'");
			//echo "SELECT description FROM navigate WHERE start_point='$startPoint' AND end_point='$endPointName'";
			$row3=mysqli_fetch_array($sel3);
			
			$routeDescription=$row3['description'];
			$routeImage=$row3['map'];
			
			
		?>

        <!-- Route Card Display \ object-cover -->
        <div id="routeCard" class="bg-white rounded-xl shadow-sm overflow-hidden border border-gray-200">
			<div class="aspect-w-16 aspect-h-9">
				<img id="routeImage" src="../navigation/uploads/<?php echo $routeImage; ?>" alt="Route map" class="w-full h-48 ">
			</div>
			<div class="p-4">
				<div class="flex items-center justify-between mb-3">
					<h3 class="text-lg font-semibold text-gray-800">
						<i class='fas fa-map-marker-alt mr-1.5'></i>
						<span id="displayStart"><?php echo htmlspecialchars($row['location']); ?></span> 
						<i class="fas fa-arrow-right mx-2 text-gray-400"></i> 
						<span id="displayEnd"><?php echo htmlspecialchars($row2['location']); ?></span>
					</h3>
				</div>
				<p id="routeDescription" class="text-gray-600 text-sm">
					<?php echo $routeDescription; ?>
				</p>
			</div>
		</div>
		<?php
		}
		?>
    </div>


</body>
</html>
