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
                <h1 class="text-2xl font-bold text-gray-800">Add Your Events</h1>
                <p class="text-gray-500">Provide details to create a new event</p>
            </div>
        </div>
        
        <!-- Event Form -->
        <div class="bg-white rounded-lg shadow-md p-6">
            <h2 class="text-xl font-semibold text-gray-800 mb-4"> </h2>
			<?php
			
			?>
            <form id="eventForm" class="space-y-6" enctype="multipart/form-data">
                <!-- Hidden ID field for updates -->
                <input type="hidden" id="eventId" name="id">
                
                <!-- Location dropdown -->
                <div class="form-group">
                    <label for="locId" class="block text-sm font-medium text-gray-700 mb-1">Location</label>
                    <?php
					include('connection.php');
			
					$sel=mysqli_query($con,"select * from location");
					
					?>
					<select id="locId" name="loc_id" required class="w-full rounded-lg border border-gray-300 px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                        <option> -- choose --</option>
						<?php 
						while ($row=mysqli_fetch_array($sel)) {
							echo "<option value='" . htmlspecialchars($row['id']) . "'>" . htmlspecialchars($row['location']) . "</option>";
						}
						?>
                    </select>
                </div>
                
                <!-- Event Name -->
                <div class="form-group">
                    <label for="eventName" class="block text-sm font-medium text-gray-700 mb-1">Event Name</label>
                    <input type="text" id="eventName" name="event_name" required class="w-full rounded-lg border border-gray-300 px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="Enter event name">
                </div>
                
                <!-- Event Date -->
                <div class="form-group">
                    <label for="eventDate" class="block text-sm font-medium text-gray-700 mb-1">Event Date & Time</label>
                    <input type="datetime-local" id="eventDate" name="event_date" required class="w-full rounded-lg border border-gray-300 px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                </div>
                
                <!-- Description -->
                <div class="form-group">
                    <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                    <textarea id="description" name="description" rows="4" class="w-full rounded-lg border border-gray-300 px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="Describe your event"></textarea>
                </div>
                
                <!-- Image Upload -->
                <div class="form-group">
                    <label for="image" class="block text-sm font-medium text-gray-700 mb-1">Event Image</label>
                    <div class="flex items-center">
                        <label class="w-full flex flex-col items-center px-4 py-6 bg-white rounded-lg border border-dashed border-gray-300 cursor-pointer hover:bg-gray-50">
                            <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                <i class="fas fa-cloud-upload-alt text-2xl text-gray-400 mb-2"></i>
                                <p class="mb-2 text-sm text-gray-500"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                                <p class="text-xs text-gray-500">PNG, JPG or GIF (MAX. 2MB)</p>
                            </div>
                            <input id="image" name="image" type="file" accept="image/*" class="hidden">
                        </label>
                    </div>
                    <!-- Image preview -->
                    <div id="imagePreview" class="mt-2 hidden">
                        <img src="" alt="Image preview" class="max-h-40 rounded-lg">
                        <button type="button" id="removeImage" class="mt-1 text-sm text-red-600 hover:text-red-800">Remove</button>
                    </div>
                </div>
                
                <!-- Hidden User ID (would be populated from session) -->
                <input type="hidden" id="userId" name="user_id" value="<?php echo $_REQUEST['uid']?>">
                
                <!-- Event Type -->
                <div class="form-group">
                    <label for="eventType" class="block text-sm font-medium text-gray-700 mb-1">Event Type</label>
                    <select id="eventType" name="type" required class="w-full rounded-lg border border-gray-300 px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                        <option value="">Select type</option>
                        <option value="conference">Conference</option>
                        <option value="meeting">Meeting</option>
                        <option value="workshop">Workshop</option>
                        <option value="social">Social Event</option>
                        <option value="other">Other</option>
                    </select>
                </div>
                
                <!-- Status -->
                <div class="form-group">
                    <label for="status" class="block text-sm font-medium text-gray-700 mb-1">Status</label>
                    <select id="status" name="status" required class="w-full rounded-lg border border-gray-300 px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                        <option value="draft">Draft</option>
                        <option value="published">Published</option>
                        <option value="cancelled">Cancelled</option>
                    </select>
                </div>
                
                <!-- Form Actions -->
                <div class="flex justify-end space-x-3 pt-4">
                    <button type="button" id="clearForm" class="px-4 py-2 border border-gray-300 rounded-lg text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        Clear Form
                    </button>
                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        Create Event
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Add JavaScript for form handling
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('eventForm');
            const imageInput = document.getElementById('image');
            const imagePreview = document.getElementById('imagePreview');
            const previewImg = imagePreview.querySelector('img');
            const removeButton = document.getElementById('removeImage');
            const clearFormBtn = document.getElementById('clearForm');
            
            // Handle image preview
            imageInput.addEventListener('change', function() {
                const file = this.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        previewImg.src = e.target.result;
                        imagePreview.classList.remove('hidden');
                    };
                    reader.readAsDataURL(file);
                }
            });
            
            // Remove image preview
            removeButton.addEventListener('click', function() {
                imageInput.value = '';
                previewImg.src = '';
                imagePreview.classList.add('hidden');
            });
            
            // Clear form
            clearFormBtn.addEventListener('click', function() {
                form.reset();
                previewImg.src = '';
                imagePreview.classList.add('hidden');
            });
            
            // Form submission
            form.addEventListener('submit', function(e) {
                e.preventDefault();
                
                // Here you would typically send the form data to your server
                // For demonstration, just show an alert
                alert('Event submitted! In a real application, this would save to your database.');
                
                // Get form data for demonstration
                const formData = new FormData(this);
                console.log('Form submitted with data:', Object.fromEntries(formData));
                
                // Optionally reset the form after submission
                // form.reset();
                // imagePreview.classList.add('hidden');
            });
        });
    </script>
</body>
</html>

