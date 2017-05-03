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
                                           <td><?= $item['subject_name']; ?></td>
                                           <td><?= $item['created_at']; ?></td>
                                           <td><?= $data=($item['status']=="0"? 'Inactive' : "active") ?></td>

                                            <td>
                                                <a href="<?= site_url('subjects/edit/' . $item[$pmKey]) ?>"
                                                   class="btn btn-primary btn-sm"><i class="ion-compose"></i> Edit</a>
                                                <a href="<?= site_url('subjects/delete/' . $item[$pmKey]) ?>"
                                                   class="btn btn-danger btn-sm" onClick="return confirm('Are you sure?');"><i
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