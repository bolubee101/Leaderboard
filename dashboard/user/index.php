<?php
require('../../config/connect.php');
require('../../config/session.php');
if(isset( $_SESSION['login_user'])){
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard - 30 Days Of Code</title>
        <link href="../dist/css/styles.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="index.html">30DaysOfCode.xyz</a><button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button
            ><!-- Navbar Search
            <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" />
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="button"><i class="fas fa-search"></i></button>
                    </div>
                </div>
            </form>
            <!-- Navbar-
            <ul class="navbar-nav ml-auto ml-md-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="#">Settings</a><a class="dropdown-item" href="#">Activity Log</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="../../logout.php">Logout</a>
                    </div>
                </li>
            </ul>-->
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">User</div>
                            <div class="avatar">
                                <?php
                                global $conn;
                                $email = $_SESSION['login_user'];
                                $sql = "SELECT * FROM user WHERE email='$email' ";
                                $result = mysqli_query($conn,$sql);
                                while($row = mysqli_fetch_assoc($result)) {
                                    $user_nickname = $row['nickname'];
                                    $user_score = $row['score'];
                                    $user_track = $row['track'];
                                    echo '<center><img style=\'width:120px;height:120px;\' src=\'https://robohash.org/'.$user_nickname.$user_track.'\'/></center>';
                                    echo '<center><div>'.$user_nickname.'</div></center>';
                                    echo '<center><div>'.$user_score.'&nbsp; points</div></center>';
                                }
                                ?>
                                <?php
                                global $conn;
                                $ranking_sql = "SELECT * FROM user WHERE `isAdmin` = '0' ORDER BY `score` DESC";
                                $ranking_result = mysqli_query($conn,$ranking_sql);
                                if ($ranking_result) {
                                    $rank = 1;
                                    while ($row = mysqli_fetch_assoc($ranking_result)) {
                                        if($row['email'] == $email){
                                            echo '<center><div> Overall ranking: '.$rank.'&nbsp;</div></center>';
                                        }else {
                                            $rank++;
                                        }
                                    }
                                    
                                }else {
                                    echo "error fetching from database";
                                }
                                ?>
                            </div> 
                            <a class="nav-link" href="index.php"
                                ><div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <a class="nav-link" href="https://30daysofcode.xyz/dashboard/"
                                >
                                <div class="sb-nav-link-icon"><i class="fas fa-plane"></i></div>
                            Leaderboard
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-paper-plane"></i></div>
                            </a>
                            <a class="nav-link" href="https://30daysofcode.xyz/whatsapp">
                                <div class="sb-nav-link-icon"><i class="fas fa-comments"></i></div>
                            Support Group
                            </a>
                            <a class="nav-link" href="submit.php"
                                ><div class="sb-nav-link-icon"><i class="fas fa-submit"></i></div>
                                Submit
                            </a>
                            <div class="sb-sidenav-menu-heading"></div>

                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                            aria-expanded="false" aria-controls="collapsePages">
                            <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                            All Tasks
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapsePages" aria-labelledby="headingTwo"
                            data-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                <a class="nav-link active" href="day0.html">Day o</a>
                                <a class="nav-link active" href="day1.html">Day 1</a>
                                <a class="nav-link active" href="day2.html">Day 2</a>
                                <a class="nav-link active" href="day3.html">Day 3</a>
                                <a class="nav-link collapsed" href="day4.html">Day 4</a>
                                <a class="nav-link collapsed" href="day5.html">Day 5</a>
                                <a class="nav-link collapsed" href="#">Day 6</a>
                                <a class="nav-link collapsed" href="#">Day 7</a>
                                <a class="nav-link collapsed" href="#">Day 8</a>
                                <a class="nav-link collapsed" href="#">Day 9</a>
                                <a class="nav-link collapsed" href="#">Day 10</a>
                                <a class="nav-link collapsed" href="#">Day 11</a>
                                <a class="nav-link collapsed" href="#">Day 12</a>
                                <a class="nav-link collapsed" href="#">Day 13</a>
                                <a class="nav-link collapsed" href="#">Day 14</a>
                                <a class="nav-link collapsed" href="#">Day 15</a>
                                <a class="nav-link collapsed" href="#">Day 16</a>
                                <a class="nav-link collapsed" href="#">Day 17</a>
                                <a class="nav-link collapsed" href="#">Day 18</a>
                                <a class="nav-link collapsed" href="#">Day 19</a>
                                <a class="nav-link collapsed" href="#">Day 20</a>
                                <a class="nav-link collapsed" href="#">Day 21</a>
                                <a class="nav-link collapsed" href="#">Day 22</a>
                                <a class="nav-link collapsed" href="#">Day 23</a>
                                <a class="nav-link collapsed" href="#">Day 24</a>
                                <a class="nav-link collapsed" href="#">Day 25</a>
                                <a class="nav-link collapsed" href="#">Day 26</a>
                                <a class="nav-link collapsed" href="#">Day 27</a>
                                <a class="nav-link collapsed" href="#">Day 28</a>
                                <a class="nav-link collapsed" href="#">Day 29</a>
                            </nav>
                            </div> 
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                       <?=$_SESSION['login_user'];?>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Dashboard</h1>
                       <!-- <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>-->
                        
                        <div class="card mb-4">
                            <div class="card-header"><i class="fas fa-table mr-1"></i>Submissions <a class="btn btn-primary" href="submit.php">Add New</a></div>
                            <div class="card-body">
                                <?php
                                    $u = $_SESSION['login_user'];
                                    $sql = "SELECT * FROM submissions WHERE user = '$u'";
                                    $result = mysqli_query($conn, $sql);
                                    $count = mysqli_num_rows($result);
                                    
                                ?>
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>S/N</th>
                                                <th>Url</th>
                                                <th>Points</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>S/N</th>
                                                <th>Url</th>
                                                <th>Points</th>                                            
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            <?php
                                            
                                            if($count > 0){
                                                $j =1;
                                                while($row = $result->fetch_assoc()) {
                                            ?>
                                            <tr>
                                                <td><?=$j?></td>
                                                <td><?= $row['url'];?></td>
                                                <td><?= $row['points'];?></td>
                                            </tr>
                                            <?php 
                                                $j++;
                                                }}else{
                                                    echo `<p>No Submissions yet</p>`;
                                                }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; 30DayOfCode 2020</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="../dist/js/scripts.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
    </body>
</html>
<?php
}else{
    header("location:../../login.php"); 
}
?>