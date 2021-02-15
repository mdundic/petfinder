<section id="lost-pets-portfolio" class="portfolio" hidden>
    <div class="container wow fadeInUp">
        <div class="section-header">
            <h3 class="section-title">@lang('dictionary.lost_pets.title')</h3>
            <p class="section-description">@lang('dictionary.lost_pets.description')</p>
        </div>
        <div class="row" id="portfolio-wrapper">
            <!-- dinamicaly populated from JS -->
        </div>
        <div class="row" id="portfolio-no-results" hidden style="padding-top: 30px;">
            <div class="col-lg-8">
                There are no results for your pet search, please add your pet to the list of lost pets and if someone finds it, they will contact you.
            </div>
            <div class="col-lg-4">
                <button type="button" class="btn btn-primary search-btn" data-toggle="modal" data-target="#add-lost-pet">
                  @lang('dictionary.lost_pets.add_new')
                </button>
            </div>
        </div>
        <div class="row" id="portfolio-found" hidden style="padding-top: 30px;">
            <div class="col-lg-8" >
                If you haven't found your pet, please add your pet to the list of lost pets and if someone finds it, they will contact you.
            </div>
            <div class="col-lg-4">
                <button type="button" class="btn btn-primary search-btn" data-toggle="modal" data-target="#add-lost-pet">
                  @lang('dictionary.lost_pets.add_new')
                </button>
            </div>
        </div>
        <div class="row" id="portfolio-lost-pet-added" hidden style="padding-top: 30px;">
            <div class="col-lg-12 text-success" style="text-align: center;">
                Lost pet added successfuly. Moderator will need to approve it before it apears in search results.
            </div>
        </div>
    </div>
</section>

@include('web.modals.add-lost-pet')
