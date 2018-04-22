<table id="table_1" class="table table-bordered table-hover">
  <thead>
  <tr>
    <th>Num</th>
    <th>Code</th>
    <th>Name</th>
    <th>Description</th>
    <th>Action</th>
  </tr>
  </thead>
  <tbody>                
  <?php $i = 1; ?>
  <?php foreach($Subjects as $Subject): ?> 
    <tr>
      <td><?= $i; ?></td>
      <td><?= $Subject['code'];?></td>
      <td><?= $Subject['name'];?></td>
      <td><?= $Subject['description'];?></td>
      <td>
        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-edit" data-id="<?= $Subject['id'];?>">
          <i class="glyphicon glyphicon-eye-open"></i>
          <span> Lihat</span>
        </button>

        <a class="btn btn-primary" href="<?= base_url('staff/subject/update/') . $Subject['id'];?>">
          <i class="glyphicon glyphicon-pencil" ></i>
          <span> Ubah</span>
        </a>
        <a class="btn btn-danger _delete_" data-toggle="modal" data-target="#modal-delete" data-id="<?= $Subject['id'];?>">
          <i class="glyphicon glyphicon-remove"></i>
          <span> Hapus</span>
        </a>

      </td>
    </tr>
  <?php endforeach; ?>
  </tbody>
</table>