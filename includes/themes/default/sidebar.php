<!-- Side widgets-->
<div class="col-lg-4">
    <!-- Search widget-->
    <div class="card mb-4">
        <div class="card-header">Search</div>
        <form action="search" method="post">
            <div class="card-body">
                <div class="input-group">
                    <input name="search" class="form-control" type="text" placeholder="Enter search term..." aria-label="Enter search term..." aria-describedby="button-search" />
                    <button name="submit" class="btn btn-primary" id="button-search" type="submit">Go!</button>
                </div>
            </div>
        </form>
    </div>
    <!-- Categories widget-->
    <div class="card mb-4">
        <div class="card-header">Categories</div>
        <div class="card-body">
            <div class="row">
                <div class="col-sm-6">
                    <ul class="list-unstyled mb-0">
                        <?php 
                        $categories = getCategories();
                        foreach ($categories as $category) {
                            echo "<li><a href='category?category={$category['id']}'>{$category['title']}</a></li>";
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Side widget-->
    <div class="card mb-4">
        <div class="card-header">Side Widget</div>
        <div class="card-body">You can put anything you want inside of these side widgets. They are easy to use, and feature the Bootstrap 5 card component!</div>
    </div>
</div>