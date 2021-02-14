<div class="modal fade" id="found-pet-modal" tabindex="-1" role="dialog" aria-labelledby="foundPetLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="foundPetLabel">@lang('dictionary.hero.modal_title')</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col">
                        <p>@lang('dictionary.hero.modal_description')</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6 search-filter">
                        <!-- Type -->
                        <select class="custom-select" id='found_pet_types'>
                            <option selected>@lang('dictionary.hero.type.select')</option>
                             @foreach ($pet_types as $type)
                                <option value="{{ $type }}">@lang('dictionary.hero.type.' . $type)</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-6 search-filter" id='found_pet_sizes'>
                        <!-- Size -->
                        <select class="custom-select">
                            <option selected>@lang('dictionary.hero.size.select')</option>
                            @foreach ($pet_sizes as $size)
                                <option value="{{ $size }}">@lang('dictionary.hero.size.' . $size)</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-6 search-filter" id='found_pet_colors'>
                        <!-- Color -->
                        <select class="custom-select">
                            <option selected>@lang('dictionary.hero.color.select')</option>
                            @foreach ($pet_colors as $color)
                                <option value="{{ $color }}">@lang('dictionary.hero.color.' . $color)</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-6 search-filter" id='found_locations'>
                        <!-- Town -->
                        <select class="custom-select">
                            <option selected>@lang('dictionary.hero.location.select')</option>
                            @foreach ($locations as $location)
                                <option value="{{ $location }}">@lang('dictionary.hero.location.' . $location)</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-6 search-filter">
                        <input type="date" id="found_at" name="found_at">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary search-btn">@lang('dictionary.hero.search')</button>
            </div>
        </div>
    </div>
</div>
