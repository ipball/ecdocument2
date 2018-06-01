@extends('layouts.app') @section('title', 'รายการเอกสาร') @section('content')

<div id="app">
    <div class="card mb-3">        
        <div class="card-body">
            <table class="table table-bordered table-hover" id="document-tbview">
                <thead>
                    <tr>
                        <th scope="col">รหัสเอกสาร</th>
                        <th scope="col">เอกสาร</th>
                        <th scope="col">หมวดหมู่</th>
                        <th scope="col">สถานะ</th>                        
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
