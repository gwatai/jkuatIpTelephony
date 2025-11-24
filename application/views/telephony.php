<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">

                <div class="container-fluid" style="padding-top: 20px">
                    <h3 id="title_public">JKUAT ONLINE TELEPHONY DIRECTORY</h3>
                    <h2 style="color: blue">Search Extension :</h2>
                    
                    <!-- <div id="public_search" class="row"> -->
                    <form action="<?php echo current_url(); ?>" method="post" id="tel">
                         <div class="row">
                            
                        <div class="col-3">
                            <div class="form-group">
                                <label for="camp">Campus</label>
                                <select name="campus" id="camp" class="form-control">
                                    <option selected disabled>select campus</option>
                                    <?php foreach ($campuses as $key => $value) {
                                    ?>
                                        <option value="<?php echo $value->ccode; ?>" <?php echo set_select('test_select', $value->ccode); ?>> <?php echo $value->cname; ?></option>

                                    <?php } ?>
                                </select>
                            </div>
                            </div>
                            <div class="col-3">
                            <div class="form-group">
                                <label for="depart">Department</label>
                                <select name="departments" id="depart" class="form-control">

                                </select>
                            </div>
                            </div>
                            <div class="col-3">
                            <div class="form-group">
                                <label for="search">Search extension</label>
                                <input type="text" name="code" class="form-control" id="search">
                            </div>
                            </div>
                                            
                            </div>
                        </form>

                        <!-- </div> -->
                        <h4 style="color: blue">Search Extensions Results :</h4>   
                        <div class="row">
                        
                        <div id="table_search_ext" class="table-responsive">
                            <table id="basic-datatables" class="display table table-striped table-hover">
                                 

                            </table>
                            <p class="links" id="link">


                            </p>

                        </div>

                    
                    </div>

                </div>

            </div>
        </div>
    </div>
</div>
<script>

    $(document).ready(function() {

      
    });
</script>