<?php

require_once('../connection.php');

$get_recent_term_Q  = mysqli_query($con,"SELECT `term_name`,`term_id` FROM `term` WHERE 1");
while($row = mysqli_fetch_assoc($get_recent_term_Q)){
    $term_name = $row['term_name'];
    $term_id = $row['term_id'];
}
$dept =  $_POST['dept'];
$batch =  $_POST['batch'];
$teacher =  $_POST['teacher'];
$room =  $_POST['room'];
$time =  $_POST['time'];
$subject =  $_POST['subject'];
$day =  $_POST['day'];
$credit =  $_POST['credit'];
$section =  $_POST['section'];

$table_name = $dept."_".$batch."_".$subject."_".$term_id."_".$section."_attendance";
// echo $table_name;

$create_table = "CREATE TABLE $table_name(
    lecture_id INT(100) NOT NULL PRIMARY KEY
)";

$con -> query($create_table);


for($i = 1 ; $i<151;$i++){
    $a = 'a'.(string)$i; 
    $sql = "ALTER TABLE $table_name ADD `$a` VARCHAR(10) NULL;";
    if($con -> query($sql)){
        
    }
    else{
        
    }
}

$section = strtolower($section);


$insert_period  = "INSERT INTO `period_table_normal`(`timing_id`,`section`, `teacher_id`, `dept_id`, `batch_id`, `room_id`, `subject_id`, `day_id`, `credit_hour`)
 VALUES ('$time','$section','$teacher','$dept','$batch','$room','$subject','$day','$credit')";
$con -> query($insert_period);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../assests/style/dashboard-index.css">
    <link rel="stylesheet" href="../assests/style/teacher-portal.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
    <title>Dashboard</title>
</head>

<body>
    <div class="dashboard">
            <div class="sidebar " id="sidebar">
            <div class="sidebar-inner " id="sidebar-inner">
                <p>D.A.M.S</p>
                <hr>
                <div class="row-sidebar">
                 <a href="./index.html">   <i class="far fa-user-circle icon-sidebar"></i>
                    <div class="row-sidebar-text name-bar ">
                        Admin
                    </div>
    </a>            </div>
                <hr>
                <div class="row-sidebar selected-sidebar profile">
                    <i class="fas fa-university icon-sidebar "></i>
                    <div class="row-sidebar-text ">
                        ADD
                    </div>
                </div>
                <div id="drop-down-profile" class="row-sidebar-profile">
                    <div class="row-sidebar">
                        <a href="./addsubject.php">
                        <i class="fas fa-download icon-sidebar"></i>
                        <div class="row-sidebar-text ">
                            Subject
                        </div>
                        </a>
                    </div>
                    <div class="row-sidebar">
                        <a href="./addteacher.html">
                        <i class="fas fa-download icon-sidebar"></i>
                        <div class="row-sidebar-text ">
                            Add Teacher
                        </div>
                        </a>
                    
                    </div>
                    <div class="row-sidebar">
                        <a href="./addStudent.php">
                        <i class="fas fa-download icon-sidebar"></i>
                        <div class="row-sidebar-text ">
                            Student
                        </div>
                    </a>
                       
                    </div>
                    <div class="row-sidebar">
                        <i class="fas fa-download icon-sidebar"></i>
                        <div class="row-sidebar-text ">
                            Department
                        </div>
                    </div>
                    <div class="row-sidebar">
                        <i class="fas fa-download icon-sidebar"></i>
                        <div class="row-sidebar-text ">
                            Batch
                        </div>
                    </div>

                </div>

                <div class="row-sidebar">
                    <a href="./addperiod.php">

                    <i class="fas fa-building icon-sidebar"></i>
                    <div class="row-sidebar-text ">
                        Upload Timetable
                    </div>
                    </a>
                    
                </div>
                <div class="row-sidebar">
                    <i class="fas fa-users icon-sidebar"></i>
                    <div class="row-sidebar-text ">
                        Upload Compensated Table
                    </div>
                </div>
                <div class="row-sidebar">
                    <i class="fas fa-user-friends icon-sidebar"></i>
                    <div class="row-sidebar-text ">
                        Delete Subject
                    </div>
                </div>
                <div class="row-sidebar">
                    <i class="fas fa-book icon-sidebar"></i>
                    <div class="row-sidebar-text ">
                        Delete Teacher
                    </div>
                </div>
                <div class="row-sidebar">
                    <i class="fas fa-download icon-sidebar"></i>
                    <div class="row-sidebar-text ">
                        Delete Student
                    </div>
                </div>
                <div class="row-sidebar">
                    <i class="fas fa-sign-out-alt icon-sidebar"></i>
                    <div class="row-sidebar-text ">
                        Edit Profile
                    </div>
                </div>
                <div class="row-sidebar">
                    <i class="fas fa-sign-out-alt icon-sidebar"></i>
                    <div class="row-sidebar-text ">
                        Logout
                    </div>
                </div>


            </div>





        </div>
        <div class="dashboard-inner " id="main-bar">
            <div class="dashboard-inner-top">
                <h2>
                    Following Period is Uploaded
                </h2>
                <a href="./index.html" style="text-align:center">

                <h3>
                    Back to Dashboard
                </h3>
                </a>
    
            </div>
          
            
          
        </div>
     

</body>
<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
    crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/407fccd64e.js" crossorigin="anonymous"></script> 

<!-- <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script> -->
<script src="../assests/script/dashbaord.js"></script>

</html>

<script>
    b = 'red';
    status = [];
    $('#selectDeparta').change(function () {
        // $('#best-batch-heading').css('display', 'none');
        // $('#best-batch-div').css('display', 'none');
        // $('#batch-heading').css('display', 'flex');
        // $('#batch-div').css('display', 'flex');
        $('#student_name_div').css('display', 'flex');
        number_of_students = document.getElementById('totalnumberofstudents').value;
        for (i = 0; i > number_of_students; i++) {
            status.push('present');
        }

    });


    $('#selectBatch').change(function () {
        $('#best-batch-heading').css('display', 'none');
        $('#best-batch-div').css('display', 'none');
        $('#batch-heading').css('display', 'flex');
        $('#batch-div').css('display', 'flex');
    });

    $('#chkTest').click(function () {
        if (b == 'red') {
            b = 'green';
        }
        else {
            b = 'red';
        }

    });









    // automaic
    way = 'red';
    $('#way').click(function () {
        if (way == 'red') {
            document.getElementById('manual').style.display = 'flex';
            document.getElementById('automatic').style.display = 'none';
            way = 'green';
        }
        else {
            document.getElementById('automatic').style.display = 'flex';
            document.getElementById('manual').style.display = 'none';
            way = 'red';
        }

    });

    // attendace template to be put in loop
    var switchStatus = false;
    $(".students_present").on('change', function () {
        if ($(this).is(':checked')) {
            switchStatus = $(this).is(':checked');
        }
        else {
            switchStatus = $(this).is(':checked');
        }
    });


    $("#selectDepart").change(function () {
        $('.dit-class-students').css('display', 'flex');

    });



</script>

<!-- pop up code -->
<script>

    var modal = document.getElementById("myModal");

    // Get the button that opens the modal
    var btn = document.getElementById("myBtn");

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks the button, open the modal 
    btn.onclick = function () {
        modal.style.display = "flex";
    }

    // When the user clicks on <span> (x), close the modal
    span.onclick = function () {
        modal.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function (event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
</script>
<script src="./jquery.js"></script>





<script>
    function get(ida) {
        alert(ida);
    }

</script>
<?php
        
        



    
       

        
           





// ?>


