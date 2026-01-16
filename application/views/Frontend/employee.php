

<div class="container">
    <div class="row">
        <div class="col-md-12 mt-4">
            <div class="card">
                <div class="card-header">
                    <h4>How to insert data into database
                    <a href="<?php echo base_url('employee/add')?>" class="btn btn-primary float-end">Add Employee</a></h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Phone No</th>
                                <th>Email</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            foreach($employee as $row){ ?>

                            <tr>
                                <td><?php echo $row->id; ?></td>
                                <td><?php echo $row->fname; ?></td>
                                <td><?php echo $row->lname; ?></td>
                                <td><?php echo $row->phone; ?></td>
                                <td><?php echo $row->email; ?></td>
                                <td>
                                    <a href="<?php echo base_url('employee/edit/'.$row->id); ?>" class="btn btn-primary">Edit</a>
                                    <a href="<?php echo base_url('employee/delete/'.$row->id); ?>" class="btn btn-danger">Delete</a>

                                    </td>
                            </tr>

                            <?php  } ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

