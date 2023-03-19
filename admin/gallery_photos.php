<?php include "includes/admin_header.php"; ?>

    <div id="wrapper">

    <?php include "includes/admin_navigation.php"; ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Gallery Photo
                        </h1>

                        <?php  

                        if(isset($_GET['source'])) {
                            $source = $_GET['source'];
                        } else {
                            $source = '';
                        }

                        switch($source) {
                            case 'add_gallery_photo';
                            include "includes/add_gallery_photo.php";
                            break;

                            case 'edit_gallery_photo';
                            include "includes/edit_gallery_photo.php";
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
