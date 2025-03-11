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

/* registration/edit.html.twig */
class __TwigTemplate_f4c56c9d92f240c2ed19a3e52dd6ec2c extends Template
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
        ];
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "registration/edit.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "registration/edit.html.twig"));

        // line 1
        yield "<!DOCTYPE html>
<html lang=\"en\">
<head>
";
        // line 4
        $this->env->getRuntime("Symfony\\Component\\Form\\FormRenderer")->setTheme((isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 4, $this->source); })()), ["bootstrap_5_layout.html.twig"], true);
        // line 5
        yield "
    <meta charset=\"utf-8\">
    <!--  This file has been downloaded from bootdey.com @bootdey on twitter -->
    <!--  All snippets are MIT license http://bootdey.com/license -->
    <title>account setting or edit profile - Bootdey.com</title>
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
    <link href=\"https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css\" rel=\"stylesheet\">
    <style type=\"text/css\">
    \tbody {
    margin: 0;
    padding-top: 40px;
    color: #2e323c;
    background: #f5f6fa;
    position: relative;
    height: 100%;
}
.account-settings .user-profile {
    margin: 0 0 1rem 0;
    padding-bottom: 1rem;
    text-align: center;
}
.account-settings .user-profile .user-avatar {
    margin: 0 0 1rem 0;
}
.account-settings .user-profile .user-avatar img {
    width: 90px;
    height: 90px;
    -webkit-border-radius: 100px;
    -moz-border-radius: 100px;
    border-radius: 100px;
}
.account-settings .user-profile h5.user-name {
    margin: 0 0 0.5rem 0;
}
.account-settings .user-profile h6.user-email {
    margin: 0;
    font-size: 0.8rem;
    font-weight: 400;
    color: #9fa8b9;
}
.account-settings .about {
    margin: 2rem 0 0 0;
    text-align: center;
}
.account-settings .about h5 {
    margin: 0 0 15px 0;
    color: #007ae1;
}
.account-settings .about p {
    font-size: 0.825rem;
}
.form-control {
    border: 1px solid #cfd1d8;
    -webkit-border-radius: 2px;
    -moz-border-radius: 2px;
    border-radius: 2px;
    font-size: .825rem;
    background: #ffffff;
    color: #2e323c;
}

.card {
    background: #ffffff;
    -webkit-border-radius: 5px;
    -moz-border-radius: 5px;
    border-radius: 5px;
    border: 0;
    margin-bottom: 1rem;
}


    </style>
</head>
<body>
";
        // line 79
        yield         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 79, $this->source); })()), 'form_start');
        yield "
<div class=\"container\">
<div class=\"row gutters\">
<div class=\"col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12\">
</div>
<div class=\"col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12\">
<div class=\"card h-100\">
\t<div class=\"card-body\">
\t\t<div class=\"row gutters\">
\t\t\t<div class=\"col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12\">
\t\t\t\t<h6 class=\"mb-2 text-primary\">Edit profile</h6>
\t\t\t</div>
\t\t\t<div class=\"col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12\">
\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t";
        // line 93
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 93, $this->source); })()), "nom", [], "any", false, false, false, 93), 'row');
        yield "
\t\t\t\t\t</div>
\t\t\t</div>
\t\t\t<div class=\"col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12\">
\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t";
        // line 98
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 98, $this->source); })()), "prenom", [], "any", false, false, false, 98), 'row');
        yield "
\t\t\t\t\t</div>
\t\t\t</div>
\t\t\t<div class=\"col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12\">
\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t";
        // line 103
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 103, $this->source); })()), "email", [], "any", false, false, false, 103), 'row');
        yield "
\t\t\t\t</div>
\t\t\t</div>
\t\t\t<div class=\"col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12\">
\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t";
        // line 108
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 108, $this->source); })()), "num", [], "any", false, false, false, 108), 'row');
        yield "
\t\t\t\t</div>
\t\t\t</div>
\t\t\t<div class=\"col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12\">
\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t";
        // line 113
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 113, $this->source); })()), "plainPassword", [], "any", false, false, false, 113), 'row');
        yield "
\t\t\t\t</div>
\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t<label for=\"Street\">Retype password</label>
\t\t\t\t\t<input type=\"text\" class=\"form-control\" id=\"verify password\" placeholder=\"Password\">
\t\t\t\t</div>
\t\t\t</div>
\t\t</div>
\t\t\t";
        // line 121
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 121, $this->source); })()), "agreeTerms", [], "any", false, false, false, 121), 'row');
        yield "
\t\t\t<button type=\"submit\" class=\"btn\">Register</button>
\t\t</div>
</div>
</div>
</div>
</div>
<script data-cfasync=\"false\" src=\"/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js\"></script><script src=\"https://code.jquery.com/jquery-1.10.2.min.js\"></script>
<script src=\"https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.bundle.min.js\"></script>
<script type=\"text/javascript\">
\t
</script>
";
        // line 133
        yield         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 133, $this->source); })()), 'form_end');
        yield "
</body>
</html>";
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "registration/edit.html.twig";
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
        return array (  206 => 133,  191 => 121,  180 => 113,  172 => 108,  164 => 103,  156 => 98,  148 => 93,  131 => 79,  55 => 5,  53 => 4,  48 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("<!DOCTYPE html>
<html lang=\"en\">
<head>
{% form_theme registrationForm 'bootstrap_5_layout.html.twig' %}

    <meta charset=\"utf-8\">
    <!--  This file has been downloaded from bootdey.com @bootdey on twitter -->
    <!--  All snippets are MIT license http://bootdey.com/license -->
    <title>account setting or edit profile - Bootdey.com</title>
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
    <link href=\"https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css\" rel=\"stylesheet\">
    <style type=\"text/css\">
    \tbody {
    margin: 0;
    padding-top: 40px;
    color: #2e323c;
    background: #f5f6fa;
    position: relative;
    height: 100%;
}
.account-settings .user-profile {
    margin: 0 0 1rem 0;
    padding-bottom: 1rem;
    text-align: center;
}
.account-settings .user-profile .user-avatar {
    margin: 0 0 1rem 0;
}
.account-settings .user-profile .user-avatar img {
    width: 90px;
    height: 90px;
    -webkit-border-radius: 100px;
    -moz-border-radius: 100px;
    border-radius: 100px;
}
.account-settings .user-profile h5.user-name {
    margin: 0 0 0.5rem 0;
}
.account-settings .user-profile h6.user-email {
    margin: 0;
    font-size: 0.8rem;
    font-weight: 400;
    color: #9fa8b9;
}
.account-settings .about {
    margin: 2rem 0 0 0;
    text-align: center;
}
.account-settings .about h5 {
    margin: 0 0 15px 0;
    color: #007ae1;
}
.account-settings .about p {
    font-size: 0.825rem;
}
.form-control {
    border: 1px solid #cfd1d8;
    -webkit-border-radius: 2px;
    -moz-border-radius: 2px;
    border-radius: 2px;
    font-size: .825rem;
    background: #ffffff;
    color: #2e323c;
}

.card {
    background: #ffffff;
    -webkit-border-radius: 5px;
    -moz-border-radius: 5px;
    border-radius: 5px;
    border: 0;
    margin-bottom: 1rem;
}


    </style>
</head>
<body>
{{ form_start(registrationForm) }}
<div class=\"container\">
<div class=\"row gutters\">
<div class=\"col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12\">
</div>
<div class=\"col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12\">
<div class=\"card h-100\">
\t<div class=\"card-body\">
\t\t<div class=\"row gutters\">
\t\t\t<div class=\"col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12\">
\t\t\t\t<h6 class=\"mb-2 text-primary\">Edit profile</h6>
\t\t\t</div>
\t\t\t<div class=\"col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12\">
\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t{{ form_row(registrationForm.nom) }}
\t\t\t\t\t</div>
\t\t\t</div>
\t\t\t<div class=\"col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12\">
\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t{{ form_row(registrationForm.prenom) }}
\t\t\t\t\t</div>
\t\t\t</div>
\t\t\t<div class=\"col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12\">
\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t{{ form_row(registrationForm.email) }}
\t\t\t\t</div>
\t\t\t</div>
\t\t\t<div class=\"col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12\">
\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t{{ form_row(registrationForm.num) }}
\t\t\t\t</div>
\t\t\t</div>
\t\t\t<div class=\"col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12\">
\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t{{ form_row(registrationForm.plainPassword) }}
\t\t\t\t</div>
\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t<label for=\"Street\">Retype password</label>
\t\t\t\t\t<input type=\"text\" class=\"form-control\" id=\"verify password\" placeholder=\"Password\">
\t\t\t\t</div>
\t\t\t</div>
\t\t</div>
\t\t\t{{ form_row(registrationForm.agreeTerms) }}
\t\t\t<button type=\"submit\" class=\"btn\">Register</button>
\t\t</div>
</div>
</div>
</div>
</div>
<script data-cfasync=\"false\" src=\"/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js\"></script><script src=\"https://code.jquery.com/jquery-1.10.2.min.js\"></script>
<script src=\"https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.bundle.min.js\"></script>
<script type=\"text/javascript\">
\t
</script>
{{ form_end(registrationForm) }}
</body>
</html>", "registration/edit.html.twig", "C:\\Users\\alexg\\OneDrive\\Documents\\pi\\main\\SanoFood\\templates\\registration\\edit.html.twig");
    }
}
