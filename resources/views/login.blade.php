<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Page title</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Prata&amp;family=Readex+Pro:wght@300;400;500;600;700&amp;display=swap">
    <link rel="stylesheet" href={{ asset('css/app.css') }}>
    <link rel="icon" href="favicon.ico">
  </head>
  <body>
      <section class="position-relative bg-white overflow-hidden">
        <img class="d-none d-md-block position-absolute top-0 start-0 col-5 h-100 img-fluid" style="object-fit: cover;" src="wrexa-assets/images/mom-and-son-big-picture.png" alt="">
        <div class="container">
          <form action="/login" method="post">
            @csrf
            <div class="row">
              <div class="col-12 col-md-7 col-lg-8 ms-auto">
                <div class="ps-md-10 ps-lg-36 pt-16 pb-14 pb-md-36">
                  <div class="d-flex flex-column flex-sm-row mb-6 justify-content-end align-items-end align-items-sm-center">
                    <span class="small text-secondary-dark mb-4 mb-sm-0 me-sm-4">I already have an account</span>
                    <a class="btn p-0 d-flex align-items-center text-success" href="#">
                      <span class="me-3">Sign in</span>
                      <svg width="14" height="11" viewbox="0 0 14 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M7.89471 0L6.81484 0.972812L11.0771 4.8125L0 4.8125L0 6.1875L11.0771 6.1875L6.81484 10.0272L7.89471 11L14 5.5L7.89471 0Z" fill="currentColor"></path>
                      </svg>
                    </a>
                  </div>
                  <a class="btn p-0 mb-8 d-flex align-items-center text-dark" href="#">
                    <svg width="14" height="11" viewbox="0 0 14 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M6.10529 11L7.18516 10.0272L2.92291 6.1875L14 6.1875L14 4.8125L2.92291 4.8125L7.18516 0.972813L6.10529 -6.90178e-07L4.80825e-07 5.5L6.10529 11Z" fill="currentColor"></path>
                    </svg>
                    <span class="ms-4">Back home</span>
                  </a>
                  <div class="mw-md mb-20">
                    <h2 class="display-5 mb-8">Let’s level up Design, together</h2>
                    <p class="lh-lg">The house like a sense of truth that comes from within.</p>
                  </div>
                  <div class="form-floating mb-6">
                    <input class="form-control" type="email" placeholder="support@shuffle.dev" value="">
                    <label for="">Your email</label>
                  </div>
                  <div class="form-floating mb-12">
                    <input class="form-control" type="text" placeholder="Your name">
                    <label for="">Your name</label>
                  </div>
                  <div class="d-md-flex mb-24 mb-md-48 align-items-center">
                    <a class="d-flex align-items-center text-decoration-none" href="#">
                      <img class="img-fluid me-6" style="width: 22px;" src="wrexa-assets/logos/brands/google.svg" alt="">
                      <span class="small text-secondary-dark">Sign Up with Google</span>
                    </a>
                    <div class="d-none d-md-block mx-8 bg-secondary" style="width: 1px; height: 12px;"></div>
                    <div class="d-md-none ms-1 my-8 bg-secondary" style="width: 12px; height: 1px;"></div>
                    <a class="d-flex align-items-center text-decoration-none" href="#">
                      <img class="img-fluid me-6" src="wrexa-assets/logos/brands/facebook.svg" alt="">
                      <span class="small text-secondary-dark">Sign Up with Facebook</span>
                    </a>
                  </div>
                  <button class="btn btn-primary" type="submit">Create Account</button>
                </div>
              </div>
            </div>
          </form>
        </div>
        <img class="d-md-none img-fluid" style="object-fit: cover;" src="wrexa-assets/images/mom-and-son-big-picture.png" alt="">
      </section>
    <script src={{ asset("js/main.js") }}></script>
  </body>
</html>
