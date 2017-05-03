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
                                <form class="form-horizontal group-border-dashed" method="post" enctype="multipart/form-data" action="<?=site_url('cities/add')?>">
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">City</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" name="city_name" required placeholder="Enter City..." />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Country</label>
                                        <div class="col-sm-6">
                                            <select id="country2" name="country_name" class="form-control" >
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Country Code</label> 
                                        <div class="col-sm-6">
                                            <select id="country_code" name="country_code" class="form-control" > 
                                            </select>
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
<script src="<?=base_url()?>assets/js/modules/Cities/countries.js"></script>
<script language="javascript">
    populateCountries("country2");
    
    $.getJSON( "<?=base_url()?>assets/js/modules/Cities/CountryCodes.json", function( data ) {
        var items = [];
         items.push('<option value="0">Select Country Code</option>');
        $.each( data, function( key, val ) {
          items.push( "<option value='" + val.code + "'>" + val.name + " '" + val.code +"'"+" </option>" );
          //console.log("<option value='" + val.code + "'>" + val.name + " '" + val.code +"'"+" </option>");
        });
        
        $("#country_code").html(items.join(""));
        
    });
</script>

<!-- ============================================================== -->
<!-- End Right content here -->
<!-- ==============================================================

