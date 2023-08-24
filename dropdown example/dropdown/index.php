<?php include 'conn.php'; ?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Select Country</title>
</head>
<body>
    <div class="container">
        <div class="row mt-5">   
            <div class="dropdown">
                <button onclick="myFunction()" class="btn dropdown-toggle border shadow-none pt-3 pb-3 pl-4 pr-4" data-bs-toggle="dropdown" aria-expanded="false" id="dropdownButton">Select Country</button>
                <div id="myDropdownmenu" class="dropdown-content w-25 mt-2">
                    <input class="w-100 form-control pt-2 pb-2 shadow-s" type="text" placeholder="Search.." id="myInput" onkeyup="filterFunction()">
                    
                    <?php 
                    $sql = "SELECT * FROM countries";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) { ?>
                            <a class="dropdown-item" href="#" onclick="selectCountry('<?php echo $row["countryName"]; ?>')"><?php echo $row["countryName"] ?></a>
                        <?php }
                    } else {
                        echo "0 results";
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>

    <script>
        function myFunction() {
            document.getElementById("myDropdownmenu").classList.toggle("show");
        }

        function filterFunction() {
            var input, filter, div, a, i;
            input = document.getElementById("myInput");
            filter = input.value.toUpperCase();
            div = document.getElementById("myDropdownmenu");
            a = div.getElementsByTagName("a");
            
            for (i = 0; i < a.length; i++) {
                var txtValue = a[i].textContent || a[i].innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    a[i].style.display = "";
                } else {
                    a[i].style.display = "none";
                }
            }
        }

        function selectCountry(countryName) {
            document.getElementById("dropdownButton").innerText = countryName;
            myFunction(); // Close the dropdown
        }
    </script>
</body>
</html>
