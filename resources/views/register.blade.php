<x-layout>
  <x-navbar :is-logged-in="$is_logged_in ?? false" current-page="register" :is-authorized="$is_authorized ?? false" />

  <x-slot:title>
      Register
  </x-slot>

  <section class="position-relative bg-white overflow-hidden">
    <div class="row">
      <div class="col-12 col-lg-5 bg-dark">
      <div class="pt-24 pb-24 px-5 px-md-16 px-lg-24">
        <a class="d-inline-block mb-24" href="/">
          <img class="img-fluid" src="wrexa-assets/logos/wrexa-co-logo-name.svg" alt="">
        </a>
        <img class="img-fluid d-block mx-auto mb-16" src="wrexa-assets/images/circle-avatars-with-logo.png" alt="">
        <div class="mw-md mx-auto">
          <a class="btn p-0 mb-8 d-flex align-items-center text-white" href="/">
            <svg width="14" height="11" viewbox="0 0 14 11" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M6.10529 11L7.18516 10.0272L2.92291 6.1875L14 6.1875L14 4.8125L2.92291 4.8125L7.18516 0.972813L6.10529 -6.90178e-07L4.80825e-07 5.5L6.10529 11Z" fill="currentColor"></path>
            </svg>
            <span class="ms-4">Back home</span>
          </a>
          <h3 class="display-5 text-white mb-8">Better together. Join our community</h3>
          <p class="text-white lh-lg">Sribble and team is here for you!</p>
        </div>
      </div>
    </div>
    <div class="col-12 col-lg-7">
      <form action="/register" method="post" id="register-form">
        @csrf
        <div class="mw-lg mw-xl-2xl mx-auto px-5 pt-16 pb-14 pb-md-36">
          <div class="d-flex flex-column flex-sm-row mb-36 justify-content-end align-items-end align-items-sm-center">
            <span class="small text-gray-700 mb-4 mb-sm-0 me-sm-4">I already have an account</span>
            <a class="btn p-0 d-flex align-items-center text-success" href="/login">
              <span class="me-3">Sign in</span>
              <svg width="14" height="11" viewbox="0 0 14 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M7.89471 0L6.81484 0.972812L11.0771 4.8125L0 4.8125L0 6.1875L11.0771 6.1875L6.81484 10.0272L7.89471 11L14 5.5L7.89471 0Z" fill="currentColor"></path>
              </svg>
            </a>
          </div>
          <div class="mb-12">
            <div class="row">
              <div class="col-12 col-md-6 mb-8">
                <label class="form-label text-gray-700 small mb-4" for="">First name</label>
                <input class="form-control" name='first_name' type="text" value="">
              </div>
              <div class="col-12 col-md-6 mb-8">
                <label class="form-label text-gray-700 small mb-4" for="">Last name</label>
                <input class="form-control" name='last_name' type="text" value="">
              </div>
              <div class="col-12  mb-8">
                <label class="form-label text-gray-700 small mb-4" for="">Your email</label>
                <input class="form-control" name='email' type="email" value="">
              </div>
              <div class="col-12 col-md-6 mb-8">
                <label class="form-label text-gray-700 small mb-4" for="">Enter Password</label>
                <input class="form-control" name='password' type="password" value="">
              </div>
              <div class="col-12 col-md-6">
                <label class="form-label text-gray-700 small mb-4" for="">Confirm Password</label>
                <input class="form-control" name='confirm_password' type="password" value="">
              </div>
            </div>
          </div>
          <button class="btn btn-primary" type="submit">Create Account</button>
        </div>
      </form>

      @isset($alert)
      <div class="m-4 position-fixed bottom-0 end-0 toast align-items-center text-white bg-{{ $alert->type }}-dark border-0" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="d-flex">
          <div class="toast-body">
            {{ $alert->message }}
          </div>
          <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
      </div>
      @endisset
  
      </div>
    </div>
  </section>
  <x-footer />
</x-layout>