<div class="card">
    <div class="card-header">
        <h3>Contact Us</h3>
    </div>
    <div class="card-body">
        <form method="POST" action="/users">
            <div class="form-group">
                    <label for="">Name</label>
                    <input type="text" name="name" placeholder="Your full name." class="form-control">
            </div>
            <div class="form-group">
                <label for="">Email</label>
                <input name="email" type="email" placeholder="Email address." class="form-control">
            </div>
            <div class="form-group">
                <label for="">Phone</label>
                <input name="mobile" type="text" placeholder="Mobile Number" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Country</label>
                <select name="country" id="" class="form-control">
                    <option value="">Please select your country</option>
                    <?php
                        foreach($countries as $country){
                                echo '<option value="'.$country->id.'">'.$country->country.'</option>';
                            }
                    ?>
                    
                </select>
            </div>
            <div class="form-group">
                <label for="">Active</label>
                <select name="active" id="" class="form-control">
                    <option value="">Please choose and option</option>
                    <option value="Y">Yes</option>
                    <option value="N">No</option>
                </select>
            </div>
            <button name="create" type="submit" class="btn btn-success mt-2">Create new user</button>
        </form>
    </div>
</div>