<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/network-status.css">
    <title>Error | Something Went Wrong</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            overflow: hidden;
        }

        .error-container {
            text-align: center;
            width: 90%;
            max-width: 500px;
            background: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            animation: fadeIn 1s ease-in-out;
            box-sizing: border-box;
        }

        .error-container h1 {
            font-size: 2.5rem;
            color: #e74c3c;
            margin-bottom: 20px;
            animation: slideDown 1s ease-in-out;
        }

        .error-container p {
            font-size: 1rem;
            line-height: 1.5;
            margin-bottom: 20px;
            animation: fadeIn 1.5s ease-in-out;
        }

        .animated-character {
            margin: 20px auto;
            width: 100px;
            height: 100px;
            position: relative;
            animation: move 4s infinite ease-in-out;
        }

        /* Character body */
        .character-body {
            fill: #3498db;
            animation: bounce 1.5s infinite ease-in-out;
        }

        .character-arm {
            fill: #3498db;
            animation: wave 1.5s infinite ease-in-out;
            transform-origin: 80% 20%;
        }

        .button-group {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 10px;
            margin-top: 20px;
            padding: 0;
        }

        .button-group a, .button-group button {
            display: inline-block;
            margin: 5px;
            padding: 10px 20px;
            font-size: 1rem;
            color: #fff;
            text-decoration: none;
            border-radius: 4px;
            border: none;
            cursor: pointer;
            transition: all 0.3s ease-in-out;
            width: 150px;
        }

        /* Button Colors */
        .button-back {
            background-color: #27ae60;
        }

        .button-back:hover {
            background-color: #2ecc71;
            transform: translateY(-3px);
        }

        .button-home {
            background-color: #2980b9;
        }

        .button-home:hover {
            background-color: #3498db;
            transform: translateY(-3px);
        }

        .button-support {
            background-color: #e74c3c;
        }

        .button-support:hover {
            background-color: #c0392b;
            transform: translateY(-3px);
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }

        @keyframes slideDown {
            from {
                transform: translateY(-20px);
                opacity: 0;
            }
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        @keyframes bounce {
            0%, 100% {
                transform: translateY(0);
            }
            50% {
                transform: translateY(-20px);
            }
        }

        @keyframes wave {
            0%, 100% {
                transform: rotate(0deg);
            }
            50% {
                transform: rotate(15deg);
            }
        }

        @keyframes move {
            0% {
                transform: translateY(0);
            }
            25% {
                transform: translateY(-10px);
            }
            50% {
                transform: translateY(0);
            }
            75% {
                transform: translateY(10px);
            }
            100% {
                transform: translateY(0);
            }
        }

        @media (max-width: 768px) {
            .error-container h1 {
                font-size: 2rem;
            }

            .error-container p {
                font-size: 0.9rem;
            }

            .animated-character {
                width: 80px;
                height: 80px;
            }

            .button-group a, .button-group button {
                font-size: 0.9rem;
                padding: 8px 16px;
                width: 130px;
            }
        }

        @media (max-width: 480px) {
            .error-container h1 {
                font-size: 1.8rem;
            }

            .error-container p {
                font-size: 0.85rem;
            }

            .animated-character {
                width: 70px;
                height: 70px;
            }

            .button-group a, .button-group button {
                font-size: 0.85rem;
                padding: 6px 12px;
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <div class="error-container">
        <h1>Oops!</h1>
        <?php
        // Get the error code from the URL
        $errorCode = htmlspecialchars($_GET['code'] ?? 'unknown');

        // Define error message based on error code
        switch ($errorCode) {
            case '429':
                $errorMessage = "Error Code: 429 - You have made too many requests in a short period of time. Please try again later.";
                break;
            case '404':
                $errorMessage = "Error Code: 404 - The page you are looking for could not be found.";
                break;
            case '500':
                $errorMessage = "Error Code: 500 - There was a problem on our server. Please try again later.";
                break;
            case '403':
                $errorMessage = "Error Code: 403 - You do not have permission to access this page.";
                break;
            case '400':
                $errorMessage = "Error Code: 400 - Bad request. Please check your input and try again.";
                break;
            default:
                $errorMessage = "Error Code: $errorCode - An unexpected error occurred.";
                break;
        }
        ?>
        <p><?php echo $errorMessage; ?></p>
        <div class="animated-character">
            <svg viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
                <!-- Character body -->
                <circle cx="50" cy="60" r="20" class="character-body" />
                <!-- Arms -->
                <line x1="30" y1="60" x2="15" y2="50" stroke="#3498db" stroke-width="4" class="character-arm" />
                <line x1="70" y1="60" x2="85" y2="50" stroke="#3498db" stroke-width="4" class="character-arm" />
            </svg>
        </div>
        <div class="button-group">
            <button class="button-back" onclick="goBack()">Reload</button>
            <a href="/" class="button-home">Go to Homepage</a>
            <a href="mailto:emmanuelkirui042@gmail.com" class="button-support">Contact Support</a>
        </div>
    </div>

    <script>
        function goBack() {
            window.history.back();
        }
    </script>
    <script src="network-status.js"></script>
</body>
</html>
