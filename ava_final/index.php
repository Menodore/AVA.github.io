<!DOCTYPE html>
<html lang="en">
<style>
    :root {
        --primary: #5a4dff;
        --primary-light: #8a80ff;
        --primary-dark: #3a2fd1;
        --secondary: #d7aefc;
        --accent: #ff7e79;
        --text: #333333;
        --text-light: #666666;
        --bg: #f5f5f5;
        --bg-alt: #ffffff;
        --border: #e0e0e0;
        
        --space-xs: 0.5rem;
        --space-sm: 1rem;
        --space-md: 1.5rem;
        --space-lg: 2rem;
        --space-xl: 3rem;
        
        --shadow-sm: 0 1px 3px rgba(0,0,0,0.1);
        --shadow-md: 0 4px 6px rgba(0,0,0,0.1);
        --shadow-lg: 0 10px 15px rgba(0,0,0,0.1);
        
        --transition: all 0.3s ease;
    }
    
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }
    
    body {
        font-family: 'Arial', sans-serif;
        line-height: 1.6;
        color: var(--text);
        background-color: var(--bg);
    }
    
    .container {
        width: 100%;
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 var(--space-md);
    }
    
    /* Header Styles */
    .navbar {
        display: flex;
        justify-content: center;
        padding: var(--space-sm) 0;
        background-color: var(--bg-alt);
        box-shadow: var(--shadow-sm);
        position: sticky;
        top: 0;
        z-index: 100;
    }
    
    .logo-nav-container {
        display: flex;
        justify-content: space-between;
        align-items: center;
        width: 100%;
    }
    
    /* Logo container */
    .logo-container {
        display: flex;
        align-items: center;
        gap: 15px;
        margin-right: 30px;
    }
    
    .header-logo {
        height: 40px;
        width: auto;
    }
    
    .logo {
        font-size: 1.5rem;
        font-weight: bold;
        color: var(--primary);
    }
    
    .nav-links {
        display: flex;
        list-style: none;
        gap: var(--space-md);
        margin: 0;
        padding: 0;
        align-items: center;
    }
    
    .nav-links a {
        text-decoration: none;
        color: var(--text);
        font-weight: 500;
        transition: var(--transition);
    }
    
    .nav-links a:hover {
        color: var(--primary);
    }
    
    /* Dropdown Styles */
    .dropdown {
        position: relative;
    }
    
    /* Dropdown arrow */
    .dropdown > a::after {
        content: " ▾";
        font-size: 0.9em;
        margin-left: 5px;
    }
    
    .dropdown-content {
        position: absolute;
        top: 100%;
        left: 0;
        background-color: var(--bg-alt);
        min-width: 200px;
        box-shadow: var(--shadow-lg);
        border-radius: 4px;
        padding: var(--space-xs) 0;
        z-index: 1;
        opacity: 0;
        visibility: hidden;
        transform: translateY(10px);
        transition: var(--transition);
    }
    
    .dropdown-content a {
        display: block;
        padding: var(--space-xs) var(--space-sm);
        color: var(--text);
    }
    
    .dropdown-content a:hover {
        background-color: rgba(90, 77, 255, 0.05);
    }
    
    .dropdown:hover .dropdown-content,
    .dropdown-content.show {
        opacity: 1;
        visibility: visible;
        transform: translateY(0);
    }
    
    .hero-section {
        display: flex;
        align-items: center;
        min-height: 90vh;
        background: linear-gradient(135deg, var(--primary), var(--secondary));
        color: white;
        text-align: center;
        position: relative;
        overflow: hidden;
        padding-bottom: 50px;
    }
    
    .hero-wave {
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        height: 50px;
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 1200 120' preserveAspectRatio='none'%3E%3Cpath d='M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z' fill='%23ffffff'%3E%3C/path%3E%3C/svg%3E");
        background-size: cover;
        background-repeat: no-repeat;
    }
    
    .hero-content {
        width: 100%;
        max-width: 800px;
        margin: 0 auto;
        padding: var(--space-xl) 0;
        position: relative;
        z-index: 2;
    }
    
    .hero-section h1 {
        font-size: 3rem;
        line-height: 1.2;
        margin-bottom: var(--space-md);
    }
    
    .hero-section p {
        font-size: 1.2rem;
        margin-bottom: var(--space-lg);
        color: rgba(255,255,255,0.9);
    }
    
    .cta-btn {
        background-color: white;
        color: var(--primary);
        border: none;
        padding: var(--space-sm) var(--space-lg);
        font-size: 1rem;
        font-weight: 600;
        border-radius: 50px;
        cursor: pointer;
        transition: var(--transition);
        box-shadow: var(--shadow-sm);
    }
    
    .cta-btn:hover {
        transform: translateY(-2px);
        box-shadow: var(--shadow-md);
    }
    
    /* Content Boxes */
    .content-box {
        background-color: var(--bg-alt);
        border-radius: 8px;
        padding: var(--space-xl);
        margin-bottom: var(--space-xl);
        box-shadow: var(--shadow-sm);
        text-align: center;
    }
    
    .content-section h2,
    .content-section h3 {
        color: var(--primary);
        margin-bottom: var(--space-md);
    }
    
    .section-divider {
        height: 4px;
        width: 60px;
        background-color: var(--primary);
        margin: var(--space-md) auto;
        border-radius: 2px;
    }
    
    .content-box p {
        margin-bottom: var(--space-md);
        color: var(--text-light);
        text-align: center;
        max-width: 800px;
        margin-left: auto;
        margin-right: auto;
    }
    
    /* Contact Section */
    .contact-content {
        max-width: 600px;
        margin: 0 auto;
        text-align: center;
    }
    
    .contact-list {
        list-style: none;
        margin-top: var(--space-md);
        display: inline-block;
        text-align: left;
    }
    
    .contact-list li {
        margin-bottom: var(--space-sm);
        position: relative;
        padding-left: 0;
    }
    
    .bullet {
        color: var(--primary);
        margin-right: 8px;
    }
    
    /* Footer Styles */
    .footer {
        background: linear-gradient(135deg, var(--primary), var(--secondary));
        color: white;
        padding: 3rem 0;
        margin-top: 3rem;
    }
    
    .footer-content {
        width: 90%;
        max-width: 1200px;
        margin: 0 auto;
        text-align: center;
    }
    
    .footer-grid {
        display: flex;
        justify-content: center;
        margin-bottom: 1.5rem;
    }
    
    .footer-column {
        text-align: center;
        margin: 0 2rem;
    }
    
    .footer-column h4 {
        color: white;
        margin-bottom: 1rem;
        font-size: 1.1rem;
        font-weight: 600;
    }
    
    .footer-column ul {
        list-style: none;
        padding: 0;
        display: inline-block;
        text-align: left;
    }
    
    .footer-column li {
        margin-bottom: 0.5rem;
    }
    
    .footer-column a {
        color: rgba(255,255,255,0.8);
        text-decoration: none;
        transition: var(--transition);
        font-size: 0.95rem;
    }
    
    .footer-column a:hover {
        color: white;
        text-decoration: underline;
    }
    
    .footer-links-row {
        display: flex;
        justify-content: center;
        gap: 2rem;
        margin-bottom: 2rem;
        flex-wrap: wrap;
    }
    
    .footer-links-row a {
        color: rgba(255,255,255,0.8);
        text-decoration: none;
        transition: var(--transition);
        font-size: 0.95rem;
    }
    
    .footer-links-row a:hover {
        color: white;
        text-decoration: underline;
    }
    
    .social-icons {
        display: flex;
        justify-content: center;
        gap: 1.5rem;
        margin: 1.5rem 0;
    }
    
    .social-icons a {
        color: white;
        font-size: 1.5rem;
        transition: all 0.3s ease;
    }
    
    .social-icons a:hover {
        color: var(--secondary);
        transform: translateY(-3px);
    }
    
    .copyright {
        margin-top: 1rem;
        font-size: 0.9rem;
    }
    
    .disclaimer {
        margin-top: 1rem;
        font-size: 0.8rem;
        opacity: 0.8;
        max-width: 800px;
        margin-left: auto;
        margin-right: auto;
    }
    
    /* Login Button */
    .login-btn {
        background-color: var(--primary);
        color: white !important;
        padding: 0.5rem 1.25rem;
        border-radius: 50px;
        transition: var(--transition);
        display: inline-block;
    }
    
    .login-btn:hover {
        background-color: var(--primary-dark);
        transform: translateY(-2px);
        box-shadow: var(--shadow-sm);
    }
    
    /* Mobile Menu */
    .mobile-menu-btn {
        display: none;
        background: none;
        border: none;
        cursor: pointer;
        padding: var(--space-xs);
    }
    
    .mobile-menu-btn span {
        display: block;
        width: 24px;
        height: 2px;
        background-color: var(--text);
        margin: 5px 0;
        transition: var(--transition);
    }
    
    /* Responsive Styles */
    @media (max-width: 768px) {
        .logo-nav-container {
            flex-direction: column;
            align-items: stretch;
        }
    
        .logo-container {
            gap: 10px;
            margin-right: 0;
            justify-content: center;
        }
    
        .nav-links {
            position: fixed;
            top: 70px;
            left: 0;
            width: 100%;
            background-color: var(--bg-alt);
            flex-direction: column;
            align-items: center;
            padding: var(--space-md);
            box-shadow: var(--shadow-md);
            transform: translateY(-150%);
            transition: var(--transition);
        }
        
        .nav-links.show {
            transform: translateY(0);
        }
        
        .mobile-menu-btn {
            display: block;
            position: absolute;
            right: var(--space-md);
            top: var(--space-sm);
        }
        
        .mobile-menu-btn.open span:nth-child(1) {
            transform: rotate(45deg) translate(5px, 5px);
        }
        
        .mobile-menu-btn.open span:nth-child(2) {
            opacity: 0;
        }
        
        .mobile-menu-btn.open span:nth-child(3) {
            transform: rotate(-45deg) translate(5px, -5px);
        }
        
        .dropdown > a::after,
        .dropdown-submenu > a::after {
            content: "";
        }
        
        .dropdown-content {
            position: static;
            box-shadow: none;
            opacity: 1;
            visibility: visible;
            transform: none;
            display: none;
            padding-left: var(--space-md);
        }
        
        .dropdown-content.show {
            display: block;
        }
    
        .hero-section h1 {
            font-size: 2.5rem;
        }
    
        .content-box {
            padding: var(--space-lg);
        }
    
        .footer-grid {
            flex-direction: column;
            gap: 1.5rem;
        }
    
        .footer-column {
            margin: 0;
        }
    
        .footer-links-row {
            flex-direction: column;
            gap: 1rem;
        }
    
        .login-btn {
            margin-top: 0.5rem;
        }
    }
</style>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ava - Women's Wellness</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <header class="navbar">
        <div class="container">
            <div class="logo-nav-container">
                <div class="logo-container">
                    <img src="logo.png" alt="Ava Logo" class="header-logo">
                    <div class="logo">Ava</div>
                </div>
                <nav>
                    <ul class="nav-links">
                        <li><a href="index.php#home">Home</a></li>
                        <li class="dropdown">
                            <a href="#" id="aboutLink">About</a>
                            <div class="dropdown-content">
                                <a href="#story">Our Story</a>
                                <a href="#mission">Mission</a>
                            </div>
                        </li>
                        <li><a href="#contact">Contact</a></li>
                        <li><a href="user/signin.php" class="login-btn">Login</a></li>
                    </ul>
                </nav>
            </div>
            <button class="mobile-menu-btn" aria-label="Menu">
                <span></span>
                <span></span>
                <span></span>
            </button>
        </div>
    </header>

    <main>
        <section class="hero-section" id="home">
            <div class="container">
                <div class="hero-content">
                    <h1><br>Wellness Crafted<br>for Women,<br>by Women.</h1>
                    <p>Discover a personalized wellness journey with Ava, designed just for you.</p>
                    <button class="cta-btn" onclick="location.href='user/signup.php'">Get Started</button>
                </div>
            </div>
            <div class="hero-wave"></div>
        </section>

        <section class="content-section">
            <div class="container">
                <div class="content-box" id="story">
                    <h2><br>Our Story</h2>
                    <div class="section-divider"></div>
                    <p>At Ava, we’re a sisterhood-first wellness platform, founded by three women who saw the gaps in traditional wellness spaces. We wanted something real, personal, and judgment-free—a place where women could find compassionate, relatable support for their unique health journeys.</p>
                    <p>Ava is your trusted guide and friend, whether you're navigating periods, PCOS, mental health, or just need someone who truly understands. Because every woman deserves a sister to rely on—and that’s exactly what we’re here to be.💜</p>
                </div>

                <div class="content-box" id="mission">
                    <h2><br>Our Mission</h2>
                    <div class="section-divider"></div>
                    <p>At Ava, we strive to create an empowering, compassionate space that encourages women to prioritize their wellness. Our mission is to provide women with the tools and support to better understand their bodies and mind, offering personalized solutions that make wellness approachable, accessible, and meaningful. </p>
                    <p>We believe every woman deserves a sister who listens, understands, and helps guide them on their health journey, no matter where they are in life.</p>
                </div>
            </div>
        </section>

        <section class="content-section">
            <div class="container">
                <div class="content-box" id="contact">
                    <h2><br>Contact Us</h2>
                    <div class="section-divider"></div>
                    <div class="contact-content">
                        <p>If you have any questions or feedback, feel free to reach out:</p>
                        <ul class="contact-list">
                            <li><span class="bullet">•</span> Email: support@avawellness.com</li>
                            <li><span class="bullet">•</span> Phone: +91 12345 67890</li>
                            <li><span class="bullet">•</span> Address: Ava Wellness, IIITDM Kurnool, India</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <footer class="footer">
        <div class="footer-content">
            <div class="footer-grid">
                <div class="footer-column">
                    <h4>About AVA</h4>
                    <ul>
                        <li><a href="#story">Our Story</a></li>
                        <li><a href="#mission">Mission</a></li>
                    </ul>
                </div>
            </div>
            <div class="footer-links-row">
                <a href="#">Privacy Policy</a>
                <a href="#">Terms of Service</a>
                <a href="#contact">Contact Us</a>
            </div>
            <div class="social-icons">
                <a href="#" aria-label="Facebook"><i class="fab fa-facebook"></i></a>
                <a href="#" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
                <a href="#" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                <a href="#" aria-label="Pinterest"><i class="fab fa-pinterest"></i></a>
            </div>
            <p class="copyright">© <span id="currentYear"></span> Ava Wellness. All rights reserved.</p>
            <p class="disclaimer"><small>Disclaimer: This website is for informational purposes only and not a substitute for professional medical advice.</small></p>
        </div>
    </footer>

    <script>
        document.getElementById('currentYear').textContent = new Date().getFullYear();
        
        const aboutLink = document.getElementById('aboutLink');
        const dropdown = document.querySelector('.dropdown-content');
        
        aboutLink.addEventListener('click', (e) => {
            e.preventDefault();
            dropdown.classList.toggle('show');
        });
        
        window.addEventListener('click', (e) => {
            if (!e.target.matches('#aboutLink') && dropdown.classList.contains('show')) {
                dropdown.classList.remove('show');
            }
        });
        
        const mobileBtn = document.querySelector('.mobile-menu-btn');
        const navLinks = document.querySelector('.nav-links');
        
        mobileBtn.addEventListener('click', () => {
            navLinks.classList.toggle('show');
            mobileBtn.classList.toggle('open');
        });

        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                const targetId = this.getAttribute('href');
                const targetElement = document.querySelector(targetId);
                if (targetElement) {
                    const headerHeight = document.querySelector('.navbar').offsetHeight;
                    const targetPosition = targetElement.offsetTop - headerHeight - 20;
                    window.scrollTo({
                        top: targetPosition,
                        behavior: 'smooth'
                    });
                }
            });
        });
    </script>
</body>
</html>