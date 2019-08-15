

/*
function showHint(str) {
    if (str.length == 0) {
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();

        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                var uic = document.getElementById("txtHint");
                uic.innerHTML = this.responseText;
                if (this.response != "no suggestions") {
                    uic.innerHTML = "";
                    var people = JSON.parse(this.responseText);
                    people.forEach(function (obj) {

                        //uic.innerHTML += "<a href='#'>" + obj.ProductName + "</a><br/>"
                        uic.innerHTML += '<li class="list-group-item link-class"><img src="'+ obj.AdvertImage +'" height="40" width="40" class="img-thumbnail" />' +
                            ' ' + '<a href="#">' +  obj.ProductName + '</span></li>';
                        var test = document.getElementById('LiveSearch');
                        test = "";
                        document.addEventListener("click", function(){
                           // test.innerHTML += obj.ProductName;

                           console.log(test.value = "Hello");
                            document.getElementById("LiveSearch").innerHTML = test.value;

                        });

                    });
                }
            }
        };
        xmlhttp.open("GET", "Views/search.php?q=" + str, true);
        xmlhttp.send();
    }
}


function yHandler(){
    var wrap = document.getElementById('wrap');
    var contentHeight = wrap.offsetHeight;
    var yOffset = window.pageYOffset;
    var y = yOffset + window.innerHeight;
    if(y >= contentHeight){
        // Ajax call to get more dynamic data goes here
        wrap.innerHTML += '<div class="newData"></div>';
    }
    var status = document.getElementById('status');
    status.innerHTML = contentHeight+" | "+y;

}

window.onscroll = yHandler;

*/
/*
    var dataList = document.getElementById('JsonProductName');
    var uic = document.getElementById("txtHint");
// Create a new XMLHttpRequest.
    function ShowHint() {
    var request = new XMLHttpRequest();
// Handle state changes for the request.

        request.onreadystatechange = function () {
            if (request.readyState === 4) {
                if (request.status === 200) {
                    // Parse the JSON
                    var jsonOptions = JSON.parse(request.responseText);
                    // Loop over the JSON array.
                    jsonOptions.forEach(function (item) {
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


    }