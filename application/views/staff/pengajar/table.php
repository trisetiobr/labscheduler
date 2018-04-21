<table id="table_1" class="table table-bordered table-hover">
  <thead>
  <tr>
    <th>Username</th>
    <th>Nama</th>
    <th>Email</th>
    <th>Phone</th>
    <th>Role</th>
    <th>Action</th>
  </tr>
  </thead>
  <tbody>                
  <?php foreach($staffs as $staff): ?> 
    <tr>
      <td><?= $staff['id'];?></td>
      <td><?= $staff['name'];?></td>
      <td><?= $staff['email'];?></td>
      <td><?= $staff['phone'];?></td>
      <td><?= $staff['role'];?></td>
      <td>
        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-edit" data-id="<?= $staff['id'];?>">
          <i class="glyphicon glyphicon-eye-open"></i>
          <span> Lihat</span>
        </button>

        <a class="btn btn-primary" href="<?= base_url('staff/pengajar/update/') . $staff['id'];?>">
          <i class="glyphicon glyphicon-pencil" ></i>
          <span> Ubah</span>
        </a>
        <a class="btn btn-danger _delete_" data-toggle="modal" data-target="#modal-delete" data-id="<?= $staff['id'];?>">
          <i class="glyphicon glyphicon-remove"></i>
          <span> Hapus</span>
        </a>

      </td>
    </tr>
  <?php endforeach; ?>
  </tbody>
</table>