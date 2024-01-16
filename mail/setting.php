<?php
include_once "../config/config.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Settings |<?= PROJECT_NAME; ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-slate-300">
    <?php include_once "mail_header.php"; ?>

    <div class="container mx-auto mt-3 ">
        <!-- Header -->
        <header class="bg-white shadow-md p-4">
            <div class="container mx-auto">
                <h1 class="text-xl font-semibold">Settings</h1>
            </div>
        </header>

        <!-- Settings Form -->
        <div class="container mx-auto mt-4">
            <div class="bg-white p-4 rounded-lg shadow-md">
                <div class="flex flex-1 gap-3">
                    <div class="w-3/12">
                        <div class="bg-white ">
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="mb-2 p-5 flex justify-center items-end">
                                    <label for="profile_picture" class="block text-gray-600 font-medium bg-gray-300 rounded-full">
                                        <?php if ($getUserData['dp']) : ?>
                                            <img src="../images/?= $getUserData['dp']; ?>" alt="----   --img_sender" class="w-48 h-48 rounded-full ">
                                        <?php else : ?>
                                            <img src="../images/dp.png" alt="image" class="w-48 h-48 rounded-full ">
                                        <?php endif;  ?>
                                    </label>
                                    <input type="file" style="display: none;" id="profile_picture" name="profile_picture" onchange="this.form.submit()" accept="image/*" class="mt-1">
                                    
                                    
                                </div>
                                <div class="flex justify-center">
                                    <label>Tap image to change</label>

                                </div>
                            </form>
                            <?php
                            if (isset($_FILES['profile_picture'])) {
                                $dp = $_FILES['profile_picture']['name'];

                                $tmp_dp = $_FILES['profile_picture']['tmp_name'];
                                move_uploaded_file($tmp_dp, "../images/$dp");
                                $query = mysqli_query($connect, "UPDATE accounts SET dp='$dp' where user_id='" . $getUserData['user_id'] . "' ");
                                if ($query) {
                                    //problem here <<<<-----------------------------<<<<<<<<<<<<<<<<<<<<
                                    redirect('setting.php');
                                }
                            }


                            ?>
                        </div>
                    </div>
                    <div class="w-9/12">
                        <form action="update_settings.php" method="POST" enctype="multipart/form-data">
                            <!-- First Name -->
                            <div class="mb-4 flex flex-col">
                                <label for="fname" class="block text-gray-600 font-medium">First Name</label>
                                <input type="text" id="fname" name="fname" class="form-input  border rounded" value="" placeholder="Enter First Name">
                            </div>

                            <!-- Last Name -->
                            <div class="mb-4 flex flex-col">
                                <label for="lname" class="block text-gray-600 font-medium">Last Name</label>
                                <input type="text" id="lname" name="lname" class="form-input border rounded" value="" placeholder="Enter Last Name">
                            </div>

                            <!-- Email -->
                            <div class="mb-4 flex flex-col">
                                <label for="email" class="block text-gray-600 font-medium">Email</label>
                                <input type="email" id="email" name="email" class="form-input border rounded" value="<?php ?>" placeholder="name@pakhi.com">
                            </div>

                            <!-- Date of Birth (DOB) -->
                            <div class="mb-4 flex flex-col">
                                <label for="dob" class="block text-gray-600 font-medium">Date of Birth</label>
                                <input type="date" id="dob" name="dob" class="form-input border rounded" value="<?php ?>">
                            </div>

                            <!-- Gender -->
                            <div class="mb-4 flex flex-col">
                                <label for="gender" class="block text-gray-600 font-medium">Gender</label>
                                <select id="gender" name="gender" class="form-select border rounded">
                                    <option value="male" <?php ?>>Male</option>
                                    <option value="female" <?php  ?>>Female</option>
                                    <option value="other" <?php  ?>>Other</option>
                                </select>
                            </div>

                            <!-- Submit Button -->
                            <div>
                                <button type="submit" class="bg-blue-500 text-white font-semibold py-2 px-4 rounded hover:bg-blue-600">
                                    Save Changes
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>


</body>

</html>