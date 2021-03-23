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

@if ( isset($task) )
    <form class="my-4" action="{{ url('/task', $task->id) }}" method="POST">
        <input type="hidden" name="_method" value="PUT">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
@else
    <form class="my-4" action="/tasks" method="POST">
@endif
    @csrf
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="type">ประเภทงาน</label>
            <select name="type" id="type" class="form-control">
                <option value="" selected>เลือกซิจ๊ะ...</option>
                <?php $types = ( new \App\Models\Task() )->getTypes(); ?>
                @foreach($types as $id => $label)
                    @if( $id > 0 )
                        @if ( isset($task) ? $task->type : '') 
                            @if ( old('type', $task->type) == $id )
                                <option value="{{ $id }}" selected>{{ $label }}</option>
                            @else
                                <option value="{{ $id }}">{{ $label }}</option>
                            @endif
                        @else
                            <option value="{{ $id }}">{{ $label }}</option>
                        @endif
                    @endif
                @endforeach
                {{-- <option value="" selected>เลือกซิจ๊ะ...</option>
                <option value="1" {{ old( 'type' ) == 1 ? selected : '' }}>งานคณะฯ</option>
                <option value="2" {{ old( 'type' ) == 2 ? selected : '' }}>งานตามชื่อตำแหน่ง</option>
                <option value="3" {{ old( 'type' ) == 3 ? selected : '' }}>งานที่ได้รับมอบหมาย</option>
                <option value="4" {{ old( 'type' ) == 4 ? selected : '' }}>งานเพื่อส่วนรวม</option> --}}
            </select>
        </div>

        <div class="form-group col-md-6">
            <label for="name">ชื่องาน</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old( 'name', isset($task) ? $task->name : '' ) }}">
        </div>
    </div>

    <div class="form-group">
        <label for="detail">รายละเอียดงาน</label>
        <textarea class="form-control" name="detail" id="detail">{{ old( 'detail', isset($task) ? $task->detail : '' ) }}</textarea>
    </div>

    <div class="form-group">
        <div class="form-check">
            @if ( isset($task) )
                @if( $task->status )
                    <input class="form-check-input" type="checkbox" id="status" name="status" checked>
                @endif
            @else
                <input class="form-check-input" type="checkbox" id="status" name="status">
            @endif

            <label for="status" class="form-check-label">Completed</label>
        </div>
    </div>
    @if ( !isset($task) )
        <button type="submit" class="btn btn-primary">Create</button>
    @else
        <button type="submit" class="btn btn-primary">Update</button>
    @endif
</form>