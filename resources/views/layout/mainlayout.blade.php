<!DOCTYPE html>
    <html lang="en">
    <head>
        @include('web.partials.head')
    </head>
    <body>
        @include('web.partials.header')

        @yield('content')

        @include('web.partials.footer')

        <script>
            var Translate = {
                global: {
                    message_error: '@lang('global.message_error')',
                }
            }

            var PATH = {
                public: '{{ asset(config('filesystems.disks.public.path')) }}',
            }

            var API = {
                url: {
                    search_lost_pets: '{{ route('api-pets-lost-search') }}',
                    search_found_pets: '{{ route('api-pets-found-search') }}',
                    add_lost_pet: '{{ route('api-pets-lost-add') }}',
                    add_found_pet: '{{ route('api-pets-found-add') }}',
                }
            }
        </script>

        @include('web.partials.footer-scripts')
    </body>
</html>
