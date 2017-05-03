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
                                <form class="form-horizontal group-border-dashed" method="post" enctype="multipart/form-data" action="<?=site_url('cities/edit/'.(($item!==false)?$item[$pmKey]:""))?>">
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">City</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" name="city_name" value="<?php echo ($item!==false)?$item['city_name']:""; ?>" required placeholder="Enter City..." />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Country</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" name="country_name" value="<?php echo ($item!==false)?$item['country_name']:""; ?>" required placeholder="Enter Country..." />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Country Code</label>
                            
                            <div class="col-sm-6">
                                <select name="country_code" class="form-control" >
                                 <option value="0">Select Country Code</option>
                                  <?php if( count($countries) ):
                                 foreach($countries as $country ): ?> 
                              
                              <option value="<?= $country->country_id ?>" 

                              <?php if($country->country_id==$item['country_id']){echo "selected";} ?> >

                              <?= $country->country_code ?>

                              </option>

                                  <?php endforeach; ?>
                                   <?php else: ?>
                                <option>Country Code Not Found</option>
                                 <?php endif; ?> 
                                </select>

                            </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Status</label>
                                        <div class="col-sm-6">
                                            <select name="status" class="form-control">
                                                <option value="0"<?php if($item['status']== "0"){echo "selected";} ?>>
                                                Inactive</option>
                                                <option value="1"<?php if($item['status']== "1"){echo "selected";} ?>>
                                                Active</option>
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