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

/* demande/update.html.twig */
class __TwigTemplate_6ddf46febade2eff34d84f2bfbdf80b7 extends Template
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
            'pp' => [$this, 'block_pp'],
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "demande/update.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "demande/update.html.twig"));

        $this->parent = $this->loadTemplate("base.html.twig", "demande/update.html.twig", 1);
        yield from $this->parent->unwrap()->yield($context, array_merge($this->blocks, $blocks));
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    // line 3
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_pp(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "pp"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "pp"));

        // line 4
        yield "                ";
        // line 5
        yield "                ";
        $context["form_html"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            // line 6
            yield "                    ";
            yield             $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 6, $this->source); })()), 'form_start');
            yield "
                    ";
            // line 7
            yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 7, $this->source); })()), 'widget');
            yield "
                    ";
            // line 8
            yield             $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 8, $this->source); })()), 'form_end');
            yield "
                ";
            yield from [];
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        // line 10
        yield "        
                <div class=\"row\">
                    <!-- Première colonne -->
                    <div class=\"col-xl-8 col-lg-8 col-md-8 col-sm-12\">
                        <div class=\"row\">
                            <!-- Boîte 1 -->
                            <div class=\"col-xl-6 col-lg-6 col-md-6 col-sm-12\">
                                <div class=\"product_box\">
                                    <figure>
                                        <img src=\"/images/product_img1.jpg\" alt=\"#\" />
                                        <h3>Fresh Apple</h3>
                                    </figure>
                                    <!-- Formulaire d'ajout de demande -->
                                    <div class=\"form-overlay\">
                                        <div class=\"form-container\">
                                            <div class=\"card-body\">
                                                <h5 class=\"card-title\">Ajouter une demande</h5>
                                                ";
        // line 27
        yield (isset($context["form_html"]) || array_key_exists("form_html", $context) ? $context["form_html"] : (function () { throw new RuntimeError('Variable "form_html" does not exist.', 27, $this->source); })());
        yield " ";
        // line 28
        yield "                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                           
                          
                    
                    
                </div>
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
        return "demande/update.html.twig";
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
        return array (  118 => 28,  115 => 27,  96 => 10,  90 => 8,  86 => 7,  81 => 6,  78 => 5,  76 => 4,  63 => 3,  40 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.html.twig' %}

{% block pp %}
                {# Rendre le formulaire une seule fois et le stocker dans une variable #}
                {% set form_html %}
                    {{ form_start(form) }}
                    {{ form_widget(form) }}
                    {{ form_end(form) }}
                {% endset %}
        
                <div class=\"row\">
                    <!-- Première colonne -->
                    <div class=\"col-xl-8 col-lg-8 col-md-8 col-sm-12\">
                        <div class=\"row\">
                            <!-- Boîte 1 -->
                            <div class=\"col-xl-6 col-lg-6 col-md-6 col-sm-12\">
                                <div class=\"product_box\">
                                    <figure>
                                        <img src=\"/images/product_img1.jpg\" alt=\"#\" />
                                        <h3>Fresh Apple</h3>
                                    </figure>
                                    <!-- Formulaire d'ajout de demande -->
                                    <div class=\"form-overlay\">
                                        <div class=\"form-container\">
                                            <div class=\"card-body\">
                                                <h5 class=\"card-title\">Ajouter une demande</h5>
                                                {{ form_html|raw }} {# Réutiliser le formulaire rendu #}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                           
                          
                    
                    
                </div>
            {% endblock %}              ", "demande/update.html.twig", "C:\\Users\\Motaz\\mm Dropbox\\Motaz Sammoud\\PC\\Desktop\\2025\\safwen_yahya_symfony\\symfony_crud_safwen_yahya\\templates\\demande\\update.html.twig");
    }
}
