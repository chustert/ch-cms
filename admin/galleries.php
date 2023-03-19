<?php include "includes/admin_header.php"; ?>

    <div id="wrapper">

    <?php include "includes/admin_navigation.php"; ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Galleries
                        </h1>

                        <?php  

                        if(isset($_GET['source'])) {
                            $source = $_GET['source'];
                        } else {
                            $source = '';
                        }

                        switch($source) {
                            case 'add_gallery';
                            include "includes/add_gallery.php";
                            break;

                            case 'edit_gallery';
                            include "includes/edit_gallery.php";
                            break;

                            default:
                            include "includes/view_all_galleries.php";
                            break;

                        }

                        ?>

                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

<?php include "includes/admin_footer.php"; ?>
