<div class="container">
    <div class="card mt-2 mb-4">
        <div class="card-header">
            All Users
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Mobile</th>
                        <th scope="col">Country</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $i = 0;
                            foreach($users as $customer){
                                echo '
                                    <tr>
                                        <th scope="row">'.++$i.'</th>
                                        <td>'.$customer->name.'</td>
                                        <td>'.$customer->email.'</td>
                                        <td>'.$customer->mobile.'</td>
    
                                        <td>
                                            <a hred="" class="btn btn-sm btn-primary">Edit</a>
                                            <a hred="" class="btn btn-sm btn-danger">Delete</a>
                                        </td>
                                    </tr>
                                ';
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>