<?php include "includes/admin_header.php"; ?>

<?php 
if (!is_admin($_SESSION['username'])) {
    header("Location: ../");
} 
?>

    <div id="wrapper">

    <?php include "includes/admin_navigation.php"; ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Dashboard
                            <small><?php echo $_SESSION['username'] ?></small>
                        </h1>
                    </div>
                </div>
                <!-- /.row -->


                <!-- /.row -->
                
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-fw fa-cog fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div><p class="lead">Settings</p></div>
                                    </div>
                                </div>
                            </div>
                            <div class="panel-footer">
                                <a href="settings.php">
                                    <span class="pull-left">Change General Settings</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </a>
                                <a href="settings.php#settings-seo">
                                    <span class="pull-left">Change SEO Settings</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </a>
                                <a href="settings.php#settings-contact">
                                    <span class="pull-left">Change Contact Settings</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-red">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-columns fa-5x"></i>
                                    </div>

                                    <div class="col-xs-9 text-right">
                                        <div><p class="lead">Pages</p></div>
                                    </div>
                                </div>
                            </div>
                            <div class="panel-footer">
                            <a href="pages.php">
                                <span class="pull-left">View all pages</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </a>
                            <a href="pages.php?source=add_page">
                                <span class="pull-left">Add Page</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </a>  
                            </div>
                            
                            <div class="panel-footer">
                                <?php
                                $query = "SELECT * FROM pages ORDER BY page_order_number";
                                $select_pages = mysqli_query($connection, $query);  

                                while($row = mysqli_fetch_assoc($select_pages)) {
                                    $page_id = $row['page_id'];
                                    $page_order_number = $row['page_order_number'];
                                    $page_nav_title = $row['page_nav_title'];
                                    $page_title = $row['page_title'];
                                    $page_template = $row['page_template'];
                                    ?>

                                    <span class="pull-left" style="color: #d9534f"><?php echo substr($page_title, 0, 25); ?></span>

                                    <?php if ($page_template == 'Home') { ?>                                            
                                        <span class="pull-right"><a href="../"><i class="fa fa-eye"></i></a></span>
                                    <?php } else { ?>
                                        <span class="pull-right"><a href="../page.php?pg_id=<?php echo $page_id ?>"><i class="fa fa-eye"></i></a></span>
                                    <?php } ?>
                                    <span class="pull-right" style="margin-right: 5px;"><a href="pages.php?source=edit_page&pg_id=<?php echo $page_id ?>"><i class="fa fa-pencil"></i></a></span>
                                    <div class="clearfix"></div>
                                <?php }
                                ?>
                                
                            </div>
                            
            

                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-info">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-list fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div><p class="lead">Contents</p></div>
                                    </div>
                                </div>
                            </div>
                            <div class="panel-footer">
                                <a href="rooms.php">
                                    <span class="pull-left">View All Rooms</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </a>
                                <a href="rooms.php?source=add_room">
                                    <span class="pull-left">Add Room</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </a>     
                            </div>
                            <div class="panel-footer">
                                <a href="activities.php">
                                    <span class="pull-left">View All Activities</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </a>
                                <a href="activities.php?source=add_activity">
                                    <span class="pull-left">Add Activity</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </a>     
                            </div>
                            <div class="panel-footer">
                                <a href="galleries.php">
                                    <span class="pull-left">View All Galleries</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </a>
                                <a href="galleries.php?source=add_gallery">
                                    <span class="pull-left">Add Gallery</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </a>     
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <!-- <div class="panel panel-green">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-bar-chart fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                      <div><p class="lead">Analytics</p></div>
                                    </div>
                                </div>
                            </div>
                            <a href="https://analytics.google.com/analytics/web/" target="_blank">
                                <div class="panel-footer">
                                    <span class="pull-left">Go to Analytics</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div> -->
                        <div class="panel panel-yellow">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-user fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div><p class="lead">Users & Profile</p></div>
                                    </div>
                                </div>
                            </div>
                            <div class="panel-footer">
                                <a href="users.php">
                                    <span class="pull-left">View All Users</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </a>
                                <a href="users.php?source=add_user">
                                    <span class="pull-left">Add User</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </a>     
                            </div>
                            <div class="panel-footer">
                                <a href="profile.php">
                                    <span class="pull-left">View Your Profile</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </a>   
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->

                <?php
                $month_ini = new DateTime("first day of last month");
                $month_end = new DateTime("last day of last month");

                // this token is used to authenticate your API request.
                // You can get the token on the API page inside your Matomo interface
                $token_auth = '7b93868d0bc13a33fdb5118a86da56df';                

                // we call the REST API and request the 100 first keywords for the last month for the idsite=62
                $url = "https://hotera-cms.com/matomo/";
                $url .= "?module=API";
                $url .= "&idSite=3";
                $url .= "&format=JSON";
                //$url .= "&filter_limit=10";
                $url .= "&token_auth=$token_auth";                
                $date = "&date=" . $month_ini->format('Y-m-d') . "," . $month_end->format('Y-m-d');
                ?>

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Analytics
                            <small>from <?php echo $month_ini->format('j F') ?> - <?php echo $month_end->format('j F Y') ?></small>
                        </h1>
                    </div>
                </div>
                <!-- /.row -->
                      
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-info">
                            <div class="panel-heading">
                                <div class="row">
                                    <!-- <div class="col-xs-3">
                                        <i class="fa fa-fw fa-cog fa-5x"></i>
                                    </div> -->
                                    <div class="col-xs-12">
                                        <div><p class="lead">Visits of the last 10 days</p></div>
                                    </div>
                                </div>
                            </div>
                            <div class="panel-footer">
                                <?php 
                                $method = "&method=VisitsSummary.getVisits";
                                $period = "&period=range";

                                $fetched_countries = file_get_contents($url.$method.$period.$date);
                                $content = json_decode($fetched_countries,true);
                                // case error
                                if (!$content) {
                                    print("No data found");
                                }

                                foreach ($content as $row) {

                                    $countryName = htmlspecialchars($row["label"], ENT_QUOTES, 'UTF-8');
                                    $hits = $row['nb_visits'];
                
                                    print("<b>$countryName</b> ($hits visits)<br>\n");
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-info">
                            <div class="panel-heading">
                                <div class="row">
                                    <!-- <div class="col-xs-3">
                                        <i class="fa fa-fw fa-cog fa-5x"></i>
                                    </div> -->
                                    <div class="col-xs-12">
                                        <div><p class="lead">Countries with most visits</p></div>
                                    </div>
                                </div>
                            </div>
                            <div class="panel-footer">
                                <?php 
                                $method = "&method=UserCountry.getCountry";
                                $period = "&period=range";

                                $fetched_countries = file_get_contents($url.$method.$period.$date);
                                $content = json_decode($fetched_countries,true);
                                // case error
                                if (!$content) {
                                    print("No data found");
                                }

                                foreach ($content as $row) {

                                    $countryName = htmlspecialchars($row["label"], ENT_QUOTES, 'UTF-8');
                                    $hits = $row['nb_visits'];
                
                                    print("<b>$countryName</b> ($hits visits)<br>\n");
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

<?php include "includes/admin_footer.php"; ?>
