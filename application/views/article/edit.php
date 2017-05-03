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
                        <h4 class="m-t-0 m-b-30 header-title"><b><?=$title?></b></h4>
                        <div class="row">
                            <div class="col-lg-8 col-lg-offset-2">
                                <?php
                                //Show message
                                echo $this->session->flashdata("msg");
                                ?>
                                <form class="form-horizontal group-border-dashed" method="post" enctype="multipart/form-data" action="<?=site_url('article/edit/'.(($item!==false)?$item[$pmKey]:""))?>">
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Title</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" name="title" value="<?php echo ($item!==false)?$item['title']:""; ?>" required placeholder="Enter title..." />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Description</label>
                                        <div class="col-sm-6">
                                            <textarea name="desc" class="form-control"><?php echo ($item!==false)?$item['description']:""; ?></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Select Article (PDF only)</label>
                                        <div class="col-sm-6">
                                            <input type="file" name="resFile" />
                                            <a href="<?php echo ($item!==false)?base_url().$item['path']:"#"; ?>" target="_blank">View file</a>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-offset-3 col-sm-9 m-t-15">
                                            <button type="submit" class="btn btn-primary" name="btn_submit">
                                                Submit
                                            </button>
                                            <button type="reset" class="btn btn-default m-l-5">
                                                Cancel
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>

                        </div>
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