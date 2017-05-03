<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container">

            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-12">
                    <h4 class="page-title"><?=$title?></h4>
                    <p class="text-muted page-title-alt"><?=$description?></p>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <div class="card-box">
                        <?php
                            //show message
                            echo $this->session->flashdata("msg");
                        ?>
                        <table id="datatable" class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>S.NO</th>
                                <?php
                                    //Set Table Headers
                                    foreach($cols as $value)
                                    {
                                        echo "<th>".$value."</th>";
                                    }
                                ?>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                                //Set Data in table
                                if($items!==false) {
                                    $i = 0;
                                    foreach ($items as $item) {
                                        $i += 1;
                                        ?>
                                        <tr>
                                            <td><?= $i ?></td>
                                            <?php
                                            foreach ($cols as $key => $value) {
                                                if ($key == "path") {
                                                    $item[$key] = "<a href='" . base_url() . $item[$key] . "' target='_blank'>View File</a>";
                                                }
                                                echo "<td>" . $item[$key] . "</td>";
                                            }
                                            ?>
                                            <td>
                                                <a href="<?= site_url('article/edit/' . $item[$pmKey]) ?>"
                                                   class="btn btn-primary"><i class="ion-compose"></i> Edit</a>
                                                <a href="<?= site_url('article/delete/' . $item[$pmKey]) ?>"
                                                   class="btn btn-danger" onClick="return confirm('Are you sure?');"><i
                                                        class="ion-close"></i> Delete</a>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                }
                             ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>



        </div> <!-- container -->

    </div> <!-- content -->

    <footer class="footer text-right">
        2017 © CME Designed & Developed by WAEMS.
    </footer>

</div>


<!-- ============================================================== -->
<!-- End Right content here -->
<!-- ============================================================== -->