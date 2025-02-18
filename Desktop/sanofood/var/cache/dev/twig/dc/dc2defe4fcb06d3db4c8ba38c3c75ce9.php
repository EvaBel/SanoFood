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

/* user/index.html.twig */
class __TwigTemplate_c6f0843df3d5babb85c237525bb028d8 extends Template
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
            'title' => [$this, 'block_title'],
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "user/index.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "user/index.html.twig"));

        $this->parent = $this->loadTemplate("base.html.twig", "user/index.html.twig", 1);
        yield from $this->parent->unwrap()->yield($context, array_merge($this->blocks, $blocks));
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    // line 3
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_title(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        yield "Login!";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
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




    <!-- ===========Banner Section start Here========== -->
    <section class=\"pageheader-section\" style=\"background-image: url(assets/images/pageheader/bg.jpg);\">
        <div class=\"container\">
            <div class=\"section-wrapper text-center text-uppercase\">
                <h2 class=\"pageheader-title\">Login for gaming</h2>
                <nav aria-label=\"breadcrumb\">
                    <ol class=\"breadcrumb justify-content-center mb-0\">
                        <li class=\"breadcrumb-item\"><a href=\"index.html\">Home</a></li>
                        <li class=\"breadcrumb-item active\" aria-current=\"page\">Login</li>
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
                <h3 class=\"title\">Login</h3>
                <form class=\"account-form\">
                    <div class=\"form-group\">
                        <input type=\"text\" placeholder=\"User Name\" name=\"username\">
                    </div>
                    <div class=\"form-group\">
                        <input type=\"password\" placeholder=\"Password\" name=\"password\">
                    </div>
                    <div class=\"form-group\">
                        <div class=\"d-flex justify-content-between flex-wrap pt-sm-2\">
                            <div class=\"checkgroup\">
                                <input type=\"checkbox\" name=\"remember\" id=\"remember\">
                                <label for=\"remember\">Remember Me</label>
                            </div>
                            <a href=\"#\">Forget Password?</a>
                        </div>
                    </div>
                    <div class=\"form-group\">
                        <button class=\"d-block default-button\"><span>Submit Now</span></button>
                    </div>
                </form>
                <div class=\"account-bottom\">
                    <span class=\"d-block cate pt-10\">Don’t Have any Account? <a href=\"registration.html\"> Sign Up</a></span>
                    <span class=\"or\"><span>or</span></span>
                    <h5 class=\"subtitle\">Login With Social Media</h5>
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
        return "user/index.html.twig";
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
        return array (  100 => 6,  87 => 5,  64 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}Login!{% endblock %}

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




    <!-- ===========Banner Section start Here========== -->
    <section class=\"pageheader-section\" style=\"background-image: url(assets/images/pageheader/bg.jpg);\">
        <div class=\"container\">
            <div class=\"section-wrapper text-center text-uppercase\">
                <h2 class=\"pageheader-title\">Login for gaming</h2>
                <nav aria-label=\"breadcrumb\">
                    <ol class=\"breadcrumb justify-content-center mb-0\">
                        <li class=\"breadcrumb-item\"><a href=\"index.html\">Home</a></li>
                        <li class=\"breadcrumb-item active\" aria-current=\"page\">Login</li>
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
                <h3 class=\"title\">Login</h3>
                <form class=\"account-form\">
                    <div class=\"form-group\">
                        <input type=\"text\" placeholder=\"User Name\" name=\"username\">
                    </div>
                    <div class=\"form-group\">
                        <input type=\"password\" placeholder=\"Password\" name=\"password\">
                    </div>
                    <div class=\"form-group\">
                        <div class=\"d-flex justify-content-between flex-wrap pt-sm-2\">
                            <div class=\"checkgroup\">
                                <input type=\"checkbox\" name=\"remember\" id=\"remember\">
                                <label for=\"remember\">Remember Me</label>
                            </div>
                            <a href=\"#\">Forget Password?</a>
                        </div>
                    </div>
                    <div class=\"form-group\">
                        <button class=\"d-block default-button\"><span>Submit Now</span></button>
                    </div>
                </form>
                <div class=\"account-bottom\">
                    <span class=\"d-block cate pt-10\">Don’t Have any Account? <a href=\"registration.html\"> Sign Up</a></span>
                    <span class=\"or\"><span>or</span></span>
                    <h5 class=\"subtitle\">Login With Social Media</h5>
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

{% endblock %}
", "user/index.html.twig", "C:\\Users\\Motaz\\mm Dropbox\\Motaz Sammoud\\PC\\Desktop\\2025\\safwen_yahya_symfony\\symfony_crud_safwen_yahya\\templates\\user\\index.html.twig");
    }
}
