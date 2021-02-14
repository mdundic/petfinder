<div class="modal fade" id="lost-pet-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"> @lang('dictionary.hero.modal_title')</h5>
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
                        <select class="custom-select" id='lost_pet_types'>
                            <option selected disabled value="default">@lang('dictionary.hero.type.select')</option>
                             @foreach ($pet_types as $type)
                                <option value="{{ $type }}">@lang('dictionary.hero.type.' . $type)</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-6 search-filter">
                        <!-- Size -->
                        <select class="custom-select" id='lost_pet_sizes'>
                            <option selected disabled value="default">@lang('dictionary.hero.size.select')</option>
                            @foreach ($pet_sizes as $size)
                                <option value="{{ $size }}">@lang('dictionary.hero.size.' . $size)</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-6 search-filter">
                        <!-- Color -->
                        <select class="custom-select" id='lost_pet_colors'>
                            <option selected disabled value="default">@lang('dictionary.hero.color.select')</option>
                            @foreach ($pet_colors as $color)
                                <option value="{{ $color }}">@lang('dictionary.hero.color.' . $color)</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-6 search-filter">
                        <!-- Town -->
                        <select class="custom-select" id='lost_locations'>
                            <option selected disabled value="default">@lang('dictionary.hero.location.select')</option>
                            @foreach ($locations as $location)
                                <option value="{{ $location }}">@lang('dictionary.hero.location.' . $location)</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" onclick="resetSearch();" class="btn btn-secondary close-btn">@lang('dictionary.reset')</button>
                <button type="button" onclick="searchLostPets();" data-dismiss="modal" class="btn btn-primary search-btn">@lang('dictionary.hero.search')</button>
            </div>
        </div>
    </div>
</div>