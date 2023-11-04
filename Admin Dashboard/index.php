<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BBMS</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Sharp"/>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <aside>
            <div class="top">
                <div class="logo">
                    <img src="/BBMS/images/blood3.png" alt="person">
                    <h2>BB<span class="danger">MS</span></h2>
                </div>
                <div class="close" id="close-btn">
                    <span class="material-symbols-sharp">close</span>
                </div>
            </div>

            <div class="sidebar">
                <a href="#" class="active">
                    <span class="material-symbols-sharp">grid_view</span>
                        <h3>Dashboard</h3>
                </a>
                <a href="#">
                    <span class="material-symbols-sharp">stethoscope</span>
                        <h3>Appointments</h3>
                </a>
                <a href="#">
                    <span class="material-symbols-sharp">monitoring</span>
                        <h3>Stats</h3>
                </a>
                <a href="#">
                    <span class="material-symbols-sharp">diversity_1</span>
                        <h3>Team Members</h3>
                </a>
                <a href="#">
                    <span class="material-symbols-sharp">campaign</span>
                        <h3>Camps</h3>
                </a>
                <a href="#">
                    <span class="material-symbols-sharp">settings</span>
                        <h3>Settings</h3>
                </a>
                <a href="#">
                    <span class="material-symbols-sharp">contacts</span>
                        <h3>Contacts</h3>
                </a>
                <a href="#">
                    <span class="material-symbols-sharp">help</span>
                        <h3>Help</h3>
                </a>
            </div>
        </aside>
        <!--------------------------------------------- End of Aside ------------------------------------>

        <main>
            <h1>Dashboard</h1>
            <div class="date">
                <input type="date">
            </div>

            <div class="insights">

                <div class="Aplus">
                    <div class="middle">
                        <div class="left">
                            <h1>A+</h1>
                        </div>
                        <div class="progress">
                            <svg>
                                <circle cx='38' cy='38' r='36'></circle>
                            </svg>
                            <div class="number">
                                <p>55%</p>
                            </div>
                        </div>
                    </div>    
                    <small class="text-muted">Last 24 Hours</small>
                </div>
                <!----------------------------------------- End of A+ ---------------------------------------->

                <div class="Bplus">
                    <div class="middle">
                        <div class="left">
                            <h1>B+</h1>
                        </div>
                        <div class="progress">
                            <svg>
                                <circle cx='38' cy='38' r='36'></circle>
                            </svg>
                            <div class="number">
                                <p>75%</p>
                            </div>
                        </div>
                    </div>    
                    <small class="text-muted">Last 24 Hours</small>
                </div>
                <!------------------------------------------ End of B+ ----------------------------------->

                <div class="Oplus">
                    <div class="middle">
                        <div class="left">
                            <h1>O+</h1>
                        </div>
                        <div class="progress">
                            <svg>
                                <circle cx='38' cy='38' r='36'></circle>
                            </svg>
                            <div class="number">
                                <p>42%</p>
                            </div>
                        </div>
                    </div>    
                    <small class="text-muted">Last 24 Hours</small>
                </div>
                <!--------------------------------------- End of O+ ----------------------------------------->

                <div class="ABplus">
                    <div class="middle">
                        <div class="left">
                            <h1>AB+</h1>
                        </div>
                        <div class="progress">
                            <svg>
                                <circle cx='38' cy='38' r='36'></circle>
                            </svg>
                            <div class="number">
                                <p>15%</p>
                            </div>
                        </div>
                    </div>    
                    <small class="text-muted">Last 24 Hours</small>
                </div>
                <!-------------------------------------- End of AB+ ---------------------------------->

                <div class="Aminus">
                    <div class="middle">
                        <div class="left">
                            <h1>A-</h1>
                        </div>
                        <div class="progress">
                            <svg>
                                <circle cx='38' cy='38' r='36'></circle>
                            </svg>
                            <div class="number">
                                <p>5%</p>
                            </div>
                        </div>
                    </div>    
                    <small class="text-muted">Last 24 Hours</small>
                </div>
                <!--------------------------------------- End of A- --------------------------------->

                <div class="Bminus">
                    <div class="middle">
                        <div class="left">
                            <h1>B-</h1>
                        </div>
                        <div class="progress">
                            <svg>
                                <circle cx='38' cy='38' r='36'></circle>
                            </svg>
                            <div class="number">
                                <p>35%</p>
                            </div>
                        </div>
                    </div>    
                    <small class="text-muted">Last 24 Hours</small>
                </div>
                <!--------------------------------------- End of B- -------------------------------->

                <div class="Ominus">
                    <div class="middle">
                        <div class="left">
                            <h1>O-</h1>
                        </div>
                        <div class="progress">
                            <svg>
                                <circle cx='38' cy='38' r='36'></circle>
                            </svg>
                            <div class="number">
                                <p>12%</p>
                            </div>
                        </div>
                    </div>    
                    <small class="text-muted">Last 24 Hours</small>
                </div>
                <!--------------------------------------- End of O- -------------------------------->

                <div class="ABminus">
                    <div class="middle">
                        <div class="left">
                            <h1>AB-</h1>
                        </div>
                        <div class="progress">
                            <svg>
                                <circle cx='38' cy='38' r='36'></circle>
                            </svg>
                            <div class="number">
                                <p>2%</p>
                            </div>
                        </div>
                    </div>    
                    <small class="text-muted">Last 24 Hours</small>
                </div>
                <!--------------------------- End of AB- -------------------------->
            </div>
            <!------------------------------ End of Insights ---------------------->

            <!-- --------------Table Content------------------------>
            <div class="recent-orders">
                <h2>Blood Requests</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Order ID</th>
                            <th>Organization Name</th>
                            <th>Blood Type</th>
                            <th>Quantity</th>
                            <th>Status</th>
                            <th>Details</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
                <a href="#">Show All</a>
            </div>
        </main>
        <!------------------------------------- End of Main ----------------------------------->

        <div class="right">
            <div class="top">
                <button id="menu-btn">
                    <span class="material-symbols-sharp">menu</span>
                </button>
                <div class="theme-toggler">
                    <span class="material-symbols-sharp active">light_mode</span>
                    <span class="material-symbols-sharp">dark_mode</span>
                </div>
                <div class="profile">
                    <div class="info">
                        <p>Yo, <b>RupKoPes</b></p>
                        <small class="text-muted">Admin</small>
                    </div>
                    <div class="profile-photo">
                        <img src="/BBMS/images/person.png" alt="Profile">
                    </div>
                </div>
            </div>
            <!------------------------------------- End of Top --------------------------------------->

            <div class="recent-updates">
                <h2>Recent Updates</h2>
                <div class="updates">
                    <div class="update">
                        <div class="profile-photo">
                            <img src="/BBMS/images/srk.jpg">
                        </div>
                        <div class="message">
                            <p><b>Shah Rukh Khan</b> liked the hardwork of BBMS's creators.</p>
                            <small class="text-muted">53 Seconds Ago</small>
                        </div>
                    </div>
                    
                    <div class="update">
                        <div class="profile-photo">
                            <img src="/BBMS/images/mrunal.jpg">
                        </div>
                        <div class="message">
                            <p><b>Mrunal Thakur</b> never been happier like this before.</p>
                            <small class="text-muted">5 Days Ago</small>
                        </div>
                    </div>

                    <div class="update">
                        <div class="profile-photo">
                            <img src="/BBMS/images/gates.jpg">
                        </div>
                        <div class="message">
                            <p><b>Bill Gates</b> keep on doing hard work to be like me, guys.</p>
                            <small class="text-muted">1 Week Ago</small>
                        </div>
                    </div>

                    <div class="update">
                        <div class="profile-photo">
                            <img src="/BBMS/images/jassita.jpg">
                        </div>
                        <div class="message">
                            <p><b>Jassita Gurung</b> saved by BBMS, accident held on Kathmandu.</p>
                            <small class="text-muted">10 Days Ago</small>
                        </div>
                    </div>

                </div>
            </div>
            <!--------------------------- End of Recent Updates ------------------------------>
        </div>
    </div>
    <!---------------------- order.js must be before script.js -------------->
    <script src="order.js"></script> 
    <script src="script.js"></script> 
</body>
</html>