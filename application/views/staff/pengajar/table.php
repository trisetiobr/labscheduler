<table id="table" class="table table-bordered table-hover">
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
        <button type="button" class="btn btn-info btn-href" href="<?= base_url('staff/pengajar/detail/') . $staff['id'];?>">
          <i class="glyphicon glyphicon-eye-open"></i>
          <span> Lihat</span>
        </button>
        <?php if($role == 'admin' && $staff['id'] != $id): ?>
            <button type="button" class="btn btn-warning btn-href" href="<?= base_url('staff/pengajar/update/') . $staff['id'];?>">
              <i class="glyphicon glyphicon-pencil" ></i>
              <span> Ubah</span>
            </button>
            <button type="button" class="btn btn-danger btn-href" href="<?= base_url('staff/pengajar/delete/') . $staff['id'];?>">
              <i class="glyphicon glyphicon-remove"></i>
              <span> Hapus</span>
            </button>
        <?php else: ?>
            <button type="button" class="btn disabled">
              <i class="glyphicon glyphicon-pencil"></i>
              <span> Ubah</span>
            </button>
            <button type="button" class="btn disabled">
              <i class="glyphicon glyphicon-remove"></i>
              <span> Hapus</span>
            </button>
        <?php endif; ?>
      </td>
    </tr>
  <?php endforeach; ?>
  </tbody>
</table>