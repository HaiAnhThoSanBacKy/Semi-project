@extends('layout.base')
@section('page_title', 'Grades for the semester: '.$rec)
@section('slot')
<div class="card">
    <div class="card-body px-0 pb-2">
        <div class="table-responsive p-0">
            <table class="table align-items-center mb-0">
                <thead>
                    <tr>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Full Name</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Class</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Student ID</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Name Subject</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Subject ID</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Component score 1</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Component score 2</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Point process</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Final grade</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">summary</th>
                        <th class="text-secondary opacity-7"></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($rows as $row)
                    <tr>
                        <td class="text-xs">{{$row->student->user->name}}</td>
                        <td class="text-xs">{{$row->student->class->name}}</td>
                        <td class="text-xs">{{$row->student->code}}</td>
                        <td class="text-xs">{{$row->subject->name}}</td>
                        <td class="text-xs">{{$row->subject->code}}</td>
                        <td class="text-xs">{{$row->tp1}}</td>
                        <td class="text-xs">{{$row->tp2}}</td>
                        <td class="text-xs">{{$row->qt}}</td>
                        <td class="text-xs">{{$row->ck}}</td>
                        <td class="text-xs">{{$row->tk}}</td>
                        <td class="align-middle">
                            @if(in_array(auth()->user()->role, ['student']))
                            <a class="text-secondary font-weight-bold text-xs"
                                href="{{route('scores.request_edit.add', ['id' => $row->id])}}">Request edit scores</a>
                            @endif
                            @if(in_array(auth()->user()->role, ['teacher']))
                            <a class="text-secondary font-weight-bold text-xs"
                                href="{{route('scores.edit', ['id' => $row->id])}}">Change</a> |
                            <a class="text-secondary font-weight-bold text-xs"
                                href="{{route('scores.delete', ['id' => $row->id])}}">Delete</a>
                            @endif
                        </td>
                    </tr>
                    @empty
                    <tr><td class="align-middle text-secondary font-weight-bold text-xs">No Data</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@stop
