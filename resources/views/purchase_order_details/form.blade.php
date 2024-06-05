<?php
$action = (@$row) ? CRUDBooster::mainpath("edit-save/$row->id") : CRUDBooster::mainpath("add-save");
$return_url = ($return_url) ?: g('return_url');
?>
<form class='form-{{ $form_direction }} mb-3' method='post' id="form" enctype="multipart/form-data" action='{{$action}}'>
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type='hidden' name='return_url' value='{{ url()->full() }}'/>
    <input type='hidden' name='ref_mainpath' value='{{ CRUDBooster::mainpath() }}'/>
    <input type='hidden' name='ref_parameter' value='{{urldecode(http_build_query(@$_GET))}}'/>
    @if($hide_form)
        <input type="hidden" name="hide_form" value='{!! serialize($hide_form) !!}'>
    @endif
    <div class="box-body" id="parent-form-area">

        @if($command == 'detail')
            @include("crudbooster::default.form_detail")
        @else
            @include("crudbooster::default.form_body")
        @endif
    </div><!-- /.box-body -->

    <div class="box-body" style="border-bottom: 1px solid #EEEEEE">

        <div class="">
            {{-- <label class="control-label col-sm-2"></label> --}}
            <div class="col-sm-10">
                @if(CRUDBooster::isCreate() || CRUDBooster::isUpdate())

                    @if(CRUDBooster::isCreate() && $button_addmore==TRUE && $command == 'add')
                        <input type="submit" name="submit" value='{{cbLang("button_save_more")}}' class='btn btn-success'>
                    @endif

                    @if($button_save && $command != 'detail')
                        <input type="submit" name="submit" value='Simpan Barang' class='btn btn-success'>
                    @endif

                @endif
            </div>
        </div>


    </div><!-- /.box-footer-->

</form>