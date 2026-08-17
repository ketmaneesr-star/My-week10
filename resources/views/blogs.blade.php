@extends('layout')

@section('title', 'บทความ')

@section('content')
    <h2 class="text-center my-5">
        บทความทั้งหมด</h2>
    <table class="table table-bordered text-center">
        <thead>
            <tr>
                <th scope="col">หัวข้อ</th>
                <th scope="col">รายละเอียด</th>
                <th scope="col">สถานะ</th>
                <th scope="col">จัดการ</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($blogs as $item)
                <tr>
                    <td>{{ $item->title }}</td>
                    <td>{{Str::limit($item->content, 10) }}</td>
                    <td>
                        @if ($item->status)
                            <span class="btn btn-danger">ไม่เผยแพร่</span>
                        @else
                            <span class="btn btn-success">เผยแพร่</span>
                        @endif
                    </td>
                    <td><a href="/blogs/delete/{{ $item->id }}" class="btn btn-danger"
                            onclick="return confirm('คุณต้องการลบบทความนี้จริงหรือไม่?')">ลบ</a></td>

                </tr>
            @endforeach
        </tbody>

    </table>
@endsection
