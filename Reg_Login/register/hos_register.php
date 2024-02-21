<?php
    include ("../regis_connect.php");

    if (isset($_POST["submit"])) {
        $full_name = $_POST['full_name'];
        $email = $_POST['email'];
        $phone1 = $_POST['phone1'];
        $phone2 = $_POST['phone2'];
        $dob = $_POST['dob'];
        $occup = $_POST['occup'];
        $blood_type = $_POST['blood_type'];
        $gender = $_POST['gender'];
        $p_address = $_POST['p_address'];
        $p_district = $_POST['p_district'];
        $p_province = $_POST['p_province'];
        $c_address = $_POST['c_address'];
        $c_district = $_POST['c_district'];
        $c_province = $_POST['c_province'];
        $user_name = $_POST['user_name'];
        $pass = $_POST['pass'];
        $c_pass = $_POST['c_pass'];

        $sql = "INSERT INTO `h_user`(`id`, `full_name`, `email`, `phone1`, `phone2`, `dob`, `occup`, `blood_type`, `gender`, `p_address`, `p_district`, `p_province`, `c_address`, `c_district`, `c_province`, `user_name`, `pass`, `c_pass`) VALUES (NULL,'$full_name','$email','$phone1','$phone2','$dob','$occup','$blood_type','$gender','$p_address','$p_district','$p_province','$c_address','$c_district','$c_province','$user_name','$pass','$c_pass')";

        $result = mysqli_query($conn, $sql);

        // $errors = array();

        // if (empty($full_name) || empty($email) || empty($phone1) || empty($phone2) || empty($username) || empty($pass) || empty($c_pass)) {
        //     array_push($errors,"All fields are required");
        // }

        // if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        //     array_push($errors, "This email is not registered");
        // }

        // if (strlen($pass)<8) {
        //     array_push($errors,"Password must be at least 8 characters long");
        // }

        // if ($pass!==$c_pass) {
        //     array_push($errors,"Password does not match");
        // }

        // if (count($errors)>0) {
        //     foreach ($errors as $error) {
        //         echo "<div class='alert alert-danger'>$error</div>";
        //     }
        // }
        // else {
                
        // }

    }
            
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donar Register</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Sharp"/>
    <link rel="stylesheet" href="/BBMS/Reg_Login/regis.css"/>
</head>
<body class= "regis_image">
    <section class="bbms">
        <div class="reg_arrow1">
            <span class="material-symbols-sharp">keyboard_double_arrow_left</span>
        </div>
        <div class="reg_arrow1">
            <span class="material-symbols-sharp">keyboard_double_arrow_right</span>
        </div>
        <div class="reg_arrow2">
            <span class="material-symbols-sharp">keyboard_double_arrow_left</span>
        </div>
        <div class="reg_arrow2">
            <span class="material-symbols-sharp">keyboard_double_arrow_right</span>
        </div>
        <h1>Hospital</h1>
        <header><u>Registration Form</u></header>
        <h2><u>Personal Details</u>:</h2>
        <form action="" method="post" class="form">
            <div class="input-box">
                <label>Full Name</label>
                <input type="text" name="full_name" id="nameInput" placeholder="Enter Your Full Name" oninput="capitalizeName(this)" required>
            </div>

            <div class="input-box">
                <label>Email</label>
                <input type="text" name="email" placeholder="Enter Your Email Address">
            </div>

            <div class="column">
                <div class="input-box">
                    <label>Phone</label>
                    <input type="text" name="phone1" placeholder="Enter Your Phone Number" required>
                </div>
                <div class="input-box">
                    <label>Date of Birth</label>
                    <input type="date" name="dob" placeholder="" >
                </div>  
            </div>
            <div class="column">
                <div class="input-box">
                    <input type="text" name="phone2" placeholder="Enter Another Phone Number" required>
                </div>

                <div class="select-box-2">
                    <select name="occup">
                        <option hidden>Occupation</option>
                        <option>Student</option>
                        <option>Teacher</option>
                        <option>Medicine</option>
                        <option>Businessman</option>
                        <option>Employee</option>
                        <option>Politician</option>
                        <option>Civil Service</option>
                        <option>Worker</option>
                    </select>
                </div>
            </div>

            <div class="blood">
                <h3><u>Blood Type</u></h3>
                <div class="select-box">
                    <select name="blood_type">
                        <option hidden>Type</option>
                        <option>A+</option>
                        <option>B+</option>
                        <option>AB+</option>
                        <option>O+</option>
                        <option>A-</option>
                        <option>B-</option>
                        <option>AB-</option>
                        <option>O-</option>
                    </select>
                </div>

                <div class="gender-box">
                    <h3><u>Gender</u></h3>
                    <div class="gender-option">
                        <div class="gender">
                            <input type="radio" id="check-male" name="gender" value="Male" checked required/>
                            <label for="check-male">Male</label>
                        </div>
                            
                        <div class="gender">
                            <input type="radio" id="check-female" name="gender" value="Female" required/>
                            <label for="check-female">Female</label>
                        </div>
    
                        <div class="gender">
                            <input type="radio" id="check-other" name="gender" value="Other" required/>
                            <label for="check-other">Prefer Not To Say</label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="input-box address">
                <label>Permanent Adress</label>
                <input type="text" id="nameInput" name="p_address" placeholder="Enter Your Village/Town" oninput="capitalizeName(this)" required>

                <div class="column">
                    <div class="select-box">
                        <select name="p_district">
                            <option hidden> Your District</option>
                            <option>Achham</option>
                            <option>Arghakhanchi</option>
                            <option>Baglung</option>
                            <option>Baitadi</option>
                            <option>Bajhang</option>
                            <option>Bajura</option>
                            <option>Banke</option>
                            <option>Bardiya</option>
                            <option>Bhaktapur</option>
                            <option>Bhojpur</option>
                            <option>Chitwan</option>
                            <option>Dadeldhura</option>
                            <option>Dailekh</option>
                            <option>Dang Deukhuri</option>
                            <option>Darchula</option>
                            <option>Dhading</option>
                            <option>Dhankuta</option>
                            <option>Dhanusha</option>
                            <option>Dholkha</option>
                            <option>Dolpa</option>
                            <option>Doti</option>
                            <option>Gorkha</option>
                            <option>Gulmi</option>
                            <option>Humla</option>
                            <option>Ilam</option>
                            <option>Jajarkot</option>
                            <option>Jhapa</option>
                            <option>Jumla</option>
                            <option>Kailali</option>
                            <option>Kanchanpur</option>
                            <option>Kapilvastu</option>
                            <option>Kaski</option>
                            <option>Kathmandu</option>
                            <option>Kavrepalanchok</option>
                            <option>Khotang</option>
                            <option>Lalitpur</option>
                            <option>Lamjung</option>
                            <option>Mahottari</option>
                            <option>Makwanpur</option>
                            <option>Manang</option>
                            <option>Morang</option>
                            <option>Mugu</option>
                            <option>Mustang</option>
                            <option>Myagdi</option>
                            <option>Nawalparasi (East)</option>
                            <option>Nawalparasi (West)</option>
                            <option>Nirmalapur</option>
                            <option>Nuwakot</option>
                            <option>Okhaldhunga</option>
                            <option>Palpa</option>
                            <option>Panchthar</option>
                            <option>Parbat</option>
                            <option>Parsa</option>
                            <option>Pyuthan</option>
                            <option>Rautahat</option>
                            <option>Rolpa</option>
                            <option>Rukum (East)</option>
                            <option>Rukum (West)</option>
                            <option>Rupandehi</option>
                            <option>Salyan</option>
                            <option>Sankhuwasabha</option>
                            <option>Saptahi</option>
                            <option>Sarlahi</option>
                            <option>Sindhuli</option>
                            <option>Sindhupalchok</option>
                            <option>Siraha</option>
                            <option>Solukhumbu</option>
                            <option>Sunsari</option>
                            <option>Surkhet</option>
                            <option>Syangja</option>
                            <option>Tanahu</option>
                            <option>Taplejung</option>
                            <option>Terhathum</option>
                            <option>Udayapur</option>
                        </select>
                    </div>
                    <div class="select-box">
                        <select name="p_province">
                            <option hidden>Your Province</option>
                            <option>Province 1</option>
                            <option>Province 2</option>
                            <option>Province 3</option>
                            <option>Province 4</option>
                            <option>Province 5</option>
                            <option>Province 6</option>
                            <option>Province 7</option>
                        </select>
                    </div>
                </div>
            </div>
            
            <div class="input-box address">
                <label>Current Adress</label>
                <input type="text" id="nameInput" name="c_address" placeholder="Enter Your Village/Town" oninput="capitalizeName(this)" required>

                <div class="column">
                    <div class="select-box">
                        <select name="c_district">
                            <option hidden> Your District</option>
                            <option>Achham</option>
                            <option>Arghakhanchi</option>
                            <option>Baglung</option>
                            <option>Baitadi</option>
                            <option>Bajhang</option>
                            <option>Bajura</option>
                            <option>Banke</option>
                            <option>Bardiya</option>
                            <option>Bhaktapur</option>
                            <option>Bhojpur</option>
                            <option>Chitwan</option>
                            <option>Dadeldhura</option>
                            <option>Dailekh</option>
                            <option>Dang Deukhuri</option>
                            <option>Darchula</option>
                            <option>Dhading</option>
                            <option>Dhankuta</option>
                            <option>Dhanusha</option>
                            <option>Dholkha</option>
                            <option>Dolpa</option>
                            <option>Doti</option>
                            <option>Gorkha</option>
                            <option>Gulmi</option>
                            <option>Humla</option>
                            <option>Ilam</option>
                            <option>Jajarkot</option>
                            <option>Jhapa</option>
                            <option>Jumla</option>
                            <option>Kailali</option>
                            <option>Kanchanpur</option>
                            <option>Kapilvastu</option>
                            <option>Kaski</option>
                            <option>Kathmandu</option>
                            <option>Kavrepalanchok</option>
                            <option>Khotang</option>
                            <option>Lalitpur</option>
                            <option>Lamjung</option>
                            <option>Mahottari</option>
                            <option>Makwanpur</option>
                            <option>Manang</option>
                            <option>Morang</option>
                            <option>Mugu</option>
                            <option>Mustang</option>
                            <option>Myagdi</option>
                            <option>Nawalparasi (East)</option>
                            <option>Nawalparasi (West)</option>
                            <option>Nirmalapur</option>
                            <option>Nuwakot</option>
                            <option>Okhaldhunga</option>
                            <option>Palpa</option>
                            <option>Panchthar</option>
                            <option>Parbat</option>
                            <option>Parsa</option>
                            <option>Pyuthan</option>
                            <option>Rautahat</option>
                            <option>Rolpa</option>
                            <option>Rukum (East)</option>
                            <option>Rukum (West)</option>
                            <option>Rupandehi</option>
                            <option>Salyan</option>
                            <option>Sankhuwasabha</option>
                            <option>Saptahi</option>
                            <option>Sarlahi</option>
                            <option>Sindhuli</option>
                            <option>Sindhupalchok</option>
                            <option>Siraha</option>
                            <option>Solukhumbu</option>
                            <option>Sunsari</option>
                            <option>Surkhet</option>
                            <option>Syangja</option>
                            <option>Tanahu</option>
                            <option>Taplejung</option>
                            <option>Terhathum</option>
                            <option>Udayapur</option>
                        </select>
                    </div>
                    <div class="select-box">
                        <select name="c_province">
                            <option hidden>Your Province</option>
                            <option>Province 1</option>
                            <option>Province 2</option>
                            <option>Province 3</option>
                            <option>Province 4</option>
                            <option>Province 5</option>
                            <option>Province 6</option>
                            <option>Province 7</option>
                        </select>
                    </div>
                </div>
            </div>    

            <div class="get-in">
                <h2><u>Login Details</u>:</h2>
                <div class="input-box">
                    <!-- <label>Username</label> -->
                    <input type="text" placeholder="Enter Username" name="user_name" >
                </div>
                <div class="input-box">
                    <!-- <label>Password</label> -->
                    <input type="password" name="pass" id="password" placeholder="Enter Password" >
                    <span class="toggle-password" onclick="togglePasswordVisibility('password')">
                        <i class="material-symbols-sharp">visibility</i>
                    </span>
                </div>
                
                <div class="input-box">
                    <!-- <label>Re-Type Passowrd</label> -->
                    <input type="password" name="c_pass" id="c_password" placeholder="Confirm Password" >
                    <span class="toggle-password" onclick="togglePasswordVisibility('c_password')">
                        <i class="material-symbols-sharp">visibility</i>
                    </span>
                </div>
            </div>      


            <a href="/BBMS/Reg_Login/login/hos_login.php"><button type="submit" name="submit">Register</button></a>
            <a href="#" class="cancel">Cancel</a>

        </form>
    </section>
    <script>
        // JavaScript function to capitalize the first letter of each word
        function capitalizeName(input) {
        input.value = input.value.replace(/\b\w/g, match => match.toUpperCase());
        }
    </script>
    <script src="/BBMS/Reg_Login/eye.js"></script>
</body>
</html>