<!DOCTYPE html>
<html lang="mr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>India Door - सेवा आपल्या दारी</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        /* Base Styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --primary-color: #0b53bf;
            --secondary-color: #0b53bf;
            --accent-color: #ff6b6b;
            --text-primary: #2d3748;
            --text-secondary: #718096;
            --bg-light: #f7fafc;
            --bg-card: #ffffff;
            --shadow-sm: 0 1px 3px rgba(0, 0, 0, 0.12);
            --shadow-md: 0 4px 6px rgba(0, 0, 0, 0.1);
            --shadow-xl: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: var(--text-primary);
            background-color: var(--bg-light);
            padding-top: 80px;
            /* To account for fixed navbar */
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        /* Navigation */
        #navbar {
            background-color: #fff;
            box-shadow: var(--shadow-sm);
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1000;
        }

        .nav-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 20px;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .logo img {
            height: 70px;
            width: 150px;
        }

        .logo-text {
            margin: 0;
            font-size: 32px;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 4px;
            font-family: 'Segoe UI', Roboto, sans-serif;
            position: relative;
            display: inline-block;
            line-height: 1.2;
        }

        .logo-text::before {
            content: "INDIA DOOR";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(to bottom, #FF9933 0%, #FF9933 33%, #FFFFFF 33%, #FFFFFF 66%, #138808 66%, #138808 100%);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
        }

        .nav-links {
            display: flex;
            list-style: none;
        }

        .nav-links li {
            margin-left: 25px;
        }

        .nav-links a {
            text-decoration: none;
            color: var(--text-primary);
            font-weight: 500;
            transition: color 0.3s;
        }

        .nav-links a:hover {
            color: var(--primary-color);
        }

        .language-switcher {
            display: flex;
            margin-left: 15px;
        }

        .language-switcher button {
            background: none;
            border: 1px solid #ddd;
            padding: 5px 10px;
            cursor: pointer;
        }

        .language-switcher button.active {
            background-color: var(--primary-color);
            color: white;
        }

        /* Hamburger Menu */
        .hamburger {
            display: none;
            flex-direction: column;
            justify-content: space-around;
            width: 30px;
            height: 25px;
            background: transparent;
            border: none;
            cursor: pointer;
            padding: 0;
        }

        .hamburger span {
            width: 100%;
            height: 3px;
            background-color: var(--text-primary);
            border-radius: 2px;
            transition: all 0.3s linear;
        }

        /* Hero Section */
        .hero {
            background: linear-gradient(135deg, #0b53bf, #0b53bf);
            color: white;
            padding: 120px 0 80px;
            text-align: center;
        }

        .hero-content h1 {
            font-size: 2.5rem;
            margin-bottom: 15px;
        }

        .subtitle {
            font-size: 1.2rem;
            margin-bottom: 30px;
            opacity: 0.9;
        }

        .cta-button {
            display: inline-block;
            background-color: var(--secondary-color);
            color: white;
            padding: 12px 30px;
            border-radius: 30px;
            text-decoration: none;
            font-weight: bold;
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .cta-button:hover {
            transform: translateY(-3px);
            box-shadow: var(--shadow-xl);
        }

        /* About India Door Section */
        .about-section {
            background-color: #fff;
            padding: 80px 0;
        }

        .about-content {
            text-align: center;
            max-width: 900px;
            margin: 0 auto;
        }

        .about-title {
            font-size: 2rem;
            color: var(--primary-color);
            margin-bottom: 30px;
            position: relative;
        }

        .about-title:after {
            content: '';
            display: block;
            width: 60px;
            height: 4px;
            background-color: var(--primary-color);
            margin: 15px auto;
            border-radius: 2px;
        }

        .about-text {
            font-size: 1.1rem;
            line-height: 1.8;
            color: var(--text-secondary);
            margin-bottom: 20px;
            text-align: justify;
        }

        .highlight-box {
            background-color: #f0f7ff;
            padding: 25px;
            border-radius: 10px;
            border-left: 4px solid var(--primary-color);
            margin: 30px 0;
        }

        .highlight-box h3 {
            color: var(--primary-color);
            margin-bottom: 15px;
        }

        .feature-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin-top: 40px;
        }

        .feature-card {
            background: #f8f9fa;
            border-radius: 10px;
            padding: 20px;
            text-align: center;
            transition: all 0.3s ease;
        }

        .feature-card:hover {
            transform: translateY(-5px);
            box-shadow: var(--shadow-md);
        }

        .feature-card i {
            font-size: 2.5rem;
            color: var(--primary-color);
            margin-bottom: 15px;
        }

        .feature-card h3 {
            font-size: 1.2rem;
            margin-bottom: 10px;
            color: var(--text-primary);
        }

        /* Section Styles */
        section {
            padding: 80px 0;
        }

        .section-title {
            text-align: center;
            margin-bottom: 50px;
            font-size: 2rem;
            color: var(--text-primary);
            position: relative;
        }

        .section-title:after {
            content: '';
            display: block;
            width: 60px;
            height: 4px;
            background-color: var(--primary-color);
            margin: 15px auto;
            border-radius: 2px;
        }

        /* Category Grid for Products */
        .category-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 2rem;
        }

        .category-card {
            background: var(--bg-card);
            border-radius: 15px;
            padding: 2rem;
            text-align: center;
            box-shadow: var(--shadow-md);
            transition: all 0.3s ease;
            cursor: pointer;
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .category-card:hover {
            transform: translateY(-5px);
            box-shadow: var(--shadow-xl);
        }

        .category-card i {
            font-size: 2rem;
            margin-bottom: 1rem;
            color: var(--primary-color);
        }

        .category-card h3 {
            font-size: 1.3rem;
            margin-bottom: 0.5rem;
            color: var(--text-primary);
        }

        .category-card p {
            color: var(--text-secondary);
            font-size: 0.95rem;
            margin-bottom: 0.5rem;
        }

        .category-card .description {
            font-size: 0.85rem;
            margin-top: 0.5rem;
            color: var(--text-secondary);
        }

        /* Service Grid */
        .service-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
            gap: 2rem;
        }

        .service-card {
            background: var(--bg-card);
            border-radius: 15px;
            padding: 2rem;
            text-align: center;
            box-shadow: var(--shadow-md);
            transition: all 0.3s ease;
            cursor: pointer;
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .service-card:hover {
            transform: translateY(-5px);
            box-shadow: var(--shadow-xl);
        }

        .service-card i {
            font-size: 2rem;
            margin-bottom: 1rem;
            color: var(--secondary-color);
        }

        .service-card h3 {
            font-size: 1.2rem;
            margin-bottom: 0.5rem;
            color: var(--text-primary);
        }

        .service-card p {
            color: var(--text-secondary);
            font-size: 0.9rem;
            margin-bottom: 0.5rem;
        }

        .service-card .description {
            font-size: 0.85rem;
            margin-top: 0.5rem;
            color: var(--text-secondary);
        }

        /* Information Sections */
        .info-section {
            background-color: #f8f9fa;
            padding: 40px 0;
            margin: 40px 0;
            border-radius: 10px;
        }

        .info-content {
            max-width: 800px;
            margin: 0 auto;
            text-align: center;
        }

        .info-title {
            font-size: 1.8rem;
            color: var(--primary-color);
            margin-bottom: 20px;
        }

        .info-text {
            font-size: 1.1rem;
            line-height: 1.8;
            color: var(--text-secondary);
            margin-bottom: 20px;
            text-align: justify;
        }

        .info-list {
            text-align: left;
            margin: 20px 0;
            padding-left: 20px;
        }

        .info-list li {
            margin-bottom: 10px;
            line-height: 1.6;
        }

        .highlight {
            background-color: #fff8e1;
            padding: 20px;
            border-radius: 8px;
            border-left: 4px solid var(--secondary-color);
            margin: 25px 0;
        }

        /* Footer */
        .footer {
            background-color: #2d3748;
            color: white;
            padding: 40px 0;
        }

        .footer-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        @media (max-width: 768px) {
            body {
                padding-top: 70px;
            }

            .logo img {
                height: 60px;
                width: 130px;
            }

            .logo-text {
                font-size: 24px;
            }

            .hamburger {
                display: flex;
                z-index: 1001;
            }

            .nav-links {
                position: fixed;
                top: 0;
                right: -100%;
                height: 100vh;
                width: 70%;
                max-width: 300px;
                background: rgb(128, 104, 206);
                flex-direction: column;
                align-items: center;
                justify-content: center;
                box-shadow: -5px 0 15px rgba(210, 13, 13, 0.1);
                transition: right 0.3s ease-in-out;
                padding: 80px 20px 40px;
            }

            .nav-links.active {
                right: 0;
            }

            .nav-links li {
                margin: 15px 0;
            }

            .language-switcher {
                margin: 20px 0 0 0;
                justify-content: center;
            }

            .hero {
                padding: 100px 0 60px;
            }

            .hero-content h1 {
                font-size: 2rem;
            }

            .about-title {
                font-size: 1.8rem;
            }

            .about-text {
                font-size: 1rem;
            }

            .category-grid,
            .service-grid {
                grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
                gap: 1.5rem;
            }

            .category-card,
            .service-card {
                padding: 1.5rem;
            }

            .info-title {
                font-size: 1.5rem;
            }

            .info-text {
                font-size: 1rem;
            }

            .footer-content {
                flex-direction: column;
                text-align: center;
            }

            .footer-left {
                margin-bottom: 20px;
            }
        }

        @media (max-width: 480px) {
            .logo-text {
                display: block;
                font-size: 20px;
            }

            .hero-content h1 {
                font-size: 1.8rem;
            }

            .subtitle {
                font-size: 1rem;
            }

            .about-title {
                font-size: 1.6rem;
            }

            .section-title {
                font-size: 1.7rem;
            }

            .category-grid,
            .service-grid {
                grid-template-columns: 1fr;
                gap: 1.2rem;
            }

            .nav-links {
                width: 80%;
            }

            .category-card .description,
            .service-card .description {
                font-size: 0.8rem;
            }

            .info-section {
                padding: 30px 15px;
            }

            .info-title {
                font-size: 1.3rem;
            }
            
            .feature-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body>
    <!-- Navigation -->
    <nav id="navbar">
        <div class="nav-container">
            <div class="logo">
                <img src="ind_logo.jpg" alt="India Door Logo">
                <h1 class="logo-text">INDIA DOOR</h1>
            </div>

            <button class="hamburger" id="hamburger">
                <span></span>
                <span></span>
                <span></span>
            </button>

            <ul class="nav-links" id="navLinks">
                <li><a href="#home">Home</a></li>
                <li><a href="#products">Products</a></li>
                <li><a href="#services">Services</a></li>
                <li><a href="#about">About</a></li>
                <li><a href="#contact">Contact</a></li>
                <li><a href="https://ordor.in/indiadoor/business/sub_cat.php">Register Business</a></li>
            </ul>
        </div>
    </nav>

    <!-- Hero -->
    <section id="home" class="hero">
        <div class="container hero-content">
            <h1>INDIA DOOR - सेवा आपल्या दारी</h1>
            <p class="subtitle">Your hyperlocal marketplace for everyday needs</p>
            <a href="#products" class="cta-button">Explore Products & Services</a>
        </div>
    </section>

    <!-- About India Door Section -->
    <section class="about-section">
        <div class="container about-content">
            <h2 class="about-title">INDIA DOOR - सेवा आपल्या दारी</h2>
            <p class="about-text">
                INDIA DOOR हा एक अभिनव डिजिटल प्लॅटफॉर्म आहे जो स्थानिक व्यवसाय आणि सेवा प्रदात्यांना ग्राहकांशी जोडतो. आमचे मुख्य उद्दीष्ट स्थानिक अर्थव्यवस्थेला बळकटी आणणे आणि ग्राहकांना त्यांच्या गरजेनुसार उत्पादने आणि सेवा सहजतेने उपलब्ध करून देणे आहे.
            </p>
            
            <div class="highlight-box">
                <h3>आमचे विशेषत:</h3>
                <p class="about-text">
                    INDIA DOOR मार्फत आपण आपल्या परिसरातील विविध दुकानदार आणि सेवा प्रदात्यांशी थेट संपर्क साधू शकता. आमच्या या प्लॅटफॉर्मवर आपल्या भोवतालच्या सर्व दुकानदारांची माहिती एकाच ठिकाणी उपलब्ध आहे. स्थानिक व्यवसायांना Support करा, वेळ वाचवा, आणि उत्तम दर्जाची उत्पादने घरबसल्या मिळवा.
                </p>
            </div>
            
            <p class="about-text">
                आमच्या या सेवेमुळे आपल्या परिसरातील छोट्या व्यवसायांना ऑनलाइन Presence निर्माण करण्यास मदत होते. ग्राहक आणि दुकानदार यांच्यात थेट संवाद साधण्याची सोय उपलब्ध होते. आम्ही सतत नवीन दुकानदारांना आमच्या प्लॅटफॉर्मवर जोडत आहोत जेणेकरून ग्राहकांना अधिक पर्याय उपलब्ध होतील.
            </p>
            
            <div class="feature-grid">
                <div class="feature-card">
                    <i class="fas fa-bolt"></i>
                    <h3>त्वरित सेवा</h3>
                    <p>अत्यंत वेगाने आणि कार्यक्षम सेवा</p>
                </div>
                <div class="feature-card">
                    <i class="fas fa-shield-alt"></i>
                    <h3>सुरक्षित</h3>
                    <p>सुरक्षित आणि विश्वासार्ह व्यवहार</p>
                </div>
                <div class="feature-card">
                    <i class="fas fa-rupee-sign"></i>
                    <h3>किफायतशीर</h3>
                    <p>स्पर्धात्मक किमतीत उत्पादने आणि सेवा</p>
                </div>
                <div class="feature-card">
                    <i class="fas fa-headset"></i>
                    <h3>२४x७ आधार</h3>
                    <p>कुठल्याही वेळी मदत उपलब्ध</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Products Section -->
    <section id="products" class="category-section">
        <div class="container">
            <h2 class="section-title">वस्तूंची सेवा यादी (Products)</h2>
            <div class="category-grid">
                <div class="category-card"onclick="window.open('https://play.google.com/store/apps/details?id=in.ordor.indiadoor','_blank')">
                    <i class="fas fa-shopping-basket"></i>
                    <h3>किराणा दुकानदार</h3>
                    <p>Grocery Shop</p>
                    <div class="description">ताजे किराणा माल आणि दैनंदिन गरजेच्या वस्तू घरपोच. दैनंदिन वापरातील सर्व पदार्थ आणि खाद्यपदार्थ एकाच ठिकाणी. स्थानिक दुकानांशी थेट संपर्क आणि ऑनलाइन ऑर्डर सुविधा.</div>
                </div>
                <div class="category-card" onclick="window.open('https://play.google.com/store/apps/details?id=in.ordor.indiadoor','_blank')">
                    <i class="fas fa-carrot"></i>
                    <h3>भाजीपाला विक्रेते</h3>
                    <p>Vegetable Seller</p>
                    <div class="description">ताज्या आणि नैसर्गिक भाज्या आणि फळे स्थानिक शेतकऱ्यांकडून. रोजच्या बाजारपेठेतील सर्व प्रकारच्या भाज्या आणि फळांची उपलब्धता. घरपोच सेवा आणि शाश्वत गुणवत्ता.</div>
                </div>
                <div class="category-card" onclick="window.open('https://play.google.com/store/apps/details?id=in.ordor.indiadoor','_blank')">
                    <i class="fas fa-cookie-bite"></i>
                    <h3>फराळ / नमकीन दुकानदार</h3>
                    <p>Snacks Shop</p>
                    <div class="description">कुरकुरीत नमकीन, चिवडा आणि इतर खाद्यपदार्थ. सणासमारंभासाठी विशेष फराळ आणि नमकीन. स्थानिक पद्धतीने तयार केलेले खाद्यपदार्थ आणि कुरकुरीत नाश्त्याचे पदार्थ.</div>
                </div>
                <div class="category-card" onclick="window.open('https://play.google.com/store/apps/details?id=in.ordor.indiadoor','_blank')">
                    <i class="fas fa-tshirt"></i>
                    <h3>कपडे विक्रेते</h3>
                    <p>Cloth Store</p>
                    <div class="description">फॅशनएबल कपडे आणि Accessories सर्व वयोगटासाठी. त्रिजागा, साड्या, वस्त्र आणि फॅशन Accessories ची विस्तृत range. सर्वात नवीन फॅशन ट्रेंड आणि शैली.</div>
                </div>
                <div class="category-card" onclick="window.open('https://play.google.com/store/apps/details?id=in.ordor.indiadoor','_blank')">
                    <i class="fas fa-mobile-alt"></i>
                    <h3>मोबाईल दुकान</h3>
                    <p>Mobile Store</p>
                    <div class="description">नवीन मोबाइल, Accessories आणि दुरुस्ती सेवा. सर्व ब्रँडचे मोबाइल फोन, स्मार्टफोन आणि Accessories. दुरुस्ती सेवा आणि तांत्रिक मदत उपलब्ध.</div>
                </div>
                <div class="category-card" onclick="window.open('https://play.google.com/store/apps/details?id=in.ordor.indiadoor','_blank')">
                    <i class="fas fa-cut"></i>
                    <h3>ब्युटी पार्लर / सलून</h3>
                    <p>Salon</p>
                    <div class="description">हेअरकट, फेशियल, मेकअप आणि सौंदर्य उपचार. पुरुष, महिला आणि मुलांसाठी सौंदर्य सेवा. आधुनिक तंत्रज्ञान आणि उत्पादने वापरून सेवा.</div>
                </div>
                <div class="category-card" onclick="window.open('https://play.google.com/store/apps/details?id=in.ordor.indiadoor','_blank')">
                    <i class="fas fa-camera"></i>
                    <h3>फोटो स्टुडिओ / झेरॉक्स</h3>
                    <p>Photo Studio</p>
                    <div class="description">फोटो, झेरॉक्स, लॅमिनेशन आणि प्रिंटिंग सेवा. पासपोर्ट साईज फोटो, कुटुंब फोटोशूट आणि विविध प्रिंटिंग सेवा. दस्तऐवज प्रतिकृती आणि कॉपी सेवा.</div>
                </div>
                <div class="category-card" onclick="window.open('https://play.google.com/store/apps/details?id=in.ordor.indiadoor','_blank')">
                    <i class="fas fa-capsules"></i>
                    <h3>औषध दुकान</h3>
                    <p>Medical Store</p>
                    <div class="description">सर्व प्रकारची औषधे आणि आरोग्य उत्पादने. डॉक्टरच्या प्रिस्क्रिप्शननुसार औषधे आणि आरोग्य उत्पादने. 24x7 आणीव औषध सेवा उपलब्ध.</div>
                </div>
                <div class="category-card" onclick="window.open('https://play.google.com/store/apps/details?id=in.ordor.indiadoor','_blank')">
                    <i class="fas fa-praying-hands"></i>
                    <h3>हारवाले / पूजा साहित्य विक्रेते</h3>
                    <p>Pooja Materials</p>
                    <div class="description">पूजेची सामग्री, हार आणि धार्मिक वस्तू. सणासमारंभासाठी पूजा सामग्री आणि धार्मिक वस्तू. फुलांचे हार, अगरबत्ती, दिवे आणि इतर पूजा साहित्य.</div>
                </div>
                <div class="category-card" onclick="window.open('https://play.google.com/store/apps/details?id=in.ordor.indiadoor','_blank')">
                    <i class="fas fa-book"></i>
                    <h3>डायरी / स्टेशनरी विक्रेते</h3>
                    <p>Stationery</p>
                    <div class="description">शाळा-कॉलेजची सामग्री, पुस्तके आणि ऑफिस स्टेशनरी. शैक्षणिक सामग्री, लेखन सामग्री आणि कार्यालयीन सामान. सर्व प्रकारच्या स्टेशनरीची विस्तृत range.</div>
                </div>
                <div class="category-card" onclick="window.open('https://play.google.com/store/apps/details?id=in.ordor.indiadoor','_blank')">
                    <i class="fas fa-bread-slice"></i>
                    <h3>बेकरी / फास्ट फूड विक्रेते</h3>
                    <p>Bakery / Fast Food</p>
                    <div class="description">ताजे बेकरी उत्पादने आणि स्वादिष्ट फास्ट फूड. ब्रेड, बन, केक, पेस्ट्री आणि इतर बेकरी उत्पादने. त्वरित आणि स्वादिष्ट फास्ट फूड पर्याय.</div>
                </div>
                <div class="category-card" onclick="window.open('https://play.google.com/store/apps/details?id=in.ordor.indiadoor','_blank')">
                    <i class="fas fa-coffee"></i>
                    <h3>चहा / नाश्ता टपरी</h3>
                    <p>Tea Stall</p>
                    <div class="description">गरमागरम चहा, कॉफी आणि नाश्त्याचे पदार्थ. सकाळच्या नाश्त्यासाठी विविध पदार्थ आणि पेये. ताजे आणि चवदार नाश्त्याचे पर्याय.</div>
                </div>
                <div class="category-card" onclick="window.open('https://play.google.com/store/apps/details?id=in.ordor.indiadoor','_blank')">
                    <i class="fas fa-cubes"></i>
                    <h3>साखर विक्रेते</h3>
                    <p>Sugar Shop</p>
                    <div class="description">विविध प्रकारची साखर, गूळ आणि गोड पदार्थ. साखर, गूळ, मध आणि इतर गोड पदार्थांची विविधता. शुद्ध आणि नैसर्गिक गोड पदार्थ.</div>
                </div>
                <div class="category-card" onclick="window.open('https://play.google.com/store/apps/details?id=in.ordor.indiadoor','_blank')">
                    <i class="fas fa-bicycle"></i>
                    <h3>सायकल / वाहन विक्रेते</h3>
                    <p>Vehicle Dealer</p>
                    <div class="description">सायकल, स्कूटर आणि इतर वाहने विक्रीसाठी. नवीन आणि जुन्या वाहनांची खरेदी-विक्री. वाहनांची दुरुस्ती आणि देखभाल सेवा.</div>
                </div>
                <div class="category-card" onclick="window.open('https://play.google.com/store/apps/details?id=in.ordor.indiadoor','_blank')">
                    <i class="fas fa-couch"></i>
                    <h3>फर्निचर विक्रेते</h3>
                    <p>Furniture Seller</p>
                    <div class="description">घरासाठी सुंदर आणि टिकाऊ फर्निचर. घर, ऑफिस आणि बाह्य वापरासाठी फर्निचर. सानुकूल फर्निचर डिझाइन आणि निर्मिती सेवा.</div>
                </div>
                <div class="category-card" onclick="window.open('https://play.google.com/store/apps/details?id=in.ordor.indiadoor','_blank')">
                    <i class="fas fa-recycle"></i>
                    <h3>भंगार विक्रेते</h3>
                    <p>Scrap Dealer</p>
                    <div class="description">जुना सामना विकणे किंवा खरेदी करणे. जुन्या वस्तूंची पुनर्वापर आणि पुनर्विक्री. घरातील जुन्या वस्तूंचे योग्य मूल्यांकन आणि व्यवस्थापन.</div>
                </div>
                <div class="category-card" onclick="window.open('https://play.google.com/store/apps/details?id=in.ordor.indiadoor','_blank')">
                    <i class="fas fa-oil-can"></i>
                    <h3>खाद्यतेल विक्रेते</h3>
                    <p>Oil Seller</p>
                    <div class="description">शुद्ध तेल आणि खाद्यतेलाचे विविध ब्रँड. शेतीसाठी आवश्यक तेल आणि इंधन. उच्च दर्जाचे आणि शुद्ध तेल उत्पादने.</div>
                </div>
                <div class="category-card" onclick="window.open('https://play.google.com/store/apps/details?id=in.ordor.indiadoor','_blank')">
                    <i class="fas fa-cheese"></i>
                    <h3>दूध / डेअरी दुकानदार</h3>
                    <p>Dairy Shop</p>
                    <div class="description">शुद्ध दूध, दही, लोणी आणि इतर डेअरी उत्पादने. ताजी आणि नैसर्गिक डेअरी उत्पादने. दैनंदिन गरजेसाठी डेअरी उत्पादनांची विस्तृत range.</div>
                </div>
                <div class="category-card" onclick="window.open('https://play.google.com/store/apps/details?id=in.ordor.indiadoor','_blank')">
                    <i class="fas fa-gem"></i>
                    <h3>ज्वेलरी / आर्टिफिशियल ज्वेलरी</h3>
                    <p>Jewellery</p>
                    <div class="description">सोने, चांदी आणि फॅशन ज्वेलरी. परंपरागत आणि आधुनिक दोन्ही प्रकारचे दागिने. सणासमारंभासाठी विशेष ज्वेलरी डिझाइन.</div>
                </div>
                <div class="category-card" onclick="window.open('https://play.google.com/store/apps/details?id=in.ordor.indiadoor','_blank')">
                    <i class="fas fa-university"></i>
                    <h3>ATM / बँक</h3>
                    <p>Bank / ATM</p>
                    <div class="description">जवळची बँक आणि ATM सेवा. वित्तीय सेवा आणि बँकिंग सुविधा. रोख पैसे काढणे, जमा करणे आणि इतर बँकिंग कामे.</div>
                </div>
            </div>
        </div>

        <!-- Additional Information Section for Products -->
        <div class="container info-section">
            <div class="info-content">
                <h3 class="info-title">आमच्या उत्पादन सेवा विषयी अधिक माहिती</h3>
                <p class="info-text">
                    इंडिया डोअर मार्फत आपण आपल्या परिसरातील विविध दुकानदारांशी थेट संपर्क साधू शकता. आमचे उद्देश आहे की
                    ग्राहकांना त्यांच्या गरजेनुसार उत्तम दर्जाची उत्पादने सहजतेने मिळू शकतील. आमच्या या प्लॅटफॉर्मवर
                    आपल्या भोवतालच्या सर्व दुकानदारांची माहिती एकाच ठिकाणी उपलब्ध आहे.
                </p>
                <div class="highlight">
                    <p><strong>लाभ:</strong> स्थानिक व्यवसायांना Support करा, वेळ वाचवा, आणि उत्तम दर्जाची उत्पादने
                        घरबसल्या मिळवा.</p>
                </div>
                <p class="info-text">
                    आमच्या या सेवेमुळे आपल्या परिसरातील छोट्या व्यवसायांना ऑनलाइन Presence निर्माण करण्यास मदत होते.
                    ग्राहक आणि दुकानदार यांच्यात थेट संवाद साधण्याची सोय उपलब्ध होते. आम्ही सतत नवीन दुकानदारांना
                    आमच्या प्लॅटफॉर्मवर जोडत आहोत जेणेकरून ग्राहकांना अधिक पर्याय उपलब्ध होतील.
                </p>
                <ul class="info-list">
                    <li><i class="fas fa-check-circle" style="color: var(--secondary-color);"></i> स्थानिक दुकानांशी थेट संपर्क</li>
                    <li><i class="fas fa-check-circle" style="color: var(--secondary-color);"></i> उत्पादनांची गुणवत्ता आणि किमतीची तुलना</li>
                    <li><i class="fas fa-check-circle" style="color: var(--secondary-color);"></i> ऑनलाइन ऑर्डर आणि घरपोच सेवा</li>
                    <li><i class="fas fa-check-circle" style="color: var(--secondary-color);"></i> सुरक्षित पेमेंट पर्याय</li>
                </ul>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section id="services" class="services">
        <div class="container">
            <h2 class="section-title">कामगार सेवा यादी (Services)</h2>
            <div class="service-grid">
                <div class="service-card" onclick="window.open('https://play.google.com/store/apps/details?id=in.ordor.indiadoor','_blank')">
                    <i class="fas fa-hammer"></i>
                    <h3>सुतार</h3>
                    <p>Carpenter</p>
                    <div class="description">फर्निचर दुरुस्ती, नवीन फर्निचर बनवणे आणि लाकडी काम. सर्व प्रकारचे सुतारकाम आणि लाकडी बांधकाम. दरवाजे, खिडक्या, अल्मारी आणि इतर फर्निचरची निर्मिती आणि दुरुस्ती.</div>
                </div>
                <div class="service-card" onclick="window.open('https://play.google.com/store/apps/details?id=in.ordor.indiadoor','_blank')">
                    <i class="fas fa-industry"></i>
                    <h3>लोहार</h3>
                    <p>Blacksmith</p>
                    <div class="description">लोखंडी काम, ग्रेटिंग, दरवाजे आणि सुरक्षा सामग्री. लोखंडी दरवाजे, गज, सुरक्षा ग्रील आणि इतर लोखंडी सामानाची निर्मिती आणि दुरुस्ती. सानुकूल डिझाईन आणि स्थापना सेवा.</div>
                </div>
                <div class="service-card" onclick="window.open('https://play.google.com/store/apps/details?id=in.ordor.indiadoor','_blank')">
                    <i class="fas fa-building"></i>
                    <h3>गवंडी</h3>
                    <p>Mason</p>
                    <div class="description">इमारत बांधकाम, दुरुस्ती आणि रीमॉडेलिंग काम. घर, इमारत आणि इतर बांधकाम कामांसाठी तज्ञ. भिंती, मजले, छप्पर आणि इतर संरचनात्मक काम.</div>
                </div>
                <div class="service-card" onclick="window.open('https://play.google.com/store/apps/details?id=in.ordor.indiadoor','_blank')">
                    <i class="fas fa-wrench"></i>
                    <h3>प्लंबर</h3>
                    <p>Plumber</p>
                    <div class="description">नळ दुरुस्ती, पाईपलाईन इन्स्टॉलेशन आणि वॉटर सप्लाय समस्या. पाणी पुरवठा, सॅनिटरी सिस्टीम आणि ड्रेनेज सिस्टीमची स्थापना आणि दुरुस्ती. आपत्कालीन सेवा 24x7 उपलब्ध.</div>
                </div>
                <div class="service-card" onclick="window.open('https://play.google.com/store/apps/details?id=in.ordor.indiadoor','_blank')">
                    <i class="fas fa-bolt"></i>
                    <h3>इलेक्ट्रिशियन</h3>
                    <p>Electrician</p>
                    <div class="description">वीज समस्या, वायरिंग, स्विच आणि फ्युज दुरुस्ती. घर, ऑफिस आणि व्यावसायिक ठिकाणी इलेक्ट्रिकल वायरिंग आणि दुरुस्ती. उर्जा कार्यक्षम उपाय आणि सुरक्षा तपासणी.</div>
                </div>
                <div class="service-card" onclick="window.open('https://play.google.com/store/apps/details?id=in.ordor.indiadoor','_blank')">
                    <i class="fas fa-cut"></i>
                    <h3>शिंपी</h3>
                    <p>Tailor</p>
                    <div class="description">कपडे शिवणे, सुधारणा आणि खास डिझाईन. सर्व प्रकारचे कपडे शिवणकाम आणि डिझाइनिंग. सणासमारंभासाठी विशेष पोशाख तयार करणे आणि सुधारणा.</div>
                </div>
                <div class="service-card" onclick="window.open('https://play.google.com/store/apps/details?id=in.ordor.indiadoor','_blank')">
                    <i class="fas fa-paint-roller"></i>
                    <h3>रंगारी</h3>
                    <p>Painter</p>
                    <div class="description">घर, ऑफिस किंवा इमारतींचे रंगकाम. आंतरिक आणि बाह्य रंगकाम, वॉलपेपर इन्स्टॉलेशन आणि सजावटीचे काम. उच्च दर्जाचे रंग आणि सामग्री वापरून काम.</div>
                </div>
                <div class="service-card" onclick="window.open('https://play.google.com/store/apps/details?id=in.ordor.indiadoor','_blank')">
                    <i class="fas fa-archway"></i>
                    <h3>कुंभार</h3>
                    <p>Potter</p>
                    <div class="description">मातीची भांडी, फुलदाणी आणि सजावटीच्या वस्तू. पारंपरिक आणि आधुनिक मातीच्या भांड्यांची निर्मिती. सजावटीच्या वस्तू आणि उपयुक्त भांडी तयार करणे.</div>
                </div>
                <div class="service-card" onclick="window.open('https://play.google.com/store/apps/details?id=in.ordor.indiadoor','_blank')">
                    <i class="fas fa-tree"></i>
                    <h3>बारी (बांबू कामगार)</h3>
                    <p>Bamboo Worker</p>
                    <div class="description">बांबूचे उत्पादने, चटई, टोपल्या आणि सजावट. बांबूपासून विविध उपयुक्त आणि सजावटीच्या वस्तू तयार करणे. पर्यावरणास अनुकूल आणि टिकाऊ उत्पादने.</div>
                </div>
                <div class="service-card" onclick="window.open('https://play.google.com/store/apps/details?id=in.ordor.indiadoor','_blank')">
                    <i class="fas fa-shoe-prints"></i>
                    <h3>मोची</h3>
                    <p>Cobbler</p>
                    <div class="description">बूट-शूज दुरुस्ती, पॉलिश आणि क्लीनिंग. सर्व प्रकारच्या फुटवेअरची दुरुस्ती आणि देखभाल. जोड्यांची मुरम्मत, पॉलिश आणि सफाई सेवा.</div>
                </div>
                <div class="service-card" onclick="window.open('https://play.google.com/store/apps/details?id=in.ordor.indiadoor','_blank')">
                    <i class="fas fa-tshirt"></i>
                    <h3>धोबी</h3>
                    <p>Washerman</p>
                    <div class="description">कपडे धुणे, इस्त्री आणि ड्राय क्लीनिंग. कपड्यांची धुलाई, इस्त्री आणि पॅकिंग सेवा. ऑर्गेनिक क्लीनिंग उत्पादने वापरून सेवा.</div>
                </div>
                <div class="service-card" onclick="window.open('https://play.google.com/store/apps/details?id=in.ordor.indiadoor','_blank')">
                    <i class="fas fa-utensils"></i>
                    <h3>भांडी घासणारी महिला</h3>
                    <p>Housemaid</p>
                    <div class="description">स्वच्छता, भांडी आणि घरकामासाठी मदत. दैनंदिन घरकाम, स्वच्छता आणि भांडी घासण्याची सेवा. विश्वासार्ह आणि अनुभवी कामगार.</div>
                </div>
                <div class="service-card" onclick="window.open('https://play.google.com/store/apps/details?id=in.ordor.indiadoor','_blank')">
                    <i class="fas fa-tools"></i>
                    <h3>वेल्डर</h3>
                    <p>Welder</p>
                    <div class="description">लोखंडी वेल्डिंंग, गेट, ग्रिल आणि सुरक्षा काम. धातूची वेल्डिंग, कटिंग आणि फॅब्रिकेशन काम. औद्योगिक आणि घरगुती वेल्डिंग सेवा.</div>
                </div>
                <div class="service-card" onclick="window.open('https://play.google.com/store/apps/details?id=in.ordor.indiadoor','_blank')">
                    <i class="fas fa-snowflake"></i>
                    <h3>AC / फ्रिज रिपेअरिंग</h3>
                    <p>AC/Refrigerator Repair</p>
                    <div class="description">एसी, फ्रिज आणि कूलिंग उपकरणांची दुरुस्ती. शीतकरण उपकरणांची दुरुस्ती, देखभाल आणि सर्व्हिसिंग. आपत्कालीन दुरुस्ती सेवा उपलब्ध.</div>
                </div>
                <div class="service-card" onclick="window.open('https://play.google.com/store/apps/details?id=in.ordor.indiadoor','_blank')">
                    <i class="fas fa-car"></i>
                    <h3>वाहन मेकॅनिक</h3>
                    <p>Mechanic</p>
                    <div class="description">कार, स्कूटर, बाईक दुरुस्ती आणि सर्व्हिसिंग. सर्व प्रकारच्या वाहनांची दुरुस्ती आणि देखभाल. नियमित सर्व्हिसिंग आणि आपत्कालीन दुरुस्ती.</div>
                </div>
                <div class="service-card" onclick="window.open('https://play.google.com/store/apps/details?id=in.ordor.indiadoor','_blank')">
                    <i class="fas fa-hand-sparkles"></i>
                    <h3>कुंकू / मेहेंदी कलाकार</h3>
                    <p>Mehendi Artist</p>
                    <div class="description">सणासमारंभासाठी मेहेंदी, कुंकू आणि शृंगार. विविध डिझाईनची मेहेंदी आणि कुंकू कला. सणाविशेष आणि विवाहासाठी विशेष शृंगार सेवा.</div>
                </div>
                <div class="service-card" onclick="window.open('https://play.google.com/store/apps/details?id=in.ordor.indiadoor','_blank')">
                    <i class="fas fa-paint-brush"></i>
                    <h3>भिंतपट्टी / पोस्टर कलावंत</h3>
                    <p>Wall Painter / Poster Artist</p>
                    <div class="description">भिंतीवर चित्रे, साइनबोर्ड आणि पोस्टर डिझाइन. सार्वजनिक आणि खासगी ठिकाणी भित्तीचित्रकला आणि सजावट. जाहिराती आणि माहितीपट तयार करणे.</div>
                </div>
                <div class="service-card" onclick="window.open('https://play.google.com/store/apps/details?id=in.ordor.indiadoor','_blank')">
                    <i class="fas fa-burn"></i>
                    <h3>गॅस रिपेअरिंग टेक्निशियन</h3>
                    <p>Gas Repair</p>
                    <div class="description">गॅस स्टोव्ह, गॅस कनेक्शन आणि सेफ्टी चेक. गॅस उपकरणांची दुरुस्ती, देखभाल आणि सुरक्षा तपासणी. आपत्कालीन सेवा आणि सल्ला.</div>
                </div>
                <div class="service-card" onclick="window.open('https://play.google.com/store/apps/details?id=in.ordor.indiadoor','_blank')">
                    <i class="fas fa-utensil-spoon"></i>
                    <h3>स्वयंपाक करणारे</h3>
                    <p>Cook</p>
                    <div class="description">सणासमारंभ किंवा दैनंदिन स्वयंपाकासाठी आचारी. विविध पाककृती आणि खाद्यपदार्थ तयार करणे. सणाविशेष आणि मेजवानीसाठी स्वयंपाक सेवा.</div>
                </div>
                <div class="service-card" onclick="window.open('https://play.google.com/store/apps/details?id=in.ordor.indiadoor','_blank')">
                    <i class="fas fa-truck"></i>
                    <h3>डिलिव्हरी बॉय</h3>
                    <p>Delivery Boy</p>
                    <div class="description">घरपोच वितरण सेवा आणि पार्सल डिलिव्हरी. वेगवान आणि विश्वासार्ह वितरण सेवा. स्थानिक आणि शहरभर वितरण सेवा.</div>
                </div>
            </div>
        </div>

        <!-- Additional Information Section for Services -->
        <div class="container info-section">
            <div class="info-content">
                <h3 class="info-title">आमच्या कामगार सेवा विषयी अधिक माहिती</h3>
                <p class="info-text">
                    इंडिया डोअर मार्फत आपल्याला विविध कौशल्यांचे कामगार सहजतेने शोधू शकता. आमच्या प्लॅटफॉर्मवर नोंदणीकृत
                    सर्व कामगार त्यांच्या कामाबद्दल तज्ञ आहेत आणि ग्राहकांच्या अपेक्षांनुसार कामगिरी करतात. आम्ही कामगारांची
                    पार्श्वभूमी, अनुभव आणि कौशल्य याची काळजीपूर्वक पडताळणी करतो.
                </p>
                <div class="highlight">
                    <p><strong>लाभ:</strong> विश्वासार्ह आणि गुणवत्तापूर्ण सेवा, पारदर्शक किंमत, आणि त्वरित सेवा.</p>
                </div>
                <p class="info-text">
                    आमच्या कामगार सेवा प्लॅटफॉर्मवर, आपण आपल्या गरजेनुसार कामगार निवडू शकता, त्यांच्याशी थेट संवाद साधू
                    शकता आणि काम पूर्ण झाल्यानंतर रिव्ह्यू देऊ शकता. ही System दोन्ही बाजूंसाठी फायद्याची आहे - ग्राहकांना
                    गुणवत्तापूर्ण सेवा मिळते आणि कामगारांना त्यांच्या कौशल्यानुसार योग्य काम मिळते.
                </p>
                <ul class="info-list">
                    <li><i class="fas fa-check-circle" style="color: var(--secondary-color);"></i> सर्व कामगार
                        पार्श्वभूमी तपासणी केलेले</li>
                    <li><i class="fas fa-check-circle" style="color: var(--secondary-color);"></i> कामाची गुणवत्ता
                        आणि वेळेची खात्री</li>
                    <li><i class="fas fa-check-circle" style="color: var(--secondary-color);"></i> काम पूर्ण झाल्यावरच
                        पेमेंट</li>
                    <li><i class="fas fa-check-circle" style="color: var(--secondary-color);"></i> 24 तासांत तक्रारीचे
                        निराकरण</li>
                </ul>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="container footer-content">
            <div class="footer-left">
                <p>&copy; 2025 India Door. All rights reserved.</p>
                <p>सेवा आपल्या दारी | Service at Your Doorstep</p>
            </div>
        </div>
    </footer>

    <script>
        // Mobile menu functionality
        const hamburger = document.getElementById('hamburger');
        const navLinks = document.getElementById('navLinks');

        hamburger.addEventListener('click', () => {
            navLinks.classList.toggle('active');
            hamburger.classList.toggle('active');
        });

        // Close menu when clicking on a link
        document.querySelectorAll('.nav-links a').forEach(link => {
            link.addEventListener('click', () => {
                navLinks.classList.remove('active');
                hamburger.classList.remove('active');
            });
        });

        // Close menu when clicking outside
        document.addEventListener('click', (e) => {
            if (!hamburger.contains(e.target) && !navLinks.contains(e.target)) {
                navLinks.classList.remove('active');
                hamburger.classList.remove('active');
            }
        });

        // Simple JavaScript for navigation effect
        window.addEventListener('scroll', function () {
            const navbar = document.getElementById('navbar');
            if (window.scrollY > 50) {
                navbar.style.boxShadow = '0 4px 10px rgba(0, 0, 0, 0.1)';
                navbar.style.background = '#fff';
            } else {
                navbar.style.boxShadow = '0 1px 3px rgba(0, 0, 0, 0.12)';
                navbar.style.background = '#fff';
            }
        });

        // Smooth scrolling for navigation links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();

                const targetId = this.getAttribute('href');
                if (targetId === '#') return;

                const targetElement = document.querySelector(targetId);
                if (targetElement) {
                    window.scrollTo({
                        top: targetElement.offsetTop - 80,
                        behavior: 'smooth'
                    });
                }
            });
        });

        // Language switcher functionality
        const languageButtons = document.querySelectorAll('.language-switcher button');
        languageButtons.forEach(button => {
            button.addEventListener('click', function () {
                languageButtons.forEach(btn => btn.classList.remove('active'));
                this.classList.add('active');

                // In a real implementation, this would change the page language
                alert('Language switched to: ' + this.textContent);
            });
        });

        // Function to redirect to Play Store (placeholder)
        function redirectToApp() {
            // Replace with your actual Play Store link later
            alert('Redirecting to Play Store. This will open the app download page.');
            // window.location.href = 'https://play.google.com/store/apps/details?id=com.example.india_door';
        }
    </script>
</body>

</html>