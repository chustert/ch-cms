        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php"><?php echo $title ?> - Admin Area</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li><a href="../">Homepage</a></li>

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $_SESSION['firstname']; ?> <?php echo $_SESSION['lastname']; ?> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="profile.php"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="../includes/logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>

            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li>
                        <a href="index.php"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>
                    <li>
                        <a href="settings.php"><i class="fa fa-fw fa-cog"></i> Settings</a>
                    </li>                     
                    <li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#pages_dropdown"><i class="fa fa-fw fa-columns"></i> Pages <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="pages_dropdown" class="collapse">
                            <li>
                                <a href="./pages.php">View all pages</a>
                            </li>
                            <li>
                                <a href="pages.php?source=add_page">Add page</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#posts_dropdown"><i class="fa fa-fw fa-bell"></i> Posts <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="posts_dropdown" class="collapse">
                            <li>
                                <a href="./posts.php">View all posts</a>
                            </li>
                            <li>
                                <a href="posts.php?source=add_post">Add post</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#comments_dropdown"><i class="fa fa-fw fa-bell"></i> Comments <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="comments_dropdown" class="collapse">
                            <li>
                                <a href="./comments.php">View all comments</a>
                            </li>
                            <li>
                                <a href="comments.php?source=add_comment">Add Comments</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="categories.php"><i class="fa fa-fw fa-cog"></i> Categories</a>
                    </li>  
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#galleries_dropdown"><i class="fa fa-fw fa-image"></i> Galleries <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="galleries_dropdown" class="collapse">
                            <li>
                                <a href="./galleries.php">View all galleries</a>
                            </li>
                            <li>
                                <a href="galleries.php?source=add_gallery">Add gallery</a>
                            </li>
                        </ul>
                    </li><!-- 
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#locations_dropdown"><i class="fa fa-fw fa-map-marker"></i> Locations <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="locations_dropdown" class="collapse">
                            <li>
                                <a href="./locations.php">View all locations</a>
                            </li>
                            <li>
                                <a href="locations.php?source=add_location">Add locations</a>
                            </li>
                        </ul>
                    </li> -->
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-user"></i> Users <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo" class="collapse">
                            <li>
                                <a href="./users.php">View all users</a>
                            </li>
                            <li>
                                <a href="users.php?source=add_user">Add user</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="profile.php"><i class="fa fa-fw fa-dashboard"></i> Profile</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>