@if($errors->any())
    <div class="alert alert-warning alert-dismissible" role="alert">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        <h3>เกิดข้อผิดพลาด</h3>
        <ul>
        @foreach ($errors->all() as $error)
            <li>{!! $error !!}</li>
        @endforeach
        </ul>
    </div>
@endif

<form class="my-4" action="/tasks" method="POST">
    @csrf
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="type">ประเภทงาน</label>
            <select name="type" id="type" class="form-control">
                <option value="" selected>เลือกซิจ๊ะ...</option>
                <option value="1" {{ old( 'type' ) == 1 ? selected : '' }}>งานคณะฯ</option>
                <option value="2" {{ old( 'type' ) == 2 ? selected : '' }}>งานตามชื่อตำแหน่ง</option>
                <option value="3" {{ old( 'type' ) == 3 ? selected : '' }}>งานที่ได้รับมอบหมาย</option>
                <option value="4" {{ old( 'type' ) == 4 ? selected : '' }}>งานเพื่อส่วนรวม</option>
            </select>
        </div>

        <div class="form-group col-md-6">
            <label for="name">ชื่องาน</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old( 'name' ) }}">
        </div>
    </div>

    <div class="form-group">
        <label for="detail">รายละเอียดงาน</label>
        <textarea class="form-control" name="detail" id="detail"></textarea>
    </div>

    <div class="form-group">
        <div class="form-check">
            <input class="form-check-input" type="checkbox" id="status" name="status">
            <label for="status" class="form-check-label">Completed</label>
        </div>
    </div>

    <button type="submit" class="btn btn-primary">Create</button>
</form>