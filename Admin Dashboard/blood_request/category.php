                    <?php  

                            // SQL query to retrieve total blood units requested by blood type
                            $sql = "SELECT bloodType, SUM(bloodUnits) AS totalRequestedUnits
                                    FROM (
                                        SELECT bloodType, bloodUnits FROM receiver
                                        UNION ALL
                                        SELECT bloodType, bloodUnits FROM request
                                    ) AS combined_requests
                                    GROUP BY bloodType";

                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                // Output table header
                                echo "<table border='1'>
                                        <tr>
                                            <th>Blood Type</th>
                                            <th>Total Requested Units</th>
                                        </tr>";

                                // Output data of each row
                                while($row = $result->fetch_assoc()) {
                                    echo "<tr>
                                            <td>".$row["bloodType"]."</td>
                                            <td>".$row["totalRequestedUnits"]."</td>
                                        </tr>";
                                }
                                echo "</table>";
                            } else {
                                echo "0 results";
                            }

                            $conn->close();
                        ?>