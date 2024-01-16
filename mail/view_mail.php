<?php
include_once "../config/config.php";

if (!isset($_SESSION['account'])) {
    redirect('./login.php');
}
?>

<?php
if (isset($_GET['mail_id'])) {
    $mail = $_GET['mail_id'];
    $callingInbox = mysqli_query($connect, ("SELECT * from mails JOIN accounts ON mails.user_by =accounts.user_id  where mail_id='$mail' "));
    $row = mysqli_fetch_array($callingInbox);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> View mail |<?= PROJECT_NAME; ?></title>
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
                <div class="bg-white p-4 shadow-md">
                    <div class="container mx-auto">
                        <div class="flex justify-between items-center">
                            <div class="flex items-center gap-3">
                                
                                <h1 class="text-xl font-semibold">View <?= $row['fname']; ?>'s Mail</h1>
                            </div>
                            <div class="flex items-center space-x-4">
                                <a href="inbox.php" class="flex items-center gap-1 text-lg text-black-800 font-semibold">
                                    <img width="30" height="30" src="https://img.icons8.com/glyph-neue/64/circled-left.png" alt="circled-left" /> Go Back
                                </a>
                            </div>
                        </div>
                    </div>
                </div>


               

                    <div class=" mx-full auto mt-10 p-4 bg-white shadow-lg rounded-lg">
                        <div class="border-b border-gray-300 py-2">
                            <p class="text-gray-600">To: You < <?= $getUserData['email']; ?>> </p>

                            <p class="text-gray-600">From: <?= $row['fname'] . " " . $row['lname']; ?> < <?= $row['email']; ?>> </p>

                            <p class="text-gray-600">Subject: <?= $row['subject']; ?></p>
                            <p class="text-gray-600">Date: October 8, 2023</p>
                        </div>

                        <div class="mt-4">
                            <p class="text-lg font-semibold"><?= $row['subject']; ?></p>

                            <p class="text-gray-600">From: <?= $row['fname'] . " " . $row['lname']; ?> < <?= $row['email']; ?>>  </p>
                            <p class="mt-2"><?= $row['content']; ?></p>
                        </div>


                        <?php
                            $callingAttachment = mysqli_query($connect,"SELECT * from attachments where mail_id ='" . $row['mail_id'] ."' ");
                            $count_attachment = mysqli_num_rows($callingAttachment);
                            if($count_attachment > 0):
                        ?>
                        <div class="mt-4">
                            <!-- <a href="#" class="text-blue-500 hover:underline">View Attachments</a> -->
                           

                            <p class="text-gray-700 font-semibold"><a href="">Attachments:</a></p>

                            <ul class="list-disc ml-4">

                                <?php
                                    while($attach = mysqli_fetch_array(($callingAttachment))):
                            ?>
                                        <li><a href="attach/<?= $attach['attachment'];  ?>" target="_blank"><?= $attach['attachment'] ; ?></a></li>
                                <?php endwhile; endif; ?>
                            </ul>
                        </div>
                    </div>
                <?php } ?>

            </div>
        </div>
    </div>


</body>

</html>