@extends('layouts.app') @section('title', 'เอกสาร') @section('content')

@section('style')
<link href="{{ URL::asset('css/bootstrap-datepicker3.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

<div id="app">
    <div class="card mb-3">
        <div class="card-header">
            <div class="pull-right">
                <a href="#" data-href="{{ url('document/form/0') }}" data-modal-name="ajaxModal" role="button" class="btn btn-dark btn-create">
                    เพิ่มข้อมูล
                </a>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-hover" id="document-table">
                <thead>
                    <tr>
                        <th scope="col">รหัสเอกสาร</th>
                        <th scope="col">เอกสาร</th>
                        <th scope="col">หมวดหมู่</th>
                        <th scope="col">สถานะ</th>
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
@include('layouts.large_modal')

@endsection @section('script')
<script src="{{ asset('js/document.min.js') }}"></script>
@endsection
