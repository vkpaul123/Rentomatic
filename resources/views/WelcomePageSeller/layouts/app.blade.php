<!DOCTYPE html>
<html lang="en">
  <head>
    @include('WelcomePageSeller.layouts.headcontent')
  </head>

  <body>

    @include('WelcomePageSeller.layouts.fixedNavBar')

    @section('body')
      @show

    @include('WelcomePageSeller.layouts.footer')

    @include('WelcomePageSeller.layouts.indexPageScript')

  </body>
</html>
