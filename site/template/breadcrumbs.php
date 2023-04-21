<div class="container">
    <div class="row">
        <!-- breadcrumbs -->
        <div class="breadcrumbs">
            <div class="container">
                <div class="row">
                    <ul>
                        <li class="home"> <a href="../trang-chu">Trang chủ</a><span>—›</span></li>
                        <?php foreach ($dataViewProduct as $key => $value) :?>
                            <li><strong><?php echo $value['name'] ?></strong></li>
                        <?php endforeach ?>
                        <li>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- End breadcrumbs --> 
    </div>
</div>