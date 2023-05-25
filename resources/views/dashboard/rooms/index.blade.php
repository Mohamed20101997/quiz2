@extends('layouts.dashboard.app')

@section('content')

    <h1>الغرف</h1>

    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('welcome') }}">الصفحه الرئيسيه </a></li>
        <li class="breadcrumb-item" active>الغرف</li>
    </ul>


    <div class="row">
        <div class="col-md-12">

            <div class="tile mb-4">
                <div class="col-md-8 mb-4">
                    <a href="{{ route('room.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i></a>
                </div> <!-- end of col 12 -->
                <div class="row">
                    <div class="col-md-12">
                        @if ($rooms->count() > 0)
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>رقم الغرفة</th>
                                        <th>الامتحان</th>

                                        <th>الإجراءات</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    @foreach ($rooms as $index=>$room)
                                        <tr>
                                            <td>{{ $index+1 }}</td>
                                            <td>{{$room->password}}</td>
                                            <td>{{$room->exam->title}}</td>


                                            <td>
                                                <a href="{{ route('room.edit', $room->id) }}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                                                <form method="post" action={{ route('room.destroy', $room->id)}} style="display:inline-block">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-danger btn-sm delete"><i class="fa fa-trash"></i></button>
                                                </form> <!-- end of form -->
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            {{ $rooms->appends(request()->query())->links() }}

                        @else
                            <h3 class="alert alert-info text-center d-flex justify-content-center" style="margin: 0 auto; font-weight: 400"><i class="fa fa-exclamation-triangle"></i> لا يوجد اي بيانات للعرض</h3>
                        @endif
                    </div> <!-- end of col-md-12 -->
                </div> <!-- end of row -->

            </div> <!-- end of tile -->

        </div> {{-- end of col  --}}
    </div> {{-- end of row  --}}
@endsection
