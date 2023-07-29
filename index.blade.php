@extends('layout.base')
@section('page_title', 'List of grades for the subject: '.$rec->name)
@section('slot')
<div class="card">
    <div class="card-body px-0 pb-2">
        <div class="table-responsive p-0">
            <table class="table align-items-center mb-0">
                <thead>
                    <tr>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Full Name Student</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Student ID</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">component point 1</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">component point 2</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">point process</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">final point</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">summary point</th>
                        <th class="text-secondary opacity-7"></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($rows as $row)
                    <tr>
                        <td class="text-xs">{{$row->student->user->name}}</td>
                        <td class="text-xs">{{$row->student->code}}</td>
                        <td class="text-xs">{{$row->tp1}}</td>
                        <td class="text-xs">{{$row->tp2}}</td>
                        <td class="text-xs">{{$row->qt}}</td>
                        <td class="text-xs">{{$row->ck}}</td>
                        <td class="text-xs">{{$row->tk}}</td>
                        <td class="align-middle">
                            <a class="text-secondary font-weight-bold text-xs"
                                href="{{route('scores.edit', ['id' => $row->id])}}">Change</a> | 
                            <a class="text-secondary font-weight-bold text-xs"
                                href="{{route('scores.delete', ['id' => $row->id])}}">Delete</a>
                        </td>
                    </tr>
                    @empty
                    <tr><td class="align-middle text-secondary font-weight-bold text-xs">No data</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@stop