<?php
    include "inc/header.php";
?>
 <!--  navbar-2 -->
 <script type="text/javascript">
     $(document).ready(function(){
        $("form").submit(function(){
            var roll = true;
            $(':radio').each(function(){
                name = $(this).attr('name');
                if (roll && !$(':radio[name="'+name+'"]:checked').length) {
                    alert(name +" Roll Missing !");
                    $('.alert').show();
                    roll = false;
                }

            });
            return roll;
        });
     });
 </script>

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
                            <a class="nav-link" href="viewAll.php">View All</a>
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
                            <?php 
                                if (isset($_GET['rmv'])) {
                                   $rmv = $_GET['rmv'];
                                   $delStudent = $stu->deleteStudent($rmv);
                                   if (isset($delStudent)) {
                                       echo $delStudent;
                                   }
                                }
                                if ($_SERVER['REQUEST_METHOD']=='POST') {
                                    $attend = $_POST['attend'];
                                    $insert_attend = $stu->insertStudentAttend($cur_date,$attend);
                                    if (isset($insert_attend)) {
                                        echo $insert_attend;
                                    }
                                }
                            ?>
                            <div class='alert alert-danger' style="display: none;"><strong>Error!</strong> Student Roll Missing.</div>
                                <form action="" method="POST">
                                       <table class="mytble tbl">
                                            <tr>
                                                <th>Serial</th>
                                                <th>Student Name</th>
                                                <th>Student Roll</th>
                                                <th>Attendence</th>
                                                <th>Action</th>
                                            </tr>
                                             
                                                <?php 
                                                $getStudent = $stu->getAllStudent();
                                                if ($getStudent) {
                                                    $i=0;
                                                    while ($value = $getStudent->fetch_assoc()) {
                                                        $i++;
                                                ?>
                                                <tr>
                                                <td><?php echo $i; ?></td>
                                                <td><?php echo $value['name']; ?></td>
                                                <td><?php echo $value['roll']; ?></td>
                                                <td>
                                                    <input type="radio" name="attend[<?php echo $value['roll'];?>]" value="present">P
                                                    <input type="radio" name="attend[<?php echo $value['roll'];?>]" value="absent">A
                                                </td>
                                                <td><a onclick = "return confirm('Are You Sure To Detete Student!')" href="?rmv=<?php echo $value['roll']; ?>" class="btn btn-primary" style="color: white; margin: 5px;">Remove</a></td>
                                                </tr>
                                            <?php } } ?>
                                            
                                            <tr>
                                                <td><input type="submit" class="btn btn-primary" name="submit" value="Submit"></td>
                                            </tr>
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
