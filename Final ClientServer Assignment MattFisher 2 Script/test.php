
/**
* Created by PhpStorm.
* User: stc615
* Date: 13/04/18
* Time: 16:10
*/

<!--
<!DOCTYPE html>
<html lang="en">
<head>
    <script src="../../js/JavaScriptCSS.js"></script>
    <meta charset="UTF-8">
    <title>Home</title>
            <head>
                <title>Webslesson Tutorial | Search HTML Table Data by using JQuery</title>
                <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
                <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
                <style>
                    #result {
                        position: absolute;
                        width: 100%;
                        max-width:870px;
                        cursor: pointer;
                        overflow-y: auto;
                        max-height: 400px;
                        box-sizing: border-box;
                        z-index: 1001;
                    }
                    .link-class:hover{
                        background-color:#f1f1f1;
                    }
                </style>
            </head>
            <body>
            <br /><br />
            <div class="container" style="width:900px;">
                <h2 align="center">JSON Live Data Search using Ajax JQuery</h2>
                <h3 align="center">Employee Data</h3>
                <br /><br />
                <div align="center">
                    <input type="text" name="search" id="search" placeholder="Search Employee Details" class="form-control" onkeyup="showHint(this.value)"/>
                </div>
                <ul class="list-group" id="txtHint"></ul>
                <br />
            </div>
            </body>
            </html>

-->
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>
        Demo auto complete
    </title>
</head>
<body>

<div id="page-wrapper">

    <input type="text" id="ajax" list="json-datalist" placeholder="e.g. datalist">
    <ul class="list-group" id="txtHint"></ul>
    <datalist id="json-datalist"></datalist>


</div>

<script>

    // Get the <datalist> and <input> elements.
    var dataList = document.getElementById('json-datalist');
    var uic = document.getElementById("txtHint");
    // Create a new XMLHttpRequest.
    var request = new XMLHttpRequest();

    // Handle state changes for the request.
    request.onreadystatechange = function(response) {
        if (request.readyState === 4) {
            if (request.status === 200) {
                // Parse the JSON
                var jsonOptions = JSON.parse(request.responseText);
                // Loop over the JSON array.
                jsonOptions.forEach(function(item) {
                    // Create a new <option> element.
                    var option = document.createElement('option');
                    // Set the value using the item in the JSON array.
                    option.value = item.ProductName;

                    // Add the <option> element to the <datalist>.
                    dataList.appendChild(option);
                });
            }
        }
    };

    // Set up and make the request.
    request.open('GET', 'Views/search.php?q=', true);
    request.send();


</script>

</body>
</html>



