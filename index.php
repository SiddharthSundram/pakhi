<?php
include_once "config/config.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= PROJECT_NAME; ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-slate-300">
    <?php include_once "include/header.php"; ?>

    <div class="container mt-10 px-10 ">
        <div class="flex flex-1">
            <div class="w-7/12 ml-5">
                <h1 class="text-7xl text-teal-800 font-black text-sans">Welcome in <?= PROJECT_NAME ?></h1>
                <p class="text-lg leading-8 mt-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut, officia. Quia cum sequi voluptatum saepe eaque. Eum inventore laborum eius magni sit temporibus quod debitis fugiat unde nulla sed labore quaerat non doloribus facilis vel possimus ipsa, quo provident omnis incidunt nisi maxime. Error velit fugit quaerat nam nobis ipsam.</p>
            </div>
            <div class="w-5/12  ">
                <div class="bg-white shadow p-5 border rounded">

                    <div class="w-full">
                        <h2 class="text-3xl text-gray-800 font-bold mb-3">Create an Account 100% Free</h2>
                    </div>

                    <form action="" method="post">
                        <div class="flex gap-2">
                            <div class="flex-1">
                                <div class="mb-4">
                                    <label for="Fname" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white-800">Your First Name</label>
                                    <input type="text" name="fname" id="Fname" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-500 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white-800 dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="e.g. Siddharth" required>
                                </div>
                            </div>
                            <div class="flex-1">
                                <div class="mb-4">
                                    <label for="Lname" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white-800">Your Last Name</label>
                                    <input type="text" name="lname" id="Lname" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-500 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white-800 dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="e.g. Sundram" required>
                                </div>
                            </div>
                        </div>
                        <div class="mb-4">
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white-800">Your email</label>
                            <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-500 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white-800 dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="e.g. sid123@pakhi.com" required>
                        </div>
                        <div class="mb-4">
                            <label for="contact" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white-800">Your Contact</label>
                            <input type="tel" name="contact" id="contact" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-500 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white-800 dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="e.g. 8543017890" required>
                        </div>
                        <div class="flex gap-2">
                            <div class="mb-4 flex-1 ">
                                <label for="gender" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white-800">Gender</label>
                                <select name="gender" id="gender" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-500 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <option value="">Select Your Gender</option>
                                    <option value="m">Male</option>
                                    <option value="f">Female</option>
                                    <option value="o">other</option>

                                </select>
                            </div>
                            <div class="mb-4 flex-1 ">
                                <label for="dob" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white-800">Date of Birth</label>
                                <input type="date" name="dob" id="dob" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-500 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                            </div>
                        </div>
                        <div class="mb-4">
                            <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white-800">Your password</label>
                            <input type="password" id="password" name="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-500 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                        </div>

                        <div class="flex flex-1 justify-end">

                            <button type="submit" name="create" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Create an Account</button>
                        </div>
                    </form>
                    <?php

                    // creaate account work
                    if(isset($_POST['create'])){
                        $fname = $_POST['fname'];
                        $lname = $_POST['lname'];
                        $dob = $_POST['dob'];
                        $password = md5($_POST['password']);
                        $email = $_POST['email'];
                        $contact = $_POST['contact'];
                        $gender = $_POST['gender'];

                        $query = mysqli_query($connect, "INSERT into accounts(fname,lname,email,contact,dob,gender,password) values ('$fname','$lname','$email','$contact','$dob','$gender','$password')");

                        if($query){
                            $_SESSION['account'] = $email;
                            redirect('mail/inbox.php');
                        }
                        else{
                            alert('email or password is incorrect try again');
                            redirect('index.php');
                        }
                    }




                    ?>
                </div>

            </div>
        </div>
    </div>

</body>

</html>