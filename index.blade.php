@extends('layout.base')
@section('page_title', 'Class list')
@section('slot')
<div class="card">
    <div class="card-body px-0 pb-2">
        <div class="table-responsive p-0">
            <table class="table align-items-center mb-0">
                <thead>
                    <tr>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">class name</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Number of student</th>
                        <th class="text-secondary opacity-7"></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($rows as $row)
                    <tr>
                        <td class="text-xs">{{$row->name}}</td>
                        <td class="text-xs">{{$row->students->count()}}</td>
                        <td class="align-middle">
                            <a class="text-secondary font-weight-bold text-xs"
                                href="{{route('classes.view', ['id' => $row->id])}}">List</a> |
                            <a class="text-secondary font-weight-bold text-xs"
                                href="{{route('classes.edit', ['id' => $row->id])}}">Change</a> |
                            <a class="text-secondary font-weight-bold text-xs"
                                href="{{route('classes.delete', ['id' => $row->id])}}">Delete</a>
                        </td>
                    </tr>
                    @empty
                    <tr><td colspan='3' class="align-middle text-secondary font-weight-bold text-xs">no data discovery</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@stop
