@push('styles')
@endpush


<!-- Modal -->
<div class="modal fade" id="add-modal" data-bs-backdrop="static" data-bs-keyboard="false"
    aria-labelledby="add-modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg ">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="add-modalLabel">Add Products</h5>
                <button type="button" class="btn-close closeModalClick" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <div>
                    <form action="{{ route('products.store') }}" method="POST" id="add-form"
                        enctype="multipart/form-data">
                        @csrf
                        <h4> Basic information </h4>
                        <div class=" sm:mt-0">
                            <div class="mt-3 md:mt-0 md:col-span-2">
                                <div class="overflow-hidden ">
                                    <div class="px-4  bg-white sm:p-6">
                                        <div class="grid grid-cols-6 gap-3">

                                            <div class="col-span-6 sm:col-span-4">
                                                <label for="category_name"
                                                    class="block text-sm font-medium text-gray-700">Category <span
                                                        class="text-red-600">*</span></label>
                                                <select id="category_name" name="category_name" required
                                                    class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                    <option selected disabled value="">Choose...</option>
                                                    {{ $categoryOptions }}
                                                </select>
                                            </div>
                                            <div class="form-basic col-span-6 sm:col-span-2">
                                                <div class="form-check form-switch pt-4">
                                                    <input class="switches form-check-input" type="checkbox"
                                                        name="is_customizable" id="is_customizable" checked>
                                                    <label class="form-check-label" for="is_customizable">Drinks</label>
                                                </div>
                                            </div>


                                            <div class="form-basic col-span-6 sm:col-span-4">
                                                <label for="brand_name"
                                                    class="block text-sm font-medium text-gray-700">Brand <span
                                                        class="text-red-600">*</span></label>
                                                <select id="brand_name" name="brand_name" required
                                                    class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                    <option selected disabled value="">Choose...</option>
                                                    {{ $brandOptions }}
                                                </select>
                                            </div>

                                            {{-- <div class="form-basic  col-span-6 sm:col-span-4">
                                                <label for="product_code"
                                                    class="block text-sm font-medium text-gray-700">Product code <span
                                                        class="text-red-600">*</span></label>
                                                <input type="text" name="product_code" id="product_code" required
                                                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow sm:text-sm border-gray-300 rounded-md">
                                            </div> --}}

                                            <div class="form-basic  col-span-6 sm:col-span-4">
                                                <label for="product_name"
                                                    class="block text-sm font-medium text-gray-700">Product Name <span
                                                        class="text-red-600">*</span></label>
                                                <input type="text" name="product_name" id="product_name" required
                                                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow sm:text-sm border-gray-300 rounded-md">
                                            </div>

                                            <div class="form-basic  col-span-8 sm:col-span-6">
                                                <label for="description"
                                                    class="block text-sm font-medium text-gray-700">
                                                    Description
                                                </label>
                                                <div class="mt-1">
                                                    <textarea id="description" name="description" rows="3" class="shadow focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border-gray-300 rounded-md"
                                                        placeholder="you@example.com"></textarea>
                                                </div>
                                                <p class="mt-2 text-sm text-gray-500">
                                                    Brief description for your Product. URLs are hyperlinked.
                                                </p>
                                            </div>

                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="form-basic  hidden sm:block" aria-hidden="true">
                            <div class="">
                                <div class="border-t border-gray-200"></div>
                            </div>
                        </div>

                        <h4 class="form-basic  mt-3">Sales Management</h4>
                        <div class="form-basic  mt-3 md:mt-0 md:col-span-2">
                            <div class=" sm:overflow-hidden">
                                <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                                    <div class="grid grid-cols-12 gap-3">

                                        <div class=" col-span-6 sm:col-span-4">
                                            <div>
                                                <label for="price" class="block text-sm font-medium text-gray-700">Price
                                                    <span class="text-red-600">*</span></label>
                                                <div class="mt-1 relative rounded-md shadow">
                                                    <div
                                                        class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                                        <span class="text-gray-500 sm:text-sm">
                                                            ₱
                                                        </span>
                                                    </div>
                                                    <input type="number" min="0" step="0.01" name="price" id="price"
                                                        required
                                                        class="focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-7 sm:text-sm border-gray-300 rounded-md"
                                                        placeholder="0.00">

                                                </div>
                                            </div>
                                        </div>

                                        <div id="is_drink" class="col-span-6 sm:col-span-6 lg:col-span-4">
                                            <div>
                                                <label for="status"
                                                    class="block text-sm font-medium text-gray-700">Status
                                                    <span class="text-red-600">*</span></label>
                                                <select id="status" name="status"
                                                    class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                    <option selected disabled value="">Choose...</option>
                                                    <option value="Available">Available</option>
                                                    <option value="Not Available">Not Available</option>
                                                </select>
                                            </div>
                                        </div>


                                        <div id="is_not_drink" class="col-span-6 sm:col-span-6 lg:col-span-4">
                                            <div>
                                                <label for="stock" class="block text-sm font-medium text-gray-700">Stock
                                                    <span class="text-red-600">*</span></label>
                                                <input type="number" min="0" name="stock" id="stock"
                                                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow sm:text-sm border-gray-300 rounded-md">
                                            </div>

                                            <div>
                                                <label for="stock_measurement"
                                                    class="block text-sm font-medium text-gray-700 mt-2">Measurement
                                                    <span class="text-red-600">*</span></label>
                                                <select id="stock_measurement" name="stock_measurement"
                                                    class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                    <option selected disabled value="">Choose...</option>
                                                    <option value="pcs">Pieces</option>
                                                </select>
                                            </div>
                                        </div>


                                    </div>
                                </div>

                            </div>
                        </div>


                        <div class="form-basic  hidden sm:block" aria-hidden="true">
                            <div class="">
                                <div class="border-t border-gray-200"></div>
                            </div>
                        </div>

                        <h4 class="form-basic  mt-3">Media Management</h4>
                        <div class="form-basic  mt-3 md:mt-0 md:col-span-2">
                            <div class=" sm:overflow-hidden">
                                <div class="px-4  bg-white space-y-6 sm:p-6">
                                    <div class="grid">


                                        {{-- <div class="col-span-6 sm:col-span-6 lg:col-span-3">
                                            <div>
                                                <label class="block text-sm font-medium text-gray-700">
                                                    Cover photo <span class="text-red-600">*</span>
                                                </label>
                                                <div
                                                    class="mt-1 flex justify-center items-center border-2 border-gray-300 border-dashed rounded-md">
                                                    <div class="flex flex-col place-items-center space-y-1 text-center">
                                                        <img id="output_default_photo" src=""
                                                            style="width:200px;height:200px;">
                                                        <input id="default_photo" name="default_photo" type="file"
                                                            accept=".jpg,.gif,.png,.jpeg" required>

                                                    </div>

                                                </div>
                                            </div>
                                        </div> --}}

                                        <div>
                                            <label class="block text-sm font-medium text-gray-700">
                                                Cover photo
                                            </label>
                                            <div
                                                class="mt-1 flex justify-center px-6 py-3 border-2 border-gray-300 border-dashed rounded-md">
                                                <div class="space-y-1 text-center">

                                                    <img id="output_default_photo" class="cursor-pointer mb-4"
                                                        src="{{ asset('img/cover-img.svg') }}"
                                                        style="width:400px;height:400px;">

                                                    <div class="flex text-sm text-gray-600 ">
                                                        <label for="default_photo"
                                                            class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                                                            <span class="align-middle text-center">Upload a file</span>
                                                            <input id="default_photo" name="default_photo" type="file"
                                                                required class="sr-only"
                                                                accept=".jpg,.gif,.png,.jpeg">
                                                        </label>
                                                        {{-- <p class="pl-1">or drag and drop</p> --}}
                                                    </div>
                                                    <p class="text-xs text-gray-500">
                                                        PNG, JPG, GIF up to 5MB
                                                    </p>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary closeModalClick">Cancel</button>
                            <button disabled id="submit_product" type="submit" class="btn btn-primary">Create</button>
                        </div>
                    </form>

                </div>


            </div>

        </div>
    </div>
</div>

@push('scripts')
    <script>
        // edit_is_customizable
        $(document).ready(function() {
            $('#is_drink').show();
            $('#is_not_drink').hide();

            // add/remove required
            $("#status").prop('required', true);
            $("#stock").prop('required', false);
            $("#stock_measurement").prop('required', false);


            $('input[name="is_customizable"]').click(function() {
                if ($(this).is(":checked")) {
                    $('#is_drink').show();
                    $('#is_not_drink').hide();

                    // add/remove required
                    $("#status").prop('required', true);
                    $("#stock").prop('required', false);
                    $("#stock_measurement").prop('required', false);
                } else if ($(this).is(":not(:checked)")) {
                    $('#is_drink').hide();
                    $('#is_not_drink').show();

                    // add/remove required
                    $("#status").prop('required', false);
                    $("#stock").prop('required', true);
                    $("#stock_measurement").prop('required', true);
                }
            });
        });


        $('#output_default_photo').click(function() {
            $('#default_photo').trigger('click');
        });

        // display shop form
        $('#category_name').change(function() {
            var id = $(this).find(':selected')[0].value;
            // alert(id); 
            $('.form-basic').show();

            $('#submit_product').removeAttr('disabled');
        });

        $(document).on("change", "#default_photo", function() {
            document.getElementById('output_default_photo').src = window.URL.createObjectURL(this.files[
                0])
        });

        $(document).ready(function() {
            $(".closeModalClick").click(function() {
                swal({
                        title: "Are you sure?",
                        text: "Once you Discard, theres no turning back!",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            // OnClose
                            $('#add-modal').modal('hide');
                            $("#add-form").trigger("reset");

                            // form category display 
                            $('.form-basic').hide();

                            $('#submit_product').attr('disabled', 'disabled');
                        } else {
                            return false;
                        }
                    });
            });


        });
    </script>
@endpush
