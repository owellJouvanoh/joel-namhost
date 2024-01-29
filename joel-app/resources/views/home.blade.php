<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="./style.css">
    <link rel="stylesheet" type="text/css" href="./app.css">

    <!-- css -->
    <style>
    body {
    font-family: 'Arial', sans-serif;
    margin: 0;
    padding: 0;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    height: 100vh;
    background-color: #f0f0f0;
}

h1 {
    background-color: #3498db;
    color: #fff;
    padding: 20px;
    border-radius: 10px;
    text-align: center;
}

button {
    background-color: #3498db;
    color: #fff;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    margin-top: 20px;
}

button:hover {
    background-color: #2980b9;
}

h2 {
    margin-top: 20px;
}

/* Center the table heading */
.table-container {
    margin-top: 20px;
    display: flex;
    justify-content: center;
}

/* Adjust the margin for the Forex table */
#forexTable table {
    margin-top: 650px;
    

    /* Adjust the margin to your preference */
}

table {
    width: 80%;
    border-collapse: collapse;
    background-color: #fff;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

th, td {
    padding: 12px;
    text-align: left;
    border-bottom: 1px solid #ddd;
}

th {
    background-color: #3498db;
    color: #fff;
}

</style>
<body>
    <h1>Welcome to Forex rates Indicators</h1>
    <button id="getRatesButton">Get The rates</button>
    
    <h2></h2>
    <div id="forexTable"></div>

    <h2></h2>
    <div id="cryptoTable"></div>

    <script>
    $(document).ready(function() {
        $('#getRatesButton').click(function() {
            $.ajax({
                url: '/get-rates',
                type: 'GET',
                success: function(data) {
                    // Separate forex and crypto pairs
                    var forexPairs = {};
                    var cryptoPairs = {};

                    $.each(data.forex, function(currency, rate) {
                        forexPairs[currency] = rate;
                    });

                    $.each(data.crypto, function(currency, rate) {
                        cryptoPairs[currency] = rate;
                    });

                    // Display forex pairs in a table
                    var forexTableHtml = '<table border="1"><tr><th>Currency</th><th>Rate</th></tr>';
                    $.each(forexPairs, function(currency, rate) {
                        forexTableHtml += '<tr><td>' + currency + '</td><td>' + rate + '</td></tr>';
                    });
                    forexTableHtml += '</table>';
                    $('#forexTable').html(forexTableHtml);

                    // Display crypto pairs in a table
                    var cryptoTableHtml = '<table border="1"><tr><th>Cryto</th><th>Rate</th></tr>';
                    $.each(cryptoPairs, function(currency, rate) {
                        cryptoTableHtml += '<tr><td>' + currency + '</td><td>' + rate + '</td></tr>';
                    });
                    cryptoTableHtml += '</table>';
                    $('#cryptoTable').html(cryptoTableHtml);
                },
                error: function(error) {
                    console.log(error);
                }
            });
        });
    });
    </script>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</body>
</html>
