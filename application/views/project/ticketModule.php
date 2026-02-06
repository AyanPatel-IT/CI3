<div class="container ">
  <div class="row mt-12 mb-12">
    <div class="col-md-20">
      <div class="card">
        <div class="card-header">
          <h3>Ticket Module <a href="<?php echo base_url('raiseTicket'); ?>" class="btn btn-warning float-right">Raise Tickets</a> <a href=" <?php echo base_url('homepage'); ?>" class="btn btn-success float-right mr-2">Home</a> </h3>
        </div>
        <div>

        </div>
        <div class="card-body">
          <table class="table table-bordered table table-responsive">
            <form action="<?= base_url('tickets') ?>" method="get">
              <div><label for="">Filter: </label>
                <select name="filterStatus" id="filterStatus" class="">
                  <option value="" disabled selected hidden>Select Status</option>
                  <option value="Open" <?= $status == 'Open' ? 'selected' : '' ?>>Open</option>
                  <option value="Solved" <?= $status == 'Solved' ? 'selected' : '' ?>>Solved</option>
                  <option value="Closed" <?= $status == 'Closed' ? 'selected' : '' ?>>Closed</option>
                </select>

                <!-- <div><label for=""><b>Priority</b> </label> -->
                  <select name="filterPriority" id="filterPriority" class="">
                    <option value="" disabled selected hidden>Select Priority</option>
                    <option value="High" <?= $priority == 'High' ? 'selected' : '' ?>>High</option>
                    <option value="Medium" <?= $priority == 'Medium' ? 'selected' : '' ?>>Medium</option>
                    <option value="Low" <?= $priority == 'Low' ? 'selected' : '' ?>>Low</option>
                  </select>

                  <input type="text" placeholder="Search" name="searchbar">
                  <button type="submit" class="btn btn-success">Filter</button>
                  <a href="<?php echo base_url('tickets/resetFilters') ?>" class="btn btn-danger ">Reset</a>
                </div>
            </form>
            <thead>
              <tr>

                <th>ID</th>
                <th>Title</th>
                <th>Description</th>
                <th>Comments</th>
                <th>Priority</th>
                <th>Status</th>
                <th class="text-nowrap">Assigned To</th>
                <th>Created On</th>
                <th>Modified On</th>
                <th>Action</th>

              </tr>
            </thead>
            <tbody>
              <?php foreach ($tickets as $row): ?>

                <tr>
                  <td><?= $row->id ?></td>
                  <td class="text-nowrap"><?= $row->title ?></td>
                  <td><?= $row->description ?></td>
                  <td><?= $row->comments ?></td>
                  <td><?= $row->priority ?></td>
                  <td><?= $row->status ?></td>
                  <td class="text-nowrap">

                    <?php foreach ($fetchName as $row1): ?>
                      <?php if ($row->user_id == $row1->id) {
                        echo $row1->name;
                      } ?>
                    <?php endforeach; ?>
                  </td>
                  <td class="text-nowrap"><?= $row->created_at ?></td>
                  <td class="text-nowrap"><?= $row->updated_at ?></td>

                             
                  <td><a href="<?php echo base_url('ticket/edit/' . $row->id) ?>" class="btn btn-primary mt-2 mb-2 form-control">Edit</a>
                    <a href="<?php echo base_url('ticket/delete/' . $row->id) ?>" class="btn btn-danger mt-2 mb-2 form-control">Delete</a>
                  </td>

                </tr>
                <?php ?>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>