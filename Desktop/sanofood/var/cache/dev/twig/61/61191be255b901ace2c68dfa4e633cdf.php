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

/* user/signup.html.twig */
class __TwigTemplate_7b448bb7628c3a54bb45ea3ef2458d91 extends Template
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

        $this->blocks = [
            'body' => [$this, 'block_body'],
        ];
    }

    protected function doGetParent(array $context): bool|string|Template|TemplateWrapper
    {
        // line 1
        return "base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "user/signup.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "user/signup.html.twig"));

        $this->parent = $this->loadTemplate("base.html.twig", "user/signup.html.twig", 1);
        yield from $this->parent->unwrap()->yield($context, array_merge($this->blocks, $blocks));
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    // line 5
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

        // line 6
        yield "    <body>
    <!-- preloader start here -->
    <div class=\"preloader\">
        <div class=\"preloader-inner\">
            <div class=\"preloader-icon\">
                <span></span>
                <span></span>
            </div>
        </div>
    </div>
    <!-- preloader ending here -->

    <!-- scrollToTop start here -->
    <a href=\"#\" class=\"scrollToTop\"><i class=\"icofont-rounded-up\"></i></a>
    <!-- scrollToTop ending here -->

    <!-- ==========shape image Starts Here========== -->
    <div class=\"body-shape\">
        <img src=\"assets/images/shape/body-shape.png\" alt=\"shape\">
    </div>
    <!-- ==========shape image end Here========== -->




    <!-- ==========Header Section Starts Here========== -->



    <!-- ===========Banner Section start Here========== -->
    <section class=\"pageheader-section\" style=\"background-image: url(assets/images/pageheader/bg.jpg);\">
        <div class=\"container\">
            <div class=\"section-wrapper text-center text-uppercase\">
                <h2 class=\"pageheader-title\">Registration Page</h2>
                <nav aria-label=\"breadcrumb\">
                    <ol class=\"breadcrumb justify-content-center mb-0\">
                        <li class=\"breadcrumb-item\"><a href=\"index.html\">Home</a></li>
                        <li class=\"breadcrumb-item active\" aria-current=\"page\">Registration</li>
                    </ol>
                </nav>
            </div>
        </div>
    </section>
    <!-- ===========Banner Section Ends Here========== -->



    <!-- Login Section Section Starts Here -->
    <div class=\"login-section padding-top padding-bottom\">
        <div class=\" container\">
            <div class=\"account-wrapper\">
                <h3 class=\"title\">Register Now</h3>
                <form class=\"account-form\">
                    <div class=\"form-group\">
                        <input type=\"text\" placeholder=\"First Name\" name=\"Fname\">
                    </div>
                    <div class=\"form-group\">
                        <input type=\"text\" placeholder=\"Last Name\" name=\"Lname\">
                    </div>
                    <div class=\"form-group\">
                        <input type=\"text\" placeholder=\"Email\" name=\"email\">
                    </div>
                    <div class=\"form-group\">
                        <input type=\"password\" placeholder=\"Password\" name=\"password\">
                    </div>
                    <div class=\"form-group\">
                        <input type=\"password\" placeholder=\"Confirm Password\" name=\"password\">
                    </div>
                    <div class=\"form-group\">
                        <button class=\"d-block default-button\"><span>Get Started Now</span></button>
                    </div>
                </form>
                <div class=\"account-bottom\">
                    <span class=\"d-block cate pt-10\">Are you a member? <a href=\"login.html\">Login</a></span>
                    <span class=\"or\"><span>or</span></span>
                    <h5 class=\"subtitle\">Register With Social Media</h5>
                    <ul class=\"match-social-list d-flex flex-wrap align-items-center justify-content-center mt-4\">
                        <li><a href=\"#\"><img src=\"assets/images/match/social-1.png\" alt=\"vimeo\"></a></li>
                        <li><a href=\"#\"><img src=\"assets/images/match/social-2.png\" alt=\"youtube\"></a></li>
                        <li><a href=\"#\"><img src=\"assets/images/match/social-3.png\" alt=\"twitch\"></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Login Section Section Ends Here -->




    <!-- ================ footer Section start Here =============== -->
    <footer class=\"footer-section\">
        <div class=\"footer-top\">
            <div class=\"container\">
                <div class=\"row g-3 justify-content-center g-lg-0\">
                    <div class=\"col-lg-4 col-sm-6 col-12\">
                        <div class=\"footer-top-item lab-item\">
                            <div class=\"lab-inner\">
                                <div class=\"lab-thumb\">
                                    <img src=\"assets/images/footer/icons/01.png\" alt=\"Phone-icon\">
                                </div>
                                <div class=\"lab-content\">
                                    <span>Phone Number : +88019 339 702 520</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class=\"col-lg-4 col-sm-6 col-12\">
                        <div class=\"footer-top-item lab-item\">
                            <div class=\"lab-inner\">
                                <div class=\"lab-thumb\">
                                    <img src=\"assets/images/footer/icons/02.png\" alt=\"email-icon\">
                                </div>
                                <div class=\"lab-content\">
                                    <span>Email : youremail@gmail.com</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class=\"col-lg-4 col-sm-6 col-12\">
                        <div class=\"footer-top-item lab-item\">
                            <div class=\"lab-inner\">
                                <div class=\"lab-thumb\">
                                    <img src=\"assets/images/footer/icons/03.png\" alt=\"location-icon\">
                                </div>
                                <div class=\"lab-content\">
                                    <span>Address : 30 North West New York 240</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class=\"footer-middle padding-top padding-bottom\" style=\"background-image: url(assets/images/footer/bg.jpg);\">
            <div class=\"container\">
                <div class=\"row padding-lg-top\">
                    <div class=\"col-lg-4 col-md-6 col-12\">
                        <div class=\"footer-middle-item-wrapper\">
                            <div class=\"footer-middle-item mb-lg-0\">
                                <div class=\"fm-item-title mb-4\">
                                    <img src=\"assets/images/logo/logo.png\" alt=\"logo\">
                                </div>
                                <div class=\"fm-item-content\">
                                    <p class=\"mb-4\">Upropriate brand economca sound technolog after covalent technology enable prospective wastng markets whereas propriate and brand economca sound technolog</p>
                                    <ul class=\"match-social-list d-flex flex-wrap align-items-center\">
                                        <li><a href=\"#\"><img src=\"assets/images/match/social-1.png\" alt=\"vimeo\"></a></li>
                                        <li><a href=\"#\"><img src=\"assets/images/match/social-2.png\" alt=\"youtube\"></a></li>
                                        <li><a href=\"#\"><img src=\"assets/images/match/social-3.png\" alt=\"twitch\"></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class=\"col-lg-4 col-md-6 col-12\">
                        <div class=\"footer-middle-item-wrapper\">
                            <div class=\"footer-middle-item mb-lg-0\">
                                <div class=\"fm-item-title\">
                                    <h4>Top jackpot games</h4>
                                </div>
                                <div class=\"fm-item-content\">
                                    <div class=\"fm-item-widget lab-item\">
                                        <div class=\"lab-inner\">
                                            <div class=\"lab-thumb\">
                                                <a href=\"#\"> <img src=\"assets/images/footer/01.jpg\" alt=\"footer-widget-img\"></a>
                                            </div>
                                            <div class=\"lab-content\">
                                                <h6><a href=\"blog-single.html\">free Poker Game</a></h6>
                                                <p>Poker: <b>\$230</b></p>
                                                <div class=\"rating\">
                                                    <i class=\"icofont-ui-rating\"></i>
                                                    <i class=\"icofont-ui-rating\"></i>
                                                    <i class=\"icofont-ui-rating\"></i>
                                                    <i class=\"icofont-ui-rating\"></i>
                                                    <i class=\"icofont-ui-rating\"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class=\"fm-item-widget lab-item\">
                                        <div class=\"lab-inner\">
                                            <div class=\"lab-thumb\">
                                                <a href=\"#\"><img src=\"assets/images/footer/02.jpg\" alt=\"footer-widget-img\"></a>
                                            </div>
                                            <div class=\"lab-content\">
                                                <h6><a href=\"blog-single.html\">CLUB Poker Game</a></h6>
                                                <p>Poker: <b>\$290</b></p>
                                                <div class=\"rating\">
                                                    <i class=\"icofont-ui-rating\"></i>
                                                    <i class=\"icofont-ui-rating\"></i>
                                                    <i class=\"icofont-ui-rating\"></i>
                                                    <i class=\"icofont-ui-rating\"></i>
                                                    <i class=\"icofont-ui-rating\"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class=\"fm-item-widget lab-item\">
                                        <div class=\"lab-inner\">
                                            <div class=\"lab-thumb\">
                                                <a href=\"#\"><img src=\"assets/images/footer/03.jpg\" alt=\"footer-widget-img\"></a>
                                            </div>
                                            <div class=\"lab-content\">
                                                <h6><a href=\"blog-single.html\">ROYAL Poker Game</a></h6>
                                                <p>Poker: <b>\$330</b></p>
                                                <div class=\"rating\">
                                                    <i class=\"icofont-ui-rating\"></i>
                                                    <i class=\"icofont-ui-rating\"></i>
                                                    <i class=\"icofont-ui-rating\"></i>
                                                    <i class=\"icofont-ui-rating\"></i>
                                                    <i class=\"icofont-ui-rating\"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class=\"col-lg-4 col-md-6 col-12\">
                        <div class=\"footer-middle-item-wrapper\">
                            <div class=\"footer-middle-item-3 mb-lg-0\">
                                <div class=\"fm-item-title\">
                                    <h4>Our Newsletter</h4>
                                </div>
                                <div class=\"fm-item-content\">
                                    <p>Bigamer esports organization supported by community leaders</p>
                                    <form>
                                        <div class=\"form-group mb-4\">
                                            <input type=\"text\" class=\"form-control\" placeholder=\"Your Name\">
                                        </div>
                                        <div class=\"form-group mb-2\">
                                            <input type=\"email\" class=\"form-control\" placeholder=\"Your Email\">
                                        </div>
                                        <button type=\"submit\" class=\"default-button\"><span>Send Massage <i class=\"icofont-circled-right\"></i></span></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class=\"footer-bottom\">
            <div class=\"container\">
                <div class=\"row\">
                    <div class=\"col-12\">
                        <div class=\"footer-bottom-content text-center\">
                            <p>&copy;2021 <a href=\"index.html\">BiGamer</a> - eSpost And Gameing HTML Template.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- ================ footer Section end Here =============== -->





    <!-- Google Analytics: change UA-XXXXX-Y to be your site's ID. -->
    <script>
        window.ga = function () {
            ga.q.push(arguments)
        };
        ga.q = [];
        ga.l = +new Date;
        ga('create', 'UA-XXXXX-Y', 'auto');
        ga('set', 'anonymizeIp', true);
        ga('set', 'transport', 'beacon');
        ga('send', 'pageview')
    </script>
    <script src=\"https://www.google-analytics.com/analytics.js\" async></script>



    </body>
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
        return "user/signup.html.twig";
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
        return array (  76 => 6,  63 => 5,  40 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.html.twig' %}



{% block body %}
    <body>
    <!-- preloader start here -->
    <div class=\"preloader\">
        <div class=\"preloader-inner\">
            <div class=\"preloader-icon\">
                <span></span>
                <span></span>
            </div>
        </div>
    </div>
    <!-- preloader ending here -->

    <!-- scrollToTop start here -->
    <a href=\"#\" class=\"scrollToTop\"><i class=\"icofont-rounded-up\"></i></a>
    <!-- scrollToTop ending here -->

    <!-- ==========shape image Starts Here========== -->
    <div class=\"body-shape\">
        <img src=\"assets/images/shape/body-shape.png\" alt=\"shape\">
    </div>
    <!-- ==========shape image end Here========== -->




    <!-- ==========Header Section Starts Here========== -->



    <!-- ===========Banner Section start Here========== -->
    <section class=\"pageheader-section\" style=\"background-image: url(assets/images/pageheader/bg.jpg);\">
        <div class=\"container\">
            <div class=\"section-wrapper text-center text-uppercase\">
                <h2 class=\"pageheader-title\">Registration Page</h2>
                <nav aria-label=\"breadcrumb\">
                    <ol class=\"breadcrumb justify-content-center mb-0\">
                        <li class=\"breadcrumb-item\"><a href=\"index.html\">Home</a></li>
                        <li class=\"breadcrumb-item active\" aria-current=\"page\">Registration</li>
                    </ol>
                </nav>
            </div>
        </div>
    </section>
    <!-- ===========Banner Section Ends Here========== -->



    <!-- Login Section Section Starts Here -->
    <div class=\"login-section padding-top padding-bottom\">
        <div class=\" container\">
            <div class=\"account-wrapper\">
                <h3 class=\"title\">Register Now</h3>
                <form class=\"account-form\">
                    <div class=\"form-group\">
                        <input type=\"text\" placeholder=\"First Name\" name=\"Fname\">
                    </div>
                    <div class=\"form-group\">
                        <input type=\"text\" placeholder=\"Last Name\" name=\"Lname\">
                    </div>
                    <div class=\"form-group\">
                        <input type=\"text\" placeholder=\"Email\" name=\"email\">
                    </div>
                    <div class=\"form-group\">
                        <input type=\"password\" placeholder=\"Password\" name=\"password\">
                    </div>
                    <div class=\"form-group\">
                        <input type=\"password\" placeholder=\"Confirm Password\" name=\"password\">
                    </div>
                    <div class=\"form-group\">
                        <button class=\"d-block default-button\"><span>Get Started Now</span></button>
                    </div>
                </form>
                <div class=\"account-bottom\">
                    <span class=\"d-block cate pt-10\">Are you a member? <a href=\"login.html\">Login</a></span>
                    <span class=\"or\"><span>or</span></span>
                    <h5 class=\"subtitle\">Register With Social Media</h5>
                    <ul class=\"match-social-list d-flex flex-wrap align-items-center justify-content-center mt-4\">
                        <li><a href=\"#\"><img src=\"assets/images/match/social-1.png\" alt=\"vimeo\"></a></li>
                        <li><a href=\"#\"><img src=\"assets/images/match/social-2.png\" alt=\"youtube\"></a></li>
                        <li><a href=\"#\"><img src=\"assets/images/match/social-3.png\" alt=\"twitch\"></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Login Section Section Ends Here -->




    <!-- ================ footer Section start Here =============== -->
    <footer class=\"footer-section\">
        <div class=\"footer-top\">
            <div class=\"container\">
                <div class=\"row g-3 justify-content-center g-lg-0\">
                    <div class=\"col-lg-4 col-sm-6 col-12\">
                        <div class=\"footer-top-item lab-item\">
                            <div class=\"lab-inner\">
                                <div class=\"lab-thumb\">
                                    <img src=\"assets/images/footer/icons/01.png\" alt=\"Phone-icon\">
                                </div>
                                <div class=\"lab-content\">
                                    <span>Phone Number : +88019 339 702 520</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class=\"col-lg-4 col-sm-6 col-12\">
                        <div class=\"footer-top-item lab-item\">
                            <div class=\"lab-inner\">
                                <div class=\"lab-thumb\">
                                    <img src=\"assets/images/footer/icons/02.png\" alt=\"email-icon\">
                                </div>
                                <div class=\"lab-content\">
                                    <span>Email : youremail@gmail.com</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class=\"col-lg-4 col-sm-6 col-12\">
                        <div class=\"footer-top-item lab-item\">
                            <div class=\"lab-inner\">
                                <div class=\"lab-thumb\">
                                    <img src=\"assets/images/footer/icons/03.png\" alt=\"location-icon\">
                                </div>
                                <div class=\"lab-content\">
                                    <span>Address : 30 North West New York 240</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class=\"footer-middle padding-top padding-bottom\" style=\"background-image: url(assets/images/footer/bg.jpg);\">
            <div class=\"container\">
                <div class=\"row padding-lg-top\">
                    <div class=\"col-lg-4 col-md-6 col-12\">
                        <div class=\"footer-middle-item-wrapper\">
                            <div class=\"footer-middle-item mb-lg-0\">
                                <div class=\"fm-item-title mb-4\">
                                    <img src=\"assets/images/logo/logo.png\" alt=\"logo\">
                                </div>
                                <div class=\"fm-item-content\">
                                    <p class=\"mb-4\">Upropriate brand economca sound technolog after covalent technology enable prospective wastng markets whereas propriate and brand economca sound technolog</p>
                                    <ul class=\"match-social-list d-flex flex-wrap align-items-center\">
                                        <li><a href=\"#\"><img src=\"assets/images/match/social-1.png\" alt=\"vimeo\"></a></li>
                                        <li><a href=\"#\"><img src=\"assets/images/match/social-2.png\" alt=\"youtube\"></a></li>
                                        <li><a href=\"#\"><img src=\"assets/images/match/social-3.png\" alt=\"twitch\"></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class=\"col-lg-4 col-md-6 col-12\">
                        <div class=\"footer-middle-item-wrapper\">
                            <div class=\"footer-middle-item mb-lg-0\">
                                <div class=\"fm-item-title\">
                                    <h4>Top jackpot games</h4>
                                </div>
                                <div class=\"fm-item-content\">
                                    <div class=\"fm-item-widget lab-item\">
                                        <div class=\"lab-inner\">
                                            <div class=\"lab-thumb\">
                                                <a href=\"#\"> <img src=\"assets/images/footer/01.jpg\" alt=\"footer-widget-img\"></a>
                                            </div>
                                            <div class=\"lab-content\">
                                                <h6><a href=\"blog-single.html\">free Poker Game</a></h6>
                                                <p>Poker: <b>\$230</b></p>
                                                <div class=\"rating\">
                                                    <i class=\"icofont-ui-rating\"></i>
                                                    <i class=\"icofont-ui-rating\"></i>
                                                    <i class=\"icofont-ui-rating\"></i>
                                                    <i class=\"icofont-ui-rating\"></i>
                                                    <i class=\"icofont-ui-rating\"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class=\"fm-item-widget lab-item\">
                                        <div class=\"lab-inner\">
                                            <div class=\"lab-thumb\">
                                                <a href=\"#\"><img src=\"assets/images/footer/02.jpg\" alt=\"footer-widget-img\"></a>
                                            </div>
                                            <div class=\"lab-content\">
                                                <h6><a href=\"blog-single.html\">CLUB Poker Game</a></h6>
                                                <p>Poker: <b>\$290</b></p>
                                                <div class=\"rating\">
                                                    <i class=\"icofont-ui-rating\"></i>
                                                    <i class=\"icofont-ui-rating\"></i>
                                                    <i class=\"icofont-ui-rating\"></i>
                                                    <i class=\"icofont-ui-rating\"></i>
                                                    <i class=\"icofont-ui-rating\"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class=\"fm-item-widget lab-item\">
                                        <div class=\"lab-inner\">
                                            <div class=\"lab-thumb\">
                                                <a href=\"#\"><img src=\"assets/images/footer/03.jpg\" alt=\"footer-widget-img\"></a>
                                            </div>
                                            <div class=\"lab-content\">
                                                <h6><a href=\"blog-single.html\">ROYAL Poker Game</a></h6>
                                                <p>Poker: <b>\$330</b></p>
                                                <div class=\"rating\">
                                                    <i class=\"icofont-ui-rating\"></i>
                                                    <i class=\"icofont-ui-rating\"></i>
                                                    <i class=\"icofont-ui-rating\"></i>
                                                    <i class=\"icofont-ui-rating\"></i>
                                                    <i class=\"icofont-ui-rating\"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class=\"col-lg-4 col-md-6 col-12\">
                        <div class=\"footer-middle-item-wrapper\">
                            <div class=\"footer-middle-item-3 mb-lg-0\">
                                <div class=\"fm-item-title\">
                                    <h4>Our Newsletter</h4>
                                </div>
                                <div class=\"fm-item-content\">
                                    <p>Bigamer esports organization supported by community leaders</p>
                                    <form>
                                        <div class=\"form-group mb-4\">
                                            <input type=\"text\" class=\"form-control\" placeholder=\"Your Name\">
                                        </div>
                                        <div class=\"form-group mb-2\">
                                            <input type=\"email\" class=\"form-control\" placeholder=\"Your Email\">
                                        </div>
                                        <button type=\"submit\" class=\"default-button\"><span>Send Massage <i class=\"icofont-circled-right\"></i></span></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class=\"footer-bottom\">
            <div class=\"container\">
                <div class=\"row\">
                    <div class=\"col-12\">
                        <div class=\"footer-bottom-content text-center\">
                            <p>&copy;2021 <a href=\"index.html\">BiGamer</a> - eSpost And Gameing HTML Template.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- ================ footer Section end Here =============== -->





    <!-- Google Analytics: change UA-XXXXX-Y to be your site's ID. -->
    <script>
        window.ga = function () {
            ga.q.push(arguments)
        };
        ga.q = [];
        ga.l = +new Date;
        ga('create', 'UA-XXXXX-Y', 'auto');
        ga('set', 'anonymizeIp', true);
        ga('set', 'transport', 'beacon');
        ga('send', 'pageview')
    </script>
    <script src=\"https://www.google-analytics.com/analytics.js\" async></script>



    </body>
{% endblock %}", "user/signup.html.twig", "C:\\Users\\Motaz\\mm Dropbox\\Motaz Sammoud\\PC\\Desktop\\2025\\safwen_yahya_symfony\\symfony_crud_safwen_yahya\\templates\\user\\signup.html.twig");
    }
}
