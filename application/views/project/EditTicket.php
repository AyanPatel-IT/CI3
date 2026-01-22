

<div class="container">
    <div class="row">
        <div class="col-md-12 mt-4">
            <div class="card">
                <div class="card-header">
                    <h4>Update Ticket Status 
                    <a href="<?php echo base_url('tickets')?>" class="btn btn-danger float-right">Back</a></h4>
                </div>
                <div class="card-body">
                    <form action="<?php echo base_url('ticket/update/'.$ticket->id)?>" method="POST">
                        <div class="form-group">
                    <label for="ID">ID:</label>
                    <p class="form-control" ><?php echo $ticket->id; ?></p>
                    <!-- <input type="text" name="id" value="<?php echo $ticket->id; ?>" class="form-control"> -->
                    <!-- <small><?php echo form_error('id')  ?></small> -->
                </div>   
                    
                          <div class="form-group">
                    <label for="title">Title:</label>
                    <p class="form-control" ><?php echo $ticket->title; ?></p>
                    <!-- <input type="text" name="title" value="<?php echo $ticket->title; ?>" class="form-control"> -->
                    <!-- <small><?php echo form_error('lname')  ?></small> -->

                </div>  

                          <div class="form-group">
                    <label for="description">Description:</label>
                    <p class="form-control" ><?php echo $ticket->description; ?></p>
                   
                    <!-- <input type="text" name="description" value="<?php echo $ticket->description; ?>" class="form-control"> -->
                    <!-- <small><?php echo form_error('phone')  ?></small> -->

                </div>

                          <div class="form-group">
                    <label for="comments">Add Comments:</label>                   
                    <input type="text" name="comments" value="<?= $ticket->comments;?>" class="form-control">
                    <!-- <small><?php echo form_error('phone')  ?></small> -->

                </div>

                <div class="form-group">
                    <label for="priority">Priority:</label>
                    <select name="priority" id="priority" class="form-select form-control">
                        <option value="High" <?= $ticket->priority== 'High' ? 'selected':'' ?> >High</option>
                        <option value="Medium" <?= $ticket->priority== 'Medium' ? 'selected':'' ?>>Medium</option>
                        <option value="Low"<?= $ticket->priority== 'Low' ? 'selected':'' ?>>Low</option>
                    </select>                    
                    <!-- <small><?php echo form_error('phone')  ?></small> -->

                </div>

                <div class="form-group">
                    <label for="status">Status:</label>
                    <select name="status" id="status" class="form-select form-control" value="<?php echo $ticket->status; ?>">
                        <option value="Open" <?= $ticket->status=='Open' ? 'selected':''?>>Open</option>
                        <option value="Solved" <?= $ticket->status=='Solved' ? 'selected':''?>>Solved</option>
                        <option value="Closed" <?= $ticket->status=='Closed' ? 'selected':''?>>Closed</option>
                    </select>                      
                    <!-- <small><?php echo form_error('phone')  ?></small> -->

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

