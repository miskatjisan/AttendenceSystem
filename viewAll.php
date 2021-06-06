<?php
    include "inc/header.php";
?>
 <!--  navbar-2 -->
        <nav class="navbar navbar-2 navbar-expand-lg navbar-light bg-light">
            <div class="container">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        
                        <li class="nav-item active">
                        <button class="btn btn-success">
                            <a class="nav-link" href="addStu.php" >Add Student</a>
                        </button>
                        </li>
                    </ul>
                    <ul class="navbar-nav ml-auto">
                        
                        <li class="nav-item">
                             <button class="btn btn-info">
                            <a class="nav-link" href="index.php">Take Attendence</a>
                        </button>
                        </li>
                        
                       
                    </ul>
                </div>
            </div>
        </nav>
        <!--  Navbar-3 -->
        <nav class="navbar navbar-3 navbar-expand-lg navbar-light bg-light">
        <div>
           <h2>DATE : <?php echo $cur_date;  ?></h2>
        </div>  
        </nav>


        <!--  Section -->
        <div class="top-section my-4">
            <div class="container-fluid">
                <div class="row">

                    <!-- Exam Test-->
                    <div class="col-md-12">
                        <div class="test">
                                <form action="" method="POST">
                                       <table class="mytble tbl">
                                            <tr>
                                                <th>Serial</th>
                                                <th>Attendence Date</th>
                                                <th>Action</th>
                                            </tr>
                                             
                                                <?php 
                                                $getAttend = $stu->getAllAttendence();
                                                if ($getAttend) {
                                                    $i=0;
                                                    while ($value = $getAttend->fetch_assoc()) {
                                                        $i++;
                                                ?>
                                                <tr>
                                                <td><?php echo $i; ?></td>
                                                <td><?php echo $value['attend_time']; ?></td>
                                                <td><a class="btn btn-primary" style="margin: 5px; color: white;" href="student_view.php?dt=<?php echo $value['attend_time']; ?>">View</a></td>
                                                </tr>
                                            <?php } } ?>
                                    </table>
                                </form> 
                                
                    </div>
                    </div>
        <!-- end -->
                </div>
            </div>
        </div>
<?php
    include "inc/footer.php";
?>

