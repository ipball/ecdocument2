@extends('layouts.app') @section('title', 'หมวดหมู่เอกสาร') @section('content')
<div id="app">
    <div class="card mb-3">
        <div class="card-header">
            <div class="pull-right">
                <a href="#" role="button" class="btn btn-dark btn-create" data-toggle="modal" data-target="#ajaxLargeModal">
                    เพิ่มข้อมูล
                </a>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-hover" id="categorie-table">
                <thead>
                    <tr>
                        <th scope="col">ชื่อหมวดหมู่เอกสาร</th>
                        <th scope="col" style="width: 200px;">ดำเนินการ</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>
    @include('categorie.partials.form')
</div>
@endsection @section('script')
<script src="{{ asset('js/categorie.min.js') }}"></script>
@endsection
