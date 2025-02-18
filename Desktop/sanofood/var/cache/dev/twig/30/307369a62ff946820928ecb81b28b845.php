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

/* livraison/livraisons_par_commande.html.twig */
class __TwigTemplate_1f61e237ff5745c7aaa3246401fcc07d extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "livraison/livraisons_par_commande.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "livraison/livraisons_par_commande.html.twig"));

        $this->parent = $this->loadTemplate("base.html.twig", "livraison/livraisons_par_commande.html.twig", 1);
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

        yield "Livraisons du Commande | Écotourisme";
        
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
        yield "<section class=\"parallax-window\" data-parallax=\"scroll\" style=\"\" data-natural-width=\"1400\" data-natural-height=\"470\">
    <div class=\"parallax-content-1 opacity-mask\" data-opacity-mask=\"rgba(0, 0, 0, 0.4)\">
        <div class=\"animated fadeInDown\">
            <h1>Livraisons du Commande</h1>
            <p>Voici les livraisons associés à ce commande.</p>
        </div>
    </div>
</section>

<!-- Fin de la section -->
<div class=\"card-body\">
    <h5 class=\"card-title\">Livraisons du Commande : ";
        // line 17
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["commande"]) || array_key_exists("commande", $context) ? $context["commande"] : (function () { throw new RuntimeError('Variable "commande" does not exist.', 17, $this->source); })()), "titre", [], "any", false, false, false, 17), "html", null, true);
        yield "</h5>

    <!-- Tableau des livraisons du commande -->
    ";
        // line 20
        if ( !Twig\Extension\CoreExtension::testEmpty((isset($context["livraisons"]) || array_key_exists("livraisons", $context) ? $context["livraisons"] : (function () { throw new RuntimeError('Variable "livraisons" does not exist.', 20, $this->source); })()))) {
            // line 21
            yield "        ";
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable((isset($context["livraisons"]) || array_key_exists("livraisons", $context) ? $context["livraisons"] : (function () { throw new RuntimeError('Variable "livraisons" does not exist.', 21, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["livraison"]) {
                // line 22
                yield "            <div class=\"card mb-3\">
                <div class=\"card-body\">
                    <h7 class=\"card-subtitle mb-2 text-muted\">Date: ";
                // line 24
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["livraison"], "created", [], "any", false, false, false, 24), "d-m-Y H:i"), "html", null, true);
                yield "</h7>
                    <p class=\"card-text\"><strong>Adresse:</strong> ";
                // line 25
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["livraison"], "adresse", [], "any", false, false, false, 25), "html", null, true);
                yield "</p>
                    <p class=\"card-text\"><strong>Prix:</strong> ";
                // line 26
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["livraison"], "prix", [], "any", false, false, false, 26), "html", null, true);
                yield "/5</p>
                    <p class=\"card-text\"><strong>Statut:</strong> ";
                // line 27
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["livraison"], "statut", [], "any", false, false, false, 27), "html", null, true);
                yield "</p>

                    <!-- Actions -->
                    <div class=\"btn-group\" role=\"group\" aria-label=\"Actions\">
                        <!-- Ajoutez ici les boutons d'édition ou de suppression si nécessaire -->
                    </div>
                </div>
            </div>
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['livraison'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 36
            yield "    ";
        } else {
            // line 37
            yield "        <p>Aucune évaluation trouvée pour ce commande.</p>
    ";
        }
        // line 39
        yield "</div>
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
        return "livraison/livraisons_par_commande.html.twig";
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
        return array (  164 => 39,  160 => 37,  157 => 36,  142 => 27,  138 => 26,  134 => 25,  130 => 24,  126 => 22,  121 => 21,  119 => 20,  113 => 17,  100 => 6,  87 => 5,  64 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}Livraisons du Commande | Écotourisme{% endblock %}

{% block body %}
<section class=\"parallax-window\" data-parallax=\"scroll\" style=\"\" data-natural-width=\"1400\" data-natural-height=\"470\">
    <div class=\"parallax-content-1 opacity-mask\" data-opacity-mask=\"rgba(0, 0, 0, 0.4)\">
        <div class=\"animated fadeInDown\">
            <h1>Livraisons du Commande</h1>
            <p>Voici les livraisons associés à ce commande.</p>
        </div>
    </div>
</section>

<!-- Fin de la section -->
<div class=\"card-body\">
    <h5 class=\"card-title\">Livraisons du Commande : {{ commande.titre }}</h5>

    <!-- Tableau des livraisons du commande -->
    {% if livraisons is not empty %}
        {% for livraison in livraisons %}
            <div class=\"card mb-3\">
                <div class=\"card-body\">
                    <h7 class=\"card-subtitle mb-2 text-muted\">Date: {{ livraison.created|date('d-m-Y H:i') }}</h7>
                    <p class=\"card-text\"><strong>Adresse:</strong> {{ livraison.adresse }}</p>
                    <p class=\"card-text\"><strong>Prix:</strong> {{ livraison.prix }}/5</p>
                    <p class=\"card-text\"><strong>Statut:</strong> {{ livraison.statut }}</p>

                    <!-- Actions -->
                    <div class=\"btn-group\" role=\"group\" aria-label=\"Actions\">
                        <!-- Ajoutez ici les boutons d'édition ou de suppression si nécessaire -->
                    </div>
                </div>
            </div>
        {% endfor %}
    {% else %}
        <p>Aucune évaluation trouvée pour ce commande.</p>
    {% endif %}
</div>
{% endblock %}
", "livraison/livraisons_par_commande.html.twig", "C:\\Users\\Motaz\\mm Dropbox\\Motaz Sammoud\\PC\\Desktop\\2025\\safwen_yahya_symfony\\symfony_crud_safwen_yahya\\templates\\livraison\\livraisons_par_commande.html.twig");
    }
}
