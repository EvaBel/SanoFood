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

/* conseil/index.html.twig */
class __TwigTemplate_986319a1fa00c8aedfe29dcf94dbc51c extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "conseil/index.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "conseil/index.html.twig"));

        $this->parent = $this->loadTemplate("base.html.twig", "conseil/index.html.twig", 1);
        yield from $this->parent->unwrap()->yield($context, array_merge($this->blocks, $blocks));
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    // line 3
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

        // line 4
        yield "    <h1>Liste des Conseils</h1>
    <a href=\"";
        // line 5
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("add_conseil");
        yield "\" class=\"btn btn-success\">Ajouter un Conseil</a>
    <table class=\"table\">
        <thead>
            <tr>
                <th>ID</th>
                <th>Contenu</th>
                <th>Date Conseil</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            ";
        // line 16
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["conseils"]) || array_key_exists("conseils", $context) ? $context["conseils"] : (function () { throw new RuntimeError('Variable "conseils" does not exist.', 16, $this->source); })()));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["conseil"]) {
            // line 17
            yield "                <tr>
                    <td>";
            // line 18
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["conseil"], "idC", [], "any", false, false, false, 18), "html", null, true);
            yield "</td>
                    <td>";
            // line 19
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["conseil"], "contenu", [], "any", false, false, false, 19), "html", null, true);
            yield "</td>
                    <td>";
            // line 20
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["conseil"], "dateConseil", [], "any", false, false, false, 20), "Y-m-d H:i:s"), "html", null, true);
            yield "</td>
                    <td>
                        <a href=\"";
            // line 22
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("update_conseil", ["idC" => CoreExtension::getAttribute($this->env, $this->source, $context["conseil"], "idC", [], "any", false, false, false, 22)]), "html", null, true);
            yield "\" class=\"btn btn-primary\">Modifier</a>
                        <a href=\"";
            // line 23
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("delete_conseil", ["idC" => CoreExtension::getAttribute($this->env, $this->source, $context["conseil"], "idC", [], "any", false, false, false, 23)]), "html", null, true);
            yield "\" class=\"btn btn-danger\">Supprimer</a>
                    </td>
                </tr>
            ";
            $context['_iterated'] = true;
        }
        // line 26
        if (!$context['_iterated']) {
            // line 27
            yield "                <tr>
                    <td colspan=\"4\">Aucun conseil trouvé</td>
                </tr>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['conseil'], $context['_parent'], $context['_iterated']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 31
        yield "        </tbody>
    </table>
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
        return "conseil/index.html.twig";
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
        return array (  137 => 31,  128 => 27,  126 => 26,  118 => 23,  114 => 22,  109 => 20,  105 => 19,  101 => 18,  98 => 17,  93 => 16,  79 => 5,  76 => 4,  63 => 3,  40 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.html.twig' %}

{% block body %}
    <h1>Liste des Conseils</h1>
    <a href=\"{{ path('add_conseil') }}\" class=\"btn btn-success\">Ajouter un Conseil</a>
    <table class=\"table\">
        <thead>
            <tr>
                <th>ID</th>
                <th>Contenu</th>
                <th>Date Conseil</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            {% for conseil in conseils %}
                <tr>
                    <td>{{ conseil.idC }}</td>
                    <td>{{ conseil.contenu }}</td>
                    <td>{{ conseil.dateConseil|date('Y-m-d H:i:s') }}</td>
                    <td>
                        <a href=\"{{ path('update_conseil', {'idC': conseil.idC}) }}\" class=\"btn btn-primary\">Modifier</a>
                        <a href=\"{{ path('delete_conseil', {'idC': conseil.idC}) }}\" class=\"btn btn-danger\">Supprimer</a>
                    </td>
                </tr>
            {% else %}
                <tr>
                    <td colspan=\"4\">Aucun conseil trouvé</td>
                </tr>
            {% endfor %}
        </tbody>
    </table>
{% endblock %}", "conseil/index.html.twig", "C:\\Users\\Motaz\\mm Dropbox\\Motaz Sammoud\\PC\\Desktop\\2025\\symfony_crud_safwen_yahya\\templates\\conseil\\index.html.twig");
    }
}
