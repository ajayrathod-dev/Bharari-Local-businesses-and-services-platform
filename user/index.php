<?php $page_title='User Panel'; include('includes/header.php'); ?>

  <style>
    body {
      background: #f9f9f9;
      font-family: 'Metropolis', sans-serif;
    }

    .home {
      max-width: 480px;
      margin: 0 auto;
      padding: 20px;
      text-align: center;
    }

    .home img {
      width: 100%;
      margin-bottom: 15px;
      border-radius: 8px;
      box-shadow: 0px 2px 6px rgba(0, 0, 0, 0.1);
    }

    .start-btn {
      margin-top: 20px;
      padding: 12px;
      font-size: 18px;
      font-weight: 600;
      border-radius: 8px;
      background: #0b53bf;
      color: #fff;
      transition: 0.3s ease;
    }

    .start-btn:hover {
      background: #2d6e28;
      color: #fff;
    }
  </style>
</head>
<body>
  <!-- onboarding section start -->
  <section class="home">
    <!--<img src="d1.png" alt="Slide 1">-->
    <img src="logo.png" alt="Slide 2">
    <a href="login.php" class="btn start-btn w-100" role="button">Get Started</a>

  </section>
  <!-- onboarding section end -->
<?php include('includes/footer.php'); ?>
