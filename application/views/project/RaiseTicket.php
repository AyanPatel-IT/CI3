

<div class="container">
    <div class="row">
        <div class="col-md-12 mt-4">
            <div class="card">
                <div class="card-header">
                    <h4>Create New Ticket
                    <a href="<?php echo base_url('tickets')?>" class="btn btn-warning float-right">All Tickets</a></h4>
                </div>
                <div class="card-body">
                    <form action="<?php echo base_url('create_ticket');?>" method="POST">

                        <div class="form-group">
                    <label for="title">Title:</label>
                    <input type="text" name="title" class="form-control">
                    <small><?php echo form_error('title')  ?></small>
                </div>   
                    
                          <div class="form-group">
                    <label for="desc">Description:</label>
                    <input type="text" style="height:100px" name="description" class="form-control">
                    <small><?php echo form_error('description')  ?></small>
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

