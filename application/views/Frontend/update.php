

<div class="container">
    <div class="row">
        <div class="col-md-12 mt-4">
            <div class="card">
                <div class="card-header">
                    <h4>Update Employee data 
                    <a href="<?php echo base_url('employee')?>" class="btn btn-danger float-end">Back</a></h4>
                </div>
                <div class="card-body">
                    <form action="<?php echo base_url('employee/update/'.$employee->id);?>" method="POST">
                        <div class="form-group">
                    <label for="fname">First Name:</label>
                    <input type="text" name="fname" value="<?php echo $employee->fname; ?>" class="form-control">
                    <small><?php echo form_error('fname')  ?></small>
                </div>   
                    
                          <div class="form-group">
                    <label for="lname">Last Name:</label>
                    <input type="text" name="lname" value="<?php echo $employee->lname; ?>" class="form-control">
                    <small><?php echo form_error('lname')  ?></small>

                </div>  

                          <div class="form-group">
                    <label for="phone">Phone No:</label>
                    <input type="text" name="phone" value="<?php echo $employee->phone; ?>" class="form-control">
                    <small><?php echo form_error('phone')  ?></small>

                </div>
                         
                          <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="text" name="email" value="<?php echo $employee->email; ?>" class="form-control">
                    <small><?php echo form_error('email')  ?></small>

                </div> 
                        
                          <div class="form-group">
                           <button type="submit" class="btn btn-primary form-control" >Update</button>
                         </div>  
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

