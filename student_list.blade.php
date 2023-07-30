@extends('layout.base')
@section('page_title', 'List of students in class: '.$rec->name)
@section('slot')
<div class="card">
    <div class="card-body px-0 pb-2">
        <div class="table-responsive p-0">
            <table class="table align-items-center mb-0">
                <thead>
                    <tr>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">student name</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Student ID</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">DOB</th>
                        <th class="text-secondary opacity-7"></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($rec->students as $row)
                    <tr>
                        <td class="text-xs">{{$row->user->name}}</td>
                        <td class="text-xs">{{$row->code}}</td>
                        <td class="text-xs">{{date('d/m/Y', strtotime($row->dob))}}</td>
                        <td class="align-middle">
                            @if(in_array(auth()->user()->role, ['teacher']))
                            <a class="text-secondary font-weight-bold text-xs"
                                href="{{route('students.edit', ['id' => $row->user->id])}}">Change</a> |
                            <a class="text-secondary font-weight-bold text-xs" href="{{route('students.delete', ['id' => $row->user->id])}}">Delete</a>

                            @endif
                        </td>
                    </tr>
                    @empty
                    <tr><td class="align-middle text-secondary font-weight-bold text-xs"> no data discovery</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@stop
