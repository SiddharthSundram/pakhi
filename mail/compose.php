<?php include_once "../config/config.php"; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Inbox | <?= PROJECT_NAME; ?></title>
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
                <div class="container mx-auto mt-10 p-4 bg-white shadow-lg rounded-lg">
                    <h1 class="text-2xl font-semibold mb-4">Compose Mail</h1>

                    <form action="" enctype="multipart/form-data" method="post" enctype="multipart/form-data" >
                        <div class="mb-4">
                            <label for="user_to" class="block text-gray-600">To:</label>
                            <input type="email" id="user_to" name="user_to" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:border-blue-400" placeholder="Recipient's email">
                        </div>
                        <div class="mb-4">
                            <label for="subject" class="block text-gray-600">Subject:</label>
                            <input type="text" id="subject" name="subject" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:border-blue-400" placeholder="Subject">
                        </div>
                        <div class="mb-4">
                            <label for="content" class="block text-gray-600">Message:</label>
                            <textarea id="content" name="content" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:border-blue-400" rows="4" placeholder="Your message"></textarea>
                        </div>
                        <div class="mb-4">
                            <label for="attachment" class="block text-gray-600">Attachment:</label>
                            <input type="file" id="attachment" name="attachment" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:border-blue-400">
                        </div>
                        <div class="flex justify-end">
                            <input type="submit" name="compose" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600" value="Send mail" >
                            <input type="submit" name="save" class="bg-slate-600 text-white px-4 py-2 rounded-lg hover:bg-slate-900" value="Save to Draft" >
                        </div>
                    </form>
                    <?php
                    if(isset($_POST['compose']) || isset($_POST['save'])){
                        $user_to = $_POST['user_to'];
                        $subject = $_POST['subject'];
                        $content = $_POST['content'];
                        $user_by = $getUserData['user_id'];

                        

                        $checkUser = mysqli_query($connect,"SELECT * from accounts where email='$user_to' and user_id != '$user_by' " );
                        $count_checkUser = mysqli_num_rows($checkUser);
                        $getToUser = mysqli_fetch_array($checkUser);

                        $getToUserId = $getToUser['user_id'];

                        if($count_checkUser < 1 ){
                            alert("to email is not found");
                        }else{
                            $isDraft = 0;
                            if(isset($_POST['save'])){
                                $isDraft = 1;
                            }
                            $composeMail = mysqli_query($connect , "INSERT into mails(user_to , user_by,subject,content,isDraft) values ('$getToUserId','$user_by','$subject','$content','$isDraft') ");

                            if($composeMail){
                                // file work
                                if(count($_FILES) > 0) :
                                    $attachment = $_FILES['attachment']['name'];
                                    $tmp_attachment = $_FILES['attachment']['tmp_name'];

                                    move_uploaded_file($tmp_attachment,"attach/$attachment");
                                    $currentMailId = mysqli_insert_id($connect);

                                    $queryForInsertAttachment = mysqli_query($connect,"INSERT into attachments (attachment,mail_id) values('$attachment','$currentMailId') ");
                                endif;
                                alert('mail send');
                                redirect('inbox.php');
                            }
                            else{
                                alert('not send mail');
                                redirect('inbox.php');
                            }

                        }
                    }


                    ?>
                </div>
            </div>


</body>

</html>