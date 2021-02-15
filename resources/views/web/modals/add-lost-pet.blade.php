<!-- Modal -->
<div class="modal fade" id="add-lost-pet" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">@lang('dictionary.lost_pets.modal.title')</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col">
                        <p>@lang('dictionary.lost_pets.modal.description')</p>
                    </div>
                </div>
                <div class="row" >
                    <div class="col">
                        <div id="add-lost-pet-errors" class="alert alert-danger" hidden></div>
                    </div>
                </div>
                <div class="row">
                    {{-- Type --}}
                    <div class="col-6 search-filter">
                        <select class="custom-select" id='lost_pet_types'>
                            <option selected disabled value="default">@lang('dictionary.hero.type.select')</option>
                            @foreach ($pet_types as $type)
                            <option value="{{ $type }}">@lang('dictionary.hero.type.' . $type)</option>
                            @endforeach
                        </select>
                    </div>
                    {{-- Size --}}
                    <div class="col-6 search-filter" id='lost_pet_sizes'>
                        <select class="custom-select">
                            <option selected disabled value="default">@lang('dictionary.hero.size.select')</option>
                            @foreach ($pet_sizes as $size)
                            <option value="{{ $size }}">@lang('dictionary.hero.size.' . $size)</option>
                            @endforeach
                        </select>
                    </div>
                    {{-- Color --}}
                    <div class="col-6 search-filter" id='lost_pet_colors'>
                        <select class="custom-select">
                            <option selected disabled value="default">@lang('dictionary.hero.color.select')</option>
                            @foreach ($pet_colors as $color)
                            <option value="{{ $color }}">@lang('dictionary.hero.color.' . $color)</option>
                            @endforeach
                        </select>
                    </div>
                    {{-- Town --}}
                    <div class="col-6 search-filter" id='lost_locations'>
                        <select class="custom-select">
                            <option selected disabled value="default">@lang('dictionary.hero.location.select')</option>
                            @foreach ($locations as $location)
                            <option value="{{ $location }}">@lang('dictionary.hero.location.' . $location)</option>
                            @endforeach
                        </select>
                    </div>
                    {{-- Date --}}
                    <div class="col-6 search-filter">
                        <input type="date" class="custom-input"  id="lost_at" name="lost_at">
                    </div>
                    {{-- Name --}}
                    <div class="col-6 search-filter">
                        <input type="text" class="custom-input" id="name" name="name" placeholder="Enter pet's name">
                    </div>
                    {{-- Breed --}}
                    <div class="col-6 search-filter">
                        <input type="text" class="custom-input" id="breed" name="breed" placeholder="Enter pet's breed">
                    </div>
                    {{-- Phone --}}
                    <div class="col-6 search-filter">
                        <input type="text" class="custom-input" id="contact_phone" name="contact_phone" placeholder="Enter your contact phone">
                    </div>
                    {{-- Description --}}
                    <div class="col-6 search-filter">
                        <div class="form-group">
                            <textarea class="form-control" id="description" rows="3" placeholder="@lang('dictionary.lost_pets.modal.enter_description')"></textarea>
                        </div>
                    </div>
                    <div class="col-6">
                        <!-- Upload image input-->
                        <div class="form-group">
                            <label class="btn btn-default btn-file">
                                <input type="file" name="picture" id="picture" accept="image/*">
                            </label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary close-btn" data-dismiss="modal">@lang('dictionary.close')</button>
                    <button type="button" onclick="addLostPet();" class="btn btn-primary search-btn">@lang('dictionary.lost_pets.modal.add_new')</button>
                </div>
            </div>
        </div>
    </div>
</div>