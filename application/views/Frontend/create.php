

<div class="container">
    <div class="row">
        <div class="col-md-12 mt-4">
            <div class="card">
                <div class="card-header">
                    <h4>How to insert Employee data into database
                    <a href="<?php echo base_url('employee')?>" class="btn btn-danger float-right">Back</a></h4>
                </div>
                <div class="card-body">
                    <form action="<?php echo base_url('employee/store');?>" method="POST">
                        <div class="form-group">
                    <label for="fname">First Name:</label>
                    <input type="text" name="fname" class="form-control">
                    <small><?php echo form_error('fname')  ?></small>
                </div>   
                    
                          <div class="form-group">
                    <label for="lname">Last Name:</label>
                    <input type="text" name="lname" class="form-control">
                    <small><?php echo form_error('lname')  ?></small>

                </div>  

                          <div class="form-group">
                    <label for="phone">Phone No:</label>
                    <input type="text" name="phone" class="form-control">
                    <small><?php echo form_error('phone')  ?></small>

                </div>
                         
                          <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="text" name="email" class="form-control">
                    <small><?php echo form_error('email')  ?></small>

                </div> 
                        
                          <div class="form-group">
                           <button type="submit" class="btn btn-primary form-control" >Submit</button>
                         </div>  
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

