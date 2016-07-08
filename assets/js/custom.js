// JavaScript source code
$(document).ready(function () {

    var title = $(document).find("title").text();
    if (title.includes("Messages - ACMS"))
     {if ($("#message-allow").checked) {
        $("#messages").slideDown("fast");
        } else {
        $("#messages").hide();
     }
    }

    if (title.includes("Announcements - ACMS")) {
        $("#announcements").css("color", "red");
    }
});
 

 
function select(course){
    $("#dropdownMenu").val(course);
    $("#results").slideDown("fast");

    if((course == "Electronics II") || (course == "Circuits I") || (course == "Ay 7aga 1"))
    {
        document.getElementById("classes").innerHTML = "20 classes";
        document.getElementById("attended").innerHTML = "8 (40%)";
        document.getElementById("missed").innerHTML = "12";
    }

    else if (course == "All")
    {
        document.getElementById("classes").innerHTML = "90 classes";
        document.getElementById("attended").innerHTML = "72 (80%)";
        document.getElementById("missed").innerHTML = "18";
    }

    else {
        document.getElementById("classes").innerHTML = "10 classes";
        document.getElementById("attended").innerHTML = "8 (80%)";
        document.getElementById("missed").innerHTML = "2";
    }
};

function show_buses(station) {
    $("#dropdownMenu").val($('#xx'+station).html());
    $("#buses_table").slideDown("fast");
    
//    function showUser(str) {
    if (station == "") {
        document.getElementById("buses_table").innerHTML = "";
        return;
    } else { 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("buses_table").innerHTML = xmlhttp.responseText;
            }
        };
        xmlhttp.open("GET","/acms/buses/getBus/"+station,true);
        xmlhttp.send();
    }
//}

};

function show(name) {
    $("#textArea").slideDown("fast");
    $("#dropdownMenu").val(name);
};

function showMessaege(messageNumber) {
    $('#response' + messageNumber).slideToggle('fast');
};

$(function () {
    $('#message-allow').change(function () {
        $('#messages').slideToggle('fast');
    })
});

function showForms() {
    $("#login-forms").slideToggle('fast');
};

function studentLogin() {
   document.location.href = "student_home.html";
};

function showChart(course) {
    
    $("#chart_div").slideDown("fast");
    select(course);
};

          
function show_attendance(course) {
    document.getElementById("dropdownMenu").setAttribute("value", $("#xx"+course).html());
    $("#attendance_table").slideDown("fast");
    $(".my_hint").slideDown("fast");

    
    
    if (course == "") {
        document.getElementById("attendance_table").innerHTML = "";
        return;
    } else { 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("attendance_table").innerHTML = xmlhttp.responseText;
            }
        };
        xmlhttp.open("GET","/acms/professor/getStudentsByCourse/"+course,true);
        xmlhttp.send();


}}
;