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
                            <a class="nav-link" href="index.php" >Take Attendence</a>
                        </button>
                        </li>
                    </ul>
                    <ul class="navbar-nav ml-auto">
                        
                        <li class="nav-item">
                             <button class="btn btn-info">
                            <a class="nav-link" href="index.php">Back</a>
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
        <!-- slider Section -->
                    <div class="col-md-5">
                        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="asset/image/online exam 1.jpg" class="d-block w-100" alt="online exam 1">
                                </div>
                                <div class="carousel-item">
                                    <img src="asset/image/online exam 2.webp" class="d-block w-100" alt="online exam 2">
                                </div>
                                <div class="carousel-item">
                                    <img src="asset/image/online exam 3.jpg" class="d-block w-100" alt="online exam 3">
                                </div>
                                <div class="carousel-item">
                                    <img src="asset/image/online exam 4.jpg" class="d-block w-100" alt="online exam 4">
                                </div>
                                <div class="carousel-item">
                                    <img src="asset/image/online exam 5.jpg" class="d-block w-100" alt="online exam 5">
                                </div>
                                <div class="carousel-item">
                                    <img src="asset/image/online exam 6.jpg" class="d-block w-100" alt="online exam 6">
                                </div>
                            </div>
                            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>
                      <div class="col-md-7">
                        <div class="log-reg">
                            <?php 
                                if ($_SERVER['REQUEST_METHOD']=='POST') {
                                    $name = $_POST['name'];
                                    $roll = $_POST['roll'];
                                    $insert_data = $stu->insertStudentData($name,$roll);
                                    if (isset($insert_data)) {
                                        echo $insert_data;
                                    }
                                }
                            ?>
                                <form action="" method="POST">
                                    <table class="tbl" >
                                        <tr>
                                            <th>Student Name</th>
                                            <th>:</th>
                                            <td><input type="text" name="name" id="name" placeholder="Enter Student Name.."></td>
                                        </tr>
                                        <tr>
                                            <th>Student Roll</th>
                                            <th>:</th>
                                            <td><input type="Text" name="roll" id="roll" placeholder="Enter Student Roll.."></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td><input type="submit" id="submit" name="submit" value="Submit"></td>
                                        </tr>  
                                    </table>
                                </form> 
                                
                    </div>
                    </div>
                    <!-- End -->
                     </div>
            </div>
        </div>
<?php
    include "inc/footer.php";
?>     