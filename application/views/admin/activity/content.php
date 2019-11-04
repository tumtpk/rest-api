<div class="container">
    <div class="row">
        <div class="col-md-12 text-right">
            <button class="btn btn-success" id="logout">logout</button>
        </div>
    </div>
    <h1>Admin</h1>

    <div class="row">
        <form id="form-search">
            <div class="col-lg-10">
                <div class="input-group">
                    <input type="text" name="search" id="search" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="submit">ค้นหา</button>
                    </span>
                </div>
            </div>
        </form>
        <div class="col-lg-2">
            <a href="<?php echo base_url("admin/dashboard/create") ?>" type="button"
                class="btn btn-primary btn-block"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                เพิ่มกิจกรรม</a>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-12">
            <table id="example" class="table table-striped table-bordered nowrap" style="width:100%">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>activity name</th>
                        <th>start date</th>
                        <th>end date</th>
                        <th></th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>