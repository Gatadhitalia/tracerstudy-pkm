<!-- First you need to extend the CB layout -->
@extends('crudbooster::admin_template')
@push('head')
    <style>
        .form-vertical>#parent-form-area {
            display: flex;
            flex-wrap: wrap;
        }

        .form-vertical>#parent-form-area>.form-group {
            flex-basis: 50%;
            padding-left: 10px;
            padding-right: 10px;
            margin-bottom: 0px;
        }

        .form-vertical {
            margin-bottom: 15px;
        }
    </style>
@endpush
@section('content')
    <p><a href="{{ g('return_url', '/admin/purchase_orders') }}"><i class="fa fa-chevron-circle-left"></i>
            &nbsp; Back To Transaksi Purchase Order</a></p>
    <div class="box box-default">
        <div class="box-body table-responsive no-padding">
            <table class="table table-bordered">
                <tbody>
                    <tr class="active">
                        <td colspan="2"><strong><i class="fa fa-bars"></i> Detail</strong></td>
                    </tr>
                    <tr>
                        <td width="25%"><strong>
                                Nomor PO
                            </strong></td>
                        <td>{{ $parent->po_number }}</td>
                    </tr>
                    <tr>
                        <td width="25%"><strong>
                                Tanggal Expired
                            </strong></td>
                        <td> {{ date('d F Y', strtotime($parent->due_date)) }}</td>
                    </tr>
                    <tr>
                        <td width="25%"><strong>
                                Total
                            </strong></td>
                        <td> {{ number_format($parent->total, 0, ',', '.') }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="box">
        <div class="box-body table-responsive no-padding">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="true">Daftar Pembelian Barang</a>
                    </li>
                    <li class=""><a href="#tab_2" data-toggle="tab" aria-expanded="true">Penerimaan</a></li>
                    <li class=""><a href="#tab_3" data-toggle="tab" aria-expanded="true">Faktur Pajak</a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="tab_1">
                        @include('purchase_order_details.form')
                        <table id="table_dashboard" class="table table-hover table-striped table-bordered">
                            <thead>
                                <tr class="active">
                                    <th width="auto">Created at</th>
                                    <th width="auto">Nama Produk</th>
                                    <th width="auto">Harga</th>
                                    <th width="auto">Jumlah</th>
                                    <th width="auto">Tipe Diskon</th>
                                    <th width="auto">Nilai Diskon</th>
                                    <th width="auto">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($results as $result)
                                    <tr>
                                        <td>{{ $result->created_at }}</td>
                                        <td>{{ $result->product_name }}</td>
                                        <td>{{ number_format($result->price, 0, ',', '.') }}</td>
                                        <td>{{ number_format($result->quantity, 0, ',', '.') }}</td>
                                        <td>{{ $result->discount_type ?: '-' }}</td>
                                        <td>{{ $result->discount_value ? number_format($result->discount_value, 0, ',', '.') : '-' }}
                                        </td>
                                        <td>{{ number_format($result->total, 0, ',', '.') }}</td>
                                    </tr>
                                @empty
                                    <tr class="warning">
                                        <td colspan="7" align="center">
                                            <i class="fa fa-search"></i> No Data Avaliable
                                        </td>
                                    </tr>
                                @endforelse

                            </tbody>
                            <tfoot>
                                <tr>
                                <tr class="active">
                                    <th width="auto">Created at</th>
                                    <th width="auto">Nama Produk</th>
                                    <th width="auto">Harga</th>
                                    <th width="auto">Jumlah</th>
                                    <th width="auto">Tipe Diskon</th>
                                    <th width="auto">Nilai Diskon</th>
                                    <th width="auto">Total</th>
                                </tr>
                                </tr>
                            </tfoot>
                        </table>

                        <!-- ADD A PAGINATION -->
                        <p>{!! urldecode(str_replace('/?', '?', $results->appends(Request::all())->render())) !!}</p>

                        <div style="display: flex;align-items: end;flex-direction: column;">
                            <table style="width: 100%">
                                <tbody>
                                    <tr>
                                        <td style="width: 80%" align="right">Total Harga</td>
                                        <td style="width: 10%" align="center">:</td>
                                        <td style="width: 10%">Rp. {{ number_format($total, 0, ',', '.') }}</td>
                                    </tr>
                                    <tr>
                                        <td style="width: 80%" align="right">Diskon</td>
                                        <td style="width: 10%" align="center">:</td>
                                        <td style="width: 10%">Rp. {{ number_format($discount, 0, ',', '.') }}</td>
                                    </tr>
                                    <tr>
                                        <td style="width: 80%" align="right">Sub Total</td>
                                        <td style="width: 10%" align="center">:</td>
                                        <td style="width: 10%">Rp. {{ number_format($subtotal, 0, ',', '.') }}</td>
                                    </tr>
                                    <tr>
                                        <td style="width: 80%" align="right">Ppn (11%)</td>
                                        <td style="width: 10%" align="center">:</td>
                                        <td style="width: 10%">Rp. {{ number_format($ppn, 0, ',', '.') }}</td>
                                    </tr>
                                    <tr>
                                        <td style="width: 80%" align="right">Total</td>
                                        <td style="width: 10%" align="center">:</td>
                                        <td style="width: 10%">Rp. {{ number_format($parent->total, 0, ',', '.') }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="tab-pane" id="tab_2">
                        <div class="box box-solid">
                            <div class="box-header with-border">
                                <h3 class="box-title">Form</h3>
                            </div>
                            <div class="box-body">
                                <form class="form-horizontal" method="post" id="form" enctype="multipart/form-data"
                                    action="{{ url('admin/purchase_order_details/add-receipt') }}">
                                    @csrf
                                    <input type="hidden" name="return_url" value="{{ url()->full() }}">
                                    <input type="hidden" name="ref_id" value="{{ $parent->id }}">
                                    <input type="hidden" name="ref_table" value="purchase_orders">
                                    <div class="box-body" id="parent-form-area">

                                        <div class="form-group form-datepicker header-group-0 " id="form-group-date"
                                            style="">
                                            <label class="control-label col-sm-2">Tanggal
                                                <span class="text-danger" title="This field is required">*</span>
                                            </label>

                                            <div class="col-sm-8">
                                                <div class="input-group">
                                                    <span class="input-group-addon open-datetimepicker"><a><i
                                                                class="fa fa-calendar "></i></a></span>
                                                    <input type="text" title="Tanggal" readonly="" required=""
                                                        class="form-control notfocus input_date" name="date"
                                                        id="date" value="{{ date('Y-m-d') }}">
                                                </div>
                                                <div class="text-danger"></div>
                                                <p class="help-block"></p>
                                            </div>
                                        </div>
                                        <div class="form-group header-group-0 " id="form-group-description"
                                            style="">
                                            <label class="control-label col-sm-2">Deskripsi
                                                <span class="text-danger" title="This field is required">*</span>
                                            </label>
                                            <div class="col-sm-8">
                                                <textarea name="description" id="description" required="" maxlength="5000" class="form-control" rows="5"></textarea>
                                                <div class="text-danger"></div>
                                                <p class="help-block"></p>
                                            </div>
                                        </div>
                                        <div x-data="products" x-init="addProduct()">
                                            <template x-for="(product, index) in products" :key="index">
                                                <div class="form-group header-group-0 " id="form-group-description"
                                                    style="">
                                                    <label class="control-label col-sm-2">Produk <span
                                                            x-text="index + 1"></span>
                                                        <span class="text-danger" title="This field is required">*</span>
                                                    </label>
                                                    <div class="col-sm-4">
                                                        <select :name="'items[' + index + '][product_id]'"
                                                            class="form-control select2 select-product" style='width:100%'
                                                            required="" x-model="product.product_id">
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <input type="number" :name="'items[' + index + '][quantity]'"
                                                            required="" class="form-control" placeholder="Jumlah"
                                                            x-model="product.quantity">
                                                    </div>
                                                    <!-- btn remove -->
                                                    <div class="col-sm-2">
                                                        <button type="button" class="btn btn-sm btn-danger"
                                                            x-on:click="removeProduct(index)"
                                                            x-show="products.length > 1"><i class="fa fa-minus"></i>
                                                            Hapus</button>

                                                        <button type="button" class="btn btn-sm btn-info"
                                                            x-on:click="addProduct()"
                                                            x-show="index == products.length - 1"><i
                                                                class="fa fa-plus"></i> Tambah</button>
                                                    </div>
                                                </div>
                                            </template>
                                        </div><!-- /.box-body -->

                                        <div class="box-footer" style="background: #F5F5F5">

                                            <div class="form-group">
                                                <label class="control-label col-sm-2"></label>
                                                <div class="col-sm-10">
                                                    <input type="submit" name="submit" value="Save"
                                                        class="btn btn-success">
                                                </div>
                                            </div>


                                        </div><!-- /.box-footer-->

                                </form>
                            </div>
                        </div>
                        <div class="box box-solid">
                            <div class="box-header with-border">
                                <h3 class="box-title">Detail</h3>
                            </div>
                            <div class="box-body">
                                <table id="table_dashboard" class="table table-hover table-striped table-bordered">
                                    <thead>
                                        <tr class="active">
                                            <th width="auto">Tanggal</th>
                                            <th width="auto">Deskripsi</th>
                                            <th width="auto">Detail</th>
                                            <th width="auto">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($receipts as $receipt)
                                            <tr>
                                                <td>{{ date('d F Y', strtotime($receipt->date)) }}</td>
                                                <td>{{ $receipt->description }}</td>
                                                <td>
                                                    @forelse ($receipt->items as $item)
                                                        <p>{{ $item->name }} ({{ $item->quantity }})</p>
                                                    @empty
                                                        <p>-</p>
                                                    @endforelse
                                                </td>
                                                <td>
                                                    <a class="btn btn-xs btn-warning btn-delete" title="Delete"
                                                        href="javascript:;"
                                                        onclick="swal({
                                                        title: &quot;Are you sure ?&quot;,
                                                        text: &quot;You will not be able to recover this record data!&quot;,
                                                        type: &quot;warning&quot;,
                                                        showCancelButton: true,
                                                        confirmButtonColor: &quot;#ff0000&quot;,
                                                        confirmButtonText: &quot;Yes!&quot;,
                                                        cancelButtonText: &quot;No&quot;,
                                                        closeOnConfirm: false },
                                                        function(){  location.href=&quot;{{ CRUDBooster::mainpath('delete-receipt/' . $receipt->id) }}?&quot; });"><i
                                                            class="fa fa-trash"></i></a>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr class="warning">
                                                <td colspan="4" align="center">
                                                    <i class="fa fa-search"></i> No Data Avaliable
                                                </td>
                                            </tr>
                                        @endforelse

                                    </tbody>
                                    <tfoot>
                                        <tr>
                                        <tr class="active">
                                            <th width="auto">Tanggal</th>
                                            <th width="auto">Deskripsi</th>
                                            <th width="auto">Detail</th>
                                            <th width="auto">Action</th>
                                        </tr>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="tab-pane" id="tab_3">
                    <div class="box box-solid">
                        <div class="box-header with-border">
                            <h3 class="box-title">Faktur Pajak</h3>
                        </div>
                        <div class="box-body">
                            <form class="form-horizontal" method="post" enctype="multipart/form-data"
                                action="{{ url('admin/purchase_order_details/update-tax') }}">
                                @csrf
                                <input type="hidden" name="return_url" value="{{ url()->full() }}">
                                <input type="hidden" name="ref_id" value="{{ $parent->id }}">
                                <input type="hidden" name="ref_table" value="purchase_orders">
                                <div class="box-body">
                                    <div class="form-group  header-group-0 " id="form-group-tax_date" style="">
                                        <label class="control-label col-sm-2">Tanggal Faktur
                                        </label>

                                        <div class="col-sm-8">
                                            <input type="date" title="Nomor Faktur" class="form-control" name="tax_date" value="{{ $parent->tax_date }}">
                                            
                                            <div class="text-danger"></div>
                                            <p class="help-block"></p>
                                        </div>
                                    </div>
                                    <div class="form-group  header-group-0 " id="form-group-tax_number" style="">
                                        <label class="control-label col-sm-2">Nomor Faktur
                                        </label>

                                        <div class="col-sm-8">
                                            <input type="text" title="Nomor Faktur" class="form-control" name="tax_number" value="{{ $parent->tax_number }}">
                                            
                                            <div class="text-danger"></div>
                                            <p class="help-block"></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="box-footer" style="background: #F5F5F5">

                                    <div class="form-group">
                                        <label class="control-label col-sm-2"></label>
                                        <div class="col-sm-10">
                                            <input type="submit" name="submit" value="Simpan"
                                                class="btn btn-success">
                                        </div>
                                    </div>


                                </div><!-- /.box-footer-->
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
@push('head')
    <link rel="stylesheet" href="{{ url('/vendor/crudbooster/assets/adminlte/plugins/datepicker/datepicker3.css') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
@endpush
@push('bottom')
    <script src="{{ url('/vendor/crudbooster/assets/adminlte/plugins/datepicker/bootstrap-datepicker.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>

    <script type="text/javascript">
        var lang = 'en';

        $(function() {
            $('.input_date').datepicker({
                format: 'yyyy-mm-dd',
                language: lang
            });

            $('.open-datetimepicker').click(function() {
                $(this).next('.input_date').datepicker('show');
            });

        });

        document.addEventListener('alpine:init', () => {
            Alpine.data('products', () => ({
                products: [],
                initSelect2() {
                    $('.select-product').select2({
                        placeholder: 'Select an item',
                        ajax: {
                            url: '{{ CRUDBooster::adminPath('products/data') }}',
                            dataType: 'json',
                            delay: 250,
                            processResults: function(data) {
                                return {
                                    results: $.map(data, function(item) {
                                        return {
                                            text: `${item.name}, Satuan: ${item.unit_name}, Stok: ${item.quantity}`,
                                            id: item.id,
                                            quantity: item.quantity,
                                        }
                                    })
                                };
                            },
                            cache: true,
                        }
                    });

                    $('.select-product').on('change', function() {
                        let data = $(this).select2('data');
                        if (data.length) {
                            let quantity = data[0].quantity ? data[0].quantity : 0;
                            let index = $(this).attr('name').match(/\[(.*?)\]/)[1];
                            console.log(index);
                            $('input[name="items[' + index + '][quantity_system]"]').val(
                                quantity);
                        }
                    });
                },
                addProduct() {
                    this.products.push({
                        product_id: '',
                        quantity: '',
                    });

                    this.$nextTick(() => {
                        this.initSelect2();
                    });
                },
                removeProduct(index) {
                    this.products.splice(index, 1);
                },
            }));
        })
    </script>
@endpush
