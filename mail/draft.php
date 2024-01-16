<?php
include_once "../config/config.php";

if(!isset($_SESSION['account'])){
    redirect('./login.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Draft |<?= PROJECT_NAME; ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-slate-300">
    <?php include_once "mail_header.php"; ?>

    <div class="container mt-3 ">
        <div class="flex">
            <div class="w-3/12 p-5 text-center">
                <?php include_once "side.php" ?>
            </div>
            <div class="w-9/12">
                <div class="bg-white  p-4 shadow-md ">
                    <div class="container mx-auto">
                        <div class="flex justify-between items-center">
                            <div class="flex items-center gap-3">
                                <h1 class="text-2xl font-bold">Draft (saved mails)</h1>
                            </div>
                            <div class="flex items-center space-x-4"></div>
                        </div>
                    </div>
                </div>
                <div class="flex h-screen">
                    <!-- Main Content -->
                    <main class="flex-1 p-4">
                        <!-- Search Bar -->
                        <div class="bg-white p-4 shadow-md rounded-lg">
                            <input type="text" class="w-full border border-gray-300 p-2 rounded-lg" placeholder="Search mail...">
                        </div>

                        <!-- Email List -->
                        <div class="mt-4">
                            <!-- Sample email item (loop through your emails) -->
                            <?php
                                $myUserId = $getUserData['user_id'];
                                $callingInbox = mysqli_query($connect,("SELECT * from mails JOIN accounts ON mails.user_to =accounts.user_id  where user_by = '$myUserId' and isDraft = '1' "));
                                while($row = mysqli_fetch_array($callingInbox)):
                            ?>
                            <div class="bg-white border border-gray-200 p-4 rounded-lg shadow-md mb-4">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center">
                                        <input type="checkbox" class="form-checkbox h-5 w-5 text-blue-600">
                                        <span class="text-lg ml-2 font-semibold"><?= $row['fname'] . " " . $row['lname'];  ?></span>
                                    </div>
                                    <span class="text-sm text-gray-600">Date</span>
                                </div>
                                <div class="mt-2">
                                    <p class="text-gray-800"><?= $row['subject']; ?></p>
                                    <p class="text-gray-600 mt-2"><?= substr($row['content'], 0 ,100); ?>... </p>
                                </div>
                            </div>

                            <?php endwhile; ?>
                            <!-- Add more email items here -->
                        </div>
                    </main>
                </div>


            </div>
        </div>
    </div>


</body>

</html>