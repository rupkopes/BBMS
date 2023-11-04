<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Staff Register</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Sharp"/>
    <link rel="stylesheet" href="/BBMS/Reg_Login/regis.css"/>
</head>
<body class= "staff-regis">
    <section class="container">
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
        <header><u>Registration Form</u></header>
        <h2><u>Personal Details</u>:</h2>
        <form action="#" class="form">
            <div class="input-box">
                <label>Full Name</label>
                <input type="text" name="name" placeholder="Enter Your Full Name" required>
            </div>

            <div class="input-box">
                <label>Email</label>
                <input type="text" name="email" placeholder="Enter Your Email Address" required>
            </div>

            <div class="column">
                <div class="input-box">
                    <label>Phone</label>
                    <input type="text" name="phone1" placeholder="Enter Your Phone Number" required>
                </div>
                <div class="input-box">
                    <label>Date of Birth</label>
                    <input type="date" name="dob" placeholder="" required>
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
                <input type="text" placeholder="Enter Your Village/Town" required>

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
                <input type="text" placeholder="Enter Your Village/Town" required>

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
                    <input type="text" placeholder="Enter Username" required>
                </div>
                <div class="input-box">
                    <!-- <label>Password</label> -->
                    <input type="password" name="password" id="password" placeholder="Enter Password" required>
                    <span class="toggle-password" onclick="togglePasswordVisibility('password')">
                        <i class="material-symbols-sharp">visibility</i>
                    </span>
                </div>
                
                <div class="input-box">
                    <!-- <label>Re-Type Passowrd</label> -->
                    <input type="password" name="c_password" id="c_password" placeholder="Confirm Password" required>
                    <span class="toggle-password" onclick="togglePasswordVisibility('c_password')">
                        <i class="material-symbols-sharp">visibility</i>
                    </span>
                </div>
            </div>      

            <button>Next</button>
        </form>
    </section>
    <script src="/BBMS/Reg_Login/eye.js"></script>
</body>
</html>