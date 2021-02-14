<section id="hero">
    <div class="hero-container">
        <div class="container">
            <div class="row" id="hero-row">
                <div class="col-lg-6">
                    <a id="found-pet" class="btn-get-started">
                        @lang('dictionary.hero.found_pet')
                    </a>
                </div>
                <div class="col-lg-6">
                    <a id="lost-pet" class="btn-get-started" data-toggle="modal" data-target="#details-modal">
                        @lang('dictionary.hero.lost_pet')
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

@include('layout.modals.lost-pet-modal')