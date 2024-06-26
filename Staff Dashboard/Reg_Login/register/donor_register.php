<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donar Register</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Sharp"/>
    <link rel="stylesheet" href="/BBMS/Reg_Login/regis.css"/>
</head>
<body class= "donor-regis">
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

        <?php
            if (isset($_POST["submit"])) {
                $full_name = $_POST["name"];
                $email = $_POST["email"];
                $phone1 = $_POST["phone1"];
                $phone2 = $_POST["phone2"];
                // $d_o_b = $_POST["dob"];
                // $occup = $_POST["occup"];
                // $type = $_POST["blood_type"];
                // $gender = $_POST["gender"];
                // $p_address = $_POST["p_address"];
                // $p_district = $_POST["p_district"];
                // $p_province = $_POST["p_province"];
                // $c_address = $_POST["c_address"];
                // $c_district = $_POST["c_district"];
                // $c_province = $_POST["c_province"];
                $username = $_POST["username"];
                $password = $_POST["password"];
                $c_password = $_POST["c_password"];

                $errors = array();

                if (empty($full_name) || empty($email) || empty($phone1) || empty($phone2) || empty($username) || empty($password) || empty($c_password)) {
                    array_push($errors,"All fields are required");
                }

                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    array_push($errors, "This email is not registered");
                }

                if (strlen($password)<8) {
                    array_push($errors,"Password must be at least 8 characters long");
                }

                if ($password!==$c_password) {
                    array_push($errors,"Password does not match");
                }

                if (count($errors)>0) {
                    foreach ($errors as $error) {
                        echo "<div class='alert alert-danger'>$error</div>";
                    }
                }
                else {
                
                }

            }
            
        ?>

        <h1>Donor</h1>
        <header><u>Registration Form</u></header>
        <h2><u>Personal Details</u>:</h2>
        <form action="donor_register.php" method="post" class="form">
            <div class="input-box">
                <label>Full Name</label>
                <input type="text" name="name" placeholder="Enter Your Full Name">
            </div>

            <div class="input-box">
                <label>Email</label>
                <input type="text" name="email" placeholder="Enter Your Email Address">
            </div>

            <div class="column">
                <div class="input-box">
                    <label>Phone</label>
                    <input type="text" name="phone1" placeholder="Enter Your Phone Number">
                </div>
                <div class="input-box">
                    <label>Date of Birth</label>
                    <input type="date" name="dob" placeholder="" >
                </div>  
            </div>
            <div class="column">
                <div class="input-box">
                    <input type="text" name="phone2" placeholder="Enter Another Phone Number">
                </div>

                <div class="select-box-2">
                    <select>
                        <option hidden>Occupation</option>
                        <option>a</option>
                        <option>b</option>
                        <option>c</option>
                        <option>d</option>
                        <option>e</option>
                        <option>f</option>
                        <option>g</option>
                        <option>h</option>
                    </select>
                </div>
            </div>

            <div class="blood">
                <h3><u>Blood Type</u></h3>
                <div class="select-box">
                    <select>
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
                            <input type="radio" id="check-male" name="gender" value="m" checked/>
                            <label for="check-male">Male</label>
                        </div>
                            
                        <div class="gender">
                            <input type="radio" id="check-female" name="gender" value="f"/>
                            <label for="check-female">Female</label>
                        </div>
    
                        <div class="gender">
                            <input type="radio" id="check-other" name="gender" value="o"/>
                            <label for="check-other">Prefer Not To Say</label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="input-box address">
                <label>Permanent Adress</label>
                <input type="text" placeholder="Enter Your Village/Town">

                <div class="column">
                    <div class="select-box">
                        <select>
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
                        <select>
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
                <input type="text" placeholder="Enter Your Village/Town">

                <div class="column">
                    <div class="select-box">
                        <select>
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
                        <select>
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
                    <input type="text" placeholder="Enter Username" name="username" >
                </div>
                <div class="input-box">
                    <!-- <label>Password</label> -->
                    <input type="password" name="password" id="password" placeholder="Enter Password" >
                    <span class="toggle-password" onclick="togglePasswordVisibility('password')">
                        <i class="material-symbols-sharp">visibility</i>
                    </span>
                </div>
                
                <div class="input-box">
                    <!-- <label>Re-Type Passowrd</label> -->
                    <input type="password" name="c_password" id="c_password" placeholder="Confirm Password" >
                    <span class="toggle-password" onclick="togglePasswordVisibility('c_password')">
                        <i class="material-symbols-sharp">visibility</i>
                    </span>
                </div>
            </div>      

            <button type="submit" name="submit">Submit</button>
        </form>
    </section>
    <script src="/BBMS/Reg_Login/eye.js"></script>
</body>
</html>


    <!-- --------------------------------- Login form for Donor -----------------------------
    <div class="bbms_1 donor-login">
        <div class="login-box">
            <form action="">
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
                <h1>Donor</h1>
                <h2>Register</h2>
                <div class="input-box">
                    <input type="name" name="name" id="fname" placeholder="Your First Name" required>
                </div>
                <div class="input-box">
                    <input type="name" name="name" id="mname" placeholder="Your Middle Name">
                </div>
                <div class="input-box">
                    <input type="name" name="name" id="lname" placeholder="Your Last Name" required>
                </div>
                <div class="input-box"><h2>Gender:</h2>
                    <input type="radio" name="gender" id="gender" >Male
                    <input type="radio" name="gender" id="gender" >Female
                </div>
                <div class="input-box">
                    <input type="name" name="name" id="c_address" placeholder="Your Current Address" required>
                </div>
                <div class="input-box">
                    <input type="name" name="name" id="p_address" placeholder="Your Permanent Address" required>
                </div>
                <div class="input-box">
                    <input type="email" name="email" id="email" placeholder="Email" required>
                </div>
                <div class="input-box">
                    <input type="number" name="number" id="number" placeholder="Your Phone Number" required>
                </div>

                <div class="input-box">
                    <input type="password" name="password" id="password" placeholder="Password" required>
                    <span class="toggle-password" onclick="togglePasswordVisibility('password')">
                        <i class="material-symbols-sharp">visibility</i>
                    </span>
                </div>
                
                <div class="input-box">
                    <input type="password" name="c_password" id="c_password" placeholder="Confirm Password" required>
                    <span class="toggle-password" onclick="togglePasswordVisibility('c_password')">
                        <i class="material-symbols-sharp">visibility</i>
                    </span>
                </div>

                <button type="submit">Register</button>
                <div class="register-link">
                    <a href="/Reg_Login/login/donor_login.html">Already Have Account! Login</a>
                </div>
            </form>
        </div>
    </div>
    <script src="/Reg_Login/eye.js"></script>
</body>
</html> -->