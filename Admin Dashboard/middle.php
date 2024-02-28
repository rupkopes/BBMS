
      <main>
            <h1>Dashboard</h1>
            <div class="date">
                <input type="date">
            </div>

            <div class="insights">
                <!----------------------------------------- Figure of A+ ---------------------------------------->
                <div class="Aplus">
                    <a href="/BBMS/Admin Dashboard/progress_bar/A+.php">
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
                    </a>
                </div>
                <!----------------------------------------- End of A+ ------------------------------------------->

                <!----------------------------------------- Figure of B+ ---------------------------------------->
                <div class="Bplus">
                    <a href="/BBMS/Admin Dashboard/progress_bar/B+.php">
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
                    </a>
                </div>
                <!----------------------------------------- End of B+ ------------------------------------------->                

                <!----------------------------------------- Figure of O+ ---------------------------------------->
                <div class="Oplus">
                    <a href="/BBMS/Admin Dashboard/progress_bar/O+.php">
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
                    </a>    
                </div>
                <!----------------------------------------- End of O+ ------------------------------------------->                

                <!----------------------------------------- Figure of AB+ ---------------------------------------->
                <div class="ABplus">
                    <a href="/BBMS/Admin Dashboard/progress_bar/AB+.php">
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
                    </a>
                </div>
                <!----------------------------------------- End of AB+ ------------------------------------------->

                <!----------------------------------------- Figure of A- ---------------------------------------->
                <div class="Aminus">
                    <a href="/BBMS/Admin Dashboard/progress_bar/A-.php">
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
                    </a>
                </div>
                <!-------------------------------------------- End of A- ---------------------------------------->

                <!----------------------------------------- Figure of B- ---------------------------------------->
                <div class="Bminus">
                    <a href="/BBMS/Admin Dashboard/progress_bar/B-.php">
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
                    </a>
                </div>
                <!------------------------------------------ End of B- ------------------------------------------>

                <!----------------------------------------- Figure of O- ---------------------------------------->
                <div class="Ominus">
                    <a href="/BBMS/Admin Dashboard/progress_bar/O-.php">
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
                    </a>
                </div>
                <!------------------------------------------ End of O- ------------------------------------------>

                <!----------------------------------------- Figure of AB- ---------------------------------------->
                <div class="ABminus">
                    <a href="/BBMS/Admin Dashboard/progress_bar/AB-.php">
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
                    </a>
                </div>
                <!---------------------------------------------- End of AB- ------------------------------------->
            </div>
            <!------------------------------ End of Insights ---------------------->

            <!-- --------------Table Content------------------------>
            <?php
                if(isset($_GET['msg'])) {
                    $msg = $_GET['msg'];
                    echo'<div class="alert alert-warning alert-dismissible fade show" role="alert">
                    '.$msg.'
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
                }
            ?>

            <div class="recent-orders">
                <h2>Blood Requests</h2>
                <table>
                    <thead>
                        <tr>
                            <th>S.No.</th>
                            <th>ID</th>
                            <th>Organization Name</th>
                            <th>Blood Type</th>
                            <th>Quantity(Pints)</th>
                            <th>Date Requested</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>

                    <?php
                            
                            include ("ad_min_connect.php");

                            $sql = "SELECT * FROM `blood_requests`";
                            $result = mysqli_query($conn, $sql);
                            while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                            <tr>
                                <td><?php echo $row['sno'] ?></td>
                                <td><?php echo $row['org_id'] ?></td>
                                <td><?php echo $row['org_name'] ?></td>
                                <td><?php echo $row['blood_type'] ?></td>
                                <td><?php echo $row['quantity'] ?></td>
                                <td><?php echo $row['date_requests'] ?></td>
                                <td><?php echo $row['status'] ?></td>
                                <td>
                                    <a href="edit_blood_request.php?org_id=<?php echo $row['org_id'] ?>"><div class="modify1"><span class="material-symbols-sharp">edit_square</span></div></a>
                                </td>
                                <td>
                                    <a href="delete_blood_request.php?org_id=<?php echo $row['org_id'] ?>"><div class="modify2"><span class="material-symbols-sharp">delete</span></div></a>
                                </td>
                            </tr>

                        <?php
                            }
                        ?>


                    </tbody>
                </table>
                <a href="#">Show All</a>
            </div>
        </main>
        <!------------------------------------- End of Main ----------------------------------->

        