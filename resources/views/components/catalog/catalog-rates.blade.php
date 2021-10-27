{{-- Mobile --}}
<div class="border-t border-gray-200 px-4 py-6">
    <h3 class="-mx-2 -my-3 flow-root">
        <!-- Expand/collapse section button -->
        <button type="button"
            class="px-2 py-3 bg-white w-full flex items-center justify-between text-gray-400 hover:text-gray-500"
            aria-controls="filter-section-mobile-1" aria-expanded="false">
            <span class="font-medium text-gray-900">
                Category
            </span>
        </button>
    </h3>
    <!-- Filter section, show/hide based on section state. -->
    <div class="pt-6" id="filter-section-mobile-1">
        <div class="space-y-6">
            <div class="flex items-center">
                <input id="filter-mobile-category-0" name="category[]" value="new-arrivals" type="checkbox"
                    class="h-4 w-4 border-gray-300 rounded text-indigo-600 focus:ring-indigo-500">
                <label for="filter-mobile-category-0" class="ml-3 min-w-0 flex-1 text-gray-500">
                    New Arrivals
                </label>
            </div>

            <div class="flex items-center">
                <input id="filter-mobile-category-1" name="category[]" value="sale" type="checkbox"
                    class="h-4 w-4 border-gray-300 rounded text-indigo-600 focus:ring-indigo-500">
                <label for="filter-mobile-category-1" class="ml-3 min-w-0 flex-1 text-gray-500">
                    Sale
                </label>
            </div>

            <div class="flex items-center">
                <input id="filter-mobile-category-2" name="category[]" value="travel" type="checkbox" checked
                    class="h-4 w-4 border-gray-300 rounded text-indigo-600 focus:ring-indigo-500">
                <label for="filter-mobile-category-2" class="ml-3 min-w-0 flex-1 text-gray-500">
                    Travel
                </label>
            </div>

            <div class="flex items-center">
                <input id="filter-mobile-category-3" name="category[]" value="organization" type="checkbox"
                    class="h-4 w-4 border-gray-300 rounded text-indigo-600 focus:ring-indigo-500">
                <label for="filter-mobile-category-3" class="ml-3 min-w-0 flex-1 text-gray-500">
                    Organization
                </label>
            </div>

            <div class="flex items-center">
                <input id="filter-mobile-category-4" name="category[]" value="accessories" type="checkbox"
                    class="h-4 w-4 border-gray-300 rounded text-indigo-600 focus:ring-indigo-500">
                <label for="filter-mobile-category-4" class="ml-3 min-w-0 flex-1 text-gray-500">
                    Accessories
                </label>
            </div>
        </div>
    </div>
</div>


{{-- Rates Desktop --}}
<div class="border-b border-gray-200 py-6">
    <h3 class="-my-3 flow-root">
        <!-- Expand/collapse section button -->
        <button type="button"
            class="py-3 bg-white w-full flex items-center justify-between text-sm text-gray-400 hover:text-gray-500"
            aria-controls="filter-section-1" aria-expanded="false">
            <span class="font-medium text-gray-900">
                Rates
            </span>
        </button>
    </h3>
    <!-- Filter section, show/hide based on section state. -->
    <div class="pt-6" id="filter-section-1">
        <div class="space-y-4">
            <div class="flex items-center">
                <input id="filter-category-0" name="category[]" value="new-arrivals" type="checkbox"
                    class="h-4 w-4 border-gray-300 rounded text-indigo-600 focus:ring-indigo-500">
                <label for="filter-category-0" class="ml-3 text-sm text-gray-600">
                    5 star
                </label>
            </div>

            <div class="flex items-center">
                <input id="filter-category-1" name="category[]" value="sale" type="checkbox"
                    class="h-4 w-4 border-gray-300 rounded text-indigo-600 focus:ring-indigo-500">
                <label for="filter-category-1" class="ml-3 text-sm text-gray-600">
                    4 star
                </label>
            </div>

            <div class="flex items-center">
                <input id="filter-category-2" name="category[]" value="travel" type="checkbox" checked
                    class="h-4 w-4 border-gray-300 rounded text-indigo-600 focus:ring-indigo-500">
                <label for="filter-category-2" class="ml-3 text-sm text-gray-600">
                    3 star
                </label>
            </div>

            <div class="flex items-center">
                <input id="filter-category-3" name="category[]" value="organization" type="checkbox"
                    class="h-4 w-4 border-gray-300 rounded text-indigo-600 focus:ring-indigo-500">
                <label for="filter-category-3" class="ml-3 text-sm text-gray-600">
                    2 star
                </label>
            </div>

            <div class="flex items-center">
                <input id="filter-category-4" name="category[]" value="accessories" type="checkbox"
                    class="h-4 w-4 border-gray-300 rounded text-indigo-600 focus:ring-indigo-500">
                <label for="filter-category-4" class="ml-3 text-sm text-gray-600">
                    1 star
                </label>
            </div>
        </div>
    </div>
</div>
