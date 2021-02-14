<!DOCTYPE html>
    <html lang="en">
    <head>
        @include('layout.partials.head')
    </head>
    <body>
        @include('layout.partials.header')

        @yield('content')

        @include('layout.partials.footer')

        <script>
            //var Translate = {
            //     global: {
            //         yes: '@lang('global.yes')',
            //         no: '@lang('global.no')',
            //         are_you_sure: '@lang('global.are_you_sure')',
            //         please_select: '@lang('global.please_select')',
            //         edit: '@lang('global.edit')',
            //         create: '@lang('global.create')',
            //         delete: '@lang('global.delete')',
            //         cancel: '@lang('global.cancel')',
            //         message_error: '@lang('global.message_error')',
            //         message_success_update: '@lang('global.message.success_update')',
            //         message_success_delete: '@lang('global.message.success_delete')',
            //         company_name: '@lang('global.company_name')'
            //     },
            //     validation_error_keys: {
            //         owner_name: '@lang('car.owner_name')',
            //         note: '@lang('owner-expense.expenses')'
            //     },
            //     car: {
            //         owner_name: '@lang('car.owner_name')'
            //     }
            // };

            var API = {
                url: {
                    search_lost_pets: '{{ route('api-pets-lost-search') }}',
                }
            }

        </script>

        @include('layout.partials.footer-scripts')
    </body>
</html>
