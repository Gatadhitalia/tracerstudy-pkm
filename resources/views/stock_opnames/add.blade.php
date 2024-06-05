<!-- First, extends to the CRUDBooster Layout -->
@extends('crudbooster::admin_template')
@section('content')
    <!-- Your html goes here -->
    <div class='panel panel-default'>
        <div class='panel-heading'>Add Form</div>

        <form class="form-horizontal" method="post" id="form" enctype="multipart/form-data"
            action="{{ CRUDBooster::mainpath('add') }}">
            @csrf
            <div class='panel-body'>
                <div class="form-group form-datepicker header-group-0 " id="form-group-date" style="">
                    <label class="control-label col-sm-2">Tanggal
                        <span class="text-danger" title="This field is required">*</span>
                    </label>

                    <div class="col-sm-8">
                        <div class="input-group">
                            <span class="input-group-addon open-datetimepicker"><a><i
                                        class="fa fa-calendar "></i></a></span>
                            <input type="text" title="Tanggal" readonly="" required=""
                                class="form-control notfocus input_date" name="date" id="date"
                                value="{{ date('Y-m-d') }}">
                        </div>
                        <div class="text-danger"></div>
                        <p class="help-block"></p>
                    </div>
                </div>
                <div class="form-group header-group-0 " id="form-group-description" style="">
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
                        <div :class="'form-group header-group-0' + 'group-product-' + index">
                            <label class="control-label col-sm-2">Produk <span x-text="index + 1"></span>
                                <span class="text-danger" title="This field is required">*</span>
                            </label>
                            <div class="col-sm-2">
                                <select :name="'items[' + index + '][product_id]'" class="form-control select2-products"
                                    required="" x-model="product.product_id">
                                </select>
                            </div>
                            <div class="col-sm-2">
                                <input type="number" :name="'items[' + index + '][quantity]'" required=""
                                    class="form-control" placeholder="Jumlah Opname" x-model="product.quantity"
                                    x-on:keyUp="calculateQuantityDifference(index)">
                            </div>
                            <div class="col-sm-2">
                                <input type="number" :name="'items[' + index + '][quantity_system]'" readonly=""
                                    value="100" class="form-control" placeholder="Jumlah Sistem"
                                    x-model="product.quantity_system">
                            </div>
                            <div class="col-sm-2">
                                <input type="number" :name="'items[' + index + '][quantity_difference]'" readonly=""
                                    class="form-control" placeholder="Selisih" x-model="product.quantity_difference">
                            </div>
                            <!-- btn remove -->
                            <div class="col-sm-2">
                                <button type="button" class="btn btn-sm btn-danger" x-on:click="removeProduct(index)"
                                    x-show="products.length > 1"><i class="fa fa-minus"></i>
                                    Hapus</button>

                                <button type="button" class="btn btn-sm btn-info" x-on:click="addProduct()"
                                    x-show="index == products.length - 1"><i class="fa fa-plus"></i> Tambah</button>
                            </div>
                        </div>
                    </template>
                </div><!-- /.box-body -->
                <div class='panel-footer'>
                    <input type='submit' class='btn btn-primary' value='Save changes' />
                </div>
        </form>
    </div>
    </div>
@endsection
@push('head')
    <link rel="stylesheet" href="{{ url('/vendor/crudbooster/assets/adminlte/plugins/datepicker/datepicker3.css') }}">
    <link rel='stylesheet' href='{{ asset('vendor/crudbooster/assets/select2/dist/css/select2.min.css') }}' />
    <style>
        .select2-container--default .select2-selection--single {
            border-radius: 0px !important
        }

        .select2-container .select2-selection--single {
            height: 35px
        }
    </style>
@endpush
@push('bottom')
    <script src="{{ url('/vendor/crudbooster/assets/adminlte/plugins/datepicker/bootstrap-datepicker.js') }}"></script>
    <script src='{{ asset('vendor/crudbooster/assets/select2/dist/js/select2.full.min.js') }}'></script>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
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
                    $('.select2-products').select2({
                        placeholder: 'Select an item',
                        ajax: {
                            url: '{{ CRUDBooster::adminPath('products/data') }}',
                            dataType: 'json',
                            delay: 250,
                            processResults: function(data) {
                                return {
                                    results: $.map(data, function(item) {
                                        return {
                                            text: item.name,
                                            id: item.id,
                                            quantity: item.quantity,
                                        }
                                    })
                                };
                            },
                            cache: true,
                        }
                    });

                    $('.select2-products').on('change', function() {
                        let data = $(this).select2('data');
                        let quantity = data[0].quantity ? data[0].quantity : 0;
                        let index = $(this).attr('name').match(/\[(.*?)\]/)[1];
                        console.log(index);
                        $('input[name="items[' + index + '][quantity_system]"]').val(quantity);
                    });
                },
                calculateQuantityDifference(index) {
                    let quantity = this.products[index].quantity;
                    let quantity_system = this.products[index].quantity_system;
                    this.products[index].quantity_difference = quantity - quantity_system;
                },
                addProduct() {
                    this.products.push({
                        product_id: '',
                        quantity: '',
                        quantity_system: '',
                        quantity_difference: '',
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
