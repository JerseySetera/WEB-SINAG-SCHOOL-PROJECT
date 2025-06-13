<h3>Attendance List</h3>

<div id="subcontent">
    <input type="text" id="search-bar" placeholder="Search Name">
    
    <table id="data-list">
        <tr>
            <th>Time</th>
            <th>Date</th>
            <th>ID</th>
            <th>Name</th>
            <th>Hours</th>
        </tr>

        <?php
        $count = 1;
        if ($receive->list_receive() != false) {
            foreach ($receive->list_receive() as $value) {
                extract($value);
                ?>
                <tr>
                    <td><?php echo $rec_time_added; ?></td>
                    <td><?php echo $rec_date_added; ?></td>
                    <td><?php echo $rec_id; ?></td>
                    <td><?php echo $rec_supplier; ?></td>
                    <td><?php echo $rec_amount; ?></td>
                </tr>
                <?php
                $count++;
            }
        } else {
            echo "No Record Found.";
        }
        ?>
    </table>
</div>

<script>
    document.getElementById("search-bar").addEventListener("keyup", function () {
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("search-bar");
        filter = input.value.toUpperCase();
        table = document.getElementById("data-list");
        tr = table.getElementsByTagName("tr");

        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[3]; // Index 3 corresponds to the "Name" column

            if (td) {
                txtValue = td.textContent || td.innerText;

                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    });
</script>
