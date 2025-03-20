<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Laracoffee</title>
  <!-- Bootstrap CSS -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
  <!-- Custom CSS -->
  <style>
    body {
      font-family: 'Poppins', sans-serif;
    }
    #hero {
      background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('{{ asset('storage/home/coffee.jpg') }}');
      background-size: cover;
      background-position: center;
      color: #fff;
      padding: 100px 0;
    }
    #hero h1 {
      font-size: 3.5rem;
      font-weight: 700;
    }
    #hero p {
      font-size: 1.2rem;
      margin: 20px 0;
    }
    .btn-get-started {
      background: #ff6f61;
      color: #fff;
      padding: 10px 30px;
      border-radius: 50px;
      font-size: 1rem;
      transition: all 0.3s ease;
    }
    .btn-get-started:hover {
      background: #ff3b2f;
      transform: translateY(-5px);
    }
    #about {
      padding: 100px 0;
    }
    #about h2 {
      font-size: 2.5rem;
      font-weight: 700;
      margin-bottom: 20px;
    }
    #about p {
      font-size: 1.1rem;
      line-height: 1.8;
    }
    .about-img img {
      border-radius: 10px;
      box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    }
    #services {
      padding: 100px 0;
      background: #f8f9fa;
    }
    .section-title h2 {
      font-size: 2.5rem;
      font-weight: 700;
      margin-bottom: 50px;
      text-align: center;
    }
    .icon-box {
      background: #fff;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
      transition: all 0.3s ease;
    }
    .icon-box:hover {
      transform: translateY(-10px);
    }
    .icon-box .icon {
      text-align: center;
      margin-bottom: 20px;
    }
    .icon-box h4 {
      font-size: 1.5rem;
      font-weight: 700;
      margin-bottom: 15px;
    }
    .icon-box p {
      font-size: 1rem;
      line-height: 1.8;
    }
    .icon-box ul {
      list-style: none;
      padding: 0;
    }
    .icon-box ul li {
      margin-bottom: 10px;
    }
    .icon-box ul li::before {
      content: "✓";
      color: #3fcdc7;
      margin-right: 10px;
    }
  </style>
</head>
<body>
  <!-- Hero Section -->
  <section id="hero">
    <div class="container mt-0 mt-lg-5">
      <div class="row">
        <div class="col-md-6 pt-5 pt-lg-0 order-md-1 d-flex flex-column justify-content-center" data-aos="fade-up">
          <div>
            <h1>New way to enjoy quality coffee</h1>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Tenetur nobis vero a officiis commodi, nam esse
              saepe sapiente hic exercitationem reiciendis eveniet ipsa alias accusamus? Non molestias nesciunt
              accusantium suscipit?</p>
            <a href="#about" class="btn-get-started scrollto">Get Started</a>
          </div>
        </div>
        <div class="col-md-6 order-md-2 mt-5 mt-lg-0 pt-5 pt-lg-0 d-none d-md-block hero-img" data-aos="fade-left">
          <img src="{{ asset('storage/home/coffee.jpg') }}" class="img-fluid" alt="Coffee">
        </div>
      </div>
    </div>
  </section>

  <!-- Main Content -->
  <main id="main">
    <!-- About Section -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">
        <div class="row">
          <div class="col-lg-5 col-md-6 d-none d-md-block">
            <div class="about-img" data-aos="fade-right" data-aos-delay="100">
              <img src="{{ asset('storage/home/laracoffee.jpg') }}" alt="laracoffee">
            </div>
          </div>
          <div class="col-lg-7 col-md-6">
            <div class="about-content" data-aos="fade-left" data-aos-delay="100">
              <h2>About Laracoffee</h2>
              <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quas, quae saepe alias dicta illum eveniet qui
                fugiat laborum, molestiae nesciunt placeat aliquam voluptate ratione minus nemo quos consectetur harum id
                quibusdam cumque odit at, est velit? Neque totam voluptate possimus eum tempore, dolorum odio itaque
                dolores inventore atque omnis ad.</p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Services Section -->
    <section id="services" class="services section-bg">
      <div class="container">
        <div class="section-title" data-aos="fade-up">
          <h2>Additional Information</h2>
        </div>
        <div class="row">
          <div class="col-md-12 col-lg-6 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="zoom-in">
            <div class="icon-box icon-box-pink">
              <div class="icon"><i class="fa fa-fw fa-dumpster" style="font-size: 48px; margin-bottom: 15px; line-height: 1; color: orange;"></i></div>
              <h4 class="title"><a href="">Why Laracoffee?</a></h4>
              <p class="description">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Unde natus nesciunt
                exercitationem, libero odit quia consequuntur ullam nostrum ducimus, fugit aspernatur error, placeat
                voluptatibus incidunt modi eligendi culpa dolor nihil.</p>
              <p class="description">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ratione hic temporibus, et
                odit sed ut molestiae. Architecto, suscipit!</p>
            </div>
          </div>
          <div class="col-md-12 col-lg-6 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="zoom-in" data-aos-delay="100">
            <div class="icon-box icon-box-cyan">
              <div class="icon"><i class="fa fa-basket-shopping" style="font-size: 48px; margin-bottom: 15px; line-height: 1; color: #3fcdc7;"></i></div>
              <h4 class="title"><a href="">Easy way to order!</a></h4>
              <p class="description">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Dolor suscipit odio, autem
                quos eos eveniet explicabo perferendis dolore quae cum molestiae itaque nostrum!</p>
              <ul class="description">
                <li>Lorem ipsum dolor sit amet consectetur.</li>
                <li>Lorem ipsum dolor sit.</li>
                <li>Lorem, ipsum dolor.</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>

  <!-- Bootstrap JS and dependencies -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>