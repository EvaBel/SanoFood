<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\CoreExtension;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;
use Twig\TemplateWrapper;

/* base.html.twig */
class __TwigTemplate_c2c28164f3e0c17cac89a63acd429809 extends Template
{
    private Source $source;
    /**
     * @var array<string, Template>
     */
    private array $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'stylesheets' => [$this, 'block_stylesheets'],
            'body' => [$this, 'block_body'],
            'javascripts' => [$this, 'block_javascripts'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "base.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "base.html.twig"));

        // line 1
        yield "<!DOCTYPE html>
<html lang=\"en\">

<head>
  <meta charset=\"utf-8\">
  <meta content=\"width=device-width, initial-scale=1.0\" name=\"viewport\">
  <title>SanoFood</title>
  <meta name=\"description\" content=\"\">
  <meta name=\"keywords\" content=\"\">

  <!-- Favicons -->
  <link href=\"/assets/img/favicon.png\" rel=\"icon\">
  <link href=\"/assets/img/apple-touch-icon.png\" rel=\"apple-touch-icon\">

  <!-- Fonts -->
  <link href=\"https://fonts.googleapis.com\" rel=\"preconnect\">
  <link href=\"https://fonts.gstatic.com\" rel=\"preconnect\" crossorigin>
  <link href=\"https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Amatic+SC:wght@400;700&display=swap\" rel=\"stylesheet\">
  
  ";
        // line 20
        yield from $this->unwrap()->yieldBlock('stylesheets', $context, $blocks);
        // line 39
        yield "</head>

<body class=\"index-page\">

  <header id=\"header\" class=\"header d-flex align-items-center sticky-top\">
    <div class=\"container position-relative d-flex align-items-center justify-content-between\">

      <a href=\"index.html\" class=\"logo d-flex align-items-center me-auto me-xl-0\">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src=\"/assets/img/logo.png\" alt=\"\"> -->
        <h1 class=\"sitename\">SanoFood</h1>
        <span>.</span>
      </a>

      <nav id=\"navmenu\" class=\"navmenu\">
        <ul>
          <li><a href=\"#hero\" class=\"active\">Home<br></a></li>
          <li><a href=\"#about\">About</a></li>
          <li><a href=\"";
        // line 57
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("add_livraison"), "html", null, true);
        yield "\"> livrer</a></li>
          <li><a href=\"";
        // line 58
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("demande"), "html", null, true);
        yield "\">affichage des demandes</a></li>
          <li><a href=\"";
        // line 59
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("aaficher_commande"), "html", null, true);
        yield "\">affichage des commandes</a></li>
          <li><a href=\"";
        // line 60
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("add_demande"), "html", null, true);
        yield "\">Demander conseil</a></li>
          <li><a href=\"#gallery\">Gallery</a></li>
          <li class=\"dropdown\"><a href=\"#\"><span>Dropdown</span> <i class=\"bi bi-chevron-down toggle-dropdown\"></i></a>
            <ul>
              <li><a href=\"#\">Dropdown 1</a></li>
              <li class=\"dropdown\"><a href=\"#\"><span>Deep Dropdown</span> <i class=\"bi bi-chevron-down toggle-dropdown\"></i></a>
                <ul>
                  <li><a href=\"#\">Deep Dropdown 1</a></li>
                  <li><a href=\"#\">Deep Dropdown 2</a></li>
                  <li><a href=\"#\">Deep Dropdown 3</a></li>
                  <li><a href=\"#\">Deep Dropdown 4</a></li>
                  <li><a href=\"#\">Deep Dropdown 5</a></li>
                </ul>
              </li>
              <li><a href=\"#\">Dropdown 2</a></li>
              <li><a href=\"#\">Dropdown 3</a></li>
              <li><a href=\"#\">Dropdown 4</a></li>
            </ul>
          </li>
          <li><a href=\"#contact\">Contact</a></li>
        </ul>
        <i class=\"mobile-nav-toggle d-xl-none bi bi-list\"></i>
      </nav>

      <a class=\"btn-getstarted\" href=\"index.html#book-a-table\">Login</a>

    </div>
  </header>
  ";
        // line 88
        yield from $this->unwrap()->yieldBlock('body', $context, $blocks);
        // line 129
        yield "  <!-- Scroll Top -->
  <a href=\"#\" id=\"scroll-top\" class=\"scroll-top d-flex align-items-center justify-content-center\"><i class=\"bi bi-arrow-up-short\"></i></a>

  <!-- Preloader -->
  <div id=\"preloader\"></div>
  ";
        // line 134
        yield from $this->unwrap()->yieldBlock('javascripts', $context, $blocks);
        // line 147
        yield "</body>

</html>";
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    // line 20
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_stylesheets(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "stylesheets"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "stylesheets"));

        // line 21
        yield "  <!-- Vendor CSS Files -->
  <link href=\"/assets/vendor/bootstrap/css/bootstrap.min.css\" rel=\"stylesheet\">
  <link href=\"/assets/vendor/bootstrap-icons/bootstrap-icons.css\" rel=\"stylesheet\">
  <link href=\"/assets/vendor/aos/aos.css\" rel=\"stylesheet\">
  <link href=\"/assets/vendor/glightbox/css/glightbox.min.css\" rel=\"stylesheet\">
  <link href=\"/assets/vendor/swiper/swiper-bundle.min.css\" rel=\"stylesheet\">

  <!-- Main CSS File -->
  <link href=\"/assets/css/main.css\" rel=\"stylesheet\">

  <!-- =======================================================
  * Template Name: Yummy
  * Template URL: https://bootstrapmade.com/yummy-bootstrap-restaurant-website-template/
  * Updated: Aug 07 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
  ";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 88
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_body(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 89
        yield "  <main class=\"main\">

    <!-- Hero Section -->
    <section id=\"hero\" class=\"hero section light-background\">
      
      <div class=\"container\">
        <div class=\"row gy-4 justify-content-center justify-content-lg-between\">
          <div class=\"col-lg-5 order-2 order-lg-1 d-flex flex-column justify-content-center\">
            <h1 data-aos=\"fade-up\">Enjoy Your Healthy<br>Delicious Food</h1>
            <p data-aos=\"fade-up\" data-aos-delay=\"100\">We are team of talented designers making websites with Bootstrap</p>
            <div class=\"d-flex\" data-aos=\"fade-up\" data-aos-delay=\"200\">
              <a href=\"#book-a-table\" class=\"btn-get-started\">Book a Table</a>
              <a href=\"https://www.youtube.com/watch?v=Y7f98aduVJ8\" class=\"glightbox btn-watch-video d-flex align-items-center\">
                <i class=\"bi bi-play-circle\"></i><span>Watch Video</span>
              </a>
            </div>
            
          </div>
          
        </div>
      </div>
      <div class=\"bg-light py-5\">
        <div class=\"container\">
          <div class=\"col-lg-5 order-1 order-lg-2 hero-img\" data-aos=\"zoom-out\">
            <img src=\"/assets/img/hero-img.png\" class=\"img-fluid animated\" alt=\"\">
          </div>
        </div>
      </div>
      
      

    </section><!-- /Hero Section -->
    
          
    
    

  </footer>
  <!-- Fond coloré entre les deux conteneurs -->
  ";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 134
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_javascripts(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "javascripts"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "javascripts"));

        // line 135
        yield "
  <!-- Vendor JS Files -->
  <script src=\"/assets/vendor/bootstrap/js/bootstrap.bundle.min.js\"></script>
  <script src=\"/assets/vendor/php-email-form/validate.js\"></script>
  <script src=\"/assets/vendor/aos/aos.js\"></script>
  <script src=\"/assets/vendor/glightbox/js/glightbox.min.js\"></script>
  <script src=\"/assets/vendor/purecounter/purecounter_vanilla.js\"></script>
  <script src=\"/assets/vendor/swiper/swiper-bundle.min.js\"></script>

  <!-- Main JS File -->
  <script src=\"/assets/js/main.js\"></script>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "base.html.twig";
    }

    /**
     * @codeCoverageIgnore
     */
    public function isTraitable(): bool
    {
        return false;
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDebugInfo(): array
    {
        return array (  278 => 135,  265 => 134,  215 => 89,  202 => 88,  174 => 21,  161 => 20,  148 => 147,  146 => 134,  139 => 129,  137 => 88,  106 => 60,  102 => 59,  98 => 58,  94 => 57,  74 => 39,  72 => 20,  51 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("<!DOCTYPE html>
<html lang=\"en\">

<head>
  <meta charset=\"utf-8\">
  <meta content=\"width=device-width, initial-scale=1.0\" name=\"viewport\">
  <title>SanoFood</title>
  <meta name=\"description\" content=\"\">
  <meta name=\"keywords\" content=\"\">

  <!-- Favicons -->
  <link href=\"/assets/img/favicon.png\" rel=\"icon\">
  <link href=\"/assets/img/apple-touch-icon.png\" rel=\"apple-touch-icon\">

  <!-- Fonts -->
  <link href=\"https://fonts.googleapis.com\" rel=\"preconnect\">
  <link href=\"https://fonts.gstatic.com\" rel=\"preconnect\" crossorigin>
  <link href=\"https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Amatic+SC:wght@400;700&display=swap\" rel=\"stylesheet\">
  
  {% block stylesheets %}
  <!-- Vendor CSS Files -->
  <link href=\"/assets/vendor/bootstrap/css/bootstrap.min.css\" rel=\"stylesheet\">
  <link href=\"/assets/vendor/bootstrap-icons/bootstrap-icons.css\" rel=\"stylesheet\">
  <link href=\"/assets/vendor/aos/aos.css\" rel=\"stylesheet\">
  <link href=\"/assets/vendor/glightbox/css/glightbox.min.css\" rel=\"stylesheet\">
  <link href=\"/assets/vendor/swiper/swiper-bundle.min.css\" rel=\"stylesheet\">

  <!-- Main CSS File -->
  <link href=\"/assets/css/main.css\" rel=\"stylesheet\">

  <!-- =======================================================
  * Template Name: Yummy
  * Template URL: https://bootstrapmade.com/yummy-bootstrap-restaurant-website-template/
  * Updated: Aug 07 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
  {%endblock%}
</head>

<body class=\"index-page\">

  <header id=\"header\" class=\"header d-flex align-items-center sticky-top\">
    <div class=\"container position-relative d-flex align-items-center justify-content-between\">

      <a href=\"index.html\" class=\"logo d-flex align-items-center me-auto me-xl-0\">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src=\"/assets/img/logo.png\" alt=\"\"> -->
        <h1 class=\"sitename\">SanoFood</h1>
        <span>.</span>
      </a>

      <nav id=\"navmenu\" class=\"navmenu\">
        <ul>
          <li><a href=\"#hero\" class=\"active\">Home<br></a></li>
          <li><a href=\"#about\">About</a></li>
          <li><a href=\"{{ asset ('add_livraison') }}\"> livrer</a></li>
          <li><a href=\"{{ asset ('demande') }}\">affichage des demandes</a></li>
          <li><a href=\"{{ asset ('aaficher_commande') }}\">affichage des commandes</a></li>
          <li><a href=\"{{ asset ('add_demande') }}\">Demander conseil</a></li>
          <li><a href=\"#gallery\">Gallery</a></li>
          <li class=\"dropdown\"><a href=\"#\"><span>Dropdown</span> <i class=\"bi bi-chevron-down toggle-dropdown\"></i></a>
            <ul>
              <li><a href=\"#\">Dropdown 1</a></li>
              <li class=\"dropdown\"><a href=\"#\"><span>Deep Dropdown</span> <i class=\"bi bi-chevron-down toggle-dropdown\"></i></a>
                <ul>
                  <li><a href=\"#\">Deep Dropdown 1</a></li>
                  <li><a href=\"#\">Deep Dropdown 2</a></li>
                  <li><a href=\"#\">Deep Dropdown 3</a></li>
                  <li><a href=\"#\">Deep Dropdown 4</a></li>
                  <li><a href=\"#\">Deep Dropdown 5</a></li>
                </ul>
              </li>
              <li><a href=\"#\">Dropdown 2</a></li>
              <li><a href=\"#\">Dropdown 3</a></li>
              <li><a href=\"#\">Dropdown 4</a></li>
            </ul>
          </li>
          <li><a href=\"#contact\">Contact</a></li>
        </ul>
        <i class=\"mobile-nav-toggle d-xl-none bi bi-list\"></i>
      </nav>

      <a class=\"btn-getstarted\" href=\"index.html#book-a-table\">Login</a>

    </div>
  </header>
  {% block body %}
  <main class=\"main\">

    <!-- Hero Section -->
    <section id=\"hero\" class=\"hero section light-background\">
      
      <div class=\"container\">
        <div class=\"row gy-4 justify-content-center justify-content-lg-between\">
          <div class=\"col-lg-5 order-2 order-lg-1 d-flex flex-column justify-content-center\">
            <h1 data-aos=\"fade-up\">Enjoy Your Healthy<br>Delicious Food</h1>
            <p data-aos=\"fade-up\" data-aos-delay=\"100\">We are team of talented designers making websites with Bootstrap</p>
            <div class=\"d-flex\" data-aos=\"fade-up\" data-aos-delay=\"200\">
              <a href=\"#book-a-table\" class=\"btn-get-started\">Book a Table</a>
              <a href=\"https://www.youtube.com/watch?v=Y7f98aduVJ8\" class=\"glightbox btn-watch-video d-flex align-items-center\">
                <i class=\"bi bi-play-circle\"></i><span>Watch Video</span>
              </a>
            </div>
            
          </div>
          
        </div>
      </div>
      <div class=\"bg-light py-5\">
        <div class=\"container\">
          <div class=\"col-lg-5 order-1 order-lg-2 hero-img\" data-aos=\"zoom-out\">
            <img src=\"/assets/img/hero-img.png\" class=\"img-fluid animated\" alt=\"\">
          </div>
        </div>
      </div>
      
      

    </section><!-- /Hero Section -->
    
          
    
    

  </footer>
  <!-- Fond coloré entre les deux conteneurs -->
  {% endblock %}
  <!-- Scroll Top -->
  <a href=\"#\" id=\"scroll-top\" class=\"scroll-top d-flex align-items-center justify-content-center\"><i class=\"bi bi-arrow-up-short\"></i></a>

  <!-- Preloader -->
  <div id=\"preloader\"></div>
  {% block javascripts %}

  <!-- Vendor JS Files -->
  <script src=\"/assets/vendor/bootstrap/js/bootstrap.bundle.min.js\"></script>
  <script src=\"/assets/vendor/php-email-form/validate.js\"></script>
  <script src=\"/assets/vendor/aos/aos.js\"></script>
  <script src=\"/assets/vendor/glightbox/js/glightbox.min.js\"></script>
  <script src=\"/assets/vendor/purecounter/purecounter_vanilla.js\"></script>
  <script src=\"/assets/vendor/swiper/swiper-bundle.min.js\"></script>

  <!-- Main JS File -->
  <script src=\"/assets/js/main.js\"></script>
{%endblock%}
</body>

</html>", "base.html.twig", "C:\\Users\\Motaz\\mm Dropbox\\Motaz Sammoud\\PC\\Desktop\\2025\\symfony_crud_safwen_yahya\\templates\\base.html.twig");
    }
}
