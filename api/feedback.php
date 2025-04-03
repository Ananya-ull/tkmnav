<?php

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback Form</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>
<body class="bg-gray-50 min-h-screen">
    <div class="container mx-auto px-4 py-12">
        <div class="max-w-2xl mx-auto bg-white rounded-xl shadow-md overflow-hidden">
            <div class="bg-gradient-to-r from-blue-500 to-indigo-600 p-6 text-white">
                <div class="flex items-center">
                    <i class="fas fa-comment-alt text-2xl mr-3"></i>
                    <h1 class="text-2xl font-bold">Share Your Feedback</h1>
                </div>
                <p class="mt-2 opacity-90">We value your opinion to help us improve</p>
            </div>

            <form class="p-6 space-y-6" method="post" action="save_feedback.php">
				<div>
					<label for="rating" class="block text-sm font-medium text-gray-700 mb-2">Rating</label>
					<div class="flex space-x-2">
						<button type="button" class="rating-btn w-10 h-10 rounded-full bg-gray-200 hover:bg-yellow-400 flex items-center justify-center transition-colors duration-200" data-value="1">
							<i class="far fa-frown text-gray-600"></i>
						</button>
						<button type="button" class="rating-btn w-10 h-10 rounded-full bg-gray-200 hover:bg-yellow-300 flex items-center justify-center transition-colors duration-200" data-value="2">
							<i class="far fa-meh text-gray-600"></i>
						</button>
						<button type="button" class="rating-btn w-10 h-10 rounded-full bg-gray-200 hover:bg-yellow-200 flex items-center justify-center transition-colors duration-200" data-value="3">
							<i class="far fa-smile text-gray-600"></i>
						</button>
						<button type="button" class="rating-btn w-10 h-10 rounded-full bg-gray-200 hover:bg-green-300 flex items-center justify-center transition-colors duration-200" data-value="4">
							<i class="far fa-laugh-squint text-gray-600"></i>
						</button>
						<button type="button" class="rating-btn w-10 h-10 rounded-full bg-gray-200 hover:bg-green-400 flex items-center justify-center transition-colors duration-200" data-value="5">
							<i class="far fa-grin-stars text-gray-600"></i>
						</button>
					</div>
					<input type="hidden" id="rating" name="rating" value="">
				</div>

				<div>
					<label for="message" class="block text-sm font-medium text-gray-700 mb-1">Your Feedback</label>
					<textarea style="padding:10px;"id="message" name="feedback" rows="4" class="w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" placeholder="Share your thoughts..."></textarea>
				</div>

				<div class="pt-4">
					<button type="submit" name="submit" class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-medium py-3 px-4 rounded-lg shadow-md transition duration-200 flex items-center justify-center">
						<i class="fas fa-paper-plane mr-2"></i> Submit Feedback
					</button>
				</div>
			</form>

        </div>
    </div>

	<script>
    document.querySelectorAll('.rating-btn').forEach(button => {
        button.addEventListener('click', function() {
            document.getElementById('rating').value = this.getAttribute('data-value');
            document.querySelectorAll('.rating-btn').forEach(btn => btn.classList.remove('bg-yellow-400', 'bg-green-300', 'bg-green-400'));
            this.classList.add('bg-yellow-400');
        });
    });
</script>

</body>
</html>