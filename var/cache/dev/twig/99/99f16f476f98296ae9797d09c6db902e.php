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

/* ajout/index.html.twig */
class __TwigTemplate_4218d6595568f1b6f0b1d13ff3341b5b extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "ajout/index.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "ajout/index.html.twig"));

        $this->parent = $this->loadTemplate("base.html.twig", "ajout/index.html.twig", 1);
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

        yield "Formulaire d'Inscription";
        
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
        yield "<div class=\"container mt-5\">
    <h2 class=\"text-center\">Inscription - SanoFood</h2>

    <form action=\"";
        // line 9
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("form_submit");
        yield "\" method=\"POST\" class=\"mt-4\">
        <div class=\"mb-3\">
            <label for=\"name\" class=\"form-label\">Nom complet</label>
            <input type=\"text\" class=\"form-control\" id=\"name\" name=\"name\" required>
        </div>

        <div class=\"mb-3\">
            <label for=\"email\" class=\"form-label\">Email</label>
            <input type=\"email\" class=\"form-control\" id=\"email\" name=\"email\" required>
        </div>

        <div class=\"mb-3\">
            <label for=\"phone\" class=\"form-label\">Téléphone</label>
            <input type=\"tel\" class=\"form-control\" id=\"phone\" name=\"phone\">
        </div>

        <div class=\"mb-3\">
            <label for=\"goal\" class=\"form-label\">Objectif nutritionnel</label>
            <select class=\"form-select\" id=\"goal\" name=\"goal\">
                <option value=\"perte_poids\">Perte de poids</option>
                <option value=\"prise_muscle\">Prise de muscle</option>
                <option value=\"equilibre\">Équilibre alimentaire</option>
            </select>
        </div>

        <div class=\"mb-3\">
            <label for=\"allergies\" class=\"form-label\">Allergies alimentaires</label>
            <textarea class=\"form-control\" id=\"allergies\" name=\"allergies\" rows=\"3\"></textarea>
        </div>

        <div class=\"text-center\">
            <button type=\"submit\" class=\"btn btn-primary\">Envoyer</button>
        </div>
    </form>
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
        return "ajout/index.html.twig";
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
        return array (  105 => 9,  100 => 6,  87 => 5,  64 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}Formulaire d'Inscription{% endblock %}

{% block body %}
<div class=\"container mt-5\">
    <h2 class=\"text-center\">Inscription - SanoFood</h2>

    <form action=\"{{ path('form_submit') }}\" method=\"POST\" class=\"mt-4\">
        <div class=\"mb-3\">
            <label for=\"name\" class=\"form-label\">Nom complet</label>
            <input type=\"text\" class=\"form-control\" id=\"name\" name=\"name\" required>
        </div>

        <div class=\"mb-3\">
            <label for=\"email\" class=\"form-label\">Email</label>
            <input type=\"email\" class=\"form-control\" id=\"email\" name=\"email\" required>
        </div>

        <div class=\"mb-3\">
            <label for=\"phone\" class=\"form-label\">Téléphone</label>
            <input type=\"tel\" class=\"form-control\" id=\"phone\" name=\"phone\">
        </div>

        <div class=\"mb-3\">
            <label for=\"goal\" class=\"form-label\">Objectif nutritionnel</label>
            <select class=\"form-select\" id=\"goal\" name=\"goal\">
                <option value=\"perte_poids\">Perte de poids</option>
                <option value=\"prise_muscle\">Prise de muscle</option>
                <option value=\"equilibre\">Équilibre alimentaire</option>
            </select>
        </div>

        <div class=\"mb-3\">
            <label for=\"allergies\" class=\"form-label\">Allergies alimentaires</label>
            <textarea class=\"form-control\" id=\"allergies\" name=\"allergies\" rows=\"3\"></textarea>
        </div>

        <div class=\"text-center\">
            <button type=\"submit\" class=\"btn btn-primary\">Envoyer</button>
        </div>
    </form>
</div>
{% endblock %}

", "ajout/index.html.twig", "C:\\Users\\alexg\\OneDrive\\Documents\\pi\\main\\SanoFood\\templates\\ajout\\index.html.twig");
    }
}
