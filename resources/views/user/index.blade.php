@extends('layouts.app') @section('title', 'ผู้ใช้งาน') @section('content')
<div id="app">
    <div class="card mb-3">
        <div class="card-header">
            <div class="pull-right">
                <a href="#" data-href="{{ url('user/form/0') }}" data-modal-name="ajaxModal" role="button" class="btn btn-dark btn-create">
                    เพิ่มข้อมูล
                </a>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-hover" id="user-table">
                <thead>
                    <tr>
                        <th scope="col">Username</th>
                        <th scope="col">อีเมล์</th>
                        <th scope="col">ชื่อ</th>
                        <th scope="col">แผนก</th>
                        <th scope="col">ประเภท</th>
                        <th scope="col" style="width: 200px;">ดำเนินการ</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>    
</div>

{{-- ajax model --}}
@include('layouts.modal')

@endsection @section('script')
<script src="{{ asset('js/user.min.js') }}"></script>
@endsection
