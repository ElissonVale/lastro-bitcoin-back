
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Lastro BTC</title>
        <link rel="icon" type="image/x-icon" href="assets/image/favicon.png" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.4.2/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="assets/css/app.css" rel="stylesheet" />

        @yield('style')
    </head>
    <body id="page-top">
         <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="#page-top">Lastro BTC</a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item"><a class="nav-link" href="#about">About</a></li>
                        <li class="nav-item"><a class="nav-link" href="#github">Github</a></li>
                        <li class="nav-item"><a class="nav-link" href="#signup">Contacts</a></li>
                        <li class="nav-item"><a class="nav-link" href="/docs">Documentation <i class="fas fa-file-code text-default"></i></a></li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Masthead-->
        <header class="masthead">
            <div class="container px-4 px-lg-5 d-flex h-100 align-items-center justify-content-center">
                <div class="d-flex justify-content-center">
                    <div class="text-center">
                        <h1 class="mx-auto my-0 text-uppercase">Lastro BTC</h1>
                        <h2 class="text-white-50 mx-auto mt-2 mb-5">Free Bitcoin transactions, to your freedom and sovereignty.</h2>
                        <a class="btn btn-primary" href="#download">Download App</a>
                    </div>
                </div>
            </div>
        </header>
        
        <!-- About-->
        <section class="about-section text-center" id="about">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-lg-8">
                        <h2 class="text-white mb-4">Our Goal</h2>
                        <p class="text-white-50">
                            Our objective is to allow transaction in Bitcoin free, for this, we create the app mobile that connects on server api 
                            via tor network and create transactions just changing balances of users, and thus, allowing free transactions, being processed on the block chain only upon withdrawal and deposit.
                            Read our paper for more informations.
                            <a href="https://startbootstrap.com/theme/grayscale/">Paper</a>
                        </p>
                    </div>
                </div>
                <img class="img-fluid" src="assets/image/ipad.png" alt="..." />
            </div>
        </section>

        <!-- Github Projects -->
        <section class="projects-section " id="github">
            <div class="container px-4 px-lg-5">
                <div class="row gx-0 mb-5 mb-lg-0 justify-content-center">
                    <div class="col-lg-6" style="display:flex;justify-content:center;">
                        <img class="img-fluid" src="assets/image/github.png" alt="..." />
                    </div>
                    <div class="col-lg-6">
                        <div class="bg-black text-center h-100 project">
                            <div class="d-flex h-100">
                                <div class="project-text w-100 my-auto text-center text-lg-left">
                                    <h4 class="text-white">Github Projects</h4>
                                    <p class="mb-0 text-white-50">Contribute for the project on our Github, all software are open source and you can access our server to verify our applications.</p>
                                    <p class="mb-0 text-white-50">You can will download app or will clone on github and create a apk to install in your phone.</p>
                                    <p class="mb-0 text-white-50">Are you not a developer?</p>
                                    <p class="mb-0 text-white-50">You can download the application directly from this website down!</p>
                                    <br />
                                    <hr />
                                    <a href="https://github.com/lastrobtc" target="_blank">Github Projects</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Signup-->
        <section class="signup-section" id="signup">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5">
                    <div class="col-md-10 col-lg-8 mx-auto text-center">
                        <i class="far fa-paper-plane fa-2x mb-2 text-white"></i>
                        <h2 class="text-white mb-5">Subscribe to receive updates, alerts and all informations!</h2>

                        <form class="form-signup" id="contactForm" data-sb-form-api-token="API_TOKEN">
                            <!-- Email address input-->
                            <div class="row input-group-newsletter">
                                <div class="col">
                                    <input class="form-control" id="emailAddress" type="email" placeholder="Enter email address..." aria-label="Enter email address..." data-sb-validations="required,email" />
                                </div>
                                <div class="col-auto">
                                    <button class="btn btn-primary disabled" id="submitButton" type="submit">Notify Me!</button>
                                </div>
                            </div>
                            <div class="invalid-feedback mt-2" data-sb-feedback="emailAddress:required">An email is required.</div>
                            <div class="invalid-feedback mt-2" data-sb-feedback="emailAddress:email">Email is not valid.</div>

                            <div class="d-none" id="submitErrorMessage"><div class="text-center text-danger mb-3 mt-2">Error sending message!</div></div>
                        </form>
                    </div>
                </div>
            </div>
        </section>

         <!-- Contact -->
        <section class="contact-section bg-black">
            <div class="container px-4 px-lg-5">
                <h2 class="text-white mb-5" style="text-align: center;">Where are we?</h2>
                <div class="row gx-4 gx-lg-5">
                    <div class="col-md-4 mb-3 mb-md-0">
                        <div class="card py-4 h-100">
                            <div class="card-body text-center">
                                <i class="fas fa-x text-primary mb-2"></i>
                                <h4 class="text-uppercase m-0">Twitter</h4>
                                <hr class="my-4 mx-auto" />
                                <div class="small text-black-50"><a href="https://twitter.com/LastroBTC" target="_black">Lastro BTC</a></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3 mb-md-0">
                        <div class="card py-4 h-100">
                            <div class="card-body text-center">
                                <i class="fas fa-envelope text-primary mb-2"></i>
                                <h4 class="text-uppercase m-0">Email</h4>
                                <hr class="my-4 mx-auto" />
                                <div class="small text-black-50"><a href="#!">lastrobtc@onionmail.org</a></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3 mb-md-0">
                        <div class="card py-4 h-100">
                            <div class="card-body text-center">
                                {{-- <i class="fas fa-mobile-alt text-primary mb-2"></i> --}}
                                <i class="fa-brands fa-github text-primary mb-2"></i>
                                <h4 class="text-uppercase m-0">Github Profile</h4>
                                <hr class="my-4 mx-auto" />
                                <div class="small text-black-50"><a href="https://github.com/lastrobtc" target="_blank">Lastro BTC</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- @yield('content') --}}
        
          <!-- Download -->
        <section class="bg-black" id="download">
            <div class="container px-4 px-lg-5">
                
                <div class="row gx-4 gx-lg-5" style="padding: 200px 0px;">
                    <h2 class="text-white mb-5" style="text-align: center;">Downloads</h2>
                    <div class="col-md-6 mb-5 mb-md-0">
                        <div class="card py-2 h-100">
                            <div class="card-body text-center">
                                <i class="fa-brands fa-android text-primary mb-2" style="font-size: 60px;"></i>
                                <h4 class="text-uppercase m-0">Android</h4>
                                <a href="#" class="btn btn-primary" style="margin: 20px;">Download</a>
                                <hr class="my-2 mx-auto" />
                                <div class="small text-black-50">Version 1.0.0</div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-5 mb-md-0">
                        <div class="card py-2 h-100">
                            <div class="card-body text-center">
                                <i class="fa-brands fa-apple text-primary mb-2" style="font-size: 60px;"></i>
                                <h4 class="text-uppercase m-0">Ios</h4>
                                <a href="#" class="btn btn-primary" style="margin: 20px;">Download</a>
                                <hr class="my-2 mx-auto" />
                                <div class="small text-black-50">Version 1.0.0</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
       
         <!-- Footer-->
        <footer class="footer bg-black small text-center text-white-50"><div class="container px-4 px-lg-5">Copyright &copy; Lastro BTC 2023</div></footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="assets/js/app.js"></script>

        @yield('script')
    </body>
</html>