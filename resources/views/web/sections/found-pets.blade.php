<section id="found-pets-portfolio" class="portfolio" hidden>
    <div class="container wow fadeInUp">
        <div class="section-header">
            <h3 class="section-title">@lang('dictionary.found_pets.title')</h3>
            <p class="section-description">@lang('dictionary.found_pets.description')</p>
        </div>
        <div class="row" id="portfolio-wrapper">
            <!-- dinamicaly populated from JS -->
        </div>
        <div class="row" id="portfolio-no-results" hidden>
            <div class="col-lg-8">
                There are no results for your pet search, please add your pet to the list of found pets and if someone recognise it, they will contact you.
            </div>
            <div class="col-lg-4">
                <button type="button" class="btn btn-primary search-btn" data-toggle="modal" data-target="#add-found-pet">
                  @lang('dictionary.found_pets.add_new')
                </button>
            </div>
        </div>
        <div class="row" id="portfolio-found" hidden>
            <div class="col-lg-8">
                If you have found someone's pet, and you can not find it in the list of found pets, please add the pet's detailsand help the owners to find their pets. If someone recognises their pet they will contact you. Thtank you!
            </div>
            <div class="col-lg-4">
                <button type="button" class="btn btn-primary search-btn" data-toggle="modal" data-target="#add-found-pet">
                  @lang('dictionary.found_pets.add_new')
                </button>
            </div>
        </div>
    </div>
</section>

@include('web.modals.add-found-pet')
