@extends('layout.base')
@section('page_title', isset($rec) ? 'update student information: '.$rec->name : 'Add student')
@section('slot')
<form id="form" class="text-start" method="POST"
    action="{{isset($rec) ? route('students.update', ['id' => $rec->id]) : route('students.create')}}">
    {{ csrf_field() }}
    <label class="form-label mt-3">Full Name *</label>
    <div class="input-group input-group-outline">
        <input type="text" name="name" class="form-control" required value="{{$rec->name ?? old('name') ?? ''}}">
    </div>

    <label class="form-label mt-3">Student Username *</label>
    <div class="input-group input-group-outline">
        <input type="text" name="code" class="form-control" required value="{{$rec->profile->code ?? old('code') ?? ''}}">
    </div>

    <label class="form-label mt-3">Date Of birth *</label>
    <div class="input-group input-group-outline">
        <input type="date" name="dob" class="form-control" required value="{{date('Y-m-d', strtotime($rec->profile->dob ?? old('dob') ?? ''))}}">
    </div>

    <label class="form-label mt-3">Email *</label>
    <div class="input-group input-group-outline">
        <input type="email" name="email" class="form-control" required value="{{$rec->email ?? old('email') ?? ''}}">
    </div>

    <label class="form-label mt-3">Password {{isset($rec) ? '' : '*'}}</label>
    <div class="input-group input-group-outline">
        <input type="password" name="password" class="form-control input-outline" {{isset($rec) ? '' : 'required'}}>
    </div>

    <label class="form-label mt-3">Class *</label>
    <select name="class_id" class="form-select px-3 rounded-lg" required value="{{$rec->class_id ?? old('class_id') ?? ''}}">
        @foreach($classes as $class)
        <option value="{{$class->id}}"   {{ isset($rec) && $rec->profile->class_id == $class->id ? 'selected' : '' }}>
            {{$class->name}}

        </option>
        @endforeach
    </select>
    <input type="submit" class="btn bg-gradient-primary my-4 mb-2" value="{{ isset($rec) ? 'update' : 'Submit'}}">
</form>
@stop
