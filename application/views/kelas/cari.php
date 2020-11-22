                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th width="3%">No</th>
                                    <th width="50%">Nama Kelas</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i =1;?>
                                <?php foreach($kelas as $row){?> 
                                    <tr>
                                        <td><?= $i;?></td>
                                        <td><?= $row["namakelas"];?></td>
                                        <td>
                                            <a class="btn btn-warning">Edit</a>
                                            <a class="btn btn-danger">Hapus</a>
                                        </td>
                                    </tr>
                                <?php $i++; ?>
                                <?php } ?>                   
                            </tbody>
                        </table>