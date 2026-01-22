<div class="container">
    <div class="row mt-12 mb-12">
        <div class="col-md-20">
            <div class="card">
                <div class="card-header">
                    <h3>Ticket Module <a href="<?php echo base_url('raise_ticket');?>" class="btn btn-warning float-right">Raise Tickets</a> <a href=" <?php echo base_url('homepage');?>" class="btn btn-success float-right mr-2">Home</a> </h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table table-responsive">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Comments</th>
                                <th>Priority</th>
                                <th>Status</th>
                                <th>Created On</th>
                                <th>Modified On</th>
                                <th>Action</th>


                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($tickets as $row){?>
                            <tr>
                                <td><?php echo $row->id ?></td>
                                <td class="text-nowrap"><?php echo $row->title ?></td>
                                <td ><?php echo $row->description ?></td>
                                <td><?php echo $row->comments ?></td>
                                <td><?php echo $row->priority ?></td>
                                <td><?php echo $row->status ?></td>
                                <td class="text-nowrap"><?php echo $row->created_at ?></td>
                                <td class="text-nowrap"><?php echo $row->updated_at ?></td>

                                <?php if($role=='admin'): ?>
                                <td><a href="<?php echo base_url('ticket/edit/'.$row->id)?>" class="btn btn-primary mt-2 mb-2 form-control">Edit</a>
                                    <a href="<?php echo base_url('ticket/delete/'.$row->id)?>" class="btn btn-danger mt-2 mb-2 form-control">Delete</a>
                                </td>
                                <?php endif;?>

                                <?php if($role=='user'): ?>
                                <td>
                                    <p>Access Denied</p>
                                </td>
                                <?php endif;?>



                            </tr>
                            <?php }?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>