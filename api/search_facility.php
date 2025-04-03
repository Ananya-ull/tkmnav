<?php
include('connection.php');

$searchQuery = isset($_GET['query']) ? trim($_GET['query']) : '';

$sql = "SELECT * FROM location";
if (!empty($searchQuery)) {
    $sql .= " WHERE location LIKE '%$searchQuery%' OR location_type LIKE '%$searchQuery%'";
}

$result = mysqli_query($con, $sql);

while ($row = mysqli_fetch_array($result)) {
    ?>
    <div class="facility-card status-active bg-white rounded-lg p-5 shadow-sm border border-gray-200">
        <div class="flex items-start">
            <div class="mr-4">
                <?php if ($row['status'] == 'open') { ?>
                    <div class="h-12 w-12 rounded-lg bg-green-50 flex items-center justify-center">
                        <i class="fas fa-building text-green-600 text-xl"></i>
                    </div>
                <?php } else { ?>
                    <div class="h-12 w-12 rounded-lg bg-red-50 flex items-center justify-center">
                        <i class="fas fa-building text-red-600 text-xl"></i>
                    </div>
                <?php } ?>
            </div>
            <div class="flex-1">
                <div class="flex flex-wrap justify-between gap-2">
                    <h4 class="font-semibold text-gray-800"><?php echo $row['location']; ?></h4>
                    <?php if ($row['status'] == 'open') { ?>
                        <span class="px-3 py-1 rounded-full text-sm font-medium bg-green-100 text-green-800">
                            <i class="fas fa-check-circle mr-1"></i> Active
                        </span>
                    <?php } else { ?>
                        <span class="px-3 py-1 rounded-full text-sm font-medium bg-red-100 text-red-800">
                            <i class="fas fa-lock mr-1"></i> Closed
                        </span>
                    <?php } ?>
                </div>
                <div class="mt-2 flex flex-wrap gap-x-4 gap-y-2 text-sm">
                    <div class="flex items-center text-gray-500">
                        <i class="fas fa-tag mr-2"></i>
                        <span><?php echo $row['location_type']; ?></span>
                    </div>
                </div>
                <div class="mt-3 p-3 bg-<?php echo ($row['status'] == 'open') ? 'green' : 'red'; ?>-50 rounded-lg text-sm text-gray-700">
                    <i class="fas fa-info-circle text-<?php echo ($row['status'] == 'open') ? 'green' : 'red'; ?>-500 mr-2"></i>
                    <?php echo $row['status_remark']; ?>
                </div>
            </div>
        </div>
    </div>
    <?php
}
?>
