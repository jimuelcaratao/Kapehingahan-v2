<!-- Modal -->
<div class="modal fade" id="edit-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="edit-modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg ">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="edit-modalLabel">Edit Products</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <div>
                    <form action="{{ route('products.update') }}" method="POST" id="edit-form"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <h4> Basic information </h4>
                        <div class=" sm:mt-0">
                            <div class="mt-3 md:mt-0 md:col-span-2">
                                <div class="overflow-hidden ">
                                    <div class="px-4  bg-white sm:p-6">
                                        <div class="grid grid-cols-6 gap-3">

                                            <div class="col-span-6 sm:col-span-4">
                                                <label for="edit_category_name"
                                                    class="block text-sm font-medium text-gray-700">Category <span
                                                        class="text-red-600">*</span></label>
                                                <select id="edit_category_name" name="edit_category_name"
                                                    class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                    {{ $categoryOptions }}
                                                </select>
                                            </div>
                                            <div class=" col-span-6 sm:col-span-2">
                                                <div class="form-check form-switch pt-4">
                                                    <input class="switches form-check-input" type="checkbox"
                                                        name="edit_is_customizable" id="edit_is_customizable">
                                                    <label class="form-check-label"
                                                        for="edit_is_customizable">Drinks</label>
                                                </div>
                                            </div>

                                            <div class="col-span-6 sm:col-span-4">
                                                <label for="edit_brand"
                                                    class="block text-sm font-medium text-gray-700">Brand <span
                                                        class="text-red-600">*</span></label>
                                                <select id="edit_brand" name="edit_brand"
                                                    class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                    {{ $brandOptions }}
                                                </select>
                                            </div>

                                            <div class="col-span-6 sm:col-span-4">
                                                <label for="edit_product_code"
                                                    class="block text-sm font-medium text-gray-700">Product code <span
                                                        class="text-red-600">*</span></label>
                                                <input type="text" name="edit_product_code" id="edit_product_code"
                                                    readonly
                                                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow sm:text-sm border-gray-300 rounded-md">
                                            </div>



                                            <div class="col-span-6 sm:col-span-4">
                                                <label for="edit_product_name"
                                                    class="block text-sm font-medium text-gray-700">Product Name <span
                                                        class="text-red-600">*</span></label>
                                                <input type="text" name="edit_product_name" id="edit_product_name"
                                                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow sm:text-sm border-gray-300 rounded-md">
                                            </div>

                                            <div class="col-span-8 sm:col-span-6">
                                                <label for="edit_description"
                                                    class="block text-sm font-medium text-gray-700">
                                                    Description <span class="text-red-600">*</span>
                                                </label>
                                                <div class="mt-1">
                                                    <textarea id="edit_description" name="edit_description" rows="3"
                                                        class="shadow focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border-gray-300 rounded-md"
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

                        <div class=" hidden sm:block" aria-hidden="true">
                            <div class="py-3">
                                <div class="border-t border-gray-200"></div>
                            </div>
                        </div>

                        <h4 class="">Sales Management</h4>
                        <div class="mt-3 md:mt-0 md:col-span-2">
                            <div class=" sm:overflow-hidden">
                                <div class="px-4  bg-white space-y-6 sm:p-6">
                                    <div class="grid grid-cols-12 gap-3">

                                        <div class="col-span-6 sm:col-span-6 lg:col-span-4">
                                            <div>
                                                <label for="edit_price"
                                                    class="block text-sm font-medium text-gray-700">Price <span
                                                        class="text-red-600">*</span></label>
                                                <div class="mt-1 relative rounded-md shadow">
                                                    <div
                                                        class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                                        <span class="text-gray-500 sm:text-sm">
                                                            ₱
                                                        </span>
                                                    </div>
                                                    <input type="number" min="0" step="0.01" name="edit_price"
                                                        id="edit_price"
                                                        class="focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-7 sm:text-sm border-gray-300 rounded-md"
                                                        placeholder="0.00">

                                                </div>
                                            </div>
                                        </div>

                                        <div id="edit_is_drink" class="col-span-6 sm:col-span-6 lg:col-span-4">
                                            <div>
                                                <label for="status"
                                                    class="block text-sm font-medium text-gray-700">Status
                                                    <span class="text-red-600">*</span></label>
                                                <select id="edit_status" name="edit_status"
                                                    class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                    <option selected disabled value="">Choose...</option>
                                                    <option>Available</option>
                                                    <option>Not Available</option>
                                                </select>
                                            </div>
                                        </div>


                                        <div id="edit_is_not_drink" class="col-span-6 sm:col-span-6 lg:col-span-4">
                                            <div>
                                                <label for="edit_stock"
                                                    class="block text-sm font-medium text-gray-700">Stock
                                                    <span class="text-red-600">*</span></label>
                                                <input type="number" min="0" name="edit_stock" id="edit_stock"
                                                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow sm:text-sm border-gray-300 rounded-md">
                                            </div>

                                            <div>
                                                <label for="edit_stock_measurement"
                                                    class="block text-sm font-medium text-gray-700 mt-2">Measurement
                                                    <span class="text-red-600">*</span></label>
                                                <select id="edit_stock_measurement" name="edit_stock_measurement"
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

                        <div class="hidden sm:block" aria-hidden="true">
                            <div class="py-3">
                                <div class="border-t border-gray-200"></div>
                            </div>
                        </div>

                        <h4>Media Management</h4>
                        <div class="mt-3 md:mt-0 md:col-span-2">
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
                                                        <img id="output" src="" style="width:200px;height:200px;">
                                                        <input id="default_photo" name="default_photo" type="file"
                                                            accept=".jpg,.gif,.png,.jpeg">

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

                                                    <img id="output" src="" style="width:400px;height:400px;">

                                                    <div class="flex text-sm text-gray-600 ">
                                                        <label for="edit_default_photo"
                                                            class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                                                            <span class="align-middle text-center">Upload a file</span>
                                                            <input id="edit_default_photo" name="default_photo"
                                                                type="file" class="sr-only"
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
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Save Changes</button>
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

            $('input[name="edit_is_customizable"]').click(function() {
                if ($(this).is(":checked")) {
                    $('#edit_is_drink').show();
                    $('#edit_is_not_drink').hide();

                    // add/remove required
                    $("#edit_status").prop('required', true);
                    $("#edit_stock").prop('required', false);
                    $("#edit_stock_measurement").prop('required', false);
                } else if ($(this).is(":not(:checked)")) {
                    $('#edit_is_drink').hide();
                    $('#edit_is_not_drink').show();

                    // add/remove required
                    $("#edit_status").prop('required', false);
                    $("#edit_stock").prop('required', true);
                    $("#edit_stock_measurement").prop('required', true);

                }
            });

        });

        $('#output').click(function() {
            $('#edit_default_photo').trigger('click');
        });

        $(document).ready(function() {
            elem = document.getElementById('#edit_description');
            if (elem.clientHeight < elem.scrollHeight) elem.style.height = elem.scrollHeight + "px";
        });
        // image preview
        $(document).on("change", "#edit_default_photo", function() {
            document.getElementById('output').src = window.URL.createObjectURL(this.files[0])
        });



        $(document).ready(function() {
            $(document).on("click", "#edit-item", function() {


                $(this).addClass(
                    "edit-item-trigger-clicked"
                ); //useful for identifying which trigger was clicked and consequently grab data from the correct row and not the wrong one.
                var options = {
                    backdrop: "static"
                };
                $("#edit-modal").modal(options);
                var el = $(".edit-item-trigger-clicked"); // See how its usefull right here?
                var row = el.closest(".data-row");

                // autosize($('#edit_description'));
                // autosize($('#edit_specs'));

                // get the data
                var sku = el.data("item-sku");
                var product_name = el.data("item-product_name");
                var product_code = el.data("item-product_code");
                var brand = el.data("item-brand");
                var category = el.data("item-category");
                var sub_category = el.data("item-sub_category");
                var description = el.data("item-description");
                var price = el.data("item-price");
                var status = el.data("item-status");
                var stock = el.data("item-stock");
                var stock_measurement = el.data("item-stock_measurement");
                var default_photo = el.data("item-default_photo");
                var is_customizable = el.data("item-is_customizable");

                if (status != '') {
                    $('#edit_is_drink').show();
                    $('#edit_is_not_drink').hide();
                } else {
                    $('#edit_is_drink').hide();
                    $('#edit_is_not_drink').show();
                }


                // var description = row.children("item-email").text();
                // fill the data in the input fields
                $("#edit_sku").val(sku);
                $("#edit_product_name").val(product_name);
                $("#edit_product_code").val(product_code);

                if (is_customizable != '') {
                    $('#edit_is_customizable').attr('checked', 'checked');
                }

                // image preview
                $("img#output").attr('src', $("img#output").attr('src') +
                    `{{ asset('storage/media/products/main_${product_code}_${default_photo}') }}`);

                $("select#edit_brand option")
                    .each(function() {
                        this.selected = (this.text == brand);
                    });

                $("select#edit_category_name option")
                    .each(function() {
                        this.selected = (this.text == category);
                    });

                $("select#edit_stock_measurement option")
                    .each(function() {
                        this.selected = (this.text == stock_measurement);
                    });

                $("#edit_status").val(status);

                // $("#edit_status").val(status);

                $("#edit_description").val(description);
                $("#edit_price").val(price);
                $("#edit_stock").val(stock);



            });
            // on modal hide
            $("#edit-modal").on("hide.bs.modal", function() {
                $(".edit-item-trigger-clicked").removeClass(
                    "edit-item-trigger-clicked"
                );
                $("#edit-form").trigger("reset");

                // image preview reset
                $('#output').attr('src', '');
            });
        });
    </script>
@endpush
