<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank You for Your Feedback</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        .confetti {
            position: absolute;
            width: 10px;
            height: 10px;
            background-color: #f00;
            opacity: 0.7;
        }
        @keyframes fall {
            to {
                transform: translateY(100vh);
            }
        }
    </style>
</head>
<body class="bg-gray-50 min-h-screen overflow-hidden">
    <div class="container mx-auto px-4 py-12">
        <div class="max-w-2xl mx-auto bg-white rounded-xl shadow-md overflow-hidden relative">
            <div class="bg-gradient-to-r from-purple-500 to-pink-600 p-6 text-white">
                <h1 class="text-2xl font-bold flex items-center">
                    <i class="fas fa-check-circle mr-3"></i>
                    Feedback Received!
                </h1>
            </div>

            <div class="p-8 text-center">
                <div class="w-32 h-32 bg-purple-100 rounded-full flex items-center justify-center mx-auto mb-6">
                    <i class="fas fa-heart text-purple-600 text-5xl"></i>
                </div>
                
                <h2 class="text-2xl font-bold text-gray-800 mb-2">Thank You!</h2>
                <p class="text-gray-600 mb-6">We truly appreciate you taking the time to share your thoughts with us.</p>
                
                <div class="mt-8 space-y-4">
                    <a href="home.php" class="inline-block w-full md:w-auto px-6 py-3 bg-gray-200 hover:bg-gray-300 text-gray-800 rounded-lg transition-colors">
                        <i class="fas fa-home mr-2"></i> Return to Home
                    </a>
                </div>
            </div>
        </div>
    </div>


</body>
</html>