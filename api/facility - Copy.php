<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Facility Status</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap');
        body { font-family: 'Inter', sans-serif; }
        .facility-card {
            transition: all 0.2s ease;
            border-left: 4px solid;
        }
        .facility-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        }
        .status-active { border-color: #10b981; }
        .status-maintenance { border-color: #f59e0b; }
        .status-closed { border-color: #ef4444; }
    </style>
</head>
<body class="bg-gray-50 min-h-screen p-4">
    <div class="max-w-4xl mx-auto">
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-6 gap-4">
            <div>
                <h1 class="text-2xl font-bold text-gray-800">Facility Status</h1>
                <p class="text-gray-500">Current availability of all locations</p>
            </div>
            <div class="relative w-full sm:w-64">
                <input type="text" placeholder="Search facilities..." 
                    class="w-full pl-10 pr-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                <i class="fas fa-search absolute left-3 top-3 text-gray-400"></i>
            </div>
        </div>
        
        <div class="space-y-4">
            <!-- Facility 1 -->
            <?php
			include('connection.php');
			$sel=mysqli_query($con,"select * from location");
			while($row=mysqli_fetch_array($sel))
			{
				
			?>
			
			<div class="facility-card status-active bg-white rounded-lg p-5 shadow-sm border border-gray-200">
                <div class="flex items-start">
                    <div class="mr-4">
                        <?php
						if($row['status']=='open')
						{
						?>
						<div class="h-12 w-12 rounded-lg bg-green-50 flex items-center justify-center">
                            <i class="fas fa-building text-green-600 text-xl"></i>
                        </div>
						<?php
						}elseif($row['status']=='closed')
						{
						?>
						<div class="h-12 w-12 rounded-lg bg-red-50 flex items-center justify-center">
                            <i class="fas fa-building text-red-600 text-xl"></i>
                        </div>
						<?php
						}
						?>
                    </div>
                    <div class="flex-1">
                        <div class="flex flex-wrap justify-between gap-2">
                            <h4 class=" font-semibold text-gray-800"><?php echo $row['location']; ?></h4>
                            <?php
							if($row['status']=='open')
							{
							?>
							<span class="px-3 py-1 rounded-full text-sm font-medium bg-green-100 text-green-800">
                                <i class="fas fa-check-circle mr-1"></i> Active
                            </span>
							<?php
							}elseif($row['status']=='closed')
							{
							?>
							<span class="px-3 py-1 rounded-full text-sm font-medium bg-red-100 text-red-800">
                                <i class="fas fa-lock mr-1"></i> Closed
                            </span>
							<?php
							}
							?>
                        </div>
                        <div class="mt-2 flex flex-wrap gap-x-4 gap-y-2 text-sm">
                            <div class="flex items-center text-gray-500">
                                <i class="fas fa-tag mr-2"></i>
                                <span><?php echo $row['location_type']; ?></span>
                            </div>
                        </div>
						<?php
							if($row['status']=='open')
							{
							?>
							<div class="mt-3 p-3 bg-green-50 rounded-lg text-sm text-gray-700">
								<i class="fas fa-info-circle text-green-500 mr-2"></i>
								<?php echo $row['status_remark']; ?>
							</div>
							<?php
							}elseif($row['status']=='closed')
							{
							?>
							<div class="mt-3 p-3 bg-red-50 rounded-lg text-sm text-gray-700">
								<i class="fas fa-info-circle text-red-500 mr-2"></i>
								<?php echo $row['status_remark']; ?>
							</div>
							<?php
							}
							?>
                        
                    </div>
                </div>
            </div>
			<?php
			}
			?>

        </div>
    </div>
</body>
</html>