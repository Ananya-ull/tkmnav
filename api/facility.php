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
                <input type="text" id="searchInput" placeholder="Search facilities..." 
					class="w-full pl-10 pr-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
				<i class="fas fa-search absolute left-3 top-3 text-gray-400"></i>

            </div>
        </div>
        
        <div class="space-y-4">
            <!-- Facility 1 -->
            <div id="facilityContainer" class="space-y-4">
				<?php include('search_facility.php'); ?>
			</div>

        </div>
    </div>
</body>
</html>


<script>
document.getElementById('searchInput').addEventListener('keyup', function() {
    let searchValue = this.value.trim(); // Get input value
    
    let xhr = new XMLHttpRequest();
    xhr.open("GET", "search_facility.php?query=" + searchValue, true);
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            document.getElementById('facilityContainer').innerHTML = xhr.responseText; 
        }
    };
    xhr.send();
});
</script>