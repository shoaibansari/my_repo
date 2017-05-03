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
                    <h4 class="page-title"><?= $title ?></h4>
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
                                <form class="form-horizontal group-border-dashed" method="post" enctype="multipart/form-data" action="<?=site_url('categories/add')?>">
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Title</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" name="category_name" required placeholder="Enter title..." />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Parent</label>
                                        
                                        <div class="col-sm-6">
                                            <select name="is_parent" class="form-control" >
                                             <option value="0">Select Parent Category</option>
                                              <?php if( count($parent) ):
                                             foreach($parent as $parents ): ?> 
                                          <option value="<?= $parents->category_id ?>"><?= $parents->category_name ?></option>
                                              <?php endforeach; ?>
                                               <?php else: ?>
                                            <option>Parent Category Not Found</option>
                                             <?php endif; ?> 
                                            </select>

                                        </div>
                                    </div>
                                    <hr>
                                    <h4 class="m-t-0 m-b-30 header-title"><b>SEO</b></h4>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Meta tag title</label>
                                        <div class="col-sm-6">
                                          <input name="meta_tag_title" class="form-control"  placeholder="Enter title..."/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                       <label class="col-sm-3 control-label">Meta tag Description</label>
                                        <div class="col-sm-6">
                                        <textarea name="meta_tag_description" class="form-control"></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                       <label class="col-sm-3 control-label">Meta_keywords</label>
                                        <div class="col-sm-6">
                                        <textarea name="meta_keywords" class="form-control multiselect" multiple="multiple"></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Status</label>
                                        <div class="col-sm-6">
                                            <select name="status" class="form-control" >
                                                <option value="0" required>Inactive</option>
                                                <option value="1" requireds>Active</option>
                                            </select>
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
<!-- ==============================================================