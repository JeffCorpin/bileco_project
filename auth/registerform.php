<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        // Function to show the toast message
        function showToast(type, message) {
            const toast = document.createElement('div');
            toast.classList.add('toast', 'fixed', 'top-5', 'left-1/2', 'transform', '-translate-x-1/2', 'px-6', 'py-3', 'rounded-lg', 'shadow-lg', 'text-white', 'font-medium');
            
            // Add classes for success or error toast
            if (type === 'success') {
                toast.classList.add('bg-green-500');
            } else {
                toast.classList.add('bg-red-500');
            }

            // Set the message
            toast.innerHTML = message;

            // Append the toast to the body
            document.body.appendChild(toast);

            // Remove the toast after 3 seconds
            setTimeout(() => {
                toast.classList.add('opacity-0');
                setTimeout(() => {
                    toast.remove();
                }, 500); // Wait for the fade-out animation
            }, 3000);
        }

        // Function to redirect after a short delay
        function redirectToVerify() {
            setTimeout(function() {
                window.location.href = 'verify.php';  // Redirect to verify.php after 3 seconds
            }, 3000); // 3 seconds delay
        }

        // Check if there is a message to show
        window.onload = function() {
            <?php
            if (isset($_SESSION['register_success'])) {
                echo "showToast('success', '" . $_SESSION['register_success'] . "');";
                unset($_SESSION['register_success']);
                echo "redirectToVerify();";  // Redirect to verify.php after showing success toast
            }

            if (isset($_SESSION['register_error'])) {
                echo "showToast('error', '" . $_SESSION['register_error'] . "');";
                unset($_SESSION['register_error']);
            }
            ?>
        };
    </script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen bg-gradient-to-br from-yellow-400 via-blue-300 to-blue-800">

    <section class="w-full max-w-3xl p-8 bg-white rounded-lg shadow-md">
        <h2 class="text-4xl font-bold text-center text-gray-700">REGISTER ACCOUNT</h2>

        <form action="register.php" method="POST" class="mt-6">
            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                
                <div>
                    <label class="text-gray-700" for="accountnum">Account Number</label>
                    <input id="accountnum" name="accountnum" type="text" required class="w-full px-4 py-2 mt-1 text-gray-700 border rounded-lg focus:border-blue-500 focus:ring focus:ring-blue-300 focus:outline-none">
                </div>

                <div>
                    <label class="text-gray-700" for="firstname">First Name</label>
                    <input id="firstname" name="firstname" type="text" required class="w-full px-4 py-2 mt-1 text-gray-700 border rounded-lg focus:border-blue-500 focus:ring focus:ring-blue-300 focus:outline-none">
                </div>

                <div>
                    <label class="text-gray-700" for="middlename">Middle Name</label>
                    <input id="middlename" name="middlename" type="text" class="w-full px-4 py-2 mt-1 text-gray-700 border rounded-lg focus:border-blue-500 focus:ring focus:ring-blue-300 focus:outline-none">
                </div>

                <div>
                    <label class="text-gray-700" for="lastname">Last Name</label>
                    <input id="lastname" name="lastname" type="text" required class="w-full px-4 py-2 mt-1 text-gray-700 border rounded-lg focus:border-blue-500 focus:ring focus:ring-blue-300 focus:outline-none">
                </div>

                <!-- Suffix Dropdown -->
                <div>
                    <label class="text-gray-700" for="suffix">Suffix</label>
                    <select id="suffix" name="suffix" class="w-full px-4 py-2 mt-1 text-gray-700 border rounded-lg focus:border-blue-500 focus:ring focus:ring-blue-300 focus:outline-none">
                        <option value="">N/A</option>
                        <option value="Jr">Jr</option>
                        <option value="Sr">Sr</option>
                    </select>
                </div>

                <div>
                    <label class="text-gray-700" for="address">Address</label>
                    <input id="address" name="address" type="text" required class="w-full px-4 py-2 mt-1 text-gray-700 border rounded-lg focus:border-blue-500 focus:ring focus:ring-blue-300 focus:outline-none">
                </div>

                <div>
                    <label class="text-gray-700" for="email">Email Address</label>
                    <input id="email" name="email" type="email" required class="w-full px-4 py-2 mt-1 text-gray-700 border rounded-lg focus:border-blue-500 focus:ring focus:ring-blue-300 focus:outline-none">
                </div>

                <div>
                    <label class="text-gray-700" for="contactnumber">Contact Number</label>
                    <input id="contactnumber" name="contactnumber" type="tel" required class="w-full px-4 py-2 mt-1 text-gray-700 border rounded-lg focus:border-blue-500 focus:ring focus:ring-blue-300 focus:outline-none">
                </div>

                <div>
                    <label class="text-gray-700" for="password">Password</label>
                    <input id="password" name="password" type="password" required class="w-full px-4 py-2 mt-1 text-gray-700 border rounded-lg focus:border-blue-500 focus:ring focus:ring-blue-300 focus:outline-none">
                </div>

                <div>
                    <label class="text-gray-700" for="confirmpassword">Confirm Password</label>
                    <input id="confirmpassword" name="confirmpassword" type="password" required class="w-full px-4 py-2 mt-1 text-gray-700 border rounded-lg focus:border-blue-500 focus:ring focus:ring-blue-300 focus:outline-none">
                </div>

            </div>

            <!-- Centered Button and Login Link -->
            <div class="flex flex-col items-center mt-6">
                <button type="submit" name="register" class="w-full sm:w-auto px-6 py-2.5 text-white bg-blue-600 rounded-lg hover:bg-blue-500 focus:outline-none">
                    Register
                </button>
                
                <p class="mt-4 text-gray-600">Already have an account? 
                    <a href="login.php" class="text-blue-500 hover:underline">Login</a>
                </p>
            </div>
        </form>
    </section>

</body>
</html>
