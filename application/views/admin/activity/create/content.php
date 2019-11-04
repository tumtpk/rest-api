<div class="container">
    <div class="row">
        <div class="col-md-12 text-right">
            <button class="btn btn-success" id="logout">logout</button>
        </div>
    </div>
    <h1>เพิ่มกิจกรรม</h1>

    <div class="row">
        <div class="col-md-6">
            <form id="form">
                <div class="form-group">
                    <label>ชื่อกิจกรรม</label>
                    <input type="text" class="form-control" name="activity_name" placeholder="ชื่อกิจกรรม" required>
                </div>
                <div class="form-group">
                    <label>วันที่เริ่มกิจกรรม</label>
                    <input type="text" class="form-control" name="start_date" id="start_date"
                        placeholder="วันที่เริ่มกิจกรรม" required>
                </div>
                <div class="form-group">
                    <label>วันที่สิ้นสุดกิจกรรม</label>
                    <input type="text" class="form-control" name="end_date" id="end_date"
                        placeholder="วันที่สิ้นสุดกิจกรรม" required>
                </div>

                <button type="submit" class="btn btn-success">บันทึก</button>
            </form>
        </div>
    </div>
</div>