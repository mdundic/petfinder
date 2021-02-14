<div class="modal fade" id="details-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">@lang('dictionary.hero.modal_title')</h5>
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
                    <div class="col">
                        <!-- Type -->
                        <select class="custom-select">
                            <option selected>@lang('dictionary.hero.type.select')</option>
                            <option value="dog">@lang('dictionary.hero.type.dog')</option>
                            <option value="cat">@lang('dictionary.hero.type.cat')</option>
                            <option value="bird">@lang('dictionary.hero.type.bird')</option>
                            <option value="rodent">@lang('dictionary.hero.type.rodent')</option>
                            <option value="reptile">@lang('dictionary.hero.type.reptile')</option>
                            <option value="other">@lang('dictionary.hero.type.other')</option>
                        </select>
                        <!-- Size -->
                        <select class="custom-select">
                            <option selected>@lang('dictionary.hero.size.select')</option>
                            <option value="other">@lang('dictionary.hero.size.other')</option>
                        </select>
                        <input type="date" id="found_at" name="found_at">
                        <!-- Color -->
                        <select class="custom-select">
                            <option selected>@lang('dictionary.hero.color.select')</option>
                            <option value="black">@lang('dictionary.hero.color.black')</option>
                            <option value="white">@lang('dictionary.hero.color.white')</option>
                            <option value="brown">@lang('dictionary.hero.color.brown')</option>
                            <option value="black_white">@lang('dictionary.hero.color.black_white')</option>
                            <option value="yellow">@lang('dictionary.hero.color.yellow')</option>
                            <option value="yellow_white">@lang('dictionary.hero.color.yellow_white')</option>
                            <option value="gray">@lang('dictionary.hero.color.gray')</option>
                            <option value="gray_white">@lang('dictionary.hero.color.gray_white')</option>
                        </select>
                        <!-- Town -->
                        <select class="custom-select">
                            <option selected>@lang('dictionary.hero.town.select')</option>
                            <option value="belgrade">@lang('dictionary.hero.town.belgrade')</option>
                            <option value="pancevo">@lang('dictionary.hero.town.pancevo')</option>
                            <option value="kragujevac">@lang('dictionary.hero.town.kragujevac')</option>
                            <option value="novi_sad">@lang('dictionary.hero.town.novi_sad')</option>
                            <option value="nis">@lang('dictionary.hero.town.nis')</option>
                            <option value="other">@lang('dictionary.hero.town.other')</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary search-btn">@lang('dictionary.hero.search')</button>
            </div>
        </div>
    </div>
</div>